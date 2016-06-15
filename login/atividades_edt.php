<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
    header("Location: index.php");
}

if($_GET['token'] != md5($_GET['i'])) {
    
    header("Location: atividades.php");
    
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/atividadesVO.php';
require_once 'classe/bo/atividadesBO.php';

$atividadesVO = new atividadesVO();
$atividadesBO = new atividadesBO();

$atividadesVO->setId($_GET['i']);

$atividade = $atividadesBO->get($atividadesVO);

$areaAdmin = 'atividades';

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
        <?php include('header.php'); ?>        
        <div id="containerHolder">
            <div id="container">
                <div id="sidebar">
                    <ul class="sideNav">
                        <li><a href="atividades.php">Ver atividades </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                    <h2><a href="principal.php">Dashboard</a> &raquo; <a href="atividades.php">Eventos</a> &raquo; <a href="#" class="active">Editar atividade</a></h2>
                    <div id="main">
                        <div id="errorMsg"></div>
                        <h3>Editar atividade</h3>
                        <form action="atividades.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <p><label>Nome da atividade: </label><input type="text" class="text-long" name="atividade" value="<?=urldecode($atividade['atividade'])?>" id="atividade" maxlength="255" style="width: 550px;" /></p>
                                <p><label>Link (opcional): </label><input type="text" class="text-long" name="link" value="<?=urldecode($atividade['link'])?>" id="link" maxlength="255" style="width: 550px;" /></p>
                                <p><label>Data: </label><input type="date" name="data" value="<?=urldecode($atividade['data'])?>" style="width: 125px;" required/></p>
                                <p><label>Hor&aacute;rio in&iacute;cio:<i>(Digite apenas os n&uacute;meros. O hor&aacute;rio se autocompleta)</i></label><input type="text" name="horarioInicio" value="<?=utf8_encode(urldecode($atividade['horarioInicio']))?>" style="width: 50px;"  required ></p>
                                <p><label>Hor&aacute;rio t&eacute;rmino:<i>(Digite apenas os n&uacute;meros. O hor&aacute;rio se autocompleta)</i></label><input type="text" name="horarioFim" value="<?=utf8_encode(urldecode($atividade['horarioFim']))?>" style="width: 50px;"  ></p>
                                <input type="hidden" name="id" value="<?=$atividade['id']?>" />
                                <input type="hidden" name="idhash" value="<?=md5($atividade['id'])?>" />
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
