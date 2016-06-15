<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

$areaAdmin = 'noticias';

include('meta.php');

?>
<script type="text/javascript" src="style/js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="style/js/jquery.validate.min.js"></script>

<script>
function validaData(){
        var data1 = document.getElementById("data1").value;
        var data2 = document.getElementById("data2").value;
        
        var dateInicio = new Date(data1.split("/").join("-"));
        //alert(dateInicio.getTime())
        var dateFim = new Date(data2.split("/").join("-"));
        //alert(dateFim.getTime())
        
        if(dateInicio.getTime() > dateFim.getTime()){
            alert("Insira uma data de inicio menor ou igual a data de termino.");
            return false;
        }
        else{
            return true;    
        }
    }

</script>
</head>

<body>
	<div id="wrapper">    	
    	<?php include('header.php') ?>        
        <div id="containerHolder">
			<div id="container">
                <div id="sidebar">
                	<ul class="sideNav">
                        <li><a href="noticias.php">Ver notícias </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="noticias.php">Notícias</a> &raquo; <a href="#" class="active">Cadastrar notícia</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Cadastrar notícia</h3>
                    	<form action="noticias.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>Título da not&iacute;cia: </label><input type="text" class="text-long" name="titulo" id="titulo" maxlength="255" style="width: 550px;" /></p>
                                <p><label>Texto da not&iacute;cia: </label><textarea id="descricao" name="descricao"></textarea></p>
                                <p><label>Status: </label>
                                	<select name="status">
                                		<option value="1" selected>Publicada</option>
                                		<option value="2">Não publicada</option>
                                	</select>
                                </p>
                                <p><label>Destaque: </label>
                                    <select name="destaque">
                                        <option disabled selected>Selecione</option>
                                        <option value="1">Destacar</option>
                                        <option value="0">Não destacar</option>
                                    </select>
                                </p>
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
