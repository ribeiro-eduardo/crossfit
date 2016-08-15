<?
@session_start();
if($_SESSION["id_tipo_usuario"] != 1){
    header("Location: index.php");
}
$admin = false;
include('meta.php');

include("header.php");
require("lib/DBMySql.php");
require_once("classe/bo/demosBO.php");
require_once("classe/vo/demosVO.php");

$demosBO = new demosBO();
$demosVO = new demosVO();

$demos = $demosBO->get($demosVO);
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
                        <li>Demonstrações</li>
                        <li class="active">Ver Todas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  </section><!--/#Page header-->

<!-- Page Content -->
<div class="container">
    <div class="row">
        <h1>Demonstrações cadastradas</h1>

        <div class="text-right">
          <a href="form-demos.php" type="button" class="btn btn-default" style="font-weight: bold; margin: 1%">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            Nova
          </a>
        </div>

        <div class="col-lg-12">

            <!-- Clique <a href="form-demos.php">aqui</a> para adicionar uma nova demonstra&ccedil;&atilde;o! -->
            <table border="1" class="table table-striped">
                <thead>
                <tr>
                    <th>T&iacute;tulo da demonstra&ccedil;&atilde;o</th>
                    <th class="col-xs-1 text-center">A&ccedil;&otilde;es</th>
                </tr>
                </thead>
                <tbody>
                <? for ($i = 0; $i < count($demos); $i++) {
                    ?>
                    <tr>
                        <td onclick="document.location = 'visualizar-demo.php?id=<?= $demos[$i]['id']?>'; "><? echo $demos[$i]['titulo']; ?></td>
                        <td class="text-center">
                            <a href="javascript:void(0);" onclick="visualizar(<?= $demos[$i]['id'] ?>);"><span
                                    class="glyphicon glyphicon-edit" title="Visualizar" style="padding: 0 3%;"></span></a>
                            <a href="javascript:void(0);" onclick="excluir(<?= $demos[$i]['id'] ?>);"><span
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
        window.location = 'visualizar-demo.php?id=' + id;
    }

    function excluir(id) {
        if (confirm('Você tem certeza que deseja excluir essa demonstração?')) {
            window.location = 'action/demos-action.php?acao_e=e&id=' + id;
        }
    }

</script>

<?php
 include("footer.php");
?>
