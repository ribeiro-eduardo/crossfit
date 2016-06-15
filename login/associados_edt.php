<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
    header("Location: index.php");
}

if($_GET['token'] != md5($_GET['i'])) {
    
    header("Location: associados.php");
    
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/associadosVO.php';
require_once 'classe/bo/associadosBO.php';

$associadosVO = new associadosVO();
$associadosBO = new associadosBO();

$associadosVO->setId($_GET['i']);

$associado = $associadosBO->get($associadosVO);

$areaAdmin = 'associados';

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
                        <li><a href="associados.php">Ver associados </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                    <h2><a href="principal.php">Dashboard</a> &raquo; <a href="associados.php">associados</a> &raquo; <a href="#" class="active">Editar associado</a></h2>
                    <div id="main">
                        <div id="errorMsg"></div>
                        <h3>Editar associado</h3>
                        <form action="associados.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <p><label>Nome: </label><input type="text" class="text-long" name="nome" id="nome" maxlength="255" style="width: 550px;" value="<?=urldecode($associado['nome'])?>" required /></p>
                                <p><label>CPF: </label><input type="text" id="cpf" class="text-long" name="cpf" value="<?=urldecode($associado['cpf'])?>" /></p>
                                <p><label>CREA: </label><input type="text" class ="text-long" name="crea" value="<?=urldecode($associado['crea'])?>" maxlength="100"></p>
                                <p><label>Endere&ccedil;o: </label><input type="text" class="text-long" name="endereco" value="<?=urldecode($associado['endereco'])?>" style="width: 550px;"/></p> 
                                <p><label>Cidade: </label><input type="text" class ="text-long" name="cidade" value="<?=urldecode($associado['cidade'])?>" maxlength="100" ></p>
                                 <p><label>Estado: </label>
                                    <select name="estado" required>
                                      <option disabled selected>Selecione...</option>
                                      <option value="AC" <?=($associado['estado']=="AC")?"selected":""?>>Acre</option>
                                      <option value="AL" <?=($associado['estado']=="AL")?"selected":""?>>Alagoas</option>
                                      <option value="AP" <?=($associado['estado']=="AP")?"selected":""?>>Amap&aacute;</option>
                                      <option value="AM" <?=($associado['estado']=="AM")?"selected":""?>>Amazonas</option>
                                      <option value="BA" <?=($associado['estado']=="BA")?"selected":""?>>Bahia</option>
                                      <option value="CE" <?=($associado['estado']=="CE")?"selected":""?>>Cear&aacute;</option>
                                      <option value="DF" <?=($associado['estado']=="DF")?"selected":""?>>Distrito Federal</option>
                                      <option value="ES" <?=($associado['estado']=="ES")?"selected":""?>>Esp&iacute;rito Santo</option>
                                      <option value="GO" <?=($associado['estado']=="GO")?"selected":""?>>Goi&aacute;s</option>
                                      <option value="MA" <?=($associado['estado']=="MA")?"selected":""?>>Maranh&atilde;o</option>
                                      <option value="MT" <?=($associado['estado']=="MT")?"selected":""?>>Mato Grosso</option>
                                      <option value="MS" <?=($associado['estado']=="MS")?"selected":""?>>Mato Grosso do Sul</option>
                                      <option value="MG" <?=($associado['estado']=="MG")?"selected":""?>>Minas Gerais</option>
                                      <option value="PA" <?=($associado['estado']=="PA")?"selected":""?>>Par&aacute;</option>
                                      <option value="PB" <?=($associado['estado']=="PB")?"selected":""?>>Para&iacute;ba</option>
                                      <option value="PR" <?=($associado['estado']=="PR")?"selected":""?>>Paran&aacute;</option>
                                      <option value="PE" <?=($associado['estado']=="PE")?"selected":""?>>Pernambuco</option>
                                      <option value="PI" <?=($associado['estado']=="PI")?"selected":""?>>Piau&iacute;</option>
                                      <option value="RJ" <?=($associado['estado']=="RJ")?"selected":""?>>Rio de Janeiro</option>
                                      <option value="RN" <?=($associado['estado']=="RN")?"selected":""?>>Rio Grande do Norte</option>
                                      <option value="RS" <?=($associado['estado']=="RS")?"selected":""?>>Rio Grande do Sul</option>
                                      <option value="RO" <?=($associado['estado']=="RO")?"selected":""?>>Rond&ocirc;nia</option>
                                      <option value="RR" <?=($associado['estado']=="RR")?"selected":""?>>Roraima</option>
                                      <option value="SC" <?=($associado['estado']=="SC")?"selected":""?>>Santa Catarina</option>
                                      <option value="SP" <?=($associado['estado']=="SP")?"selected":""?>>S&atilde;o Paulo</option>
                                      <option value="SE" <?=($associado['estado']=="SE")?"selected":""?>>Sergipe</option>
                                      <option value="TO" <?=($associado['estado']=="TO")?"selected":""?>>Tocantins</option>
                                    </select></p> 
                                <p><label>Login: </label><input type="text" class ="text-long" name="login" value="<?=urldecode($associado['login'])?>" maxlength="100" ></p>
                                <p><label>Senha: </label><input type="password" class ="text-long" name="senha" value="<?=urldecode($associado['senha'])?>" maxlength="100" ></p>
                                <input type="hidden" name="id" value="<?=$associado['id']?>" />
                                <input type="hidden" name="idhash" value="<?=md5($associado['id'])?>" />
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
