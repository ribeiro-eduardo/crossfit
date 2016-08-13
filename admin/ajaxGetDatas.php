<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 09/08/2016
 * Time: 21:43
 */

require_once("lib/DBMySql.php");
require("classe/bo/treinosBO.php");

$treinosBO = new treinosBO();

$datas_banco = $treinosBO->getDatas();

$resposta = array();

for($i = 0; $i < count($datas_banco); $i++){
    $resposta[$i] = $datas_banco[$i]['data'];
}

for($i = 0; $i < count($resposta); $i++){
    $datas[$i] = @date('d-m-Y', strtotime($resposta[$i]));
}
echo json_encode(preg_replace("/(0)(.)-/", "$2-",$datas));