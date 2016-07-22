<script src="js/valida-usuarios.js"></script>
<?
@session_start();
if($_SESSION["id_tipo_usuario"] != 1){
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

//action aqui seta o action do form, tanto mobile quanto desktop
$action = "action/usuarios-action.php";
?>

<div class="container">
    <?
    if(isMobile()){
        include("conteudo/visualizar-usuarios-mobile.php");
    }else{
        include("conteudo/visualizar-usuarios-desktop.php");
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


    $(function(){
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
    });

    function getSenhaAntiga() {
        var id = $('#id').val();
        var senha_antiga = $('#senha_antiga').val();
        console.log(senha_antiga);
        if (senha_antiga != "") {
            $.ajax({
                url: "ajaxGetSenhaAntiga.php",
                dataType: "json",
                data: {id: id, senha_antiga: senha_antiga},
                type: "POST",
                success: function (data) {
                    if(data != null){
                        console.log(data);
                        if(data.verify){
                            $('#true').show();
                            $('#gerarRandom').show();
                            $('#false').hide();
                            $('#senha').removeAttr("disabled");
                        }
                        else if(!data.verify){
                            console.log(data.senha_antiga);
                            console.log(data.senhabd);
                            $('#false').show();
                            $('#true').hide();
                            $('#gerarRandom').hide();
                            $('#senha').attr("disabled", "disabled");
                        }
                        //$('#senha').removeAttr("disabled");
                    }
                }

            });
        }
    }

    if($('#id_tipo_usuario').val() == "2"){
        $("#div_descricao").show();
    }else{
        $("#div_descricao").hide();
    }

    $(document).ready( function() {
        $("#telefone").mask("(99) 9999-9999");
        $("#celular").mask("(99) 9999-9999");
        $("#data_nascimento").mask("00/00/0000");
        if($('#id_tipo_usuario').val() == "2"){
            $("#div_descricao").show();
        }else{
            $("#div_descricao").hide();
        }
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
            alert('Por favor, selecione o tipo de usu�rio!');
            $('#id_tipo_usuario').focus();
            return false;
        }
        if (nome  === '') {
            alert('Por favor, preencha o nome do usu�rio!');
            $('#nome').focus();
            return false;
        }
        if (cpf  === '') {
            alert('Por favor, preencha o cpf do usu�rio!');
            $('#cpf').focus();
            return false;
        }
        if (data_nascimento  === '') {
            alert('Por favor, preencha a data de nascimento do usu�rio!');
            $('#data_nascimento').focus();
            return false;
        }
        if (email  === '') {
            alert('Por favor, preencha o email do usu�rio!');
            $('#email').focus();
            return false;
        }
        if (login  === '') {
            alert('Por favor, preencha o login do usu�rio!');
            $('#login').focus();
            return false;
        }
        if (senha  === '') {
            alert('Por favor, preencha a senha do usu�rio!');
            $('#senha').focus();
            return false;
        }
        if (telefone  === '') {
            alert('Por favor, preencha o telefone do usu�rio!');
            $('#telefone').focus();
            return false;
        }
        if (celular  === '') {
            alert('Por favor, preencha o celular do usu�rio!');
            $('#celular').focus();
            return false;
        }
    });


</script>
<?php
 include("footer.php");
?>
