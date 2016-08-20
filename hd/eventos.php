<?php

require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");
$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    @session_destroy();
    @header("Location: index.php");
    exit;
} else {
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
require("../admin/classe/bo/eventosBO.php");
require("../admin/classe/vo/eventosVO.php");

$eventosBO = new eventosBO();
$eventosVO = new eventosVO();

$eventos = $eventosBO->get($eventosVO);
//var_dump($eventos);

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
                    <h2>Eventos</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Eventos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#Page header-->


<!--
==================================================
Bloco para cada Evento Ímpar (ex: eventos 1, 3, 5...)
================================================== -->
<?
for ($i = 0; $i < count($eventos); $i++) {
    ?>
    <section <? if ($i % 2 != 0){ echo 'class="evento epar"';} else{ echo 'class="evento eimpar"';} ?>>
        <div class="container">

            <div class="row">

                <? if ($i % 2 != 0) {
                    ?>
                    <div class="col-md-6 wow fadeInLeft" data-wow-delay=".3s">
                        <img src="../eventos-imagem/<?= $eventos[$i]['imagem'] ?>" alt="" class="img-responsive">
                    </div>
                <? } ?>


                <div class="col-md-6">
                    <div class="block">
                        <h3 class="subtitle wow fadeInUp" data-wow-delay=".3s" data-wow-duration="500ms"><?=$eventos[$i]['nome']?></h3>

                        <div class="evento">
                            <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                <p style="font-weight: bold;">Data e Horário</p><br/>
                                <p style="font-weight: bold;">Local</p><br/>
                                <? if($eventos[$i]['link'] != ""){ ?>
                                    <p style="font-weight: bold;">Link do evento</p><br/>
                                <? }
                                   if($eventos[$i]['infos'] != ""){ ?>
                                       <p style="font-weight: bold;">Informações adicionais</p>
                                <? } ?>
                            </div>
                            <div class="col-md-8 wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                <p><?=$eventos[$i]['data']?></p><br/>
                                <p><?=$eventos[$i]['local']?></p><br/>
                                <? if($eventos[$i]['link'] != ""){ ?>
                                    <p><u><a style="color:red;" target="_blank" href="<?=$eventos[$i]['link']?>"><?=$eventos[$i]['link']?></a></u></p><br/>
                                <? }
                                   if($eventos[$i]['infos'] != ""){ ?>
                                    <p><?=$eventos[$i]['infos']?></p>
                                <? } ?>
                            </div>
<!--                            <div class="link-externo-evento text-right">-->
<!--                                <a href="https://sites.minhasinscricoes.com.br/corridaproesportevicentina">Inscreva-se-->
<!--                                    aqui</a>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
                <? if ($i % 2 == 0) { ?>
                    <div class="col-md-6 wow fadeInRight" data-wow-delay=".3s">
                        <img src="../eventos-imagem/<?= $eventos[$i]['imagem'] ?>" alt="" class="img-responsive">
                    </div>
                <? } ?>
            </div>
    </section>
<? }
?>

<!--/#Fim do Evento ímpar-->

<!--
==================================================
Bloco para cada Evento Par
================================================== -->
<!--<section class="evento epar">-->
<!--    <div class="container">-->
<!---->
<!--        <div class="row">-->
<!---->
<!--            <div class="col-md-6">-->
<!--                <div class="block">-->
<!--                    <h3 class="subtitle wow fadeInUp" data-wow-delay=".3s" data-wow-duration="500ms">Levantamento de-->
<!--                        peso da lagoa</h3>-->
<!---->
<!--                    <div class="evento">-->
<!--                        <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">-->
<!--                            <h4>Data</h4><br/>-->
<!--                            <h4>Cidade</h4><br/>-->
<!--                            <h4>Local</h4><br/>-->
<!--                            <h4>Inscrições</h4>-->
<!--                        </div>-->
<!--                        <div class="col-md-8 wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">-->
<!--                            <h4>30 de setembro 2016</h4><br/>-->
<!--                            <h4>Florianópolis</h4><br/>-->
<!--                            <h4>Av. das Rendeiras</h4><br/>-->
<!--                            <h4>Abertas</h4>-->
<!--                        </div>-->
<!--                        <div class="link-externo-evento text-right">-->
<!--                            <a href="#">Inscreva-se aqui</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6 wow fadeInRight" data-wow-delay=".3s">-->
<!--                <img src="images/eventos/ev3.jpg" alt="" class="img-responsive">-->
<!--            </div>-->
<!--        </div>-->
<!--</section>-->
<!--/#Fim do Evento par-->

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
