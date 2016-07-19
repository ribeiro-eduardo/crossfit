<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 03/06/2016
 * Time: 01:05
 */
@session_start();
if ($_SESSION["id_tipo_usuario"] != 1) {
    header("Location: index.php");
}
require_once("../lib/DBMySql.php");
require("../classe/bo/eventosBO.php");
require("../classe/vo/eventosVO.php");

$eventosBO = new eventosBO();
$eventosVO = new eventosVO();

$nome = $_POST["nome"];
$local = $_POST["local"];
$data = $_POST["data"];

if (isset($_POST["cadastrar"])) {
    $eventosVO->setNome($nome);
    $eventosVO->setLocal($local);
    $eventosVO->setData($data);
    $eventosVO->setStatus(1);
    if ($eventosBO->newEvento($eventosVO)) {
        ?>
        <script>
            alert("Evento inserido com sucesso!");
            location.href = "../eventos.php";
        </script>
        <?
        exit;
    } else {
        ?>
        <script>
            alert("Ocorreu um erro na gravação do evento. Por favor, tente novamente!");
            location.href = "../eventos.php";
        </script>
        <?
        exit;
    }
}elseif(isset($_POST["editar"])){
    $id = $_POST["id"];
    $eventosVO->setId($id);
    $eventosVO->setNome($nome);
    $eventosVO->setLocal($local);
    $eventosVO->setData($data);
    if($eventosBO->editEvento($eventosVO)){
        ?>
        <script>
            alert("Evento alterado com sucesso!");
            location.href = "../eventos.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro na alteração do evento. Por favor, tente novamente!");
            location.href = "../eventos.php";
        </script>
        <?
        exit;
    }
}elseif(isset($_GET["e"])){
    $id = $_GET["e"];
    $eventosVO->setId($id);
    if($eventosBO->deleteEvento($eventosVO)){
        ?>
        <script>
            alert("Evento excluído com sucesso!");
            location.href = "../eventos.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro na remoção do evento. Por favor, tente novamente!");
            location.href = "../eventos.php";
        </script>
        <?
        exit;
    }
}