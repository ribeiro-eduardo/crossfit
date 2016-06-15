<?
require_once 'classe/bo/pessoasBO.php';
require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');
require('classe/bo/uploadBO.php');
$pessoasBO = new pessoasBO();
$nomes = $pessoasBO->getAll();
//print_r($nomes); ?>

<?php for($k=0;$k<count($nomes);$k++){ ?>
<?=utf8_encode(urldecode($nomes[$k]['nome']))?> | <?=utf8_encode(urldecode($nomes[$k]['cpf']))?>;

<?    }
?>