<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
	header("Location: index.php");
}

if($_GET['token'] != md5($_GET['i'])) {
	
	header("Location: banners.php");
	
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/bannersVO.php';
require_once 'classe/bo/bannersBO.php';

$bannersVO = new bannersVO();
$bannersBO = new bannersBO();

$bannersVO->setId($_GET['i']);

$banner = $bannersBO->get($bannersVO);

$areaAdmin = 'banners';

include('meta.php');

?>
<script type="text/javascript" src="style/js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="style/js/jquery.validate.min.js"></script>
</head>

<body>
	<div id="wrapper">    	
    	<?php include('header.php'); ?>        
        <div id="containerHolder">
			<div id="container">
                <div id="sidebar">
                	<ul class="sideNav">
                        <li><a href="banners.php">Ver banners </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="banners.php">Banners</a> &raquo; <a href="#" class="active">Editar banner</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Editar banner</h3>
                    	<form action="banners.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>Nome do banner: </label><input type="text" class="text-long" name="nome" id="nome" maxlength="255" style="width: 550px;" value="<?=urldecode($banner['nome'])?>" /></p>
                                <?php
                                    if(!empty($banner["imagem"])){
                                        echo '<p><label>Capa atual : </label> <img src="../upload/banners-fotos/'.$banner['imagem'].'" width="150" /></p>';
                                    }
                                ?>
                                <p><label>Atualizar Capa: <i>(Escolha uma imagem entre 90x40)</i></label><input type="file" name="imagem" /></p>
                                <p><label>Link: <i>(exemplo: http://google.com.br)</i> </label><input type="text" class="text-long" name="link" id="link" maxlength="255" style="width: 550px;" value="<?=urldecode($banner['link'])?>" /></p>

                                <input type="hidden" name="id" value="<?=$banner['id']?>" />
                                <input type="hidden" name="idhash" value="<?=md5($banner['id'])?>" />
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
