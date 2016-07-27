<?php
@session_start();
if($_SESSION["id_tipo_usuario"] != 1){
    header("Location: index.php");
}
include("meta.php");
include("header.php");
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
                        <li>Notícias</li>
                        <li class="active">Cadastrar</li>
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

            <form id="noticias" action="action/noticias-action.php" name="noticias" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titulo">T&iacute;tulo da notícia:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <div class="form-group">
                    <label for="descricao">Descri&ccedil;&atilde;o:<span style="color: red"> *</span></label>
                    <textarea class="form-control" id="descricao" name="descricao"></textarea>
                </div>
                <div class="form-group">
                    <label for="imagem">Imagem da notícia:<span style="color: red"> *</span></label>
                    <input id="imagem" name="imagem" type="file" accept="image/*">
                </div>
                <input type="submit" name="cadastrar" id="cadastrar" class="btn btn-default" value="Cadastrar">
            </form>
        </div>
    </div>
</div>

<script language="javascript">

    $('#cadastrar').click(function () {
        var titulo = $('#titulo').val();
        var imagem = $('#imagem').val();
        var descricao = CKEDITOR.instances.descricao.getData();

        if (imagem == "" || imagem == null){
            alert("Por favor, selecione uma imagem para a noticia!");
            $('#imagem').focus();
            return false;
        }else if (titulo == "") {
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
