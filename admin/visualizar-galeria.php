<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 09/06/2016
 * Time: 16:07
 */
@session_start();
if ($_SESSION["autenticado_painel"] != "SIM") {
    header("Location: index.php");
}
include("meta.php");
include("header.php");
require("lib/DBMySql.php");
require("classe/bo/galeriasBO.php");
require("classe/vo/galeriasVO.php");

$galeriasBO = new galeriasBO();
$galeriasVO = new galeriasVO();

require("classe/bo/galeriaFotosBO.php");
require("classe/vo/galeriaFotosVO.php");

$galeriaFotosBO = new galeriaFotosBO();
$galeriaFotosVO = new galeriaFotosVO();

$id = $_GET["id"];
$galeriasVO->setId($id);
$galeria = $galeriasBO->get($galeriasVO);

$galeriaFotosVO->setIdGaleria($id);
$imagens = $galeriaFotosBO->get($galeriaFotosVO);

//echo "<pre>";
//var_dump($imagens);
//echo "</pre>";

?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Por favor, preencha os dados a seguir:</h1>

            <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>

            <form id="galerias" action="action/galerias-action.php" name="galerias" method="POST"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome da galeria:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $galeria["nome"] ?>">
                </div>
                <div class="form-group">
                    <label for="nome">Adicionar imagens:<span style="color: red"> *</span></label>
                    <input name="arquivos[]" type="file" multiple accept="image/*">
                </div>
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="submit" name="editar" id="editar" class="btn btn-default"
                       value="Salvar altera&ccedil;&otilde;es">
            </form>
            <?
            for ($i = 0; $i < count($imagens); $i++) {
                ?>
                <div class="col-sm-12">
                    <img src="../galerias/<?= $imagens[$i]['id_galeria'] . "/" . $imagens[$i]['nome'] ?>" width="30%"
                         height="25%">
                    <a href="javascript:void(0);" onclick="excluir(<?= $imagens[$i]['id'] ?>);"><span
                            class="glyphicon glyphicon-trash" title="Excluir"></span></a>
                </div>
            <? }
            ?>
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

    function excluir(id) {
        if (confirm('Você tem certeza que deseja excluir essa imagem?')) {
            window.location = 'action/galerias-action.php?e=removeImg&idImg=' + id +'&idG=' + <?=$id?>;
        }
    }
</script>
