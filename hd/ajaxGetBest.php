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
$ordem = $_POST["ordem"];
$benchmarksVO->setId($id);
$benchmarks = $benchmarksBO->getBest($benchmarksVO, $ordem);

if (!empty($benchmarks)) {
    echo '
    <div class="text-right">
                <button type="button" id="crescente" onclick="ordemCrescente()" class="btn btn-default btn-lg"
                        style="background: none; border: none; color: #ec001c">
                    <span class="ion-arrow-up-b" aria-hidden="true"></span>
                </button>

                <button type="button" id="descrescente" onclick="ordemDecrescente()" class="btn btn-default btn-lg"
                        style="background: none; border: none; color: #ec001c">
                    <span class="ion-arrow-down-b" aria-hidden="true"></span>
                </button>
    </div>';

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
        echo '
            <tr>
                <td>
                  <a href="atleta.php?id=' . $benchmarks[$i]['id_atleta'] . '" style="color: #5f5f5f;">
                    <div class="col-sm-1">
                      <h1 style="color: #e5001c">' . ($i + 1) . '</h1>
                    </div>
                      <div class="col-md-offset-2 col-md-6">
                        <div class="circle-avatar col-md-4"
                                style="background: url(' . $dir . $imagem . ') no-repeat; width: 150px; height: 150px;"></div>
                        <h3><span><img src="' . $icone . '"></span>' . $benchmarks[$i]['nome'] . '</h3>
                        <p>' . $idade . ' anos</p>
                        <p style="font-weight: bold; color: #e5001c">' . $benchmarks[$i]['tempo'] . '</p>
                      </div>
                  </a>
                </td>
              </tr>';
    }
    echo '
    <div class="text-right">
                <button type="button" id="crescente" onclick="ordemCrescente()" class="btn btn-default btn-lg"
                        style="background: none; border: none; color: #ec001c">
                    <span class="ion-arrow-up-b" aria-hidden="true"></span>
                </button>

                <button type="button" id="descrescente" onclick="ordemDecrescente()" class="btn btn-default btn-lg"
                        style="background: none; border: none; color: #ec001c">
                    <span class="ion-arrow-down-b" aria-hidden="true"></span>
                </button>
    </div>';
}

