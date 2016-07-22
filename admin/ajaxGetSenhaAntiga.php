<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 22/07/2016
 * Time: 02:07
 */

require_once("lib/DBMySql.php");
require("classe/bo/usuariosBO.php");
require("classe/vo/usuariosVO.php");

$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();

$id = $_POST['id'];
$senha_antiga = $_POST['senha_antiga'];

$usuariosVO->setId($id);
$usuario = $usuariosBO->get($usuariosVO);

$resposta = array();

if(md5($senha_antiga) == $usuario['senha']){
    $resposta['verify'] = true;
    //echo ' <img src="img/true.png" width="5%" height="2%">';
}else{
    $resposta['senha_antiga'] = md5($senha_antiga);
    $resposta['senhabd'] = $usuario['senha'];
    $resposta['verify'] = false;
    //echo ' <img src="img/false.png" width="3%" height="2%">';
}
echo json_encode($resposta);