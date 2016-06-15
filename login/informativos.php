<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/informativosVO.php';
require_once 'classe/bo/informativosBO.php';
require 'classe/bo/uploadBO.php';

$informativosVO = new informativosVO();
$informativosBO = new informativosBO();
$uploadBO = new uploadBO();

$utilidadesBO = new utilidadesBO();

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'Cadastrar') {
	
	if(!empty($_POST['descricao'])) {
		
		if($_FILES["arquivo"]['error'] == 0 && $_FILES["arquivo"]['size'] > 0){
	
			$uploadBO->pasta     = "../upload";
		
			$uploadBO->nome      = $_FILES["arquivo"]['name'];
		
			$uploadBO->tmp_name  = $_FILES["arquivo"]['tmp_name'];

			$uploadBO->img_marca = "";
			
			$arquivo = $uploadBO->uploadArquivo(TRUE);
			
		} else {
			
			$arquivo = "";
			
		}
	
		$informativosVO->setDescricao(urlencode($_POST['descricao']));

		$informativosVO->setArquivo($arquivo);
		
		$informativosBO->newInformativo($informativosVO);
		
		$msg = "Informativo cadastrado com sucesso";
	
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

if(isset($_POST['editar']) && $_POST['editar'] == 'Editar') {
	
	if(!empty($_POST['descricao'])) {
		
		if($_POST['idhash'] == md5($_POST['idInformativo'])) {
			
			if($_FILES["arquivo"]['error'] == 0 && $_FILES["arquivo"]['size'] > 0){
		
				$uploadBO->pasta     = "../upload";
			
				$uploadBO->nome      = $_FILES["arquivo"]['name'];
			
				$uploadBO->tmp_name  = $_FILES["arquivo"]['tmp_name'];
				
				$arquivo = $uploadBO->uploadArquivo(TRUE);
				
			} else {
				
				$arquivo = "";
				
			}
			
			
			if($arquivo != "") {
				
				$informativo = $informativosBO->get($informativosVO);
				
				if(!empty($informativo["arquivo"])){
					unlink("../upload/".$informativo['arquivo']);
				}
			}
	
		$informativosVO->setidInformativo($_POST['idInformativo']);

		$informativosVO->setDescricao(urlencode($_POST['descricao']));
		
		$informativosVO->setArquivo($arquivo);
		
		$informativosBO->editInformativo($informativosVO);
			
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
		
		$informativosVO->setidInformativo($_GET['id']);
		
		$informativo = $informativosBO->get($informativosVO);
		
		if(!empty($informativo["arquivo"])){
			unlink("../upload/".$informativo['arquivo']);
		}

		$informativosBO->deleteInformativo($informativosVO);
		
		$msg = "Informativo exclu&iacute;do com sucesso";
		
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

$count = $informativosBO->count();

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

$all = $informativosBO->paginacao($inicio, $TAMANHO_PAGINA);
//print_r($all);

$areaAdmin = 'informativos';
?>
<?php include('meta.php') ?>
<script language="javascript">
	function exclui(id,token){
		if(confirm("Tem certeza que deseja excluir esse informativo?")) {

			window.location.href = "informativos.php?acao=excluir&id="+id+"&token="+token;
			
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
                        <li><a href="informativos_ins.php">Cadastrar informativo </a></li>
                    </ul>
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">informativos</a></h2>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php }  ?>
                    	<h3>Informativos cadastrados</h3>
                    	<?php if(count($all) > 0) { ?>
						<table cellpadding="0" cellspacing="0">
							<?php for($c = 0; $c < count($all); $c++) { $linkArquivo = (file_exists("../upload/".$all[$c]["arquivo"]) ? '../upload/'.$all[$c]["arquivo"] : '') ?>
                         	<tr <?php if($c%2 == 0){echo 'class="odd"';} ?>>
                              	<td><?=urldecode($all[$c]['descricao'])?></td>
                              	<td class="action">
                              		<?php echo (empty($all[$c]["arquivo"]) ? '<span class="disabled disabledresultado"></span>' : '<a target="__blank" href="'.$linkArquivo.'" class="resultado">Arquivo</a>'); ?>
                          			<a href="informativos_edt.php?i=<?=$all[$c]['idInformativo']?>&token=<?=md5($all[$c]['idInformativo'])?><?php if($_SESSION['autenticado_login'] == 'admin') { ?><?php } ?>" class="edit">Editar</a>
                               		<a href="javascript:void(0);" onclick="javascript:exclui('<?=$all[$c]['idInformativo']?>','<?=md5($all[$c]['idInformativo'])?>');" class="delete">Delete</a>
                             	</td>
                      		</tr>
                      		<?php } ?>
                     	</table>
                     	<?php } else { ?>
                     	<div class="warnZero">Nenhum informativo foi cadastrado ainda. Para adicionar um, clique <a href="informativos_ins.php">aqui</a></div>
                     	<?php } ?>
                    </div>
                    <?php if($total_paginas > 1) { ?>
                    <div class="paginacao">
                    	<?php if($pagina > 1) { ?><span class="prev"><a href="informativos.php?page=<?=$pagina-1?>">&laquo; Anterior</a></span><?php } ?>
                    	<?php if($pagina < $total_paginas) { ?><span class="next"><a href="informativos.php?page=<?=$pagina+1?>">Próxima &raquo;</a></span><?php } ?>
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
