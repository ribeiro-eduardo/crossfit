<?php

require('lib/DBMySql.php');
require('classe/functions.php');

if(isset($_GET["operacao"]) && $_GET["operacao"] == "sair"){
	//echo "teste";
	header('location: login.php');
}
elseif(isset($_POST['entrar'])){
	session_start();
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$senhaMD5 = md5($senha);

	$result = getUsuario($login, $senhaMD5);
//echo "<pre>"; var_dump($result); echo "</pre>"; exit;

	if(count($result) > 0){
		$id = $result[0]['id'];
		$nome = $result[0]['nome'];
		$id_tipo_usuario = $result[0]['id_tipo_usuario'];
		if($id_tipo_usuario == 1){
			$_SESSION['id'] = $id;
			$_SESSION['nome'] = $nome;
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			$_SESSION['id_tipo_usuario'] = $id_tipo_usuario;
			//echo "<pre>"; var_dump($result); echo "</pre>"; exit;
			@header('location:index.php');
		}else{
			//echo "não é admin";
			@header('location:login.php?e=1');
		}
	}
	else{
		echo "nenhum usuário foi encontrado";
//	unset ($_SESSION['login']);
//	unset ($_SESSION['senha']);
		@header('location:login.php?e=2');

	}
}



//function getADM($login){
//	$db = new DBMySQL;
//	$qry  = "SELECT * FROM `usuarios` WHERE `login` = '$login'";
//	$db->do_query($qry);
//
//	while ($row = $db->getRow()) {
//		$dadosADM["DS_ID"] = $row["id"];
//		$dadosADM["DS_LOGIN"] = $row["login"];
//		$dadosADM["DS_SENHA"] = $row["senha"];
//		$dadosADM["DS_TIPO"] = $row["id_tipo_usuario"];
//	}
//	$db->close();
//
//	return $dadosADM;
//}
//function anti_injection($sql){
//	// remove palavras que contenham sintaxe sql
//	$sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$sql);
//	$sql = trim($sql);
//	$sql = strip_tags($sql);
//	$sql = addslashes($sql);
//	return $sql;
//}
//
//if($_GET['operacao'] == 'sair'){
//	session_start();
//	$_SESSION["autenticado_painel"] = NULL;
//	$_SESSION["autenticado_id"] = NULL;
//	$_SESSION["autenticado_login"] = NULL;
//	session_destroy();
//	header("Location: login.php");
//} else {
//	if (isset($_POST["entrar"]) == "entrar"){
//		$login = anti_injection($_POST["usuario"]);
//		$senha = anti_injection($_POST["senha"]);
//		echo "login: ".$login."<br>";
//		echo "senha: ".$senha."<br>";
//		$senha_crypt = md5($senha);
//		echo "senha_cript: ".$senha_crypt."<br>";
//		$dadosADM = getADM($login);
//		$senha_banco = $dadosADM["DS_SENHA"];
//		if(strtoupper($dadosADM["DS_LOGIN"]) == strtoupper($login)){
//			if($senha_banco == $senha_crypt && $dadosADM["DS_TIPO"] == 1){
//				session_start();
//				$_SESSION["autenticado_painel"] = "SIM";
//				$_SESSION["autenticado_id"] = $dadosADM["DS_ID"];
//				$_SESSION["autenticado_login"] = $dadosADM["DS_LOGIN"];
//				header("Location: index.php");
//			}else{
//				$msg = "Senha incorreta!";
//				header("Location: login.php?msg=$msg");
//			}
//		}else{
//			$msg = "Login incorreto!";
//		}
//	}else{
//		$msg = "";
//	}
//	header("Location: login.php?msg=$msg");
//}
?>