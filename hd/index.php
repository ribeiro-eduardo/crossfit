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
                                    <b>join us</b>
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
            WOD Section Start
            ================================================== -->
            <section id="wod-area" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="block wow fadeInUp" data-wow-delay=".3s">
                                <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s" >
                                  WOD - Workout Of the Day
                                </h1>

                                <h2>
                                  Monday 001
                                </h2>
                                <h4>
                                  Iniciante
                                </h4>
                                <p>
                                  30 Box Jump – Salto na Caixa<br/>
                                  30 KB SW 12kg/16kg<br/>
                                  30 Burpee<br/>
                                  30 Abmat
                                </p>
                                <h4>
                                  Intermediário
                                </h4>
                                <p>
                                  40 Box Jump<br/>
                                  40 KB SW 16kg/20kg<br/>
                                  40 Burpee<br/>
                                  40 V-up – Canivete
                                </p>
                                <h4>
                                  Avançado
                                </h4>
                                <p>
                                  50 Box Jump<br/>
                                  50 KB SW 20kg/24kg<br/>
                                  50 Burpee<br/>
                                  50 V-up com peso 10lbs/15lbs
                                </p>

                              </div>
                          </div>
                      </div>
                  </div>
              </section>

            <!--
            ==================================================
            Slider Section Start
            ==================================================
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
            </section>  /#about -->
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
            <? include("index-equipe.php"); ?>

            <!-- /#feature -->

            <!--
            ==================================================
            Call To Action Section Start
            ================================================== -->
            <?php include("call-to-action.php");?>
            <!--
            ==================================================
            Footer Section Start
            ================================================== -->
            <?php include("footer.php");?>
            <!-- /#footer -->
