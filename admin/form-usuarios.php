<?
@session_start();
if($_SESSION["id_tipo_usuario"] != 1){
    header("Location: index.php");
}

include("meta.php");
include("header.php");

require("lib/DBMySql.php");
require("classe/bo/tipo_usuarioBO.php");

$tipo_usuarioBO = new tipo_usuarioBO();
$tipos = $tipo_usuarioBO->get();

$action = "action/usuarios-action.php";
?>

<div class="container">
    <?
        if(isMobile()){
            include("conteudo/form-usuarios-mobile.php");
        }else{
            include("conteudo/form-usuarios-desktop.php");
        }
    ?>
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

//    $(function(){
//        $('.datepicker').datepicker({
//            format: 'dd/mm/yyyy'
//        });
//    });

    $(document).ready( function() {
        $("#telefone").mask("(99) 9999-9999");
        $("#celular").mask("(99) 9999-9999");
        $("#data_nascimento").mask("00/00/0000");
    });

    $('#cadastrar').click(function() {
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
