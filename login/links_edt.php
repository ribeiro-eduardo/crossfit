<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
	header("Location: index.php");
}

if($_GET['token'] != md5($_GET['i'])) {
	
	header("Location: links.php");
	
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/linksVO.php';
require_once 'classe/bo/linksBO.php';

$linksVO = new linksVO();
$linksBO = new linksBO();

$linksVO->setid($_GET['i']);

$link = $linksBO->get($linksVO);

$areaAdmin = 'links';

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
                        <li><a href="links.php">Ver links </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="links.php">Links</a> &raquo; <a href="#" class="active">Editar link</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Editar link</h3>
                    	<form action="links.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>Nome do link &uacute;til:</label><input type="text" class="text-long" name="nome" id="nome" maxlength="255" style="width: 550px;" value="<?=urldecode($link['nome'])?>" /></p>
                                <p><label>Texto: </label><textarea id="texto" name="texto"><?=urldecode($link['texto'])?></textarea></p>                                
                                <input type="hidden" name="id" value="<?=$link['id']?>" />
                                <input type="hidden" name="idhash" value="<?=md5($link['id'])?>" />
                                <input type="submit" name="editar" value="Editar" />
                            </fieldset>
                    	</form>
                    	<script language="javascript">
                    		CKEDITOR.replace('texto', {
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
