<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 18/08/2016
 * Time: 16:56
 */
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/treinosBO.php");
require("../admin/classe/vo/treinosVO.php");

$treinosBO = new treinosBO();
$treinosVO = new treinosVO();

$data = $_POST["datepicker"];
$id_logado = $_POST['id_logado'];
$aux = explode('/', $data);
$datepicker = $aux[2] . "-" . $aux[1] . "-" . $aux[0];
$datepicker = preg_replace("/(0)(.)-/", "$2-", $datepicker);

$treinosVO->setData($datepicker);
$treino = $treinosBO->buscaPorData($treinosVO);

if ($treino['titulo'] != "") {
    $titulo = $treino['titulo'];
} else {
    $titulo = "";
}

if ($treino['descricao'] != "") {
    $descricao = $treino['descricao'];
    $descricao = nl2br($descricao);
} else {
    $descricao = "";
}

if ($treino['id'] != "") {
    $id = $treino['id'];
} else {
    $id = "";
}

//esse talvez viria após o h2 class text center
$talvez = '<h4 class="text-center">Subtítulo do WOD(ex: homem/mulher/inici</h4>';

    echo
        "
        <h5 class=text-right'>$data</h5>
              <h2 class='text-center'>$titulo</h2>
              <p class='text-center'>$descricao<br/>
              </p>
              <div class='text-right'>
                <button id='mostrarComments-$id' class='btn btn-send' onclick='mostrarComments($id, $id_logado)'>Mostrar Comentários</button>
              </div>
              <div class='comments-$id' style='display:none;'>
        ";














