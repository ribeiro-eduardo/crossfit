<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
	header("Location: index.php");
}

if($_GET['token'] != md5($_GET['i'])) {
	
	header("Location: palestras.php");
	
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/palestrasVO.php';
require_once 'classe/bo/palestrasBO.php';

$palestrasVO = new palestrasVO();
$palestrasBO = new palestrasBO();

$palestrasVO->setidPalestra($_GET['i']);

$palestra = $palestrasBO->get($palestrasVO);

$areaAdmin = 'palestras';

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
                        <li><a href="palestras.php">Ver palestras </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="palestras.php">Palestras</a> &raquo; <a href="#" class="active">Editar palestra</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Editar palestra</h3>
                    	<form action="palestras.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>Título : </label><input type="text" class="text-long" name="titulo" id="titulo" maxlength="255" style="width: 550px;" value="<?=urldecode($palestra['tituloPalestra'])?>" /></p>
                                <p><label>Conteúdo: </label><textarea id="descricao" name="descricao"><?=urldecode($palestra['textoPalestra'])?></textarea></p>
                                <input type="hidden" name="id" value="<?=$palestra['idPalestra']?>" />
                                <input type="hidden" name="idhash" value="<?=md5($palestra['idPalestra'])?>" />
                                <input type="submit" name="editar" value="Editar" />
                            </fieldset>
                    	</form>
                    	<script language="javascript">
                    		CKEDITOR.replace('descricao', {
                        			filebrowserBrowseUrl : ' uploadEditor.php?action=browse',
                    		        filebrowserUploadUrl : ' uploadEditor.php?action=upload',
                    		        height: 450 }
                        	);
                    	</script>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <p id="footer"><a href="http://www.legulas.com.br">L&eacute;gulas Solu&ccedil;&otilde;es para Web</a></p>
    </div>
</body>
</html>
