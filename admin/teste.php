<?
include("meta.php");
require_once("lib/DBMySql.php");
require("classe/bo/noticiasBO.php");
require("classe/vo/noticiasVO.php");

$noticiasBO = new noticiasBO();
$noticiasVO = new noticiasVO();

$noticiasVO->setId(15);
$noticia = $noticiasBO->get($noticiasVO);

//echo "Titulo: ".$noticia['titulo']."<br><br>";
//echo "Texto: ".urldecode($noticia['descricao']);


?>

<div id="datepicker"></div>

<script>
    $(function() {
        $("#datepicker").datepicker();
    });
</script>
