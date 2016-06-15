<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
	
	header("Location: index.php");
	
}

if(md5($_GET['i']) != $_GET['token']) {
	
	header("Location: galerias.php");
	
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');
require('classe/bo/uploadBO.php');
require_once 'classe/vo/galeriaFotosVO.php';
require_once 'classe/bo/galeriaFotosBO.php';
require_once 'classe/vo/galeriasVO.php';
require_once 'classe/bo/galeriasBO.php';

$uploadBO = new uploadBO();

$util = new utilidadesBO();

$galeriaFotosVO = new galeriaFotosVO();
$galeriaFotosBO = new galeriaFotosBO();

$galeriasVO = new galeriasVO();
$galeriasBO = new galeriasBO();

$galeriaFotosVO->setIdGaleria($_GET['i']);
$galeriasVO->setId($_GET['i']);

//$galeriaFotos->idAcademia = (isset($_GET['cd'])) ? $_GET['cd'] : $_SESSION['autenticado_id'];

$msg = "";

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'Cadastrar') {	
	
	if($_FILES['imagem']['tmp_name']!==""){

        if ($_FILES["imagem"]['size'] >  1500000) { // se for maior que 1,5 MB 

            $msg = "Tamanho m&aacute;ximo de arquivo: 1,5 MB";

        } else{
	
			$uploadBO->pasta     = "../upload/galeria-fotos/";
			
			$uploadBO->nome      = $_FILES["imagem"]['name'];
			
			$uploadBO->tmp_name  = $_FILES["imagem"]['tmp_name'];
			
			$uploadBO->img_marca = "";
				
			$imagem = $uploadBO->uploadArquivo(TRUE);
				
			$galeriaFotosVO->setIdGaleria($_GET['i']);

			$galeriaFotosVO->setImagem($imagem);
				
			$galeriaFotosVO->setDescricao(urlencode($_POST['descricao']));

			$destaque = $_POST['destaque'];

			if($destaque=='1'){
				$galeriaFotosBO->alterarDestaque();
			}

			$galeriaFotosVO->setDestaque($destaque);
				
			$galeriaFotosBO->newImagem($galeriaFotosVO);
				
			$msg = "Imagem cadastrada com sucesso";
		}
	}else{
		$msg = "Escolha uma imagem para cadastrar";
	}	

}

if(isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
	
	if(md5($_GET['id']) == $_GET['etoken']) {
		
		$db = new DBMySQL();
		
		$db->do_query("SELECT * FROM `galeria-fotos` WHERE `idGaleria` = ".$_GET['id']."");
		
		$result = $db->getRow();
		
		@unlink("../upload/galeria-fotos/".$result['imagem']);
		
		$galeriaFotosVO->setId($_GET['id']);
		
		$galeriaFotosBO->deleteImagem($_GET['id']);
		
		$msg = "Imagem exclu&iacute;da com sucesso";
		
		
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
	
}

$all = $galeriaFotosBO->get($galeriaFotosVO); 

$galeria = $galeriasBO->get($galeriasVO);

$areaAdmin = 'sobre-academia';

include('meta.php');

?>
<script language="javascript">
	function exclui(id,token){
		if(confirm("Tem certeza que deseja excluir essa imagem?")) {

			window.location.href = "galeria-fotos.php?i=<?=$_GET['i']?>&token=<?=$_GET['token']?>&acao=excluir&id="+id+"&etoken="+token;
			
		}
	}
</script>
</head>

<body>
	<div id="wrapper">    	
    	<?php include('header.php');?>        
        <div id="containerHolder">
			<div id="container">
                <div id="sidebar">
                	<ul class="sideNav">
                        <li><a href="galerias.php">Ver galerias </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">Galeria de Fotos - <?=urldecode($galeria[0]['nome'])?></a></h2>
                    <div id="main">
                    	<h3>Cadastrar imagem</h3>
                    	<form action="galeria-fotos.php?<?=$_SERVER['QUERY_STRING']?>" method="post" enctype="multipart/form-data">
                    		<fieldset>
                    			<?php if($_SESSION['autenticado_login'] == 'admin') { ?>
                    			<?php } ?>
                                <p><label>Imagem: </label><input type="file" class="text-long" name="imagem" id="imagem" /></p>
                                <p><label>Descri&ccedil;&atilde;o: </label><input type="text" class="text-long" name="descricao" id="descricao" maxlength="255" /></p>
                                <p><label>Destaque: </label>
                                    <select name="destaque">
                                        <option value="1">Destacar</option>
                                        <option value="0" selected="selected">N&atilde;o destacar</option>
                                    </select>
                                </p>
                                <input type="submit" name="cadastrar" value="Cadastrar" />
                            </fieldset>
                    	</form>
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Imagens cadastradas <i>(&#10004; = imagem em destaque)</i></h3>
                       	<fieldset style="text-align: center; padding: 20px; padding-left: 32px;">
                        	<?php

                        		$r = 0;
                        		
                        		while(@$all[$r]) {
                        	
                        	?>
                        		<div class="image-gallery">
                            		<img src="../upload/galeria-fotos/<?=$all[$r]['imagem']?>" width="100" height="100" title="<?=urldecode($all[$r]['descricao'])?>" /><br /><br />
                            		<p><?=urldecode($all[$r]['descricao'])?> </p>
                            	<?  if($all[$r]['destaque']==1){
                            			echo '<td> &#10004 </td>';
                        			} ?> 
                            		<a style="margin-left: 48px;" href="javascript:void(0)" onclick="javascript: exclui('<?=$all[$r]['id']?>','<?=md5($all[$r]['id'])?>');" class="delete" title="Excluir">Delete</a>
                           		</div>
                           	<?php
                           	
                           			$r++;
                           	
                        		}
                           	
                           	?>
                      	</fieldset>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <p id="footer"><a href="http://www.legulas.com.br">L&eacute;gulas Solu&ccedil;&otilde;es para Web</a></p>
    </div>
</body>
</html>
