<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 28/08/2016
 * Time: 00:57
 */
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");
require("../admin/classe/vo/benchAtletaVO.php");
require("../admin/classe/bo/benchAtletaBO.php");
require("../admin/classe/bo/benchmarksBO.php");
require("../admin/classe/vo/benchmarksVO.php");

$benchmarksVO = new benchmarksVO();
$benchmarksBO = new benchmarksBO();
$benchAtletaVO = new benchAtletaVO();
$benchAtletaBO = new benchAtletaBO();
$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();


$acao = $_POST['acao'];

if($acao == "carregar"){
    $id_atleta = $_POST['id_atleta'];
    $usuariosVO->setId($id_atleta);
    $benchmarks = $benchmarksBO->getPorAtleta($usuariosVO);
    if (!empty($benchmarks)) {
        for ($i = 0; $i < count($benchmarks); $i++) {
            $id_tempo = $benchmarks[$i]['id_tempo'];
            $titulo = $benchmarks[$i]['titulo'];
            $tempo = $benchmarks[$i]['tempo'];
            $id_categoria_treino = $benchmarks[$i]['id_categoria_treino'];
            if ($id_categoria_treino == 1) {
                $imagem = "images/hero.png";
            } elseif ($id_categoria_treino == 2) {
                $imagem = "images/girl.png";
            } elseif ($id_categoria_treino == 3) {
                $imagem = "images/challenge.png";
            }
            $html .= "
            <div class='row' id='bench-$id_tempo'>
                <div class='col-xs-2 text-center lbl'>
                    <img src='$imagem'></td>
                </div>
                <div class='col-sm-6 col-xs-5 lbl' style='height: 30px; font-size: 16px; padding-top: 4px;'>
                    $titulo
                </div>
                <div class='col-sm-2 col-xs-3 lbl'>
                    <input id='tempo-$id_tempo' value='$tempo' onblur='alterar($id_tempo)' style='width: 92%'/>
                    <i class='fa-li fa fa-spinner fa-spin' id='gif-$id_tempo' style='display: none'></i>
                </div>
                <div class='col-xs-2'>
                    <a style='color: #e5001c; text-transform: uppercase; font-size: 16px;' onclick='remover($id_tempo)'><span class='ion-trash-b' style='padding-right: 7px'></span></a>
                </div>
            </div>";
        }
    }else{
        $html = "<h2 align='center'>Nenhum benchmark cadastrado.</h2>";
    }
    echo $html;
}
elseif($acao == "remover"){
    //echo "acao: ".$acao;
    $id = $_POST['id'];
    //echo "remover $id";
    $benchAtletaVO->setId($id);
    $benchAtletaBO->deleteBenchAtleta($benchAtletaVO);
}elseif($acao == "alterar"){
    $id = $_POST['id'];
    $tempo = $_POST['tempo'];
    //echo "alterar tempo treino $id para $tempo";
    $benchAtletaVO->setId($id);
    $benchAtletaVO->setTempo($tempo);
    $benchAtletaBO->editBenchAtleta($benchAtletaVO);
}elseif($_POST['acao'] == "salvar"){
    $id_benchmark = $_POST['id_benchmark'];
    $id_atleta = $_POST['id_atleta'];
    $tempo = $_POST['tempo'];
    //echo $_POST['acao']." $tempo do atleta $id_atleta no bench $id_benchmark";
    $benchAtletaVO->setIdAtleta($id_atleta);
    $benchAtletaVO->setIdBenchmark($id_benchmark);
    $benchAtletaVO->setTempo($tempo);
    $benchAtletaBO->newTempo($benchAtletaVO);
}
