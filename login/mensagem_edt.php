<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
	header("Location: index.php");
}

if($_GET['token'] != md5($_GET['i'])) {
	
	header("Location: mensagem.php");
	
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/mensagemVO.php';
require_once 'classe/bo/mensagemBO.php';

$mensagemVO = new mensagemVO();
$mensagemBO = new mensagemBO();

$mensagemVO->setidMensagem($_GET['i']);

$mensagem = $mensagemBO->get($mensagemVO);

$areaAdmin = 'mensagem';

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
                        <li><a href="mensagem.php">Ver mensagens do m&ecirc;s </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="mensagem.php">Mensagens do m&ecirc;s</a> &raquo; <a href="#" class="active">Editar mensagem</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Editar mensagem</h3>
                    	<form action="mensagem.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>T&iacute;tulo da mensagem: </label><input type="text" class="text-long" name="tituloMensagem" id="tituloMensagem" maxlength="255" style="width: 550px;" value="<?=urldecode($mensagem['tituloMensagem'])?>" /></p>
                                
                                <p><label>Conte&uacute;do da mensagem: </label><textarea id="descricao" name="descricao"><?=urldecode($mensagem['descricao'])?></textarea></p>
                        
                                <?php
                                    if(!empty($mensagem["imagem"])){
                                        echo '<p><label>Capa atual : </label> <img src="../upload/'.$mensagem['imagem'].'" width="150" /></p>';
                                    }
                                ?>
                                <p><label>Atualizar imagem: </label><input type="file" name="imagem" /></p>

                                <p><label>M&ecirc;s: </label>
                                	<select name="mes">
                                		<option disabled selected <?php if(urldecode($mensagem['mes'])=='') {echo 'selected="selected"';} ?>>Selecione</option>
                                        <option value="Janeiro" <?php if(urldecode($mensagem['mes']) == 'Janeiro') {echo 'selected="selected"';} ?>>Janeiro</option>
                                        <option value="Fevereiro" <?php if(urldecode($mensagem['mes']) == 'Fevereiro') {echo 'selected="selected"';} ?>>Fevereiro</option>
                                        <option value="Março" <?php if(urldecode($mensagem['mes']) == 'Março') {echo 'selected="selected"';} ?>>Mar&ccedil;o</option>
                                        
                                        <option value="Abril" <?php if(urldecode($mensagem['mes']) == 'Abril') {echo 'selected="selected"';} ?>>Abril</option>
                                        <option value="Maio" <?php if(urldecode($mensagem['mes']) == 'Maio') {echo 'selected="selected"';} ?>>Maio</option>
                                        
                                        <option value="Junho" <?php if(urldecode($mensagem['mes']) == 'Junho') {echo 'selected="selected"';} ?>>Junho</option>
                                        <option value="Julho" <?php if(urldecode($mensagem['mes']) == 'Julho') {echo 'selected="selected"';} ?>>Julho</option>
                                        <option value="Agosto" <?php if(urldecode($mensagem['mes']) == 'Agosto') {echo 'selected="selected"';} ?>>Agosto</option>
                                        <option value="Setembro" <?php if(urldecode($mensagem['mes']) == 'Setembro') {echo 'selected="selected"';} ?>>Setembro</option>
                                        <option value="Outubro" <?php if(urldecode($mensagem['mes']) == 'Outubro') {echo 'selected="selected"';} ?>>Outubro</option>
                                        <option value="Novembro" <?php if(urldecode($mensagem['mes']) == 'Novembro') {echo 'selected="selected"';} ?>>Novembro</option>
                                        <option value="Dezembro" <?php if(urldecode($mensagem['mes']) == 'Dezembro') {echo 'selected="selected"';} ?>>Dezembro</option>
                                	</select>
                                </p>
                                <input type="hidden" name="id" value="<?=$mensagem['idMensagem']?>" />
                                <input type="hidden" name="idhash" value="<?=md5($mensagem['idMensagem'])?>" />
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
