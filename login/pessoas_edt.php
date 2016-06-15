<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
	header("Location: index.php");
}

if($_GET['token'] != md5($_GET['i'])) {
	
	header("Location: pessoas.php");
	
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/pessoasVO.php';
require_once 'classe/bo/pessoasBO.php';

$pessoasVO = new pessoasVO();
$pessoasBO = new pessoasBO();

$pessoasVO->setId($_GET['i']);

$pessoa = $pessoasBO->get($pessoasVO);

$areaAdmin = 'pessoas';

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
                        <li><a href="pessoas.php">Ver pessoas </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="pessoas.php">Pessoas</a> &raquo; <a href="#" class="active">Editar pessoa</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Editar pessoa <i>(* = CAMPO OBRIGAT&Oacute;RIO)</i></h3>
                    	<form action="pessoas.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>Nome: </label><input type="text" class="text-long" name="nome" id="nome" maxlength="255" style="width: 550px;" value="<?=urldecode($pessoa['nome'])?>" required />*</p>
                                <p><label>Telefone: </label><input type="text" class="text-long" name="telefone" value="<?=urldecode($pessoa['telefone'])?>"></p>
                                <p><label>Celular: </label><input type="text" class="text-long" name="celular" value="<?=urldecode($pessoa['celular'])?>"></p>
                                <p><label>E-mail: </label><input type="text" class="text-long" id="email" name="email" value="<?=urldecode($pessoa['email'])?>"></p>
                                <p><label>Cidade: </label><input type="text" class ="text-long" name="cidade" value="<?=urldecode($pessoa['cidade'])?>" maxlength="100" required>*</p>
                                <p><label>Estado: </label>
                                    <select name="estado" required>
                                      <option disabled selected>Selecione...</option>
                                      <option value="AC" <?=($pessoa['estado']=="AC")?"selected":""?>>Acre</option>
                                      <option value="AL" <?=($pessoa['estado']=="AL")?"selected":""?>>Alagoas</option>
                                      <option value="AP" <?=($pessoa['estado']=="AP")?"selected":""?>>Amap&aacute;</option>
                                      <option value="AM" <?=($pessoa['estado']=="AM")?"selected":""?>>Amazonas</option>
                                      <option value="BA" <?=($pessoa['estado']=="BA")?"selected":""?>>Bahia</option>
                                      <option value="CE" <?=($pessoa['estado']=="CE")?"selected":""?>>Cear&aacute;</option>
                                      <option value="DF" <?=($pessoa['estado']=="DF")?"selected":""?>>Distrito Federal</option>
                                      <option value="ES" <?=($pessoa['estado']=="ES")?"selected":""?>>Esp&iacute;rito Santo</option>
                                      <option value="GO" <?=($pessoa['estado']=="GO")?"selected":""?>>Goi&aacute;s</option>
                                      <option value="MA" <?=($pessoa['estado']=="MA")?"selected":""?>>Maranh&atilde;o</option>
                                      <option value="MT" <?=($pessoa['estado']=="MT")?"selected":""?>>Mato Grosso</option>
                                      <option value="MS" <?=($pessoa['estado']=="MS")?"selected":""?>>Mato Grosso do Sul</option>
                                      <option value="MG" <?=($pessoa['estado']=="MG")?"selected":""?>>Minas Gerais</option>
                                      <option value="PA" <?=($pessoa['estado']=="PA")?"selected":""?>>Par&aacute;</option>
                                      <option value="PB" <?=($pessoa['estado']=="PB")?"selected":""?>>Para&iacute;ba</option>
                                      <option value="PR" <?=($pessoa['estado']=="PR")?"selected":""?>>Paran&aacute;</option>
                                      <option value="PE" <?=($pessoa['estado']=="PE")?"selected":""?>>Pernambuco</option>
                                      <option value="PI" <?=($pessoa['estado']=="PI")?"selected":""?>>Piau&iacute;</option>
                                      <option value="RJ" <?=($pessoa['estado']=="RJ")?"selected":""?>>Rio de Janeiro</option>
                                      <option value="RN" <?=($pessoa['estado']=="RN")?"selected":""?>>Rio Grande do Norte</option>
                                      <option value="RS" <?=($pessoa['estado']=="RS")?"selected":""?>>Rio Grande do Sul</option>
                                      <option value="RO" <?=($pessoa['estado']=="RO")?"selected":""?>>Rond&ocirc;nia</option>
                                      <option value="RR" <?=($pessoa['estado']=="RR")?"selected":""?>>Roraima</option>
                                      <option value="SC" <?=($pessoa['estado']=="SC")?"selected":""?>>Santa Catarina</option>
                                      <option value="SP" <?=($pessoa['estado']=="SP")?"selected":""?>>S&atilde;o Paulo</option>
                                      <option value="SE" <?=($pessoa['estado']=="SE")?"selected":""?>>Sergipe</option>
                                      <option value="TO" <?=($pessoa['estado']=="TO")?"selected":""?>>Tocantins</option>
                                    </select>*</p>                                
                                <p><label>Forma&ccedil;&atilde;o: </label><input type="text" class ="text-long" name="funcao" value="<?=urldecode($pessoa['funcao'])?>" maxlength="100" required>*</p>
                                <p><label>CPF: </label><input type="text" id="cpf" class="text-long" name="cpf" value="<?=urldecode($pessoa['cpf'])?>" /></p>
                                <p><label>CREA: </label><input type="text" id="crea" class="text-long" name="crea" value="<?=urldecode($pessoa['crea'])?>" required/>*</p>
                                <p><label>Curriculum: *</label></label><textarea id="curriculum" name="curriculum"><?=urldecode($pessoa['curriculum'])?></textarea></p>
                                <p><label>Endere&ccedil;o: </label><input type="text" class="text-long" name="endereco" value="<?=urldecode($pessoa['endereco'])?>" style="width: 550px;"/></p> 
                                <input type="hidden" name="id" value="<?=$pessoa['id']?>" />
                                <input type="hidden" name="idhash" value="<?=md5($pessoa['id'])?>" />
                                <input type="submit" name="editar" value="Editar" />
                            </fieldset>
                    	</form>
                        <script language="javascript">
                            CKEDITOR.replace('curriculum', {
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
