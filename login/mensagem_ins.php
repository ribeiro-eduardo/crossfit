<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

$areaAdmin = 'mensagem';

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
                        <li><a href="mensagem.php">Ver mensagens do m&ecirc;s </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="mensagem.php">Mensagens do m&ecirc;s</a> &raquo; <a href="#" class="active">Cadastrar mensagem</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Cadastrar mensagem do m&ecirc;s</h3>
                    	<form action="mensagem.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>T&iacute;tulo da mensagem: *</label><input type="text" class="text-long" name="tituloMensagem" id="tituloMensagem" maxlength="255" style="width: 550px;" required /></p>
                                
                                <p><label>Conte&uacute;do da mensagem: *</label><textarea id="descricao" name="descricao"></textarea></p>
                                
                                <p><label> M&ecirc;s da mensagem: * </label>
                                    <select name="mes">
                                        <option disabled selected> Selecione </option>
                                        <option value="Janeiro"> Janeiro </option>
                                        <option value="Fevereiro"> Fevereiro </option>
                                        <option value="Março"> Mar&ccedil;o </option>
                                        <option value="Abril"> Abril </option>
                                        <option value="Maio"> Maio </option>
                                        <option value="Junho"> Junho </option>
                                        <option value="Julho"> Julho </option>
                                        <option value="Agosto"> Agosto </option>
                                        <option value="Setembro"> Setembro </option>
                                        <option value="Outubro"> Outubro </option>
                                        <option value="Novembro"> Novembro </option>
                                        <option value="Dezembro"> Dezembro </option>
                                    </select> 
                                </p>
                                <p><label>Imagem: </label><input type="file" name="imagem" /></p>
                                <input type="submit" name="cadastrar" value="Cadastrar" /> <br><br>
                                <i>* - campos obrigat&oacute;rios </i>
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
