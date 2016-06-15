<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/noticiasVO.php';
require_once 'classe/bo/noticiasBO.php';
require 'classe/bo/uploadBO.php';

$noticiasVO = new noticiasVO();
$noticiasBO = new noticiasBO();
$uploadBO = new uploadBO();

$utilidadesBO = new utilidadesBO();

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'Cadastrar') {
	
	if(!empty($_POST['titulo']) && !empty($_POST['descricao'])) {
	
		$noticiasVO->setTitulo(urlencode($_POST['titulo']));
		
		$noticiasVO->setTexto(urlencode($_POST['descricao']));
		
		$noticiasVO->setData(date("d/m/Y"));
		
		$noticiasVO->setStatus($_POST['status']);

		$destaque = $_POST['destaque'];

		if($destaque=='1'){
			$noticiasBO->alterarDestaque();
		}

		$noticiasVO->setDestaque($destaque);
		
		$noticiasBO->newNoticia($noticiasVO);
		
		$msg = "Notícia cadastrada com sucesso";
	
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

if(isset($_POST['editar']) && $_POST['editar'] == 'Editar') {
	
	if(!empty($_POST['titulo']) && !empty($_POST['descricao'])) {
		
		if($_POST['idhash'] == md5($_POST['id'])) {
			
			$noticiasVO->setId($_POST['id']);
	
			$noticiasVO->setTitulo(urlencode($_POST['titulo']));
			
			$noticiasVO->setTexto(urlencode($_POST['descricao']));
			
			$noticiasVO->setStatus($_POST['status']);

			$destaque = $_POST['destaque'];

			if($destaque=='1'){
				
				$noticiasBO->alterarDestaque();
				$noticiasVO->setDestaque($destaque);

			}elseif($destaque=='0'){
				
				$noticiasVO->setDestaque($destaque);
			}
			
			$noticiasBO->editNoticia($noticiasVO);
		
			$msg = "Dados editados com sucesso";
		
		} else {
			
			$msg = "Dados corrompidos";
			
		}
	
	} else {
	
		$msg = "Dados corrompidos";
	
	}
	
}

if(isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
	
	if($_GET['token'] == md5($_GET['id'])) {
		
		$noticiasVO->setId($_GET['id']);
		
		$noticia = $noticiasBO->get($noticiasVO);

		$noticiasBO->deleteNoticia($noticiasVO);
		
		$msg = "Notícia excluída com sucesso";
		
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

$count = $noticiasBO->count();

$TAMANHO_PAGINA = 10;

$total_paginas = ceil(($count['total']) / $TAMANHO_PAGINA);

$pagina = $_GET['page'];

if(!$pagina) {

	$pagina = 1;

	$inicio = 0;

} else {

	if($pagina > $total_paginas) {
		$pagina = $total_paginas;
	}

	if($pagina < 0 || !is_numeric($pagina)) {
		$pagina = 1;
	}

	$inicio = ($pagina - 1) * $TAMANHO_PAGINA;

}

$all = $noticiasBO->paginacao($inicio, $TAMANHO_PAGINA);
$noticiaDestaque = $noticiasBO->getNoticiaDestaque();
//print_r($noticiaDestaque);
$areaAdmin = 'noticias';
?>
<?php include('meta.php') ?>
<script language="javascript">
	function exclui(id,token){
		if(confirm("Tem certeza que deseja excluir essa notícia?")) {

			window.location.href = "noticias.php?acao=excluir&id="+id+"&token="+token;
			
		}
	}
</script>
</head>

<body>
	<div id="wrapper">    	
    	<?php include('header.php') ?>        
        <div id="containerHolder">
			<div id="container">            	
                <div id="sidebar">
                	<ul class="sideNav">
                        <li><a href="noticias_ins.php">Cadastrar notícia </a></li>
                    </ul>
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">Notícias</a></h2>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Notícias cadastradas <i>(not&iacute;cia em destaque: <?=urldecode($noticiaDestaque['titulo'])?>)</i></h3>
                    	<?php if(count($all) > 0) { ?>
						<table cellpadding="0" cellspacing="0">
							<?php for($c = 0; $c < count($all); $c++) { ?>
                         	<tr <?php if($c%2 == 0){echo 'class="odd"';}?>>
                              	<td><?=urldecode($all[$c]['titulo'])?></td>
                              	<td class="action">
                              		<a href="noticias_edt.php?i=<?=$all[$c]['id']?>&token=<?=md5($all[$c]['id'])?><?php if($_SESSION['autenticado_login'] == 'admin') { ?>&cd=<?=$all[$c]['id']?><?php } ?>" class="edit">Editar</a>
                               		<a href="javascript:void(0);" onclick="javascript:exclui('<?=$all[$c]['id']?>','<?=md5($all[$c]['id'])?>');" class="delete">Delete</a>
                             	</td>
                      		</tr>
                      		<?php } ?>
                     	</table>
                     	<?php } else { ?>
                     	<div class="warnZero">Nenhuma not&iacute;cia foi cadastrada ainda. Para adicionar uma clique <a href="noticias_ins.php">aqui</a></div>
                     	<?php } ?>
                    </div>
                    <?php if($total_paginas > 1) { ?>
                    <div class="paginacao">
                    	<?php if($pagina > 1) { ?><span class="prev"><a href="noticias.php?page=<?=$pagina-1?>">&laquo; Anterior</a></span><?php } ?>
                    	<?php if($pagina < $total_paginas) { ?><span class="next"><a href="noticias.php?page=<?=$pagina+1?>">Próxima &raquo;</a></span><?php } ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <p id="footer"><a href="http://www.legulas.com.br">L&eacute;gulas Solu&ccedil;&otilde;es para Web</a></p>
    </div>
</body>
</html>
