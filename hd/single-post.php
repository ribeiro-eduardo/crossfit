<?php
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");
$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['id'])) {
    //var_dump($_SESSION);
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

    include("header-logado.php");
} else {
    @session_destroy();
    //var_dump($_SESSION);
    include("header.php");
}
require("../admin/classe/bo/noticiasBO.php");
require("../admin/classe/vo/noticiasVO.php");
$noticiasVO = new noticiasVO();
$noticiasBO = new noticiasBO();

$id = $_GET['id'];
$noticiasVO->setId($id);
$noticia = $noticiasBO->get($noticiasVO);
date_default_timezone_set('America/Sao_Paulo');
$data_completa = $noticia['data'];
$datetime = new DateTime($data_completa);
$data = $datetime->format('d/m/Y');
$time = $datetime->format('H:i');
?>
<!---->
<?
if (!empty($noticia)) { ?>

    <!--
    ==================================================
    Global Page Section Start
    ================================================== -->
    <section class="global-page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h2><?= $noticia['titulo'] ?></h2>

                        <div class="portfolio-meta">
                            <span><?= $data ?>, &agrave;s <?= $time ?></span>
                            <!-- |<span> Category: typography</span>|-->
                            <!-- <span> Tags: <a href="">business</a>,<a href="">people</a></span>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#Page header-->
    <section class="single-post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="post-img">
                        <!--  <div class="post-img" style="background: url(../noticias-imagem/<?= $noticia['imagem'] ?>) no-repeat 50%; height:100%;"> -->
                        <img class="img-responsive center-block" alt=""
                             src="../noticias-imagem/<?= $noticia['imagem'] ?>">
                    </div>
                    <div class="post-content">
                        <p>
                            <?= urldecode($noticia['descricao']) ?>
                        </p>
                    </div>
<!--                    <ul class="social-share">-->
<!--                        <h4>Share this article</h4>-->
<!--                        <li>-->
<!--                            <a href="#" class="Facebook">-->
<!--                                <i class="ion-social-facebook"></i>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#" class="Twitter">-->
<!--                                <i class="ion-social-twitter"></i>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#" class="Linkedin">-->
<!--                                <i class="ion-social-linkedin"></i>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#" class="Google Plus">-->
<!--                                <i class="ion-social-googleplus"></i>-->
<!--                            </a>-->
<!--                        </li>-->
<!---->
<!--                    </ul>-->

                </div>
            </div>
            
        </div>
    </section>

<? } else {
    echo "<script>location.href='404.php';</script>";
} ?>
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
<!-- /#footer -->
