<?php

require_once("../lib/DBMySql.php");
require("../classe/bo/demosBO.php");
require("../classe/vo/demosVO.php");

$demosBO = new demosBO();
$demosVO = new demosVO();

$acao = $_POST["acao"];
$acao_e = $_GET["acao_e"];

if($acao == "inserir"){
    $titulo = $_POST["titulo"];
    $link = $_POST["link"];
    $demosVO->setTitulo($titulo);
    $demosVO->setLink($link);

    if($demosBO->newDemo($demosVO)){
        ?>
        <script>
            alert("Demonstra��o inserida com sucesso!");
            location.href = "../demos.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro na grava��o da demonstra��o. Por favor, tente novamente!");
            location.href = "../demos.php";
        </script>
        <?
        exit;
    }
}elseif($acao == "editar"){
    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $link = $_POST["link"];
    $demosVO->setId($id);
    $demosVO->setTitulo($titulo);
    $demosVO->setLink($link);
    if($demosBO->editDemo($demosVO)){
        ?>
        <script>
            alert("Demonstra��o alterada com sucesso!");
            location.href = "../demos.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro na altera��o da demonstra��o. Por favor, tente novamente!");
            location.href = "../demos.php";
        </script>
        <?
        exit;
    }
}elseif(isset($acao_e) && $acao_e == "e"){
    $id = $_GET["id"];
    $demosVO->setId($id);
    if($demosBO->deleteDemo($demosVO)){
        ?>
        <script>
            alert("Demonstra��o exclu�da com sucesso!");
            location.href = "../demos.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro na remo��o da demonstra��o. Por favor, tente novamente!");
            location.href = "../demos.php";
        </script>
        <?
        exit;
    }
}

