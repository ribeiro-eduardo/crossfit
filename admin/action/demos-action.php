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
            alert("Demonstração inserida com sucesso!");
            location.href = "../demos.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro na gravação da demonstração. Por favor, tente novamente!");
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
            alert("Demonstração alterada com sucesso!");
            location.href = "../demos.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro na alteração da demonstração. Por favor, tente novamente!");
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
            alert("Demonstração excluída com sucesso!");
            location.href = "../demos.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro na remoção da demonstração. Por favor, tente novamente!");
            location.href = "../demos.php";
        </script>
        <?
        exit;
    }
}

