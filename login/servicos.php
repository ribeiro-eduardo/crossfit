<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/servicosVO.php';
require_once 'classe/bo/servicosBO.php';
require 'classe/bo/uploadBO.php';

$servicosVO = new servicosVO();
$servicosBO = new servicosBO();
$uploadBO = new uploadBO();

$utilidadesBO = new utilidadesBO();


if(isset($_POST['editar']) && $_POST['editar'] == 'Editar') {
	
	if(!empty($_POST['texto'])) {
		
		if($_POST['idhash'] == md5($_POST['id'])) {
			
			$servicosVO->setId($_POST['id']);
			
			$servicosVO->setTexto(urlencode($_POST['texto']));
		
			$servicosBO->editServico($servicosVO);
		
			$msg = "Dados editados com sucesso";
		
		} else {
			
			$msg = "Dados corrompidos";
			
		}
	
	} else {
	
		$msg = "Dados corrompidos";
	
	}
	
}


$all = $servicosBO->getAdmin();

$areaAdmin = 'servicos';
?>
<?php include('meta.php') ?>

</head>

<body>
	<div id="wrapper">    	
    	<?php include('header.php') ?>        
        <div id="containerHolder">
			<div id="container">            	
                <div id="sidebar">
                	
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">Servi&ccedil;os</a></h2>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Servi&ccedil;os cadastrados</h3>
                    	<?php if(count($all) > 0) { ?>
						<table cellpadding="0" cellspacing="0">
							<?php for($c = 0; $c < count($all); $c++) { ?>
                         	<tr <?php if($c%2 == 0){echo 'class="odd"';}?>>
                              	<td>Texto servi&ccedil;os</td>
                              	<td class="action">
                              		<a href="servicos_edt.php?i=<?=$all[$c]['id']?>&token=<?=md5($all[$c]['id'])?><?php if($_SESSION['autenticado_login'] == 'admin') { ?><?php } ?>" class="edit">Editar</a>
                             	</td>
                      		</tr>
                      		<?php } ?>
                     	</table>
                     	<?php } else { ?>
                     	<div class="warnZero">Os servicos nao foram cadastrados ainda. Clique <a href="servicos_ins.php">aqui</a> para cadastra-los</div>
                     	<?php } ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <p id="footer"><a href="http://www.legulas.com.br">L&eacute;gulas Solu&ccedil;&otilde;es para Web</a></p>
    </div>
</body>
</html>
