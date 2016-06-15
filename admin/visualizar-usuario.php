<script src="js/valida-usuarios.js"></script>
<?
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
    header("Location: index.php");
}
include ("meta.php");
include("header.php");

require("lib/DBMySql.php");
require("classe/bo/tipo_usuarioBO.php");
require("classe/bo/usuariosBO.php");
require("classe/vo/usuariosVO.php");
$usuariosVO = new usuariosVO();
$usuariosBO = new usuariosBO();

$id = $_GET["id"];

$usuariosVO->setId($id);
$usuario = $usuariosBO->get($usuariosVO);

$tipo_usuarioBO = new tipo_usuarioBO();
$tipos = $tipo_usuarioBO->get();
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Por favor, preencha os dados a seguir:</h1>
            <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>
            <form name="usuarios" id="form" role="form" action="action/usuarios-action.php" method="POST">
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
                <div class="form-group">
                    <label for="cpf">CPF:<span style="color: red"> *</span></label>
                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" id="cpf" name="cpf" value="<?=$usuario["cpf"]?>">
                </div>
                <div class="form-group">
                    <label for="data_nascimento">Data de nascimento:<span style="color: red"> *</span></label>
                    <input type="text" name="data_nascimento" id="data_nascimento" class="datepicker form-control" value="<?=@date('d/m/Y',strtotime($usuario["data_nascimento"]))?>">
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
                <div class="form-group">
                    <label for="email">Senha:<span style="color: red"> *</span></label>
                    <input type="password" id="senha" name="senha" class="form-control" value="<?=$usuario['senha']?>">
                    <a id="mostrar_senha" title="Mostrar Senha" class="glyphicon glyphicon-eye-open"></a>&nbsp
                    <a onclick="randomString(); return false;">Gerar senha aleat&oacute;ria</a>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="telefone" name="telefone" value="<?=$usuario['telefone']?>">
                </div>
                <div class="form-group">
                    <label for="celular">Celular:</label>
                    <input type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="celular" name="celular" value="<?=$usuario['celular']?>">
                </div>
                <input type="hidden" name="id" value="<?=$usuario['id']?>">
                <input type="submit" id="editar" name='editar' class='btn btn-default' value='Salvar altera&ccedil;&otilde;es'>
            </form>
        </div>
    </div>
</div>
<script>
    $('#mostrar_senha').click(function(){
        if($('#senha').attr('type') == "password"){
            $('#senha').attr('type', 'text');
            $(this).attr('class', 'glyphicon glyphicon-eye-close');
        }else{
            $('#senha').attr('type', 'password');
            $(this).attr('class', 'glyphicon glyphicon-eye-open')
        }
    });


    $(function(){
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
    });

    $(document).ready( function() {
        $("#telefone").mask("(99) 9999-9999");
        $("#celular").mask("(99) 9999-9999");
        $("#data_nascimento").mask("00/00/0000");
    });

    $('#editar').click(function() {
        var id_tipo_usuario = $.trim($('#id_tipo_usuario').val());
        var nome            = $.trim($('#nome').val());
        var cpf             = $.trim($('#cpf').val());
        var data_nascimento = $.trim($('#data_nascimento').val());
        var email           = $.trim($('#email').val());
        var login           = $.trim($('#login').val());
        var senha           = $.trim($('#senha').val());
        var telefone        = $.trim($('#telefone').val());
        var celular         = $.trim($('#celular').val());

        console.log(data_nascimento);

        if (id_tipo_usuario  === '') {
            alert('Por favor, selecione o tipo de usuário!');
            $('#id_tipo_usuario').focus();
            return false;
        }
        if (nome  === '') {
            alert('Por favor, preencha o nome do usuário!');
            $('#nome').focus();
            return false;
        }
        if (cpf  === '') {
            alert('Por favor, preencha o cpf do usuário!');
            $('#cpf').focus();
            return false;
        }
        if (data_nascimento  === '') {
            alert('Por favor, preencha a data de nascimento do usuário!');
            $('#data_nascimento').focus();
            return false;
        }
        if (email  === '') {
            alert('Por favor, preencha o email do usuário!');
            $('#email').focus();
            return false;
        }
        if (login  === '') {
            alert('Por favor, preencha o login do usuário!');
            $('#login').focus();
            return false;
        }
        if (senha  === '') {
            alert('Por favor, preencha a senha do usuário!');
            $('#senha').focus();
            return false;
        }
        if (telefone  === '') {
            alert('Por favor, preencha o telefone do usuário!');
            $('#telefone').focus();
            return false;
        }
        if (celular  === '') {
            alert('Por favor, preencha o celular do usuário!');
            $('#celular').focus();
            return false;
        }
    });


</script>
