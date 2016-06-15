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
require("classe/bo/demosBO.php");
require("classe/vo/demosVO.php");

$demosBO = new demosBO();
$demosVO = new demosVO();

$id = $_GET["id"];
$demosVO->setId($id);
$demo = $demosBO->get($demosVO);

$aux = $demo["link"];
$aux = explode("=", $aux);
$link = $aux[1];
?>

<style>
    .embed-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        max-width: 100%;
    }

    .embed-container iframe, .embed-container object, .embed-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }</style>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Por favor, preencha os dados a seguir:</h1>

            <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>

            <form id="treinos" action="action/demos-action.php" name="treinos" method="POST">
                <div class="form-group">
                    <label for="titulo">T&iacute;tulo:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?=$demo['titulo']?>">
                </div>
                <div class="form-group">
                    <label for="link">Link do Youtube:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="link" name="link" value="<?=$demo['link']?>">
                </div>
                <div class="embed-container">
                    <iframe src="http://www.youtube.com/embed/<?=$link?>" frameborder="0" allowfullscreen></iframe>
                </div><br>
                <input type="hidden" name="acao" value="editar">
                <input type="hidden" name="id" value="<?=$demo["id"]?>">
                <input type="submit" name="cadastrar" id="cadastrar" class="btn btn-default" value="Salvar altera&ccedil;&otilde;es">
            </form>
        </div>
    </div>
</div>

<script>

    $('#cadastrar').click(function () {
        var titulo = $('#titulo').val();
        var link = $("#link").val();
        if (titulo == "") {
            alert("Por favor, preencha o título!");
            $('#titulo').focus();
            return false;
        } else if (link == "") {
            alert("Por favor, preencha o link do Youtube!");
            $('#link').focus();
            return false;
        }
    });

</script>
