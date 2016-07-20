<?php
//include("meta.php");
include("header.php");
error_reporting(E_ALL ^ E_NOTICE);
?>

        <!--
        ==================================================
        Slider Section Start
        ================================================== -->
        <section id="hero-area" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="block wow fadeInUp" data-wow-delay=".3s">

                            <!-- Slider -->
                            <section class="cd-intro">
                                <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s" >
                                <span>Everyday,</span><br>
                                <span class="cd-words-wrapper">
                                    <b class="is-visible">HD Elite Team</b>
                                    <b>Heavy day</b>
                                    <b>TEXTO C</b>
                                </span>
                                </h1>
                                </section> <!-- cd-intro -->
                                <!-- /.slider -->
                                <h2 class="wow fadeInUp animated" data-wow-delay=".6s" >
                                    Formando atletas de elite.
                                </h2>
                                <a class="btn-lines dark light wow fadeInUp animated smooth-scroll btn btn-default btn-green" data-wow-delay=".9s" href="#feature" data-section="#feature" >Conheça nosso time</a>

                            </div>
                        </div>
                    </div>
                </div>
            </section><!--/#main-slider-->
            <!--
            ==================================================
            Slider Section Start
            ================================================== -->
            <section id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="block wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="500ms">
                                <h2>
                                WOD - Workout Of the Day
                                </h2>

                                <h3 class="text-right">
                                  Monday 001
                                </h3>
                                <h5>
                                  Iniciante
                                </h5>
                                <p>
                                  30 Box Jump – Salto na Caixa<br/>
                                  30 KB SW 12kg/16kg<br/>
                                  30 Burpee<br/>
                                  30 Abmat
                                </p>
                                <h5>
                                  Intermediário
                                </h5>
                                <p>
                                  40 Box Jump<br/>
                                  40 KB SW 16kg/20kg<br/>
                                  40 Burpee<br/>
                                  40 V-up – Canivete
                                </p>
                                <h5>
                                  Avançcado
                                </h5>
                                <p>
                                  50 Box Jump<br/>
                                  50 KB SW 20kg/24kg<br/>
                                  50 Burpee<br/>
                                  50 V-up com peso 10lbs/15lbs
                                </p>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="block wow fadeInRight" data-wow-delay=".3s" data-wow-duration="500ms">
                                <img id="imgWod" class="img-responsive" src="images/training.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- /#about -->
            <!--
            ==================================================
            News Section Start
            ================================================== -->

            <? include("index-noticias.php"); ?>

            <!-- News Section End-->
            <!--
            ==================================================
            Portfolio Section Start
            ================================================== -->
            <section id="feature">
                <div class="container">
                    <div class="section-heading">
                        <h1 class="title wow fadeInDown" data-wow-delay=".3s">Equipe</h1>
                        <p class="wow fadeInDown" data-wow-delay=".5s">
                            Conheça alguns dos profissionais que trabalham conosco. Um time preparado para te atender.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
                                <div class="media-left">
                                    <div class="icon">
                                      <img src="images/coach1.jpg" class="img-responsive" alt="" >
                                        <!-- <i class="ion-ios-flask-outline"></i> -->
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Ana</h4>
                                    <p>Coach há apenas 2 anos, Ana trabalha duro para levar seus alunos ao limite.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="600ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <img src="images/coach2.jpg" class="img-responsive" alt="" >
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Marcelo</h4>
                                    <p>Nosso coach mais antigo, é também fisiculturista.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="900ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <img src="images/coach4.jpg" class="img-responsive" alt="" >
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Bia</h4>
                                    <p>Nova na modalidade e a mais nova na casa, sofre com a pressão dos colegas.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1200ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <img src="images/coach3.jpg" class="img-responsive" alt="" >
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Pedro</h4>
                                    <p>Campeão regional de levantamento de peso por 2 anos seguidos, é o coach mais exigente da equipe.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1500ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <img src="images/coach5.jpg" class="img-responsive" alt="" >
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Camila</h4>
                                    <p>Além de coach na HD Elite Team, Camila participa de competições femininas de levantamento de peso.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1800ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <img src="images/coach6.jpg" class="img-responsive" alt="" >
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Ricardo</h4>
                                    <p>Após trabalhar alguns anos no exterior, juntou-se ao nosso time  a procura de atletas de elite.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- /#feature -->

            <!--
            ==================================================
            Call To Action Section Start
            ================================================== -->
            <?= include("call-to-action.php");?>
            <!--
            ==================================================
            Footer Section Start
            ================================================== -->
            <?= include("footer.php");?> <!-- /#footer -->

        </body>
    </html>
