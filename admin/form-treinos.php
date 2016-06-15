<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 09/05/2016
 * Time: 21:08
 */
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
    header("Location: index.php");
}
include("meta.php");
include("header.php");

require("lib/DBMySql.php");
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Por favor, preencha os dados a seguir:</h1>

            <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>
            <div id="status" style="display: none;"></div>
            <form id="treinos" action="javascript:func()" name="treinos" method="POST">
                <div class="form-group">
                    <label for="data">Data:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control datepicker" id="data" name="data" onchange="getTreinoDia()">
                </div>
                <div class="form-group" style="display: none">
                    <label for="titulo">T&iacute;tulo:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <div class="form-group" style="display: none">
                    <label for="descricao">Descri&ccedil;&atilde;o:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="descricao" name="descricao">
                </div>
                <div id="resultado"></div>
                <input type="submit" class="btn btn-default" value="Enviar">
            </form>
        </div>
    </div>
</div>

<style>
    .Highlighted a{

        background-color : Green !important;
        background-image :none !important;
        color: White !important;
        font-weight:bold !important;
        font-size: 12pt;
    }

</style>

<script>

    $(function($) {
        $("#treinos").submit(function() {
            var titulo = $('#titulo').val();
            var descricao = $("#descricao").val();
            var data = $("#data").val();
            console.log(titulo);
            console.log(descricao);
            console.log(data);
            if(titulo == ""){
                alert("Por favor, preencha o título!");
                $('#titulo').focus();
                return false;
            }else if(descricao == ""){
                alert("Por favor, preencha a descrição!");
                $('#descricao').focus();
                return false;
            }else if(data == ""){
                alert("Por favor, selecione a data!");
                $('#data').focus();
                return false;
            }else{
                $("#status").html("<img src='img/loading.gif' alt='Enviando' />");
                $.post('treino-action.php', {acao: mensal, titulo: titulo, descricao: descricao, data: data}, function(resposta) {
                    $("#status").slideDown();
                    if (resposta != false) {
                        $("#status").html(resposta);
                    }
                    else {
                        $("#status").html("<b><font color='red'>Mensagem enviada com sucesso!</font></b>");
                        $("#descricao").val("");
                    }
                });
            }
        });
    });




//    $(function(){
//        var DatasSelecionadas = {};
//        DatasSelecionadas[new Date('04/05/2016')] = new Date('04/05/2016');
//        DatasSelecionadas[new Date('05/04/2016')] = new Date('05/04/2016');
//        DatasSelecionadas[new Date('06/06/2016')] = new Date('06/06/2016');
//
//        $('.datepicker').datepicker({
//            dateFormat: 'dd/mm/yy',
//            beforeShowDay: function(date) {
//                var Highlight = DatasSelecionadas[date];
//                if (Highlight) {
//                    return [true, "Highlighted", Highlight];
//                }
//                else {
//                    return [true, '', ''];
//                }
//            }
//
//        });
//    });

    $(document).ready(function() {
        var SelectedDates = {};
        SelectedDates[new Date('04/05/2016')] = new Date('04/05/2016');
        SelectedDates[new Date('05/04/2016')] = new Date('05/04/2016');
        $('#data').datepicker({
            dateFormat: 'dd/mm/yy',
//            beforeShowDay: function(date) {
//                var Highlight = SelectedDates[date];
//                if (Highlight) {
//                    return [true, "Highlighted", Highlight];
//                }
//                else {
//                    return [true, '', ''];
//                }
//            }
        });
    });


    function getTreinoDia() {
        var datepicker = $('#data').val();
        console.log(datepicker);
        if (datepicker != "") {
            $.ajax({
                url: "ajaxGetTreino.php",
                dataType: "html",
                data: {datepicker: datepicker},
                type: "POST",
                success: function (data) {
                    if(data != null){
                        $('#resultado').html(data);
                    }else{
                        $('#titulo').show();
                        $('#descricao').show();
                        console.log(data);
                    }

                }

            });
        }
    }





//    $('.datepicker').change(function(){
//
//        var value = this.value;
//        console.log(value);
//        $.ajax({
//            url: 'treino-action.php',
//            type: 'POST',
//            dataType: 'html',
//            data: { datepicker: value },
//            success: function(data){
//                $('#resultado').empty().html(data);
//            }
//        });
//    });

//    $('#cadastrar').click(function() {
//        var descricao = $.trim($('#descricao').val());
//
//        if (descricao  === '') {
//            alert('Por favor, preencha o descricao do usuário!');
//            $('#descricao').focus();
//            return false;
//        }
//    });

</script>
