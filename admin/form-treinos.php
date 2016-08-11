<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 09/05/2016
 * Time: 21:08
 */
@session_start();
if($_SESSION["id_tipo_usuario"] != 1){
    header("Location: index.php");
}
include("meta.php");
include("header.php");

require_once("lib/DBMySql.php");
require("classe/bo/treinosBO.php");

$treinosBO = new treinosBO();

$datas_banco = $treinosBO->getDatas();
//echo "<pre>";
//var_dump($datas_banco);
//echo "</pre>";

for($i = 0; $i < count($datas_banco); $i++){
    $datas[$i] = $datas_banco[$i]['data'];
}
for($i = 0; $i < count($datas); $i++){
    $datas[$i] = @date('d-m-Y', strtotime($datas[$i]));
}


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
                        <li class="active">WOD</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section><!--/#Page header-->

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h1>Por favor, preencha os dados a seguir:</h1>

            <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>
            <div id="status" style="display: none;"></div>
            <form id="treinos" name="treinos" method="POST">
                <div class="form-group">
                    <label for="data">Data:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="data" name="data" onchange="getTreinoDia()">
                </div>
                <div id="resultado"></div>
                <input type="submit" id="enviar" class="btn btn-default" value="Enviar">
            </form>
        </div>
    </div>
</div>

<script>

    function updateDates() {
        var disabledDays = Array();

        $.ajax({
            url: "ajaxGetDatas.php",
            dataType: "json",
            type: "POST",
            success: function (data) {
                disabledDays = data;
                $('#data').datepicker({
                    dateFormat: 'dd/mm/yy',
                    beforeShowDay: function (date) {
                        var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
                        for (i = 0; i < disabledDays.length; i++) {
                            if($.inArray(d + '-' + (m+1) + '-' + y,disabledDays) != -1) {
                                return [true, 'ui-state-active', ''];
                            }
                        }
                        return [true];
                    }
                });
            }
        });
    }

    var date = new Date();

    jQuery(document).ready(function() {
        updateDates();
    });


    $(function($) {
        $("#treinos").submit(function(e) {
            e.preventDefault();

            if($('#enviar').val() == 'Enviando...'){
                return(false);
            }

            var titulo = $('#titulo').val();
            var descricao = $("#descricao").val();
            var data = $("#data").val();
            var id = $("#id").val();

            if(!data){
                alert("Por favor, selecione uma data!");
                $('#data').focus();
                return false;
            }
            else if (titulo == ""){
                alert("Por favor, preencha o título do treino!")
                $('#titulo').focus();
                return false;
            }
            else if(!descricao){
                alert("Por favor, preencha a descrição do treino!")
                $('#descricao').focus();
                return false;
            }

            $('#enviar').val('Enviando...');

            $.ajax({
                url: 'action/treino-action.php',
                type: 'post',
                dataType: 'html',
                data: {
                    'id': id,
                    'data': data,
                    'titulo': titulo,
                    'descricao': descricao
                }
            }).done(function(data){
                $("#status").html(data);
                $("#status").show();

                $('#enviar').val('Enviar');
                $('#resultado').html("");
                $('#resultado').hide();
                $('#data').val("");

                updateDates();
            });
        });
    });


    function getTreinoDia() {
        $("#status").html("");
        $("#status").hide();
        var datepicker = $('#data').val();
        if (datepicker != "") {
            $.ajax({
                url: "ajaxGetTreino.php",
                dataType: "html",
                data: {datepicker: datepicker},
                type: "POST",
                success: function (data) {
                    $('#resultado').html(data);
                    $('#resultado').show();
                }
            });
        }
    }

</script>
<?php
include("footer.php");
?>
