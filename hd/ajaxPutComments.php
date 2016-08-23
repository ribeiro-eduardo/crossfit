<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 21/08/2016
 * Time: 15:39
 */

require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/comentariosBO.php");
require("../admin/classe/vo/comentariosVO.php");
$comentariosVO = new comentariosVO();
$comentariosBO = new comentariosBO();

$acao = $_POST['acao'];
if($acao == 'remover'){
    remover();
}elseif($acao != 'remover'){
    $id_treino = $_POST['id_treino'];
    $id_atleta = $_POST['id_atleta'];
    $texto = $_POST['texto'];
    date_default_timezone_set('America/Sao_Paulo');
    $t=time();
    $data = @date("Y-m-d H:i:s",$t);

    $comentariosVO->setIdTreino($id_treino);
    $comentariosVO->setIdAtleta($id_atleta);
    $comentariosVO->setTexto($texto);
    $comentariosVO->setData($data);


    echo $comentariosBO->newComment($comentariosVO);
}

function remover(){
    $id_comentario = $_POST['id_comentario'];
    $comentario = new comentariosVO();
    $comentarioBO = new comentariosBO();
    $comentario->setId($id_comentario);
    $comentarioBO->deleteComment($comentario);
}


//echo "id atleta: ".$id_atleta."<br>";
//echo "id treino: ".$id_treino;

