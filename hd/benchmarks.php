<?php
if (!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    @session_destroy();
    include("header.php");
    //exit;
}else{
    include("header-logado.php");
}

require("../admin/lib/DBMySql.php");
require_once("../admin/classe/bo/benchmarksBO.php");
require_once("../admin/classe/vo/benchmarksVO.php");

$benchmarksBO = new benchmarksBO();
$benchmarksVO = new benchmarksVO();

$tipo = $_GET['b'];
switch ($tipo) {
    case 'heroes':
        $id_categoria_treino = 1;
        $texto = "hero";
        break;
    case 'girls':
        $id_categoria_treino = 2;
        $texto = "girl";
        break;
    case 'challenges':
        $id_categoria_treino = 3;
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
                        <li class="active">Challenges</li>
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
                        <? echo $benchmarks[$i]['descricao']; ?>
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
