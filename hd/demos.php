<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 22/07/2016
 * Time: 01:42
 */
include("header.php");
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
                    <h2>Demonstrações</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Demonstrações</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section><!--/#Page header-->
<section id="gallery" class="gallery">
    <div class="container">
        <div class="row">
            <!-- NESSE PEDA�O DE C�DIGO, COLOQUEI A MESMA ESTRUTURA QUE USO NO admin/visualizar-demo.php
                ESSA CLASS embed-container, no caso do visualizar-demo.php est� num css inline. Para essa p�gina,
                coloquei o css dessa classe no css/main.css, linhas 606~621. Acho que podemos deixar uma listagem dessa forma mesmo,
                ao inv�s de v�rias fancyboxes que abrem e d�o play no video. � mais trabalhoso de fazer.
                Essa classe embed-container precisa ser arrumada (height est� zuado e eu nao sei como arrumar)
                ou at� mesmo trocada de nome, com o nome que vc achar melhor,
                pra poder ter uma listagem bonitinha;
                At� deixei as outras divs ali embaixo, caso vc ainda precise usar.
             -->
            <div class="embed-container">
                        <iframe src="https://www.youtube.com/embed/GimrZbS-390" frameborder="0" allowfullscreen></iframe>
            </div>
            <!-- FIM DA CLASSE EMBED-CONTAINER-->
            <div class="col-sm-4 col-xs-12">
                <figure class="wow fadeInLeft animated animated" data-wow-duration="500ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 300ms; -webkit-animation-duration: 300ms; animation-delay: 300ms; -webkit-animation-delay: 300ms; animation-name: fadeInLeft; -webkit-animation-name: fadeInLeft;">
                    <div class="img-wrapper">
                        <img src="images/portfolio/item-2.jpg" class="img-responsive" alt="this is a title">
                        <div class="overlay">
                            <div>
                                <a rel="gallery" class="fancybox" href="images/portfolio/item-2.jpg" style="margin-top: 120px;">Ver</a>
                            </div>
                        </div>
                    </div>
                </figure>
            </div>
            <div class="col-sm-4 col-xs-12">
                <figure class="wow fadeInLeft animated animated" data-wow-duration="500ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 300ms; -webkit-animation-duration: 300ms; animation-delay: 300ms; -webkit-animation-delay: 300ms; animation-name: fadeInLeft; -webkit-animation-name: fadeInLeft;">
                    <div class="img-wrapper">
                        <img src="images/portfolio/item-3.jpg" class="img-responsive" alt="">
                        <div class="overlay">
                            <div>
                                <a rel="gallery" class="fancybox" href="images/portfolio/item-3.jpg" style="margin-top: 120px;">Ver</a>
                            </div>
                        </div>
                    </div>
                </figure>
            </div>
            <div class="col-sm-4 col-xs-12">
                <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="700ms" style="visibility: hidden; animation-duration: 300ms; -webkit-animation-duration: 300ms; animation-delay: 600ms; -webkit-animation-delay: 600ms; animation-name: none; -webkit-animation-name: none;">
                    <div class="img-wrapper">
                        <img src="images/portfolio/item-4.jpg" class="img-responsive" alt="">
                        <div class="overlay">
                            <div>
                                <a rel="gallery" class="fancybox" href="images/portfolio/item-4.jpg" style="margin-top: 120px;">Ver</a>
                            </div>
                        </div>
                    </div>
                </figure>
            </div>
            <div class="col-sm-4 col-xs-12">
                <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="900ms" style="visibility: hidden; animation-duration: 300ms; -webkit-animation-duration: 300ms; animation-delay: 900ms; -webkit-animation-delay: 900ms; animation-name: none; -webkit-animation-name: none;">
                    <div class="img-wrapper">
                        <img src="images/portfolio/item-5.jpg" class="img-responsive" alt="">
                        <div class="overlay">
                            <div>
                                <a rel="gallery" class="fancybox" href="images/portfolio/item-5.jpg" style="margin-top: 120px;">Ver</a>
                            </div>
                        </div>
                    </div>
                </figure>
            </div>
            <div class="col-sm-4 col-xs-12">
                <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="1100ms" style="visibility: hidden; animation-duration: 300ms; -webkit-animation-duration: 300ms; animation-delay: 1200ms; -webkit-animation-delay: 1200ms; animation-name: none; -webkit-animation-name: none;">
                    <div class="img-wrapper">
                        <img src="images/portfolio/item-6.jpg" class="img-responsive" alt="">
                        <div class="overlay">
                            <div >
                                <a rel="gallery" class="fancybox" href="images/portfolio/item-6.jpg" style="margin-top: 120px;">Ver</a>
                            </div>
                        </div>
                    </div>
                </figure>
            </div>
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
