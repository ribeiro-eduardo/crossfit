<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/palestrasVO.php';
require_once 'classe/bo/palestrasBO.php';
require 'classe/bo/uploadBO.php';

$palestrasVO = new palestrasVO();
$palestrasBO = new palestrasBO();
$uploadBO = new uploadBO();

$utilidadesBO = new utilidadesBO();

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'Cadastrar') {
	
	if(!empty($_POST['titulo'])) {
	
		$palestrasVO->settituloPalestra(urlencode($_POST['titulo']));
		
		$palestrasVO->settextoPalestra(urlencode($_POST['descricao']));
		
		$palestrasBO->newPalestra($palestrasVO);
		
		$msg = "Palestra cadastrada com sucesso";
	
	} else {
		
		$msg = "Preencha o campo t&iacute;tulo";
		
	}
	
}

if(isset($_POST['editar']) && $_POST['editar'] == 'Editar') {
	
	if(!empty($_POST['titulo']) && !empty($_POST['descricao'])) {
		
		if($_POST['idhash'] == md5($_POST['id'])) {
			
			$palestrasVO->setidPalestra($_POST['id']);
			
			$palestrasVO->settituloPalestra(urlencode($_POST['titulo']));
			
			$palestrasVO->settextoPalestra(urlencode($_POST['descricao']));
			
			// VER COM ALINE
			//$palestrasVO->setstatuspalestra($_POST['status']);
		
			$palestrasBO->editpalestra($palestrasVO);
		
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
		
		$palestrasVO->setidPalestra($_GET['id']);
		
		$palestra = $palestrasBO->get($palestrasVO);

		$palestrasBO->deletePalestra($palestrasVO);
		
		$msg = "Palestra exclu&iacute;da com sucesso";
		
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

$count = $palestrasBO->count();

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

$all = $palestrasBO->paginacao($inicio, $TAMANHO_PAGINA);

$areaAdmin = 'palestras';
?>
<?php include('meta.php') ?>
<script language="javascript">
	function exclui(id,token){
		if(confirm("Tem certeza que deseja excluir esse item?")) {

			window.location.href = "palestras.php?acao=excluir&id="+id+"&token="+token;
			
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
                        <li><a href="palestras_ins.php">Cadastrar palestras </a></li>
                    </ul>
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">Palestras</a></h2>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Palestras cadastradas</h3>
                    	<?php if(count($all) > 0) { ?>
						<table cellpadding="0" cellspacing="0">
							<?php for($c = 0; $c < count($all); $c++) { ?>
                         	<tr <?php if($c%2 == 0){echo 'class="odd"';}?>>
                              	<td><?=urldecode($all[$c]['tituloPalestra'])?></td>
                              	<td class="action">
                              		<a href="palestras_edt.php?i=<?=$all[$c]['idPalestra']?>&token=<?=md5($all[$c]['idPalestra'])?><?php if($_SESSION['autenticado_login'] == 'admin') { ?><?php } ?>" class="edit">Editar</a>
                               		<a href="javascript:void(0);" onclick="javascript:exclui('<?=$all[$c]['idPalestra']?>','<?=md5($all[$c]['idPalestra'])?>');" class="delete">Delete</a>
                             	</td>
                      		</tr>
                      		<?php } ?>
                     	</table>
                     	<?php } else { ?>
                     	<div class="warnZero">Nenhuma palestra foi cadastrada ainda. Para adicionar uma clique <a href="palestras_ins.php">aqui</a></div>
                     	<?php } ?>
                    </div>
                    <?php if($total_paginas > 1) { ?>
                    <div class="paginacao">
                    	<?php if($pagina > 1) { ?><span class="prev"><a href="palestras.php?page=<?=$pagina-1?>">&laquo; Anterior</a></span><?php } ?>
                    	<?php if($pagina < $total_paginas) { ?><span class="next"><a href="palestras.php?page=<?=$pagina+1?>">Próxima &raquo;</a></span><?php } ?>
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
