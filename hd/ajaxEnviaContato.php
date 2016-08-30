<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 29/08/2016
 * Time: 23:34
 */
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/contatosBO.php");
require("../admin/classe/vo/contatosVO.php");

$contatosVO = new contatosVO();
$contatosBO = new contatosBO();

$nome = $_POST['nome'];
$email = $_POST['email'];
$id_assunto = $_POST['id_assunto'];
$mensagem = $_POST['mensagem'];

$contatosVO->setNome($nome);
$contatosVO->setEmail($email);
$contatosVO->setIdAssunto($id_assunto);
$contatosVO->setMensagem($mensagem);

if($contatosBO->newContato($contatosVO)){
    $html = "E-mail enviado com sucesso! Em breve retornaremos o seu contato. Obrigado!";
}else{
    $html = "Ops! Algo deu errado. Tente novamente por favor.";
}

echo $html;