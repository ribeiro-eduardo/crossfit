<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 03/06/2016
 * Time: 00:42
 */

@session_start();
if ($_SESSION["autenticado_painel"] != "SIM") {
    header("Location: index.php");
}
include("meta.php");
include("header.php");
require("lib/DBMySql.php");

require_once("classe/bo/eventosBO.php");
require_once("classe/vo/eventosVO.php");
$eventosVO = new eventosVO();
$eventosBO = new eventosBO();

$eventos = $eventosBO->get($eventosVO);
//$aleatorio = random();
?>
<div class="container">
    <div class="row">
        <h1> Eventos cadastrados </h1>

        <div class="col-lg-12">

            Clique <a href="form-eventos.php">aqui</a> para adicionar um novo evento!
            <table border="1" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>A&ccedil;&otilde;es</th>
                </tr>
                </thead>
                <tbody>
                <? for ($i = 0; $i < count($eventos); $i++) { ?>
                    <tr>
                        <td><?= $eventos[$i]['id'] ?></td>
                        <td><? echo $eventos[$i]['nome']; ?></td>
                        <td><?= $eventos[$i]['data'] ?></td>
                        <td>
                            <a href="javascript:void(0);" onclick="visualizar(<?= $eventos[$i]['id'] ?>);"><span
                                    class="glyphicon glyphicon-edit" title="Visualizar"></span></a>
                            <a href="javascript:void(0);" onclick="excluir(<?= $eventos[$i]['id'] ?>);"><span
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
        window.location = 'visualizar-evento.php?id=' + id;
    }

    function excluir(id) {
        if (confirm('Voc� tem certeza que deseja excluir esse evento?')) {
            window.location = 'action/eventos-action.php?e=' + id;
        }
    }
</script>