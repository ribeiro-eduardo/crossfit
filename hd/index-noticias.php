<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 20/07/2016
 * Time: 03:24
 */

require("../admin/classe/bo/noticiasBO.php");
require("../admin/classe/vo/noticiasVO.php");
$noticiasVO = new noticiasVO();
$noticiasBO = new noticiasBO();

$noticias = $noticiasBO->get($noticiasVO);
?>

<section id="works" class="works">
    <div class="container">
        <div class="section-heading">
            <h1 class="title wow fadeInDown" data-wow-delay=".3s">Notícias</h1>

            <p class="wow fadeInDown" data-wow-delay=".5s">
                Confira algumas notícias da modalidade.
            </p>
        </div>

        <div class="row">
            <?
            if(count($noticias) > 6){
                $limite = 6;
            }else{
                $limite = count($noticias);
            }
            for ($i = 0; $i < $limite; $i++) {
                date_default_timezone_set('America/Sao_Paulo');
                $data_completa = $noticias[$i]['data'];
                $datetime = new DateTime($data_completa);
                $data = $datetime->format('d-m-Y');
                $time = $datetime->format('H:i');
                ?>
                <div class="col-sm-4 col-xs-12">
                    <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms"
                            data-wow-delay="0ms">
                        <div class="img-wrapper" style="height: 240px;">
                            <img src="../noticias-imagem/<?= $noticias[$i]['imagem']?>" class="img-responsive" alt="<?=$noticias[$i]['titulo'];?>">
                            <div class="overlay">
                                <div class="buttons">
                                    <!-- <a rel="gallery" class="fancybox" href="images/portfolio/item-1.jpg">Demo</a> -->
                                    <a href="single-post.php?id=<?=$noticias[$i]['id']?>">Leia mais</a>
                                </div>
                            </div>
                        </div>
                        <figcaption>
                            <h4>
                                <a href="single-post.php?id=<?=$noticias[$i]['id']?>">
                                    <?=$noticias[$i]['titulo']; ?>
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
