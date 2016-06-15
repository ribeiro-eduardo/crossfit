<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/bannersVO.php';
require_once 'classe/bo/bannersBO.php';
require 'classe/bo/uploadBO.php';

$bannersVO = new bannersVO();
$bannersBO = new bannersBO();
$uploadBO = new uploadBO();

$utilidadesBO = new utilidadesBO();

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'Cadastrar') {
	
	if(!empty($_POST['nome']) && !empty($_POST['imagem'])) {
		
		if($_FILES["imagem"]['error'] == 0 && $_FILES["imagem"]['size'] > 0){
	
			$uploadBO->pasta     = "../upload/banners-fotos";
		
			$uploadBO->nome      = $_FILES["imagem"]['name'];
		
			$uploadBO->tmp_name  = $_FILES["imagem"]['tmp_name'];
		
			$uploadBO->img_marca = "";
			
			$imagem = $uploadBO->uploadArquivo(TRUE);
			
		} else {
			
			$imagem = "";
			
		}
		
		$bannersVO->setImagem($imagem);
	
		$bannersVO->setNome(urlencode($_POST['nome']));
		
		$bannersVO->setLink(urlencode($_POST['link']));
		
		$bannersBO->newBanner($bannersVO);
		
		$msg = "Banner cadastrado com sucesso";
	
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

if(isset($_POST['editar']) && $_POST['editar'] == 'Editar') {
	
	if(!empty($_POST['nome'])) {
		
		if($_POST['idhash'] == md5($_POST['id'])) {
			
			if($_FILES["imagem"]['error'] == 0 && $_FILES["imagem"]['size'] > 0){
		
				$uploadBO->pasta     = "../upload/banners-fotos";
			
				$uploadBO->nome      = $_FILES["imagem"]['name'];
			
				$uploadBO->tmp_name  = $_FILES["imagem"]['tmp_name'];
			
				$uploadBO->img_marca = "";
				
				$imagem = $uploadBO->uploadArquivo(TRUE);
				
			} else {
				
				$imagem = "";
				
			}
			
			$bannersVO->setId($_POST['id']);
			
			if($imagem != "") {
				
				$banner = $bannersBO->get($bannersVO);
				
				if(!empty($banner["imagem"])){
					unlink("../upload/banners-fotos/".$banner['imagem']);
				}
			}
	
			$bannersVO->setImagem($imagem);
	
			$bannersVO->setNome(urlencode($_POST['nome']));
			
			$bannersVO->setLink(urlencode($_POST['link']));
		
			$bannersBO->editBanner($bannersVO);
		
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
		
		$bannersVO->setId($_GET['id']);
		
		$banner = $bannersBO->get($bannersVO);
		
		if(!empty($banner["imagem"])){
			unlink("../upload/banners-fotos/".$banner['imagem']);
		}

		$bannersBO->deleteBanner($bannersVO);
		
		$msg = "Banner excluido com sucesso";
		
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

$count = $bannersBO->count();

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

$all = $bannersBO->paginacao($inicio, $TAMANHO_PAGINA);

$areaAdmin = 'banners';
?>
<?php include('meta.php') ?>
<script language="javascript">
	function exclui(id,token){
		if(confirm("Tem certeza que deseja excluir esse banner?")) {

			window.location.href = "banners.php?acao=excluir&id="+id+"&token="+token;
			
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
                        <li><a href="banners_ins.php">Cadastrar banner </a></li>
                    </ul>
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">Banners</a></h2>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Banners cadastrados</h3>
                    	<?php if(count($all) > 0) { ?>
						<table cellpadding="0" cellspacing="0">
							<?php for($c = 0; $c < count($all); $c++) { ?>
                         	<tr <?php if($c%2 == 0){echo 'class="odd"';}?>>
                              	<td><?=urldecode($all[$c]['nome'])?></td>
                              	<td class="action">
                              		<a href="banners_edt.php?i=<?=$all[$c]['id']?>&token=<?=md5($all[$c]['id'])?><?php if($_SESSION['autenticado_login'] == 'admin') { ?><?php } ?>" class="edit">Editar</a>
                               		<a href="javascript:void(0);" onclick="javascript:exclui('<?=$all[$c]['id']?>','<?=md5($all[$c]['id'])?>');" class="delete">Delete</a>
                             	</td>
                      		</tr>
                      		<?php } ?>
                     	</table>
                     	<?php } else { ?>
                     	<div class="warnZero">Nenhum banner foi cadastrado ainda. Para adicionar um, clique <a href="banners_ins.php">aqui</a></div>
                     	<?php } ?>
                    </div>
                    <?php if($total_paginas > 1) { ?>
                    <div class="paginacao">
                    	<?php if($pagina > 1) { ?><span class="prev"><a href="banners.php?page=<?=$pagina-1?>">&laquo; Anterior</a></span><?php } ?>
                    	<?php if($pagina < $total_paginas) { ?><span class="next"><a href="banners.php?page=<?=$pagina+1?>">Pr&oacute;xima &raquo;</a></span><?php } ?>
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
