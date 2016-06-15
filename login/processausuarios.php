<?php
//
//require('lib/DBMySql.php');
//
//function getADM($login){
//	$db = new DBMySQL;
//	$qry  = "SELECT * FROM `usuarios` WHERE `login` = '$login'";
//	$db->do_query($qry);
//
//	while ($row = $db->getRow()) {
//		$dadosADM["DS_ID"] = $row["id"];
//		$dadosADM["DS_LOGIN"] = $row["login"];
//		$dadosADM["DS_SENHA"] = $row["senha"];
//		$dadosADM["DS_PERMISSAO"] = $row["permissao"];
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
//	header("Location: index.php");
//} else {
//	if (isset($_POST["enviar"]) == "Entrar"){
//		$login = anti_injection($_POST["usuario"]);
//		$senha = anti_injection($_POST["senha"]);
//		$senha_u = sha1($senha);
//		$dadosADM = getADM($login);
//		$senha_b = $dadosADM["DS_SENHA"];
//		if(strtoupper($dadosADM["DS_LOGIN"]) == strtoupper($login)){
//			if($senha_b == $senha_u && $dadosADM["DS_PERMISSAO"] == 1){
//				session_start();
//				$_SESSION["autenticado_painel"] = "SIM";
//				$_SESSION["autenticado_id"] = $dadosADM["DS_ID"];
//				$_SESSION["autenticado_login"] = $dadosADM["DS_LOGIN"];
//				header("Location: ../admin/index.php");
//			}else{
//				$msg = "Senha incorreta!";
//			}
//		}else{
//			$msg = "Login incorreto!";
//		}
//	}else{
//		$msg = "";
//	}
//	header("Location: index.php?msg=$msg");
//}
//?>