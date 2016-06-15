<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

$areaAdmin = 'biblioteca';

include('meta.php');

?>
<script type="text/javascript" src="style/js/jquery.validate.min.js"></script>
</head>

<body>
	<div id="wrapper">    	
    	<?php include('header.php') ?>        
        <div id="containerHolder">
			<div id="container">
                <div id="sidebar">
                	<ul class="sideNav">
                        <li><a href="biblioteca.php">Ver obras </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="biblioteca.php">Biblioteca</a> &raquo; <a href="#" class="active">Cadastrar obra</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Cadastrar obra</h3>
                    	<form action="biblioteca.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>T&iacute;tulo da obra: </label><input type="text" class="text-long" name="titulo" id="titulo" maxlength="255" style="width: 550px;" autofocus ></p>
                                <p><label>Autor: </label><input type="text" class="text-long" name="autor" id="autor" maxlength="255" style="width: 550px;" ></p>
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
