<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 04/06/2016
 * Time: 01:10
 */
@session_start();
if ($_SESSION["id_tipo_usuario"] != 1) {
    header("Location: index.php");
}
include("meta.php");
include("header.php");
require("lib/DBMySql.php");

require_once("classe/bo/galeriasBO.php");
require_once("classe/vo/galeriasVO.php");
$galeriasVO = new galeriasVO();
$galeriasBO = new galeriasBO();

$galerias = $galeriasBO->get($galeriasVO);
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
                        <li>Fotos</li>
                        <li class="active">Ver Galerias</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  </section><!--/#Page header-->

<div class="container">
    <div class="row">
        <h1> Galerias cadastradas </h1>

        <div class="text-right">
          <a href="form-galerias.php" type="button" class="btn btn-default" style="font-weight: bold; margin: 1%">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            Nova
          </a>
        </div>

        <div class="col-lg-12">

            <table border="1" class="table table-striped">
                <thead>
                <tr>
                    <th> Nome</th>
                    <th> A&ccedil;&otilde;es</th>
                </tr>
                </thead>
                <tbody>
                <? for ($i = 0; $i < count($galerias); $i++) { ?>
                    <tr>
                        <td onclick="document.location = 'visualizar-galeria.php?id=<?= $galerias[$i]['id']?>'; "><? echo $galerias[$i]['nome']; ?></td>
                        <td>
                            <a href="javascript:void(0);" onclick="visualizar(<?= $galerias[$i]['id'] ?>);"><span
                                    class="glyphicon glyphicon-edit" title="Visualizar" style="padding: 0 3%;"></span></a>
                            <a href="javascript:void(0);" onclick="excluir(<?= $galerias[$i]['id'] ?>);"><span
                                    class="glyphicon glyphicon-trash" title="Excluir"></span></a>
                        </td>
                    </tr>
                <? } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">

    function visualizar(id) {
        window.location = 'visualizar-galeria.php?id=' + id;
    }

    function excluir(id) {
        if (confirm('Voc� tem certeza que deseja excluir essa galeria?')) {
            window.location = 'action/galerias-action.php?e=excluir&id=' + id;
        }
    }
</script>

<?php
 include("footer.php");
?>
