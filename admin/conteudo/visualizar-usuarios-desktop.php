<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 21/07/2016
 * Time: 01:38
 */
?>
<div class="row">
    <h1>Por favor, preencha os dados a seguir:</h1>

    <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>

    <div class="col-md-6 col-xs-6">

        <form name="usuarios" id="form" role="form" action="<?=$action?>" method="POST">
            <div class="form-group">
                <label for="celular">Tipo de usu&aacute;rio:<span style="color: red"> *</span></label>
                <select class="form-control" id="id_tipo_usuario" name="id_tipo_usuario">
                    <option value="" disabled selected>Selecione</option>
                    <?
                    for($i = 0; $i < count($tipos); $i++){
                    ?>
                    <option value="<?=$tipos[$i]['id']?>" <? if($usuario["id_tipo_usuario"] == $tipos[$i]["id"]){ echo "selected";}?>><?=$tipos[$i]['descricao']?></option>
                    <?
                    }
                    ?>
</select>
</div>
<div class="form-group">
    <label for="nome">Nome:<span style="color: red"> *</span></label>
    <input type="text" class="form-control" id="nome" name="nome" value="<?=$usuario["nome"]?>">
</div>
<div id="div_descricao" class="form-group" style="display: none">
    <label for="descricao">Descri&ccedil;&atilde;o:</label>
    <textarea rows="4" size="255" maxlength="255" class="form-control" id="descricao" name="descricao"><?=$usuario['descricao']?></textarea>
</div>
<div class="form-group">
    <label for="cpf">CPF:<span style="color: red"> *</span></label>
    <input type="text" size="11" maxlength="11" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control"
           id="cpf" name="cpf" value="<?=$usuario["cpf"]?>">
</div>
<div class="form-group">
    <label for="data_nascimento">Data de nascimento:<span style="color: red"> *</span></label>
    <input type="text" name="data_nascimento" id="data_nascimento" class="form-control"
           value="<?=@date('d/m/Y',strtotime($usuario["data_nascimento"]))?>">
</div>
<div class="form-group">
    <label for="email">E-mail:<span style="color: red"> *</span></label>
    <input type="text" class="form-control" id="email" name="email" value="<?=$usuario['email']?>">
</div>
<div class="form-group">
    <label for="login">Login:<span style="color: red"> *</span></label>
    <input type="text" class="form-control" id="login" name="login" value="<?=$usuario['login']?>">
    <a onclick="usarEmail(); return false;">Usar e-mail</a>
</div>
</div>
<div class="col-md-6 col-xs-6">
    <div class="form-group">
        <label for="senha_antiga">Senha antiga:
            <span id="true" style="display: none">
                <img src="img/true.png" width="5%" height="3%">
            </span>
            <span id="false" style="display: none">
                <img src="img/false.png" width="3%" height="2%">
            <span>
        </label>
        <input type="password" id="senha_antiga" name="senha_antiga" class="form-control" onchange="getSenhaAntiga()">
    </div>
    <div class="form-group">
        <label for="senha">Nova senha:<span style="color: red"> *</span></label><span><a id="gerarRandom"
                onclick="randomString(); return false;" style="display: none">Gerar senha aleat&oacute;ria</a></span>

        <div class="input-group">
                <span class="input-group-addon">
                <a id="mostrar_senha" title="Mostrar Senha" class="glyphicon glyphicon-eye-open"></a>
              </span>
            <input type="password" id="senha" name="senha" class="form-control chat-input" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="telefone">Telefone:<span style="color: red"> *</span></label>
        <input type="text" class="form-control" id="telefone" name="telefone" value="<?=$usuario['telefone']?>">
    </div>
    <div class="form-group">
        <label for="celular">Celular:<span style="color: red"> *</span></label>
        <input type="text" class="form-control" id="celular" name="celular" value="<?=$usuario['celular']?>">
    </div>
    <input type="hidden" name="id" id="id" value="<?=$id?>">
    <input type="submit" id="editar" name="editar" class="btn btn-default" value="Salvar altera&ccedil;&otilde;es">
    </form>
</div>
</div>