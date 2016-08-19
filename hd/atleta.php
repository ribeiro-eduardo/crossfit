<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 12/08/2016
 * Time: 22:30
 */
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    @session_destroy();
    @header("Location: index.php");
    exit;
} else {
    include("header-logado.php");
}

require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");
require_once("../admin/classe/functions.php");

require("../admin/classe/bo/benchmarksBO.php");
require("../admin/classe/vo/benchmarksVO.php");

$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();

$benchmarksVO = new benchmarksVO();
$benchmarksBO = new benchmarksBO();

$id = $_POST["id"];
$usuariosVO->setId($id);

$usuario = $usuariosBO->get($usuariosVO);
$id_tipo_usuario = $usuario['id_tipo_usuario'];

switch ($id_tipo_usuario) {
    case 1:
        $icone = "images/coach.png";
        break;
    case 2:
        $icone = "images/coach.png";
        break;
    case 3:
        $icone = "images/athlete.png";
        break;
}

$data_nascimento = @date('d/m/Y', strtotime($usuario["data_nascimento"]));
$idade = calculaIdade($data_nascimento);
$peso = $usuario['peso'];
$altura = $usuario['altura'];

$mostra_peso = 0;
$mostra_altura = 0;
if ($peso != 0) {
    $mostra_peso = 1;
}
if ($altura != 0) {
    $mostra_altura = 1;
}

$benchmarks = $benchmarksBO->getPorAtleta($usuariosVO);

?>

<!--
==================================================
Global Page Section Start
================================================== -->
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Atleta</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li>Login</li>
                        <li class="active">Atleta</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section><!--/#Page header-->


<div class="container" style="margin-top: 60px">
    <div class="row">

        <div class="col-md-4 img-wrapper">
           <div class="center-block circle-avatar"
                 style="background: url('<?= $dir ?>/<?= $usuario['imagem'] ?>') no-repeat; margin-top: 40px; "></div>
        </div>

        <div class="col-md-8">

            <div class="text-right">
                <button class="btn btn-details" onclick="location='editar-perfil.php'">Editar Perfil</button>
            </div>

           <span style="margin-right: 15px"><img src="<?= $icone ?>"></span>
           <input id="nome" value="<?= $usuario['nome'] ?>" readonly class="ipts"
                  style="font-size: 25px; font-weight: bold; width: 74%">


          <div id="dados" style="padding-top: 30px">
            <div class="form-group" style="margin-bottom: 1%">
                <label class="lbl col-md-3 text-center" for="email" style="padding-bottom: 5px">Email:</label>
                <input class="ipts" type="text" name="email" id="email" value="<?=$usuario['email']?>" style="width: 40%; font-size: 16px"  readonly>
            </div>
            <div class="form-group" style="margin-bottom: 1%">
                <label class="lbl col-md-3 text-center" for="idade" style="padding-bottom: 5px">Idade:</label>
                <input class="ipts" type="text" name="idade" id="idade" value="<?= $idade ?> anos" style="width: 40%; font-size: 16px" readonly>
            </div>

            <? if ($mostra_altura == 1) { ?>
              <div class="form-group" style="margin-bottom: 1%">
                  <label class="lbl col-md-3 text-center" for="altura" style="padding-bottom: 5px">Altura:</label>
                  <input class="ipts" type="text" name="altura" id="altura" value="<? echo substr_replace($altura, ',', 1, 0); ?> m" style="width: 40%; font-size: 16px" readonly>
              </div>
            <? } ?>
            <? if ($mostra_peso == 1) { ?>
              <div class="form-group" style="margin-bottom: 1%">
                  <label class="lbl col-md-3 text-center" for="peso" style="padding-bottom: 5px">Peso:</label>
                  <input class="ipts" type="text" id="peso" value="<?=$peso?> kg" style="width: 40%; font-size: 16px" readonly>
                  <br/>
              </div>
            <? } ?>
          </div>
        </div>
    </div>
    <div class="row" style="margin-top: 80px; margin-bottom: 80px;">
        <h1 class="text-center" style="margin-bottom: 60px; background: #E5001C; padding: 15px; color: #fcfcfc;">
            Benchmarks</h1>
        <table style="width: 80%; margin-left: 10%">
            <? for ($i = 0; $i < count($benchmarks); $i++) {
                $id_categoria_treino = $benchmarks[$i]['id_categoria_treino'];
                if($id_categoria_treino == 1){
                    $imagem = "images/hero.png";
                }elseif($id_categoria_treino == 2){
                    $imagem = "images/girl.png";
                }elseif($id_categoria_treino == 3){
                    $imagem = "images/challenge.png";
                }
                ?>
                <tr>
                    <td class="col-md-1 lbl text-center"><img src="<?=$imagem?>"></td>
                    <td class="col-md-7 lbl"><?=$benchmarks[$i]['titulo']?></td>
                    <td class="col-md-4 lbl"><?=$benchmarks[$i]['tempo']?></td>
                </tr>
            <? } ?>

        </table>
    </div>
</div>


<?php
include("footer-logado.php");
?>
