<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
	header("Location: index.php");
}

if($_GET['token'] != md5($_GET['i'])) {
	
	header("Location: informativos.php");
	
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/informativosVO.php';
require_once 'classe/bo/informativosBO.php';

$informativosVO = new informativosVO();
$informativosBO = new informativosBO();

$informativosVO->setidInformativo($_GET['i']);

$informativo = $informativosBO->get($informativosVO);

//print_r($informativo);

$areaAdmin = 'informativos';

include('meta.php');

?>
<script type="text/javascript" src="style/js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="style/js/jquery.validate.min.js"></script>
</head>

<body>
	<div id="wrapper">    	
    	<?php include('header.php'); ?>        
        <div id="containerHolder">
			<div id="container">
                <div id="sidebar">
                	<ul class="sideNav">
                        <li><a href="informativos.php">Ver informativos </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="informativos.php">Informativos</a> &raquo; <a href="#" class="active">Editar informativo</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Editar informativo</h3>
                    	<form action="informativos.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>Descri&ccedil;&atilde;o do informativo: </label><input type="text" class="text-long" name="descricao" id="descricao" maxlength="255" style="width: 550px;" value="<?=urldecode($informativo['descricao'])?>" /></p>
                                <?php
                                    
                                        //echo '<p><label>Arquivo atual: </label> <img src="../upload/'.$informativo['arquivo'].'" /></p>';
                                    
                                ?>
                                <p><label>Novo Arquivo: </label><input type="file" accept="application/pdf"name="arquivo" /></p>
                                
                                <input type="hidden" name="idInformativo" value="<?=$informativo['idInformativo']?>" />
                                <input type="hidden" name="idhash" value="<?=md5($informativo['idInformativo'])?>" />
                                <input type="submit" name="editar" value="Editar" />
                            </fieldset>
                    	</form>
                    	
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <p id="footer"><a href="http://www.legulas.com.br">L&eacute;gulas Solu&ccedil;&otilde;es para Web</a></p>
    </div>
</body>
</html>
