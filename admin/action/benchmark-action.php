<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 30/05/2016
 * Time: 13:38
 */
require_once("../lib/DBMySql.php");
require("../classe/bo/benchmarksBO.php");
require("../classe/vo/benchmarksVO.php");

$benchmarksBO = new benchmarksBO();
$benchmarksVO = new benchmarksVO();

$id_categoria_treino = $_POST["id_categoria_treino"];
$id_classe_treino = $_POST["id_classe_treino"];
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];

if(isset($_POST["cadastrar"])){
    $benchmarksVO->setIdCategoriaTreino($id_categoria_treino);
    $benchmarksVO->setIdClasseTreino($id_classe_treino);
    $benchmarksVO->setTitulo($titulo);
    $benchmarksVO->setDescricao($descricao);
    $benchmarksVO->setStatus(1);
    if($benchmarksBO->newBenchmark($benchmarksVO)){
        ?>
        <script>
            alert("Benchmark inserido com sucesso!");
            location.href = "../benchmarks.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro na gravação do benchmark. Por favor, tente novamente!");
            location.href = "../form-benchmarks.php";
        </script>
        <?
        exit;
    }
}elseif(isset($_POST['editar'])){
    $id = $_POST["id"];
    $benchmarksVO->setId($id);
    $benchmarksVO->setIdCategoriaTreino($id_categoria_treino);
    $benchmarksVO->setIdClasseTreino($id_classe_treino);
    $benchmarksVO->setTitulo($titulo);
    $benchmarksVO->setDescricao($descricao);
    if($benchmarksBO->editBenchmark($benchmarksVO)){
        ?>
        <script>
            alert("Benchmark alterado com sucesso!");
            location.href = "../benchmarks.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro na alteração do benchmark. Por favor, tente novamente!");
            location.href = "../form-benchmarks.php";
        </script>
        <?
        exit;
    }
}elseif(isset($_GET["excluir"])){
    $id = $_GET["excluir"];
    $benchmarksVO->setId($id);
    if($benchmarksBO->deleteBenchmark($benchmarksVO)){
        ?>
        <script>
            alert("Benchmark excluído com sucesso!");
            location.href = "../benchmarks.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro ao excluir o benchmark. Por favor, tente novamente!");
            location.href = "../benchmarks.php";
        </script>
        <?
        exit;
    }
}