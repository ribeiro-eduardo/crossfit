<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 17/06/2016
 * Time: 01:15
 */
@session_start();
if ($_SESSION["id_tipo_usuario"] != 1) {
    header("Location: index.php");
}
include("meta.php");
include("header.php");

require("lib/DBMySql.php");
require("classe/bo/sobreBO.php");
require("classe/vo/sobreVO.php");

$sobreBO = new sobreBO();
$sobreVO = new sobreVO();

$texto = $sobreBO->get(1);

?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Por favor, preencha os dados a seguir:</h1>

            <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>

            <form id="hd" action="action/sobre-action.php" name="benchmarks" method="POST">
                <div class="form-group">
                    <label for="texto">Texto:<span style="color: red"> *</span></label>
                    <textarea class="form-control" id="texto"
                              name="texto"><?= $texto["texto"] ?></textarea>
                </div>
                <input type="hidden" name="id_modulo" value="<?= $texto['id_modulo'] ?>">
                <input type="hidden" name="id_usuario" value="<?= $_SESSION['id'] ?>">
                <input type="submit" name="editar" id="editar" class="btn btn-default" value="Salvar altera&ccedil;&otilde;es">
            </form>
        </div>
    </div>
</div>
<script language="javascript">

    $('#editar').click(function () {
        var texto = CKEDITOR.instances.texto.getData();
        if (!texto) {
            alert("Por favor, preencha o texto!");
            $('#texto').focus();
            return false;
        }
    });

    CKEDITOR.replace('texto', {
            filebrowserBrowseUrl : ' uploadEditor.php?action=browse',
            filebrowserUploadUrl : ' uploadEditor.php?action=upload',
            height: 450 }
    );
</script>