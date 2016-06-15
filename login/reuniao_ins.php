<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

$areaAdmin = 'reuniao';

include('meta.php');

?>
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
</script>
<script type="text/javascript" src="style/js/jquery.validate.min.js"></script>

</head>

<body>
	<div id="wrapper">    	
    	<?php include('header.php') ?>        
        <div id="containerHolder">
			<div id="container">
                <div id="sidebar">
                	<ul class="sideNav">
                        <li><a href="reuniao.php">Ver reuni&otilde;es </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="reuniao.php">Reuni&otilde;es</a> &raquo; <a href="#" class="active">Cadastrar reuni&tilde;o</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Cadastrar reuni&atilde;o</h3>
                    	<form action="reuniao.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>Nome da reuni&atilde;o:</label><input type="text" name="nome" style="width: 375px;" required/></p>
                                <p><label>Data da reuni&atilde;o:</label><input type="date" name="data" required style="width: 125px;"></p>
                                <p><label>Hor&aacute;rio:<i>(Digite apenas os n&uacute;meros. O hor&aacute;rio se autocompleta)</i></label><input type="text" name="horario" id="horario" style="width: 50px;"  required/></p>
                                <p><label>Local:</label><input type="text" class="text-long" name="local" required maxlength="50" style="width: 250px;"></p>
                                <p><label>Endere&ccedil;o:</label><input type="text" class="text-long" name="endereco" required style="width: 250px;"></p>                                
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
