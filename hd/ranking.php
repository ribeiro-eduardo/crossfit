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
                    <h2>Ranking</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li>Login</li>
                        <li class="active">Ranking</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->

    <div class="container" style="margin-top: 60px; margin-bottom: 60px">
        <div class="row">
          <div class="col-xs-12 text-center">
            <h4 style="color: #fcfcfc; padding-bottom: 15px; text-transform: uppercase; font-family: 'Roboto', sans-serif;">
              Selecione a categoria do benchmark que deseja ranquear:
            </h4>
          </div>
          <div class="col-md-offset-4 col-md-4 col-xs-12 text-center" style="height: 27px;">
            <select style="border-radius: 0; width: 80%; height: 100%;">
              <option value=""></option>
              <option value="challenge">CHALLENGE</option>
              <option value="girl">GIRL</option>
              <option value="hero">HERO</option>
            </select>
          </div>
        </div>
        <div class="row" style="margin-top: 40px">
          <div class="col-xs-12 text-center">
            <h4 style="color: #fcfcfc; padding-bottom: 15px; text-transform: uppercase; font-family: 'Roboto', sans-serif;">
              Selecione o benchmark que deseja ranquear:
            </h4>
          </div>
          <div class="col-md-offset-3 col-md-6 col-xs-12 text-center" style="height: 27px;">
            <select style="border-radius: 0; width: 80%; height: 100%;">
              <option value=""></option>
              <option value="1">GIRL 1</option>
              <option value="2">GIRL 2</option>
              <option value="3">GIRL 3</option>
            </select>
          </div>
        </div>
        <div class="row" style="margin-top: 100px">
          <div class="col-xs-12 text-center">

            <div class="text-right">
              <button type="button" class="btn btn-default btn-lg" style="background: none; border: none; color: #ec001c">
                <span class="ion-arrow-up-b" aria-hidden="true"></span>
              </button>
              
              <button type="button" class="btn btn-default btn-lg" style="background: none; border: none; color: #ec001c">
                <span class="ion-arrow-down-b" aria-hidden="true"></span>
              </button>
            </div>


            <table class="table table-hover">
              <!--linha para cada atleta do ranking-->
              <tr>
                <td style="border-top: transparent">
                  <a href="#" style="color: #5f5f5f;">
                    <div class="col-sm-1">
                      <h1 style="color: #e5001c">1</h1>
                    </div>
                      <div class="col-md-offset-2 col-md-6">
                        <img class="img-circle img-busca col-md-4" src="fotos-atletas/sem-imagem.jpg">
                        <h3><span><img src="images/athlete.png"></span>Meu nome horroroso</h3>
                        <p>21 anos</p>
                        <p style="font-weight: bold; color: #e5001c">meu tempinho</p>
                      </div>
                  </a>
                </td>
              </tr>
              <!--fim da linha para cada atleta do ranking-->
              <tr>
                <td>
                  <a href="#" style="color: #5f5f5f;">
                    <div class="col-sm-1">
                      <h1 style="color: #e5001c">2</h1>
                    </div>
                    <div class="col-md-offset-2 col-md-6">
                      <img class="img-circle img-busca col-md-4" src="fotos-coaches/coach1.jpg">
                      <h3><span><img src="images/athlete.png"></span>Meu nome horroroso</h3>
                      <p>21 anos</p>
                      <p style="font-weight: bold; color: #e5001c">meu tempinho</p>
                    </div>
                  </a>
                </td>
              </tr>
              <tr>
                <td>
                  <a href="#" style="color: #5f5f5f;">
                    <div class="col-sm-1">
                      <h1 style="color: #e5001c">3</h1>
                    </div>
                    <div class="col-md-offset-2 col-md-6">
                      <img class="img-circle img-busca col-md-4" src="fotos-coaches/coach2.jpg">
                      <h3><span><img src="images/athlete.png"></span>Meu nome horroroso</h3>
                      <p>21 anos</p>
                      <p style="font-weight: bold; color: #e5001c">meu tempinho</p>
                    </div>
                  </a>
                </td>
              </tr>
            </table>

          </div>
        </div>
    </div>



<?php
include ("footer-logado.php");
?>
