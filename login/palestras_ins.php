<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

$areaAdmin = 'palestras';

include('meta.php');

?>
<script type="text/javascript" src="style/js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="style/js/jquery.validate.min.js"></script>
</head>

<body>
	<div id="wrapper">    	
    	<?php include('header.php') ?>        
        <div id="containerHolder">
			<div id="container">
                <div id="sidebar">
                	<ul class="sideNav">
                        <li><a href="palestras.php">Ver palestras </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="palestras.php">Palestras</a> &raquo; <a href="#" class="active">Cadastrar palestra</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Cadastrar palestra</h3>
                    	<form action="palestras.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>Título da palestra: </label><input type="text" class="text-long" name="titulo" id="titulo" maxlength="255" style="width: 550px;" /></p>
                                
                                <p><label>Conteúdo: </label><textarea id="descricao" name="descricao"></textarea></p>
                                <input type="submit" name="cadastrar" value="Cadastrar" />
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
