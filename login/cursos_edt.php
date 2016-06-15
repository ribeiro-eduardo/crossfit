<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
	header("Location: index.php");
}

if($_GET['token'] != md5($_GET['i'])) {
	
	header("Location: cursos.php");
	
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/cursosVO.php';
require_once 'classe/bo/cursosBO.php';

$cursosVO = new cursosVO();
$cursosBO = new cursosBO();

$cursosVO->setId($_GET['i']);

$curso = $cursosBO->get($cursosVO);

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
    	<?php include('header.php'); ?>        
        <div id="containerHolder">
			<div id="container">
                <div id="sidebar">
                	<ul class="sideNav">
                        <li><a href="cursos.php">Ver cursos </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="cursos.php">cursos</a> &raquo; <a href="#" class="active">Editar curso</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Editar curso</h3>
                    	<form action="cursos.php" onsubmit="return validaData()" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <p><label>Nome:</label><input type="text" name="nome" value="<?=urldecode($curso['nome'])?>" style="width: 375px;" required/></p>
                                <p><label>Descri&ccedil;&atilde;o:</label><textarea name="descricao" required><?=urldecode($curso['descricao'])?></textarea></p>
                                <p><label>Data de In&iacute;cio:</label><input type="date"  name="dataInicio" value="<?=urldecode($curso['dataInicio'])?>" id="data1" required style="width: 125px;"></p>
                                <p><label>Data de T&eacute;rmino:</label><input type="date" name="dataFim" value="<?=urldecode($curso['dataFim'])?>" id="data2" style="width: 125px;"></p>
                                <p><label>Local:</label><input type="text" class="text-long" name="local" value="<?=urldecode($curso['local'])?>" id="local" required maxlength="50" style="width: 250px;"></p>
                                <p><label>N&uacute;mero de vagas dispon&iacute;veis:</label><input type="numVagas" class="text-long" name="numVagas" value="<?=urldecode($curso['numVagas'])?>" id="numVagas" required maxlength="10" style="width: 25px;" /></p>
                                <p><label>Observa&ccedil;&otilde;es:</label><input type="text" class="text-long" name="obs" value="<?=urldecode($curso['obs'])?>" id="obs" maxlength="50" style="width: 250px;" /></p>
                                <p><label>Destaque: </label>
                                    <select name="destaque">
                                        <option value="1" <?php if($curso['destaque'] == 1) {echo 'selected="selected"';} ?>>Destacar</option>
                                        <option value="0" <?php if($curso['destaque'] == 0) {echo 'selected="selected"';} ?>>N&atildeo destacar</option>
                                    </select>
                                </p>
                                <input type="hidden" name="id" value="<?=$curso['id']?>" />
                                <input type="hidden" name="idhash" value="<?=md5($curso['id'])?>" />
                                <input type="submit" name="editar" value="Editar" />
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
