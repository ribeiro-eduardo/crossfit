<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 04/06/2016
 * Time: 01:10
 */
@session_start();
if ($_SESSION["autenticado_painel"] != "SIM") {
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

<div class="container">
    <div class="row">
        <h1> Galerias cadastradas </h1>

        <div class="col-lg-12">

            Clique <a href="form-galerias.php"> aqui</a> para adicionar uma nova galeria!
            <table border="1" class="table table-striped">
                <thead>
                <tr>
                    <th> ID</th>
                    <th> Nome</th>
                    <th> A&ccedil;&otilde;es</th>
                </tr>
                </thead>
                <tbody>
                <? for ($i = 0; $i < count($galerias); $i++) { ?>
                    <tr>
                        <td><?= $galerias[$i]['id'] ?></td>
                        <td><? echo $galerias[$i]['nome']; ?></td>
                        <td>
                            <a href="javascript:void(0);" onclick="visualizar(<?= $galerias[$i]['id'] ?>);"><span
                                    class="glyphicon glyphicon-edit" title="Visualizar"></span></a>
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
        if (confirm('Você tem certeza que deseja excluir esse evento?')) {
            window.location = 'action/galerias-action.php?e=excluir&id=' + id;
        }
    }
</script>