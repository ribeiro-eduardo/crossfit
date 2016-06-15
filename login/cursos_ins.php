<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

$areaAdmin = 'cursos';

include('meta.php');

?>
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
</script>
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
                        <li><a href="cursos.php">Ver cursos </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="cursos.php">Cursos</a> &raquo; <a href="#" class="active">Cadastrar curso</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Cadastrar curso</h3>
                    	<form action="cursos.php" onsubmit="return validaData()" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>Nome:</label><input type="text" name="nome" style="width: 375px;" required/></p>
                                <p><label>Descri&ccedil;&atilde;o:</label><textarea name="descricao" required></textarea></p>
                                <p><label>Data de In&iacute;cio:</label><input type="date" name="dataInicio" id="data1" required style="width: 125px;"></p>
                                <p><label>Data de T&eacute;rmino: <i>(S&oacute; preencha caso a data de t&eacute;rmino do curso for diferente da data de in&iacute;cio.)</i></label><input type="date" name="dataFim" id="data2" style="width: 125px;"></p>
                                <p><label>Local:</label><input type="text" class="text-long" name="local" id="local" required maxlength="50" style="width: 250px;"></p>
                                <p><label>N&uacute;mero de vagas dispon&iacute;veis:</label><input type="numVagas" required class="text-long" name="numVagas" id="numVagas" maxlength="10" style="width: 25px;" /></p>
                                <p><label>Observa&ccedil;&otilde;es:</label><input type="text" class="text-long" name="obs" id="obs" maxlength="50" style="width: 250px;" /></p>
                                <p><label>Destaque: </label>
                                    <select name="destaque">
                                        <option value="1">Destacar</option>
                                        <option value="0" selected="selected">Não destacar</option>
                                    </select>
                                </p>
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
