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
require("../admin/classe/bo/sobreBO.php");
require("../admin/classe/vo/sobreVO.php");

$sobreBO = new sobreBO();
$sobreVO = new sobreVO();

$texto = $sobreBO->get(2);

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
                            <h2>Sobre o CrossFit</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active">Sobre</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--
        ==================================================
            Company Description Section Start
        ================================================== -->
        <section class="company-description oqe">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft" data-wow-delay=".3s" >
                        <img src="images/training.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <div class="block">
                            <h3 class="subtitle wow fadeInUp" data-wow-delay=".3s" data-wow-duration="500ms">O Que É</h3>
                            <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                <? echo urldecode($texto['texto']);?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--
        ==================================================
            Team Section Start
        ================================================== -->
        <section id="stt" class="stt">
            <div class="container">
                <div class="row">
                  <h3 class="subtitle wow fadeInUp" data-wow-delay=".3s" data-wow-duration="500ms">Benefícios do CrossFit</h3>
                </div>

                <div class="icones">

                    <div class="col-md-6 wow fadeInLeft" data-wow-delay=".3s" >
                      <div class="block">
                          <div class="row">
                              <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                <span>
                                  <img src="images/icons/icone3.png" />
                                  Força
                                </span>
                              </p>
                            </div>
                            <div class="row">
                                <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                  <span>
                                    <img src="images/icons/icone18.png" />
                                    Flexibilidade
                                  </span>
                                </p>
                            </div>
                            <div class="row">
                                <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                  <span>
                                    <img src="images/icons/icone4.png" />
                                    Resistência Muscular
                                  </span>
                                </p>
                              </div>
                              <div class="row">
                                  <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                    <span>
                                      <img src="images/icons/icone1.png" />
                                      Resistência Aeróbica
                                    </span>
                                  </p>
                              </div>
                              <div class="row">
                                    <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                      <span>
                                        <img src="images/icons/icone17.png" />
                                        Equilíbrio
                                      </span>
                                    </p>
                              </div>
                        </div>
                      </div>
                      <div class="col-md-6 wow fadeInRight" data-wow-delay=".5s" >
                          <div class="block">
                            <div class="row">
                                <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                  <span>
                                    <img src="images/icons/icone16.png" />
                                    Agilidade
                                  </span>
                                </p>
                              </div>
                              <div class="row">
                                  <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                    <span>
                                        <img src="images/icons/icone13.png" />
                                        Coordenação
                                    </span>
                                  </p>
                              </div>
                              <div class="row">
                                  <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                    <span>
                                      <img src="images/icons/icone11.png" />
                                      Precisão
                                    </span>
                                  </p>
                                </div>
                                <div class="row">
                                    <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                      <span>
                                        <img src="images/icons/icone7.png" />
                                        Velocidade
                                      </span>
                                    </p>
                                </div>
                                <div class="row">
                                      <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                        <span>
                                          <img src="images/icons/icone8.png" />
                                          Potência
                                        </span>
                                      </p>
                                </div>
                          </div>

                    </div>
            </div>
        </section>

        <!--
        ==================================================
        Call To Action Section Start
        ================================================== -->
        <? include("call-to-action.php"); ?>
        <!--
        ==================================================
        Footer Section Start
        ================================================== -->

        <? include("footer.php"); ?>
        <!-- /#footer -->
