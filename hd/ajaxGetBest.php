<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 17/08/2016
 * Time: 22:32
 */
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/benchmarksBO.php");
require("../admin/classe/vo/benchmarksVO.php");
require("../admin/classe/functions.php");

$benchmarksVO = new benchmarksVO();
$benchmarksBO = new benchmarksBO();

$id = $_POST["id"];
$benchmarksVO->setId($id);
$benchmarks = $benchmarksBO->getBest($benchmarksVO);

for ($i = 0; $i < count($benchmarks); $i++) {
    $imagem = $benchmarks[$i]['imagem'];
    $id_tipo_usuario = $benchmarks[$i]['id_tipo_usuario'];
    $data_nascimento = @date('d/m/Y', strtotime($benchmarks[$i]["data_nascimento"]));
    $idade = calculaIdade($data_nascimento);

    switch ($id_tipo_usuario) {
        case 1:
            $icone = "images/coach.png";
            $dir = "fotos-coaches/";
            break;
        case 2:
            $icone = "images/coach.png";
            $dir = "fotos-coaches/";
            break;
        case 3:
            $icone = "images/athlete.png";
            $dir = "fotos-atletas/";
            break;
    }
    echo '<tr>
                <td style="border-top: transparent">
                  <a href="#" style="color: #5f5f5f;">
                    <div class="col-sm-1">
                      <h1 style="color: #e5001c">1</h1>
                    </div>
                      <div class="col-md-offset-2 col-md-6">
                        <img class="img-circle img-busca col-md-4" src="'.$dir.$imagem.'">
                        <h3><span><img src="'.$icone.'"></span>'.$benchmarks[$i]['nome'].'</h3>
                        <p>'.$idade.'</p>
                        <p style="font-weight: bold; color: #e5001c">'.$benchmarks[$i]['tempo'].'</p>
                      </div>
                  </a>
                </td>
              </tr>';
}