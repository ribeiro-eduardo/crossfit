<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/bibliotecaVO.php';
require_once 'classe/bo/bibliotecaBO.php';
require 'classe/bo/uploadBO.php';

$bibliotecaVO = new bibliotecaVO();
$bibliotecaBO = new bibliotecaBO();
$uploadBO = new uploadBO();

$utilidadesBO = new utilidadesBO();

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'Cadastrar') {
	
	if(!empty($_POST['titulo']) && !empty($_POST['autor'])) {
		
		$bibliotecaVO->setTitulo(urlencode($_POST['titulo']));
		
		$bibliotecaVO->setAutor(urlencode($_POST['autor']));
		
		$bibliotecaBO->newObra($bibliotecaVO);
		
		$msg = "Obra cadastrada com sucesso";
	
	} else {
		
		$msg = "Preencha todos os campos";
		
	}
	
}

if(isset($_POST['editar']) && $_POST['editar'] == 'Editar') {
	
	if(!empty($_POST['titulo']) && !empty($_POST['autor'])) {
		
		if($_POST['idhash'] == md5($_POST['id'])) {
			
			$bibliotecaVO->setId($_POST['id']);
	
			$bibliotecaVO->setTitulo(urlencode($_POST['titulo']));
			
			$bibliotecaVO->setAutor(urlencode($_POST['autor']));
			
			$bibliotecaBO->editObra($bibliotecaVO);
		
			$msg = "Dados editados com sucesso";
		
		} else {
			
			$msg = "Dados corrompidos";
			
		}
	
	} else {
	
		$msg = "Preencha todos os campos";
	
	}
	
}

if(isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
	
	if($_GET['token'] == md5($_GET['id'])) {
		
		$bibliotecaVO->setId($_GET['id']);

		$bibliotecaBO->deleteObra($bibliotecaVO);
		
		$msg = "Obra exclu&iacute;da com sucesso";
		
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

/*PAGINACAO
$count = $bibliotecaBO->count();

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

}*/

$all = $bibliotecaBO->paginacaoAll();

$areaAdmin = 'biblioteca';
?>
<?php include('meta.php') ?>
<script language="javascript">
	function exclui(id,token){
		if(confirm("Tem certeza que deseja excluir essa obra?")) {

			window.location.href = "biblioteca.php?acao=excluir&id="+id+"&token="+token;
			
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
                        <li><a href="biblioteca_ins.php">Cadastrar obra </a></li>
                    </ul>
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">Obras</a></h2>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Obras cadastradas</h3>
                    	<?php if(count($all) > 0) { ?>
						<table cellpadding="0" cellspacing="0">
							<?php for($c = 0; $c < count($all); $c++) { ?>
                         	<tr <?php if($c%2 == 0){echo 'class="odd"';}?>>
                              	<td><?=urldecode($all[$c]['titulo'])?></td>
                              	<td class="action">
                              		<a href="biblioteca_edt.php?i=<?=$all[$c]['id']?>&token=<?=md5($all[$c]['id'])?><?php if($_SESSION['autenticado_login'] == 'admin') { ?>&cd=<?=$all[$c]['id']?><?php } ?>" class="edit">Editar</a>
                               		<a href="javascript:void(0);" onclick="javascript:exclui('<?=$all[$c]['id']?>','<?=md5($all[$c]['id'])?>');" class="delete">Delete</a>
                             	</td>
                      		</tr>
                      		<?php } ?>
                     	</table>
                     	<?php } else { ?>
                     	<div class="warnZero">Nenhuma obra foi cadastrada ainda. Para adicionar uma obra, clique <a href="biblioteca_ins.php">aqui</a></div>
                     	<?php } ?>
                    </div>
                    <?php if($total_paginas > 1) { ?>
                    <div class="paginacao">
                    	<?php if($pagina > 1) { ?><span class="prev"><a href="biblioteca.php?page=<?=$pagina-1?>">&laquo; Anterior</a></span><?php } ?>
                    	<?php if($pagina < $total_paginas) { ?><span class="next"><a href="biblioteca.php?page=<?=$pagina+1?>">Pr&oacute;xima &raquo;</a></span><?php } ?>
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
