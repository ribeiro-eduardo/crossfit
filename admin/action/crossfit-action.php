<?
include('lib/DBMySql.php');
include('classe/bo/crossfitBO.php');
include('classe/vo/crossfitVO.php');

$texto = $_POST['texto'];

$crossfitVO = new crossfitVO();
$crossfitBO = new crossfitBO();

$crossfitVO->setTexto($texto);

$crossfitBO->editarTexto($crossfitVO);


?>