<?php
  include("header-logado.php");
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
                    <h2>Atletas</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li>Login</li>
                        <li class="active">Atletas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->

    <div class="container" style="margin-top: 60px; margin-bottom: 60px">

      <div class="busca text-center" style="font-size: 16px;">
        <input placeholder="Faça sua busca aqui..." />
        <span class="ion-search"></span>
      </div>

      <div id="atletas" style="padding-top: 100px; color: #fcfcfc;">

        <!-- div inserida para cada atleta -->
          <div class="col-md-4" style="margin-bottom: 40px;">
            <a href="#">
                <img class="img-circle col-md-2 img-busca" src="images/coach2.jpg">
                <div>
                  <h3>Tio Patinhas<span><img src="images/coach.png"></span></h3>
                  <p>29 anos</p>
                </div>
            </a>
          </div>
        <!-- fim da div -->

          <div class="col-md-4" style="margin-bottom: 40px;">
            <a href="#">
              <img class="img-circle col-md-2 img-busca" src="images/coach2.jpg">
              <div>
                <h3>Tio Patinhas<span><img src="images/athlete.png"></span></h3>
                <p>29 anos</p>
              </div>
            </a>
          </div>
          <div class="col-md-4" style="margin-bottom: 40px;">
            <a href="#">
              <img class="img-circle col-md-2 img-busca" src="images/coach2.jpg">
              <div>
                <h3>Tio Patinhas<span><img src="images/coach.png"></span></h3>
                <p>29 anos</p>
              </div>
            </a>
          </div>
          <div class="col-md-4" style="margin-bottom: 40px;">
            <a href="#">
              <img class="img-circle col-md-2 img-busca" src="images/coach2.jpg">
              <div>
                <h3>Tio Patinhas<span><img src="images/coach.png"></span></h3>
                <p>29 anos</p>
              </div>
            </a>
          </div>
          <div class="col-md-4" style="margin-bottom: 40px;">
            <a href="#">
              <img class="img-circle col-md-2 img-busca" src="images/coach2.jpg">
              <div>
                <h3>Tio Patinhas<span><img src="images/coach.png"></span></h3>
                <p>29 anos</p>
              </div>
            </a>
          </div>
      </div>
  </div>



<?php
include("footer-logado.php");
?>
