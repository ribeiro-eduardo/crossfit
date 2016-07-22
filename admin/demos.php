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
                    <th>A&ccedil;&otilde;es</th>
                </tr>
                </thead>
                <tbody>
                <? for ($i = 0; $i < count($demos); $i++) {
                    ?>
                    <tr>
                        <td onclick="document.location = 'visualizar-demo.php?id=<?= $demos[$i]['id']?>'; "><? echo $demos[$i]['titulo']; ?></td>
                        <td>
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
        if (confirm('Voc� tem certeza que deseja excluir essa demonstra��o?')) {
            window.location = 'action/demos-action.php?acao_e=e&id=' + id;
        }
    }

</script>

<?php
 include("footer.php");
?>
