<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 20/07/2016
 * Time: 03:24
 */

require("../admin/lib/DBMySql.php");
require("../admin/classe/bo/noticiasBO.php");
require("../admin/classe/vo/noticiasVO.php");
$noticiasVO = new noticiasVO();
$noticiasBO = new noticiasBO();

$noticias = $noticiasBO->get($noticiasVO);
?>
<section id="works" class="works">
    <div class="container">
        <div class="section-heading">
            <h1 class="title wow fadeInDown" data-wow-delay=".3s">Not&iacute;cias</h1>

            <p class="wow fadeInDown" data-wow-delay=".5s">
                Confira algumas not&iacute;cias da modalidade.
            </p>
        </div>

        <div class="row">
            <? for ($i = 0; $i < count($noticias); $i++) {
                date_default_timezone_set('America/Sao_Paulo');
                $data_completa = $noticias[$i]['data'];
                $datetime = new DateTime($data_completa);
                $data = $datetime->format('d-m-Y');
                $time = $datetime->format('H:i');
                ?>
                <div class="col-sm-4 col-xs-12">
                    <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms"
                            data-wow-delay="0ms">
                        <div class="img-wrapper">
                            <img src="images/fitness3.jpg" class="img-responsive" alt="this is a title">

                            <div class="overlay">
                                <div class="buttons">
                                    <!-- <a rel="gallery" class="fancybox" href="images/portfolio/item-1.jpg">Demo</a> -->
                                    <a href="single-post.html">Leia mais</a>
                                </div>
                            </div>
                        </div>
                        <figcaption>
                            <h4>
                                <a href="single-post.html">
                                    <?= $noticias[$i]['titulo'] ?>
                                </a>
                            </h4>

                            <p>
                                <span><?= $data ?>, &agrave;s <?= $time ?></span>
                            </p>
                        </figcaption>
                    </figure>
                </div>
            <? } ?>
        </div>

    </div>
</section>