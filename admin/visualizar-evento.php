<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 03/06/2016
 * Time: 01:14
 */
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
    header("Location: index.php");
}
include("meta.php");
include("header.php");

require("lib/DBMySql.php");
require("classe/bo/eventosBO.php");
require("classe/vo/eventosVO.php");

$eventosBO = new eventosBO();
$eventosVO = new eventosVO();

$id = $_GET["id"];
$eventosVO->setId($id);
$evento = $eventosBO->get($eventosVO);
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Por favor, preencha os dados a seguir:</h1>

            <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>

            <form id="eventos" action="action/eventos-action.php" name="eventos" method="POST">
                <div class="form-group">
                    <label for="nome">Nome do evento:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?=$evento["nome"]?>">
                </div>
                <div class="form-group">
                    <label for="local">Local do evento:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="local" name="local" value="<?=$evento["local"]?>">
                </div>
                <div class="form-group">
                    <label for="data">Datas e hor&aacute;rios:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="data" name="data" value="<?=$evento["nome"]?>">
                </div>
                <input type="hidden" name="id" value="<?=$evento["id"]?>">
                <input type="submit" name="editar" id="editar" class="btn btn-default" value="Salvar altera&ccedil;&otilde;es">
            </form>
        </div>
    </div>
</div>

<script language="javascript">

    $('#editar').click(function () {
        var nome = $('#nome').val();
        var local = $('#local').val();
        var data = $('#data').val();

        if (nome == "") {
            alert("Por favor, preencha o nome do evento!");
            $('#nome').focus();
            return false;
        } else if (local == "") {
            alert("Por favor, preencha o local do evento!");
            $('#local').focus();
            return false;
        } else if (data == "") {
            alert("Por favor, preencha a data do evento!");
            $('#data').focus();
            return false;
        }
    });
</script>