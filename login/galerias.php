<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/galeriasVO.php';
require_once 'classe/bo/galeriasBO.php';
require 'classe/bo/uploadBO.php';

$galeriasVO = new galeriasVO();
$galeriasBO = new galeriasBO();
$uploadBO = new uploadBO();

$utilidadesBO = new utilidadesBO();

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'Cadastrar') {
	
	if(!empty($_POST['nome'])) {
		
		if($_FILES["imagem"]['error'] == 0 && $_FILES["imagem"]['size'] > 0){
	
			$uploadBO->pasta     = "../upload";
		
			$uploadBO->nome      = $_FILES["imagem"]['name'];
		
			$uploadBO->tmp_name  = $_FILES["imagem"]['tmp_name'];
		
			$uploadBO->img_marca = "";
			
			$imagem = $uploadBO->uploadArquivo(TRUE);
			
		} else {
			
			$imagem = "";
			
		}
		
		$galeriasVO->setImagem($imagem);
	
		$galeriasVO->setNome(urlencode($_POST['nome']));

		$galeriasVO->setDataInicio(urlencode($_POST['dataInicio']));

		$galeriasVO->setDataFim(urlencode($_POST['dataFim']));

		$galeriasVO->setLocal(urlencode($_POST['local']));
		
		$galeriasVO->setLink(urlencode($_POST['link']));

		$destaque = $_POST['destaque'];

		if($destaque=='1'){
			$galeriasBO->alterarDestaque();
		}

		$galeriasVO->setDestaque($destaque);
		
		$galeriasBO->newGaleria($galeriasVO);
		
		$msg = "Galeria cadastrada com sucesso";
	
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

if(isset($_POST['editar']) && $_POST['editar'] == 'Editar') {
	
	if(!empty($_POST['nome'])) {
		
		if($_POST['idhash'] == md5($_POST['id'])) {
			
			if($_FILES["imagem"]['error'] == 0 && $_FILES["imagem"]['size'] > 0){
		
				$uploadBO->pasta     = "../upload";
			
				$uploadBO->nome      = $_FILES["imagem"]['name'];
			
				$uploadBO->tmp_name  = $_FILES["imagem"]['tmp_name'];
			
				$uploadBO->img_marca = "";
				
				$imagem = $uploadBO->uploadArquivo(TRUE);
				
			} else {
				
				$imagem = "";
				
			}
			
			$galeriasVO->setId($_POST['id']);
			
			if($imagem != "") {
				
				$galeria = $galeriasBO->get($galeriasVO);
				
				if(!empty($galeria["imagem"])){
					unlink("../upload/".$galeria['imagem']);
				}
			}
	
			$galeriasVO->setImagem($imagem);

			$galeriasVO->setLink(urlencode($_POST['link']));
	
			$galeriasVO->setNome(urlencode($_POST['nome']));

			$galeriasVO->setDataInicio(urlencode($_POST['dataInicio']));

			$galeriasVO->setDataFim(urlencode($_POST['dataFim']));

			$galeriasVO->setLocal(urlencode($_POST['local']));
			
			$destaque = $_POST['destaque'];

			if($destaque=='1'){
				$galeriasBO->alterarDestaque();
			}

			$galeriasVO->setDestaque($destaque);
		
			$galeriasBO->editGaleria($galeriasVO);
		
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
		
		$galeriasVO->setId($_GET['id']);
		
		$galeria = $galeriasBO->get($galeriasVO);
		
		if(!empty($galeria["imagem"])){
			unlink("../upload/".$galeria['imagem']);
		}

		$galeriasBO->deleteGaleria($galeriasVO);
		
		$msg = "Galeria exclu&iacute;da com sucesso";
		
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

$count = $galeriasBO->count();

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

$all = $galeriasBO->paginacaoGaleriasAdmin($inicio, $TAMANHO_PAGINA);

$areaAdmin = 'galerias';
?>
<?php include('meta.php') ?>
<script language="javascript">
	function exclui(id,token){
		if(confirm("Tem certeza que deseja excluir essa galeria? (ATENCAO: Todas as fotos da galeria serao excluidas tambem!)")) {

			window.location.href = "galerias.php?acao=excluir&id="+id+"&token="+token;
			
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
                        <li><a href="galerias_ins.php">Cadastrar galeria </a></li>
                    </ul>
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">galerias</a></h2>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Galerias cadastradas <i>(&#10004; = galeria em destaque)</i></h3>
                    	<?php if(count($all) > 0) { ?>
						<table cellpadding="0" cellspacing="0">
							<?php for($c = 0; $c < count($all); $c++) { ?>
                         	<tr <?php if($c%2 == 0){echo 'class="odd"';}?>>
                              	<td><?=urldecode($all[$c]['nome'])?></td>
                              	<?  if($all[$c]['destaque']==1){
                            		echo '<td> &#10004 </td>';
                        		} 
                        		else{
                        			echo '<td></td>';
                        		}
                        		?>
                        		<td><img src="../upload/<?=$all[$c]['imagem']?>" width="20%" height="40%"></td>
                              	<td class="action">
                              		<a href="galeria-fotos.php?i=<?=$all[$c]['id']?>&token=<?=md5($all[$c]['id'])?>" class="gallery" title="Cadastrar fotos no &aacute;lbum"></a>
                              		<a href="galerias_edt.php?i=<?=$all[$c]['id']?>&token=<?=md5($all[$c]['id'])?><?php if($_SESSION['autenticado_login'] == 'admin') { ?><?php } ?>" class="edit">Editar</a>
                               		<a href="javascript:void(0);" onclick="javascript:exclui('<?=$all[$c]['id']?>','<?=md5($all[$c]['id'])?>');" class="delete">Delete</a>
                             	</td>
                      		</tr>
                      		<?php } ?>
                     	</table>
                     	<?php } else { ?>
                     	<div class="warnZero">Nenhuma galeria foi cadastrada ainda. Para adicionar uma, clique <a href="galerias_ins.php">aqui</a></div>
                     	<?php } ?>
                    </div>
                    <?php if($total_paginas > 1) { ?>
                    <div class="paginacao">
                    	<?php if($pagina > 1) { ?><span class="prev"><a href="galerias.php?page=<?=$pagina-1?>">&laquo; Anterior</a></span><?php } ?>
                    	<?php if($pagina < $total_paginas) { ?><span class="next"><a href="galerias.php?page=<?=$pagina+1?>">Próxima &raquo;</a></span><?php } ?>
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
