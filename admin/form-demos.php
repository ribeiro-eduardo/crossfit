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

require("lib/DBMySql.php");

?>

<div class="container">
    <div class="row">
        <div class="col-sm-7 col-sm-offset-2">
            <h1>Por favor, preencha os dados a seguir:</h1>

            <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>

            <form id="treinos" action="action/demos-action.php" name="treinos" method="POST">
                <div class="form-group">
                    <label for="titulo">T&iacute;tulo:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <div class="form-group">
                    <label for="link">Link do Youtube:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="link" name="link">
                </div>
                <input type="hidden" name="acao" value="inserir">
                <input type="submit" name="cadastrar" id="cadastrar" class="btn btn-default" value="Enviar">
            </form>
        </div>
    </div>
</div>

<script>

    $('#cadastrar').click(function () {
        var titulo = $('#titulo').val();
        var link = $("#link").val();
        if (titulo == "") {
            alert("Por favor, preencha o t�tulo!");
            $('#titulo').focus();
            return false;
        } else if (link == "") {
            alert("Por favor, preencha o link do Youtube!");
            $('#link').focus();
            return false;
        }
    });

</script>


<?php
 include("footer.php");
?>
