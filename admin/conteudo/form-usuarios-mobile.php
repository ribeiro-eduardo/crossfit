<div class="row">
    <div class="col-lg-12">
        <h1>Por favor, preencha os dados a seguir:</h1>
        <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>
        <form name="usuarios" id="form" role="form" action="<?=$action?>" method="POST">
            <div class="form-group">
                <label for="celular">Tipo de usu&aacute;rio:<span style="color: red"> *</span></label>
                <select class="form-control" id="id_tipo_usuario" name="id_tipo_usuario">
                    <option value="" disabled selected>Selecione</option>
                    <?
                    for($i = 0; $i < count($tipos); $i++){
                        ?>
                        <option value="<?=$tipos[$i]['id']?>"><?=$tipos[$i]['descricao']?></option>
                        <?
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nome">Nome:<span style="color: red"> *</span></label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <div class="form-group">
                <label for="cpf">CPF:<span style="color: red"> *</span></label>
                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" id="cpf" name="cpf">
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de nascimento:<span style="color: red"> *</span></label>
                <input type="text" name="data_nascimento" id="data_nascimento" class="form-control" placeholder="dd/mm/aaaa">
            </div>
            <div class="form-group">
                <label for="email">E-mail:<span style="color: red"> *</span></label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="login">Login:<span style="color: red"> *</span></label>
                <input type="text" class="form-control" id="login" name="login">
                <a onclick="usarEmail(); return false;">Usar e-mail</a>
            </div>
            <div class="form-group">
                <label for="email">Senha:<span style="color: red"> *</span></label>
                <input type="password" id="senha" name="senha" class="form-control"/>
                <a id="mostrar_senha" title="Mostrar Senha" class="glyphicon glyphicon-eye-open"></a>&nbsp
                <a onclick="randomString(); return false;">Gerar senha aleat&oacute;ria</a>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:<span style="color: red"> *</span></label>
                <input type="text" class="form-control" id="telefone" name="telefone">
            </div>
            <div class="form-group">
                <label for="celular">Celular:<span style="color: red"> *</span></label>
                <input type="text" class="form-control" id="celular" name="celular">
            </div>
            <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-default" value="Cadastrar">
        </form>
    </div>
</div>