<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 04/06/2016
 * Time: 01:20
 */
@session_start();
if ($_SESSION["id_tipo_usuario"] != 1) {
    header("Location: index.php");
}
include("meta.php");
include("header.php");
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Por favor, preencha os dados a seguir:</h1>

            <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>

            <form id="galerias" action="action/galerias-action.php" name="galerias" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome da galeria:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="form-group">
                    <label for="nome">Selecione as imagens:<span style="color: red"> *</span></label>
                    <input name="arquivos[]" type="file" multiple accept="image/*">
                </div>
                <input type="submit" name="cadastrar" id="cadastrar" class="btn btn-default" value="Cadastrar">
            </form>
        </div>
    </div>
</div>

<script language="javascript">

    $('#cadastrar').click(function () {
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

<?php
 include("footer.php");
?>
