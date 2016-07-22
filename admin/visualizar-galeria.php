<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 09/06/2016
 * Time: 16:07
 */
@session_start();
if ($_SESSION["id_tipo_usuario"] != 1) {
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


<!--================================== TRECHO DE CSS! EXTRAIR! ==================================-->
<style>
.opcoes{
  background: #333;
  padding: 2%;
  text-align: right;
}
</style>

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
                        <li>Fotos</li>
                        <li>Ver Galerias</li>
                        <li class="active">Visualizar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  </section><!--/#Page header-->

<div class="container">
    <div class="row">
        <section>
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
          </section>
          <section class="col-md-12">
            <?
            for ($i = 0; $i < count($imagens); $i++) {
                ?>
                <div class="col-md-4 thumbnail">
                    <img src="../galerias/<?= $imagens[$i]['id_galeria'] . "/" . $imagens[$i]['nome'] ?>">
                    <div class="opcoes">
                      <a href="javascript:void(0);" onclick="excluir(<?= $imagens[$i]['id'] ?>);">
                        <span class="glyphicon glyphicon-trash" title="Excluir"></span>
                      </a>
                    </div>
                </div>
            <? }
            ?>
          </section>
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
        if (confirm('Voc� tem certeza que deseja excluir essa imagem?')) {
            window.location = 'action/galerias-action.php?e=removeImg&idImg=' + id +'&idG=' + <?=$id?>;
        }
    }
</script>
<?php
 include("footer.php");
?>
