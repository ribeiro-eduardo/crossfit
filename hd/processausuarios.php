<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 04/08/2016
 * Time: 17:37
 */
require('../admin/lib/DBMySql.php');
require('../admin/classe/functions.php');

if(isset($_GET["operacao"]) && $_GET["operacao"] == "sair"){
    //echo "teste";
    @session_start();
    $_SESSION["id"] = NULL;
    $_SESSION["id_tipo_usuario"] = NULL;
    $_SESSION["nome"] = NULL;
    $_SESSION["login"] = NULL;
    $_SESSION["senha"] = NULL;
    @session_destroy();
    header('location: index.php');
}
elseif(isset($_POST['entrar'])){
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $senhaMD5 = md5($senha);

    $result = getUsuario($login, $senhaMD5);
//echo "<pre>"; var_dump($result); echo "</pre>"; exit;

    if(count($result) > 0){
        $id = $result[0]['id'];
        $nome = $result[0]['nome'];
        $id_tipo_usuario = $result[0]['id_tipo_usuario'];
            if(!isset($_SESSION)){
                @session_start();
                $_SESSION['id'] = $id;
                $_SESSION['nome'] = $nome;
                $_SESSION['login'] = $login;
                //$_SESSION['senha'] = $senha;
                $_SESSION['id_tipo_usuario'] = $id_tipo_usuario;
                //echo "<pre>"; var_dump($result); echo "</pre>"; exit;
                @header('location:timeline.php');
            }
    }
    else{
        echo "nenhum usuário foi encontrado";
//	unset ($_SESSION['login']);
//	unset ($_SESSION['senha']);
        @header('location:login.php?e=1');

    }
}