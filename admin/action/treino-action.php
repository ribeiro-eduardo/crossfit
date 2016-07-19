<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 09/05/2016
 * Time: 21:20
 */

@session_start();
if ($_SESSION["id_tipo_usuario"] != 1) {
    header("Location: index.php");
}

require_once("../lib/DBMySql.php");
require("../classe/bo/treinosBO.php");
require("../classe/vo/treinosVO.php");

$treinosBO = new treinosBO();
$treinosVO = new treinosVO();

//pega os dados de um formulário, seja pra cadastrar wod, benchmarks, heroes ou editá-los
$acao = $_POST["acao"];
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$id_classe_treino = $_POST["id_classe_treino"];
$data = $_POST["data"];
$aux = explode('/', $data);
$data = $aux[2] . "-" . $aux[1] . "-" . $aux[0];

//pegaa ação de exclusão, se é benchmark ou hero - b ou h
$acao_e = $_GET["acao_e"];

if (isset($acao)){
    if($acao == "mensal") {
        $treinosVO->setIdTipoTreino(1);
        $treinosVO->setIdClasseTreino($id_classe_treino);
        $treinosVO->setData($data);
        $treinosVO->setTitulo($titulo);
        $treinosVO->setDescricao($descricao);
        $treinosVO->setStatus(1);
        if($treinosBO->newTreino($treinosVO)){
            ?>
            <script>
                alert("WOD inserido com sucesso!");
                location.href = "../form-treinos.php";
            </script>
            <?
            exit;
        }else{
            ?>
            <script>
                alert("Ocorreu um erro na gravação do WOD. Por favor, tente novamente!");
                location.href = "../form-treinos.php";
            </script>
            <?
            exit;
        }
    } elseif ($acao == "benchmark") {
        $treinosVO->setIdTipoTreino(2);
        $treinosVO->setIdClasseTreino($id_classe_treino);
        $treinosVO->setTitulo($titulo);
        $treinosVO->setDescricao($descricao);
        $treinosVO->setStatus(1);
        if($treinosBO->newTreino($treinosVO)){
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
                location.href = "../benchmarks.php";
            </script>
            <?
            exit;
        }
    } elseif ($acao == "hero") {
        $treinosVO->setIdTipoTreino(3);
        $treinosVO->setTitulo($titulo);
        $treinosVO->setDescricao($descricao);
        $treinosBO->newTreino($treinosVO);
    }
}elseif(isset($_POST["editar"])){
    if($_POST["hidden"] == "benchmark"){
        $treino = "Benchmark";
    }elseif($_POST["hidden"] == "hero"){
        $treino = "Hero";
    }
    $id = $_POST["id"];
    $treinosVO->setIdClasseTreino($id_classe_treino);
    $treinosVO->setTitulo($titulo);
    $treinosVO->setDescricao($descricao);
    if($treinosBO->editTreino($treinosVO)){
        ?>
        <script>
            alert(<?=$treino?> +" alterado com sucesso!");
            location.href = "../benchmarks.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro na alteração do benchmark. Por favor, tente novamente!");
            location.href = "../visualizar-benchmark.php?id=<?=$id?>";
        </script>
        <?
        exit;
    }
}
elseif(isset($acao_e)){
    $id = $_GET["id"];
    //benchmark
    if($acao_e == "b"){
        $treinosVO->setId($id);
        if($treinosBO->deleteTreino($treinosVO)){
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
                alert("Ocorreu um erro na exclusão do benchmark. Por favor, tente novamente!");
                location.href = "../benchmarks.php";
            </script>
            <?
            exit;
        }
    //hero
    }elseif($acao_e == "h"){
        $treinosVO->setId($id);
        if($treinosBO->deleteTreino($treinosVO)){
            ?>
            <script>
                alert("Hero excluído com sucesso!");
                location.href = "../heroes.php";
            </script>
            <?
            exit;
        }else{
            ?>
            <script>
                alert("Ocorreu um erro na exclusão do hero. Por favor, tente novamente!");
                location.href = "../heroes.php";
            </script>
            <?
            exit;
        }
    }
}





