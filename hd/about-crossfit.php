<?php
include("meta.php");
include("header.php");

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
                        <img src="images/sobre-crossfit.jpg" alt="" class="img-responsive">
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
                    <!--
                    <div class="col-md-3">
                        <div class="team-member wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".3s">
                            <div class="team-img">
                                <img src="images/team/team-1.jpg" class="team-pic" alt="">
                            </div>
                            <h3 class="team_name">Jonathon Andrew</h3>
                            <p class="team_designation">CEO, Project Manager</p>
                            <p class="team_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                            <p class="social-icons">
                                <a href="#" class="facebook" target="_blank"><i class="ion-social-facebook-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-twitter-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-linkedin-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-googleplus-outline"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="team-member wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".5s">
                            <div class="team-img">
                                <img src="images/team/team-2.jpg" class="team-pic" alt="">
                            </div>
                            <h3 class="team_name">Jesmin Martina</h3>
                            <p class="team_designation">CEO, Project Manager</p>
                            <p class="team_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore .</p>
                            <p class="social-icons">
                                <a href="#" class="facebook" target="_blank"><i class="ion-social-facebook-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-twitter-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-linkedin-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-googleplus-outline"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="team-member wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".7s">
                            <div class="team-img">
                                <img src="images/team/team-3.jpg" class="team-pic" alt="">
                            </div>
                            <h3 class="team_name">Deu John</h3>
                            <p class="team_designation">CEO, Project Manager</p>
                            <p class="team_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore .</p>
                            <p class="social-icons">
                                <a href="#" class="facebook" target="_blank"><i class="ion-social-facebook-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-twitter-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-linkedin-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-googleplus-outline"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="team-member wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".9s">
                            <div class="team-img">
                                <img src="images/team/team-4.jpg" class="team-pic" alt="">
                            </div>
                            <h3 class="team_name">Anderson Martin</h3>
                            <p class="team_designation">CEO, Project Manager</p>
                            <p class="team_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore .</p>
                            <p class="social-icons">
                                <a href="#" class="facebook" target="_blank"><i class="ion-social-facebook-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-twitter-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-linkedin-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-googleplus-outline"></i></a>
                            </p>
                        </div>
                    </div> -->


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
        Clients Section Start
        ================================================== -->
        <!-- <section id="clients">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="subtitle text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">Our Happy Clinets</h2>
                        <p class="subtitle-des text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, error.</p>
                        <div id="clients-logo" class="owl-carousel">
                            <div>
                                <img src="images/clients/logo-1.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-2.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-3.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-4.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-5.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-1.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-2.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-3.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-4.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-5.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

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

    </body>
</html>
