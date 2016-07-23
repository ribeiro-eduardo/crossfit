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

//echo "<pre>";
//var_dump($noticia);
//echo "</pre>";
//echo "<pre>";
//echo urldecode($noticia['descricao']);
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
                        <li>Notícias</li>
                        <li>
                          <a href="noticias.php" style="color: #333;">
                            Ver Todas
                          </a>
                        </li>
                        <li class="active">Visualizar</li>
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

            <form id="treinos" action="action/noticias-action.php" name="noticias" method="POST">
                <div class="form-group">
                    <label for="titulo">T&iacute;tulo:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?=$noticia["titulo"]?>">
                </div>
                <div class="form-group">
                    <label for="descricao">Descri&ccedil;&atilde;o:<span style="color: red"> *</span></label>
                    <textarea class="form-control" id="descricao" name="descricao"><?=urldecode($noticia["descricao"])?></textarea>
                </div>
                <input type="hidden" name="id_noticia" value="<?=$noticia['id']?>">
                <input type="submit" name="editar" id="editar" class="btn btn-default" value='Salvar altera&ccedil;&otilde;es'>
            </form>
        </div>
    </div>
</div>

<script language="javascript">

    $('#editar').click(function () {
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
</script>
<?php
 include("footer.php");
?>
