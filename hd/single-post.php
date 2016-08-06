<script type="text/javascript" src="http://platform.twitter.com/widgets.js">
</script>
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
                        <a href="http://twitter.com/share" class="twitter-share-button"
                           data-url="www.devmedia.com.br" data-text="Teste" data-count="horizontal"
                           data-via="aqui-seu-nome-de-usuario-do-twitter" data-lang="pt">Tweetar</a>

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
                    <ul class="social-share">
                        <h4>Share this article</h4>
                        <li>
                            <a href="#" class="Facebook">
                                <i class="ion-social-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="Twitter">
                                <i class="ion-social-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="Linkedin">
                                <i class="ion-social-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="Google Plus">
                                <i class="ion-social-googleplus"></i>
                            </a>
                        </li>

                    </ul>

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
