<?php
include("header.php");

require("../admin/lib/DBMySql.php");
require_once("../admin/classe/bo/galeriasBO.php");
require_once("../admin/classe/vo/galeriasVO.php");

$galeriasVO = new galeriasVO();
$galeriasBO = new galeriasBO();

require("../admin/classe/bo/galeriaFotosBO.php");
require("../admin/classe/vo/galeriaFotosVO.php");

$galeriaFotosBO = new galeriaFotosBO();
$galeriaFotosVO = new galeriaFotosVO();

$galerias = $galeriasBO->get($galeriasVO);

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
                            <h2>Fotos</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active">Fotos</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            </section><!--/#Page header-->
            <section id="gallery" class="gallery">
                <div class="container">
                    <div class="row">
                        <? for($i = 0; $i < count($galerias); $i++){
                            $id = $galerias[$i]['id'];
                            $galeriaFotosVO->setIdGaleria($id);
                            $fotos = $galeriaFotosBO->get($galeriaFotosVO);
                            ?>
                            <div class="col-sm-4 col-xs-12">
                                <figure class="wow fadeInLeft animated portfolio-item animated" data-wow-duration="500ms" data-wow-delay="0ms" style="visibility: visible; animation-duration: 300ms; -webkit-animation-duration: 300ms; animation-delay: 0ms; -webkit-animation-delay: 0ms; animation-name: fadeInLeft; -webkit-animation-name: fadeInLeft;">
                                    <div class="img-wrapper" style="height: 240px;">
                                        <img src="../galerias/<?=$id?>/<?=$fotos[0]['nome']?>" class="img-responsive" alt="this is a title">
                                        <div class="overlay">
                                            <div class="buttons">
                                                <a rel="group<?=$i?>" class="fancybox" href="../galerias/<?=$id?>/<?=$fotos[0]['nome']?>"><?=$galerias[$i]['nome']?></a>
                                            </div>
                                            <? for($j = 1; $j < count($fotos); $j++){ ?>
                                            <a class="fancybox hide" rel="group<?=$i?>" href="../galerias/<?=$id?>/<?=$fotos[$j]['nome']?>"></a>
                                            <? } ?>

                                        </div>
                                    </div>
                                </figure>
                            </div>
                     <?   } ?>

                    </div>
                </div>
            </section>
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
