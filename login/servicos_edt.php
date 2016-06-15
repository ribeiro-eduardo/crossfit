<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
	header("Location: index.php");
}

if($_GET['token'] != md5($_GET['i'])) {
	
	header("Location: servicos.php");
	
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/servicosVO.php';
require_once 'classe/bo/servicosBO.php';

$servicosVO = new servicosVO();
$servicosBO = new servicosBO();

$servicosVO->setId($_GET['i']);

$servico = $servicosBO->get($servicosVO);

$areaAdmin = 'servicos';

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
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="servicos.php">Servi&ccedil;os</a> &raquo; <a href="#" class="active">Editar servi&ccedil;os</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Editar servi&ccedil;os</h3>
                    	<form action="servicos.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>Texto: </label><textarea id="texto" name="texto"><?=urldecode($servico['texto'])?></textarea></p>
                                <input type="hidden" name="id" value="<?=$servico['id']?>" />
                                <input type="hidden" name="idhash" value="<?=md5($servico['id'])?>" />
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
