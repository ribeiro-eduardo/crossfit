<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 30/05/2016
 * Time: 10:03
 */

@session_start();
if ($_SESSION["id_tipo_usuario"] != 1) {
    header("Location: index.php");
}
require_once("../lib/DBMySql.php");
require("../classe/bo/noticiasBO.php");
require("../classe/vo/noticiasVO.php");

$noticiasBO = new noticiasBO();
$noticiasVO = new noticiasVO();

$titulo = $_POST["titulo"];
$descricao = urlencode($_POST["descricao"]);


if (isset($_POST["cadastrar"])) {
    $noticiasVO->setTitulo($titulo);
    $noticiasVO->setDescricao($descricao);

    date_default_timezone_set('America/Sao_Paulo');
    $t = time();
    $data_cadastro = @date("Y-m-d H:i:s", $t);
    $noticiasVO->setData($data_cadastro);
    $noticiasVO->setStatus(1);
    if ($noticiasBO->newNoticia($noticiasVO)) {
        ?>
        <script>
            alert("Not�cia inserida com sucesso!");
            location.href = "../noticias.php";
        </script>
        <?
        exit;
    } else {
        ?>
        <script>
            alert("Ocorreu um erro na grava��o da not�cia. Por favor, tente novamente!");
            location.href = "../noticias.php";
        </script>
        <?
        exit;
    }
}elseif (isset($_POST['editar'])){
    $id = $_POST['id_noticia'];
    $noticiasVO->setId($id);
    $noticiasVO->setTitulo($titulo);
    $noticiasVO->setDescricao($descricao);
    $noticiasVO->setStatus(1);
    if ($noticiasBO->editNoticia($noticiasVO)) {
        ?>
        <script>
            alert("Not�cia alterada com sucesso!");
            location.href = "../noticias.php";
        </script>
        <?
        exit;
    } else {
        ?>
        <script>
            alert("Ocorreu um erro na edi��o da not�cia. Por favor, tente novamente!");
            location.href = "../noticias.php";
        </script>
        <?
        exit;
    }
}elseif (isset($_GET['acao_e'])){
    $id = $_GET['id'];
    $noticiasVO->setId($id);
    if ($noticiasBO->deleteNoticia($noticiasVO)) {
        ?>
        <script>
            alert("Not�cia exclu�da com sucesso!");
            location.href = "../noticias.php";
        </script>
        <?
        exit;
    } else {
        ?>
        <script>
            alert("Ocorreu um erro na remo��o da not�cia. Por favor, tente novamente!");
            location.href = "../noticias.php";
        </script>
        <?
        exit;
    }
}