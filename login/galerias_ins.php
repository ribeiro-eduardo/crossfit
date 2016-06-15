<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
    header("Location: index.php");
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

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
                        <h3>Cadastrar galeria</h3>
                        <form action="galerias.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <p><label>Nome da galeria: </label><input type="text" class="text-long" name="nome" id="nome" maxlength="255" style="width: 550px;" /></p>
                                <p><label>Data de In&iacute;cio:</label>
                                    <input type="date" name="dataInicio" id="data1" required style="width: 125px;">
                                </p>
                                <p><label>Data de T&eacute;rmino: (opcional)</label>
                                    <input type="date" name="dataFim" id="data2" style="width: 125px;">
                                </p>                                
                                <p><label>Local: </label><input type="text" class="text-long" name="local" maxlength="255" style="width: 550px;" /></p>                                
                                <p><label>Imagem destaque: <i>(Escolha uma imagem entre 230x140)</i></label><input type="file" name="imagem" /></p>
                                <p><label>Link do certificado: </label><input type="text" class="text-long" name="link" id="link" maxlength="255" style="width: 550px;" /></p>
                                <p><label>Destaque: </label>
                                    <select name="destaque">
                                        <option value="1">Destacar</option>
                                        <option value="0" selected="selected">N&atilde;o destacar</option>
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
