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
                    <h2>Editar Perfil</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li>Login</li>
                        <li><a href="perfil.php">Meu Perfil</a></li>
                        <li class="active">Editar Perfil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->


<div class="container" style="margin-top: 60px">
  <div class="row">

    <!-- form dados pessoais -->
    <form>

      <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms"
              data-wow-delay="0ms" style="background: none;">
        <div class="col-md-4 img-wrapper">
          <img class="img-circle center-block img-perfil" src="images/coach2.jpg" style="margin-top: 24px; margin-bottom:40px">
          <div class="overlay" style="background: none;">
              <div class="buttons" style="background: rgba(0, 0, 0, 0.7); top: 40%; left: 40%;">
                  <input type="file" name="file" id="file" class="inputfile" />
                  <a><label for="file">Alterar</label></a>
                  <!-- <a href="#">Alterar</a> -->
              </div>
          </div>
        </div>
      </figure>
      <div class="col-md-8" style="margin-top: 20px">
        <span style="margin-right: 15px"><img src="images/coach.png"></span>
        <input id="nome" value="Tio Patinhas" style="font-size: 30px; font-weight: bold;">
        <div id="dados" style="padding-top: 30px">
          <div class="form-group" style="margin-bottom: 2px">
              <label class="lbl col-xs-2 text-right" for="email" style="padding-bottom: 5px">Email:</label>
              <input type="email" name="email" value="tiozinho@email.com" style="width: 250px; font-size: 16px" >
          </div>
          <div class="form-group" style="margin-bottom: 2px">
              <label class="lbl col-xs-2 text-right" for="idade" style="padding-bottom: 5px">Idade:</label>
              <input name="idade" value="28 anos" style="width: 250px; font-size: 16px">
          </div>
          <div class="form-group" style="margin-bottom: 2px">
              <label class="lbl col-xs-2 text-right" for="altura" style="padding-bottom: 5px">Altura:</label>
              <input name="altura" value="1.96 m" style="width: 250px; font-size: 16px">
          </div>
          <div class="form-group" style="margin-bottom: 2px">
              <label class="lbl col-xs-2 text-right" for="peso" style="padding-bottom: 5px">Peso:</label>
              <input id="peso" value="90.3 kg" style="width: 250px; font-size: 16px"><br/>
          </div>
        </div>

        <div class="text-right" style="margin-top: 100px">
          <button type="submit" class="btn btn-details">Salvar</button>
        </div>

      </form>
      <!--fim form dados pessoais-->
    </div>
  </div>

  <div class="row" style="margin-top: 80px; margin-bottom: 80px;">
    <h1 class="text-center" style="margin-bottom: 60px; background: #E5001C; padding: 15px; color: #fcfcfc;">Benchmarks</h1>
    <div class="text-right" style="margin: 30px 0;">
      <a href="#" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-plus-circled"></span> Adicionar Benchmark</a>
    </div>

    <!--form benchs-->
    <form>

      <table>
        <tr>
          <td class="col-md-1 lbl text-center"><img src="images/challenge.png" ></td>
          <td class="col-md-7 lbl">30 Muscle-ups</td>
          <td class="col-md-3 lbl"><input value="02:59" /></td>
          <td class="col-md-1 text-right"><a href="#" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-trash-b"></span> </a></td>
        </tr>
        <tr>
          <td class="col-sm-1 lbl text-center"><img src="images/hero.png" ></td>
          <td class="col-sm-7 lbl">Abbate</td>
          <td class="col-sm-3 lbl"><input value="28:56" /></td>
          <td class="col-sm-1 text-right"><a href="#" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-trash-b"></span> </a></td>
        </tr>
        <tr>
          <td class="col-sm-1 lbl text-center"><img src="images/girl.png" ></td>
          <td class="col-sm-7 lbl">Qualquer Girl</td>
          <td class="col-sm-3 lbl"><input value="02:05" /></td>
          <td class="col-sm-1 text-right"><a href="#" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-trash-b"></span> </a></td>
        </tr>
  <!-- <tr> para add um novo benchmark. a ideia é que só apareça pra ser preenchida qdo clicar em "adicionar benchmark"-->
        <tr>
          <td class="col-sm-1 lbl text-center">
            <select style="border-radius: 0; width: 60px; height: 100%">
              <option value=""></option>
              <option value="girl">GIRL</option>
              <option value="hero">HERO</option>
              <option value="challenge">CHALLENGE</option>
            </select>
          <td class="col-md-7 lbl">
            <select style="border-radius: 0; width: 100%; height: 100%">
              <option value="">Benchmark</option>
              <option value="">abc</option>
              <option value="">abc</option>
              <option value="">abc</option>
              <option value="">abc</option>
              <option value="">abc</option>
              <option value="">abc</option>
              <option value="">abc</option>
              <option value="">abc</option>
              <option value="">abc</option>
              <option value="">abc</option>
              <option value="">abc</option>
              <option value="">abc</option>
              <option value="">abc</option>
            </select>
          </td>
          <td class="col-md-3 lbl"><input value="" /></td>
          <td class="col-md-1 text-right"><a href="#" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-trash-b"></span> </a></td>
        </tr>
      </table>
      <div class="text-right" style="margin-top: 60px">
        <button type="submit" class="btn btn-details">Salvar</button>
      </div>

    </form>
    <!--fim form benchs-->
  </div>
</div>



  <?php
  include("footer-logado.php");
  ?>
