<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 30/05/2016
 * Time: 10:36
 */
@session_start();
if($_SESSION["id_tipo_usuario"] != 1) {
    header("Location: index.php");
}
include ("meta.php");
include("header.php");

require("lib/DBMySql.php");
require("classe/bo/noticiasBO.php");
require("classe/vo/noticiasVO.php");
$noticiasVO = new noticiasVO();
$noticiasBO = new noticiasBO();

$id = $_GET["id"];

$noticiasVO->setId($id);
$noticia = $noticiasBO->get($noticiasVO);

echo "<pre>";
var_dump($noticia);
echo "</pre>";
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Por favor, preencha os dados a seguir:</h1>

            <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>

            <form id="treinos" action="action/noticias-action.php" name="noticias" method="POST">
                <div class="form-group">
                    <label for="titulo">T&iacute;tulo:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?=$noticia["titulo"]?>">
                </div>
                <div class="form-group">
                    <label for="descricao">Descri&ccedil;&atilde;o:<span style="color: red"> *</span></label>
                    <textarea class="form-control" id="descricao" name="descricao"><?=$noticia["descricao"]?></textarea>
                </div>
                <input type="hidden" name="id" value="<?=$noticia['id']?>">
                <input type="submit" name="cadastrar" id="cadastrar" class="btn btn-default" value='Salvar altera&ccedil;&otilde;es'>
            </form>
        </div>
    </div>
</div>

<script language="javascript">

    $('#cadastrar').click(function () {
        var titulo = $('#titulo').val();
        var descricao = CKEDITOR.instances.descricao.getData();
        if (titulo == "") {
            alert("Por favor, preencha o título!");
            $('#titulo').focus();
            return false;
        } else if (!descricao) {
            alert("Por favor, preencha a descrição!");
            $('#descricao').focus();
            return false;
        }
    });

    CKEDITOR.replace('descricao', {
            filebrowserBrowseUrl : ' uploadEditor.php?action=browse',
            filebrowserUploadUrl : ' uploadEditor.php?action=upload',
            height: 450 }
    );
</script>
