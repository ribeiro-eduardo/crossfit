<?php
@session_start();
if($_SESSION["id_tipo_usuario"] != 1){
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

            <form id="noticias" action="action/noticias-action.php" name="noticias" method="POST">
                <div class="form-group">
                    <label for="titulo">T&iacute;tulo:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <div class="form-group">
                    <label for="descricao">Descri&ccedil;&atilde;o:<span style="color: red"> *</span></label>
                    <textarea class="form-control" id="descricao" name="descricao"></textarea>
                </div>
                <input type="submit" name="cadastrar" id="cadastrar" class="btn btn-default" value="Cadastrar">
            </form>
        </div>
    </div>
</div>

<script language="javascript">

    $('#cadastrar').click(function () {
        var titulo = $('#titulo').val();
        var descricao = CKEDITOR.instances.descricao.getData();
        if (titulo == "") {
            alert("Por favor, preencha o t�tulo!");
            $('#titulo').focus();
            return false;
        } else if (!descricao) {
            alert("Por favor, preencha a descri��o!");
            $('#descricao').focus();
            return false;
        }
    });

    CKEDITOR.replace('descricao', {
            filebrowserBrowseUrl : ' uploadEditor.php?action=browse',
            filebrowserUploadUrl : ' uploadEditor.php?action=upload',
            height: 450 }
    );
    for(var descricao in CKEDITOR.instances)
        CKEDITOR.instances[descricao].updateElement();
</script>

<?php
 include("footer.php");
?>
