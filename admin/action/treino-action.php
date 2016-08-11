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


$id = $_POST["id"];
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$data_aux = $_POST["data"];
$aux = explode('/', $data_aux);
$data = $aux[2] . "-" . $aux[1] . "-" . $aux[0];

//if($titulo != ""){
//    $html = "<b><font color='green'>Mensagem enviada com sucesso!</font></b>";
//}

if($id != ""){
    $treinosVO->setId($id);
    $treinosVO->setTitulo($titulo);
    $treinosVO->setDescricao($descricao);
    $treinosVO->setData($data);
    $treinosVO->setStatus(1);
    if($treinosBO->editTreino($treinosVO)){
        $html = "<b><font color='green'>WOD do dia $data_aux alterado com sucesso!</font></b>";
    }else{
        $html = "<b><font color='red'>Ops! Houve um problema na altera&ccedil;&atilde;o do WOD do dia $data_aux. Por favor, tente novamente!</font></b>";
    }
}else{
    $treinosVO->setTitulo($titulo);
    $treinosVO->setDescricao($descricao);
    $treinosVO->setData($data);
    $treinosVO->setStatus(1);
    if($treinosBO->newTreino($treinosVO)){
        $html = "<b><font color='green'>WOD do dia $data_aux inserido com sucesso!</font></b>";
    }else{
        $html = "<b><font color='red'>Ops! Houve um problema no cadastro do WOD do dia $data_aux. Por favor, tente novamente!</font></b>";
    }
}



echo $html;




