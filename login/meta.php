<?php
session_start();
if(empty($_SESSION["autenticado_painel"])){
	header("Location: index.php");
}
include_once('lib/DBMySql.php');
/*Pego o nome da página*/
$file = explode("/",$_SERVER['SCRIPT_NAME']);
$i = count($file);
$nome = str_replace('.php','',$file[$i-1]);	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Description" content="" />
<meta name="LANGUAGE" content="Portuguese" />
<meta name="ROBOTS" content="index, follow" />
<meta name="GOOGLEBOT" content="INDEX, FOLLOW" />
<meta name="audience" content="all" />
<meta name="AUTHOR" content="http://www.legulas.com.br" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema administrativo</title>
<link href="style/css/reset.css" rel="stylesheet" type="text/css" media="screen" />
<link href="style/css/layout.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="style/js/jquery.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="style/js/jquery.mask.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	  $("input[name=horario]").mask("00:00");
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
	  $("input[name=telefone]").mask("(00) 0000-00000");
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
	  $("input[name=celular]").mask("(00) 0000-00000");
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
	  $("input[name=horarioInicio]").mask("00:00");
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
	  $("input[name=horarioFim]").mask("00:00");
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
	  $("input[name=numSemanas]").mask("00");
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
	  $("input[name=cpf]").mask("000.000.000-00");
	});
</script>