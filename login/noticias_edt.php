<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
	header("Location: index.php");
}

if($_GET['token'] != md5($_GET['i'])) {
	
	header("Location: noticias.php");
	
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/noticiasVO.php';
require_once 'classe/bo/noticiasBO.php';

$noticiasVO = new noticiasVO();
$noticiasBO = new noticiasBO();

$noticiasVO->setId($_GET['i']);

$noticia = $noticiasBO->get($noticiasVO);
//print_r($noticia);

$areaAdmin = 'noticias';

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
                        <li><a href="noticias.php">Ver notícias </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="noticias.php">Notícias</a> &raquo; <a href="#" class="active">Editar notícia</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Editar notícia</h3>
                    	<form action="noticias.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <p><label>Título da not&iacute;cia:</label><input type="text" class="text-long" name="titulo" id="titulo" maxlength="255" style="width: 550px;" value="<?=urldecode($noticia['titulo'])?>" /></p>
                                <p><label>Conteúdo : </label><textarea id="descricao" name="descricao"><?=urldecode($noticia['texto'])?></textarea></p>
                                <p><label>Data de publicação : </label> <?=implode("/",array_reverse(explode("-",$noticia['data'])))?></p>
                                <p><label>Status: </label>
                                    <select name="status">
                                        <option value="1" <?php if($noticia['status'] == 1) {echo 'selected="selected"';} ?>>Publicada</option>
                                        <option value="2" <?php if($noticia['status'] == 2) {echo 'selected="selected"';} ?>>Não publicada</option>
                                    </select>
                                </p>
                                <p><label>Destaque: </label>
                                    <select name="destaque">
                                        <option value="1" <?php if($noticia['destaque'] == 1) {echo 'selected="selected"';} ?>>Destacar</option>
                                        <option value="0" <?php if($noticia['destaque'] == 0) {echo 'selected="selected"';} ?>>Não destacar</option>
                                    </select>
                                </p>
                                <input type="hidden" name="id" value="<?=$noticia['id']?>" />
                                <input type="hidden" name="idhash" value="<?=md5($noticia['id'])?>" />
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
