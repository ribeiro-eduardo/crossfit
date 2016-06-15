<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');

require('classe/bo/utilidadesBO.php');

$areaAdmin = 'pessoas';

include('meta.php');

?>
<script type="text/javascript" src="style/js/jquery.validate.min.js"></script>

<script type="text/javascript">
</script>

</head>

<body>
	<div id="wrapper">    	
    	<?php include('header.php') ?>        
        <div id="containerHolder">
			<div id="container">
                <div id="sidebar">
                	<ul class="sideNav">
                        <li><a href="pessoas.php">Ver pessoas </a></li>
                    </ul>
                </div>
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="pessoas.php">Pessoas</a> &raquo; <a href="#" class="active">Cadastrar pessoa</a></h2>
                    <div id="main">
                    	<div id="errorMsg"></div>
                    	<h3>Cadastrar pessoa <i>(* = CAMPO OBRIGAT&Oacute;RIO)</i></h3>
                    	<form action="pessoas.php" method="post" enctype="multipart/form-data">
                    		<fieldset>
                                <p><label>Nome: </label><input type="text" class="text-long" name="nome" id="nome" maxlength="255" style="width: 550px;" required/>*</p>
                                <p><label>Telefone: </label><input type="text" class="text-long" name="telefone" placeholder="(XX) 3333-3333"/></p>
                                <p><label>Celular: </label><input type="text" class="text-long" name="celular" placeholder="(XX) - 9999-9999" /></p>
                                <p><label>E-mail: </label><input type="email" class="text-long" name="email" id="email" maxlength="255" style="width: 550px;" placeholder="email@email.com"/></p>
                                <p><label>Cidade: </label><input type="text" class ="text-long" name="cidade" maxlength="100" required>*</p>
                                <p><label>Estado: </label>
                                    <select name="estado" required>
                                      <option disabled selected>Selecione...</option>
                                      <option value="AC">Acre</option>
                                      <option value="AL">Alagoas</option>
                                      <option value="AP">Amap&aacute;</option>
                                      <option value="AM">Amazonas</option>
                                      <option value="BA">Bahia</option>
                                      <option value="CE">Cear&aacute;</option>
                                      <option value="DF">Distrito Federal</option>
                                      <option value="ES">Esp&iacute;rito Santo</option>
                                      <option value="GO">Goi&aacute;s</option>
                                      <option value="MA">Maranh&atilde;o</option>
                                      <option value="MT">Mato Grosso</option>
                                      <option value="MS">Mato Grosso do Sul</option>
                                      <option value="MG">Minas Gerais</option>
                                      <option value="PA">Par&aacute;</option>
                                      <option value="PB">Para&iacute;ba</option>
                                      <option value="PR">Paran&aacute;</option>
                                      <option value="PE">Pernambuco</option>
                                      <option value="PI">Piau&iacute;</option>
                                      <option value="RJ">Rio de Janeiro</option>
                                      <option value="RN">Rio Grande do Norte</option>
                                      <option value="RS">Rio Grande do Sul</option>
                                      <option value="RO">Rond&ocirc;nia</option>
                                      <option value="RR">Roraima</option>
                                      <option value="SC">Santa Catarina</option>
                                      <option value="SP">S&atilde;o Paulo</option>
                                      <option value="SE">Sergipe</option>
                                      <option value="TO">Tocantins</option>
                                    </select> *</p>
                                <p><label>Forma&ccedil;&atilde;o: </label><input type="text" class ="text-long" name="funcao" maxlength="100" required>*</p>
                                <p><label>CPF: </label><input type="text" id="cpf" class="text-long" name="cpf" placeholder="000.000.000-00" /></p>
                                <p><label>CREA: </label><input type="text" id="crea" class="text-long" name="crea"/>*</p>
                                <p><label>Curriculum: *</label></label><textarea id="curriculum" name="curriculum"></textarea></p>
                                <p><label>Endere&ccedil;o: </label><input type="text" class="text-long" name="endereco" style="width: 550px;"/></p>                                
                                <input type="submit" name="cadastrar" value="Cadastrar" />
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
