<?php
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");
$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();

if (!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    @session_destroy();
    include("header.php");
    //exit;
}else {
    $header_logado = 1;
    //include("header-logado.php");
}

$id = $_SESSION["id"];
$usuariosVO->setId($id);

$usuario = $usuariosBO->get($usuariosVO);
$imagem = $usuario['imagem'];
$id_tipo_usuario = $usuario['id_tipo_usuario'];

switch ($id_tipo_usuario) {
    case 1:
        $dir = "fotos-coaches";
        break;
    case 2:
        $dir = "fotos-coaches";
        break;
    case 3:
        $dir = "fotos-atletas";
        break;
}

if ($header_logado == 1) {
    include("header-logado.php");
}

require_once("../admin/classe/bo/benchmarksBO.php");
require_once("../admin/classe/vo/benchmarksVO.php");

$benchmarksBO = new benchmarksBO();
$benchmarksVO = new benchmarksVO();

$tipo = $_GET['b'];
switch ($tipo) {
    case 'heroes':
        $id_categoria_treino = 1;
        $menu = "Heroes";
        $texto = "hero";
        break;
    case 'girls':
        $id_categoria_treino = 2;
        $menu = "Girls";
        $texto = "girl";
        break;
    case 'challenges':
        $id_categoria_treino = 3;
        $menu = "Challenges";
        $texto = "challenge";
        break;
}

$benchmarksVO->setIdCategoriaTreino($id_categoria_treino);
$benchmarks = $benchmarksBO->get($benchmarksVO);

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
                    <h2>Challenges</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li>Benchmark</li>
                        <li class="active"><?=$menu?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section><!--/#Page header-->

<div class="benchs">
    <? if ($benchmarks != NULL) { ?>
        <div id="accordion">
            <!-------INICIO DO LAÇO------->
            <?
            for ($i = 0; $i < count($benchmarks); $i++) { ?>
                <h3 style="color: #fcfcfc;"><?= $benchmarks[$i]['titulo'] ?></h3>
                <div>
                    <!--        <h4 style="color: #5f5f5f;">Homens e Mulheres:</h4>-->
                    <p style="color: #5f5f5f;">
                        <?
                        //nl2br é uma função que, quando um enter for dado num textarea [ADMIN],
                        //é traduzido para <br/>, "pulando linha" no html tbm.
                        echo nl2br($benchmarks[$i]['descricao']); ?>
                    </p>
                </div>
                <!-------FIM DO LAÇO------->
            <? } ?>

        </div>
    <? } else { ?>
        <h3 style="color: #fcfcfc;">Ops! Nenhum <?=$texto?> cadastrado.</h3>
    <? } ?>
</div>


<!--
==================================================
Call To Action Section Start
================================================== -->
<?php
include("call-to-action.php");
?>
<!--
==================================================
Footer Section Start
================================================== -->
<?php
include("footer.php");
?>
