<?
include('lib/DBMySql.php');
include('classe/bo/sobreBO.php');
include('classe/vo/sobreVO.php');

$texto = $_POST['texto'];

$sobreVO = new sobreVO();
$sobreBO = new sobreBO();

$sobreVO->setTexto($texto);

$sobreBO->editarTexto($sobreVO);


?>