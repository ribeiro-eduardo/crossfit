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

//echo "<pre>";
//echo urldecode($texto['texto']);
//echo "</pre>";

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
                        <li>Sobre</li>
                        <li class="active">HD Elite Team</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  </section><!--/#Page header-->

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Por favor, preencha o texto do m&oacute;dulo HD:</h1>

            <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>

            <form id="hd" action="action/sobre-action.php" name="hd" method="POST">
                <div class="form-group">
                    <label for="texto">Texto:<span style="color: red"> *</span></label>
                    <textarea class="form-control" id="texto" name="texto"><?=urldecode($texto["texto"]) ?></textarea>
                </div>
                <input type="hidden" name="id_modulo" value="<?= $texto['id_modulo'] ?>">
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
<?php
 include("footer.php");
?>
