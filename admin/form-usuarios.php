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

<!-- page header -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <ol class="breadcrumb text-center" style="background: none; font-weight: bold; color: #5f5f5f; padding-top: 5%;">
                        <li>
                            <a href="inicio.php" style="color: #333;">
                                <i class="glyphicon glyphicon-home"></i>
                                Home
                            </a>
                        </li>
                        <li>Usuários</li>
                        <li class="active">Cadastrar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  </section><!--/#Page header-->

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

    $("#id_tipo_usuario").change(function(){
        if($(this).val() == "2" || $(this).val() == "1"){
            $("#div_descricao").show();
        }else{
            $("#div_descricao").hide();
        }
    });

    $(document).ready( function() {
        $("#telefone").mask("(99) 9999-99999");
        $("#celular").mask("(99) 9999-99999");
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
            alert('Por favor, selecione o tipo de usuario!');
            $('#id_tipo_usuario').focus();
            return false;
        }
        if (nome  === '') {
            alert('Por favor, preencha o nome do usuario!');
            $('#nome').focus();
            return false;
        }
        if (cpf  === '') {
            alert('Por favor, preencha o cpf do usuario!');
            $('#cpf').focus();
            return false;
        }
        if (data_nascimento  === '') {
            alert('Por favor, preencha a data de nascimento do usuario!');
            $('#data_nascimento').focus();
            return false;
        }
        if (email  === '') {
            alert('Por favor, preencha o email do usuario!');
            $('#email').focus();
            return false;
        }
        if (login  === '') {
            alert('Por favor, preencha o login do usuario!');
            $('#login').focus();
            return false;
        }
        if (senha  === '') {
            alert('Por favor, preencha a senha do usuario!');
            $('#senha').focus();
            return false;
        }
        if (telefone  === '') {
            alert('Por favor, preencha o telefone do usuario!');
            $('#telefone').focus();
            return false;
        }
        if (celular  === '') {
            alert('Por favor, preencha o celular do usuario!');
            $('#celular').focus();
            return false;
        }
    });

</script>
<?php
 include("footer.php");
?>
