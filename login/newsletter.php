<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

$areaAdmin = 'newsletter';

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
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; Newsletter</h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Clique no link abaixo para fazer download dos e-mails cadastrados para receber nossa newsletter</h3>
                    	<form action="links.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <a target="_blank" href="../newsletter.csv">E-mails cadastrados</a>
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
