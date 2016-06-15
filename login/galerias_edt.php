<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
    header("Location: index.php");
}

if($_GET['token'] != md5($_GET['i'])) {
    
    header("Location: cursos.php");
    
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

require_once 'classe/bo/galeriasBO.php';
require_once 'classe/vo/galeriasVO.php';

$galeriaBO = new galeriasBO();
$galeriaVO = new galeriasVO();

$galeriaVO->setId($_GET['i']);

$galeria = $galeriaBO->get($galeriaVO);

$areaAdmin = 'galerias';

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
                        <li><a href="galerias.php">Ver galerias </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                    <h2><a href="principal.php">Dashboard</a> &raquo; <a href="galerias.php">Galerias</a> &raquo; <a href="#" class="active">Cadastrar galeria</a></h2>
                    <div id="main">
                        <div id="errorMsg"></div>
                        <h3>Editar galeria - <?=urldecode($galeria['nome'])?></h3>
                        <form action="galerias.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <p><label>Nome da galeria:</label><input type="text" class="text-long" name="nome" value="<?=urldecode($galeria['nome'])?>" id="nome" maxlength="255" style="width: 550px;" /></p>
                                <p><label>Data de In&iacute;cio:</label>
                                    <input type="date" name="dataInicio" id="data1" value="<?=urldecode($galeria['dataInicio'])?>" required style="width: 125px;">
                                </p>
                                <p><label>Data de T&eacute;rmino: (opcional)</label>
                                    <input type="date" name="dataFim" id="data2" value="<?=urldecode($galeria['dataFim'])?>" style="width: 125px;">
                                </p>                                
                                <p><label>Local: </label><input type="text" class="text-long" name="local" value="<?=urldecode($galeria['local'])?>" maxlength="255" style="width: 550px;" /></p> 
                                <p><label>Imagem destaque atual:</label>
                                    <img src="../timthumb.php?src=upload/<?=$galeria['imagem'];?>&w=100&h=100">
                                </p>
                                <p><label>Nova imagem destaque:<i>(Escolha uma imagem entre 230x140)</i></label><input type="file" name="imagem" /></p>
                                <p><label>Link do certificado:</label><input type="text" class="text-long" name="link" value="<?=urldecode($galeria['link'])?>" id="link" maxlength="255" style="width: 550px;" /></p>
                                <p><label>Destaque: </label>
                                    <select name="destaque">
                                        <option value="1" <? if($galeria['destaque']==1){ echo 'selected'; } ?>>Destacar</option>
                                        <option value="0" <? if($galeria['destaque']==0){ echo 'selected'; } ?>>N&atilde;o destacar</option>
                                    </select>
                                </p>
                                <input type="hidden" name="id" value="<?=$galeria['id']?>" />
                                <input type="hidden" name="idhash" value="<?=md5($galeria['id'])?>" />
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
