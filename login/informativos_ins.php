<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

$areaAdmin = 'informativos';

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
                        <li><a href="informativos.php">Ver informativos</a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="informativos.php">Informativos</a> &raquo; <a href="#" class="active">Cadastrar informativo</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Cadastrar informativo</h3>
                    	<form action="informativos.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>Descri&ccedil;&atilde;o do informativo: </label><input type="text" class="text-long" name="descricao" id="descricao" maxlength="255" style="width: 550px;" /></p>
                                <p><label>Arquivo: </label><input type="file" accept="application/pdf"name="arquivo" /></p>
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
