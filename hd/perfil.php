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
                    <h2>Meu Perfil</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li>Login</li>
                        <li class="active">Meu Perfil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->


<div class="container" style="margin-top: 60px">
  <div class="row">
    <div class="col-md-4">
      <img class="img-circle center-block img-perfil" src="images/coach2.jpg" style="margin-top: 40px">
    </div>
    <div class="col-md-8">
      <div class="text-right">
        <button class="btn btn-details" onclick="location='editar-perfil.php'">Editar Perfil</button>
      </div>
      <span style="margin-right: 15px"><img src="images/coach.png"></span>
      <input id="nome" value="Tio Patinhas" readonly class="ipts" style="font-size: 30px; font-weight: bold;">
      <div id="dados" style="padding-top: 30px">
        <div class="col-md-2 text-right">
          <label class="lbl" for="email">Email:</label>
          <label class="lbl" for="idade">Idade:</label>
          <label class="lbl" for="altura">Altura:</label>
          <label class="lbl" for="peso">Peso:</label>
        </div>
        <div class="col-md-6">
          <input name="email" class="ipts" value="tiozinho@email.com" readonly><br/>
          <input name="idade" class="ipts" value="28 anos" readonly><br/> <!-- CONCATENAR AS PALAVRAS "ANOS", "m" e "kg" -->
          <input name="altura" class="ipts" value="1.96 m" readonly><br/>
          <input id="peso" class="ipts" value="90.3 kg" readonly><br/>
        </div>
      </div>
    </div>
  </div>
  <div class="row" style="margin-top: 80px; margin-bottom: 80px;">
    <h1 class="text-center" style="margin-bottom: 60px; background: #E5001C; padding: 15px; color: #fcfcfc;">Benchmarks</h1>
    <table style="width: 80%; margin-left: 10%">
      <tr>
        <td class="col-md-1 lbl text-center"><img src="images/challenge.png" ></td>
        <td class="col-md-7 lbl">30 Muscle-ups</td>
        <td class="col-md-4 lbl">02:59</td>
      </tr>
      <tr>
        <td class="col-md-1 lbl text-center"><img src="images/hero.png" ></td>
        <td class="col-md-7 lbl">Abbate</td>
        <td class="col-md-4 lbl">28:56</td>
      </tr>
      <tr>
        <td class="col-md-1 lbl text-center"><img src="images/girl.png" ></td>
        <td class="col-md-7 lbl">...</td>
        <td class="col-md-4 lbl">28:56</td>
      </tr>
    </table>

  </div>
</div>



  <?php
  include("footer-logado.php");
  ?>
