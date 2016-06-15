<?
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
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
        <h1>Demonstra&ccedil;&atilde;es cadastradas</h1>

        <div class="col-lg-12">

            Clique <a href="form-demos.php">aqui</a> para adicionar uma nova demonstra&ccedil;&atilde;o!
            <table border="1" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>T&iacute;tulo da demonstra&ccedil;&atilde;o</th>
                    <th>A&ccedil;&otilde;es</th>
                </tr>
                </thead>
                <tbody>
                <? for ($i = 0; $i < count($demos); $i++) {
                    ?>
                    <tr>
                        <td><?= $demos[$i]['id'] ?></td>
                        <td><? echo $demos[$i]['titulo']; ?></td>
                        <td>
                            <a href="javascript:void(0);" onclick="visualizar(<?= $demos[$i]['id'] ?>);"><span
                                    class="glyphicon glyphicon-edit" title="Visualizar"></span></a>
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