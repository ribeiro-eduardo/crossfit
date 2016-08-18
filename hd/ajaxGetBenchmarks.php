<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 17/08/2016
 * Time: 21:21
 */
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/benchmarksBO.php");
require("../admin/classe/vo/benchmarksVO.php");

$benchmarksVO = new benchmarksVO();
$benchmarksBO = new benchmarksBO();

$id_categoria_treino = $_POST['id_categoria_treino'];

if($id_categoria_treino != ""){
    $benchmarksVO->setIdCategoriaTreino($id_categoria_treino);
    $benchmarks = $benchmarksBO->getPorCategoria($benchmarksVO);
    if(!empty($benchmarks)){
//        for($i = 0; $i < count($benchmarks); $i++){
//            $html .= "<option value=$benchmarks[$i]['id']>$benchmarks[$i]['titulo']></option>";
//        }
//        echo $html;
        echo json_encode($benchmarks);
        die();
    }

}
