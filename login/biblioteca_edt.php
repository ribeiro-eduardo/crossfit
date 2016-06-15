<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
    header("Location: index.php");
}

if($_GET['token'] != md5($_GET['i'])) {
    
    header("Location: biblioteca.php");
    
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/bibliotecaVO.php';
require_once 'classe/bo/bibliotecaBO.php';

$bibliotecaVO = new bibliotecaVO();
$bibliotecaBO = new bibliotecaBO();

$bibliotecaVO->setId($_GET['i']);

$biblioteca = $bibliotecaBO->get($bibliotecaVO);

$areaAdmin = 'biblioteca';

include('meta.php');

?>
<script type="text/javascript" src="style/js/jquery.validate.min.js"></script>
</head>

<body>
    <div id="wrapper">      
        <?php include('header.php'); ?>        
        <div id="containerHolder">
            <div id="container">
                <div id="sidebar">
                    <ul class="sideNav">
                        <li><a href="biblioteca.php">Ver obras </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                    <h2><a href="principal.php">Dashboard</a> &raquo; <a href="biblioteca.php">Biblioteca</a> &raquo; <a href="#" class="active">Editar obra</a></h2>
                    <div id="main">
                        <div id="errorMsg"></div>
                        <h3>Editar obra</h3>
                       <form action="biblioteca.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <p><label>T&iacute;tulo da obra: </label><input type="text" class="text-long" name="titulo" value="<?=urldecode($biblioteca['titulo']) ?>" id="titulo" maxlength="255" style="width: 550px;" ></p>
                                <p><label>Autor: </label><input type="text" class="text-long" name="autor" value="<?=urldecode($biblioteca['autor']) ?>" id="autor" maxlength="255" style="width: 550px;" ></p>
                                 <input type="hidden" name="id" value="<?=$biblioteca['id']?>" />
                                <input type="hidden" name="idhash" value="<?=md5($biblioteca['id'])?>" />
                                <input type="submit" name="editar" value="Editar" />
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
