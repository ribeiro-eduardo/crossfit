<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

$areaAdmin = 'banners';

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
                        <li><a href="banners.php">Ver banners </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="banners.php">Banners</a> &raquo; <a href="#" class="active">Cadastrar banner</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Cadastrar banner</h3>
                    	<form action="banners.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>Nome do banner: </label><input type="text" class="text-long" name="nome" id="nome" maxlength="255" style="width: 550px;" /></p>
                                <p><label>Imagem: <i>(Escolha uma imagem com 90x40)</i></label><input type="file" name="imagem" /></p>
                                <p><label>Link: <i>(exemplo: http://google.com.br)</i></label><input type="text" class="text-long" name="link" id="link" maxlength="255" style="width: 550px;" /></p>
                                <input type="submit" name="cadastrar" value="Cadastrar" />
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
