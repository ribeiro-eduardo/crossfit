<?php
include("header-logado.php");
?>

<div class="container" style="margin-top: 100px">
  <div class="row">
    <form>

      <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms"
              data-wow-delay="0ms">
        <div class="col-md-4 img-wrapper">
          <img class="img-circle center-block img-perfil" src="images/coach2.jpg" style="margin-top: 24px; margin-bottom:40px">
          <div class="overlay" style="background: none;">
              <div class="buttons" style="background: rgba(0, 0, 0, 0.7); margin-left: 20px;">
                  <input type="file" name="file" id="file" class="inputfile" />
                  <a><label for="file">Alterar</label></a>
                  <!-- <a href="#">Alterar</a> -->
              </div>
          </div>
        </div>
      </figure>
      <div class="col-md-8" style="margin-top: 20px">
        <span style="margin-right: 15px"><img src="images/athlete.png"></span>
        <input id="nome" value="Tio Patinhas" style="font-size: 30px; font-weight: bold;">
        <div id="dados" style="padding-top: 30px">

        <div class="col-md-2 text-right">
            <label class="lbl" for="email" style="padding-bottom: 5px">Email:</label>
            <label class="lbl" for="idade" style="padding-bottom: 5px">Idade:</label>
            <label class="lbl" for="altura" style="padding-bottom: 5px">Altura:</label>
            <label class="lbl" for="peso" style="padding-bottom: 5px">Peso:</label>
          </div>
          <div class="col-md-6">
            <input type="email" name="email" value="tiozinho@email.com" style="width: 250px; font-size: 16px" ><br/>
            <input name="idade" value="28 anos" style="width: 250px; font-size: 16px"><br/>
            <input name="altura" value="1.96 m" style="width: 250px; font-size: 16px"><br/>
            <input id="peso" value="90.3 kg" style="width: 250px; font-size: 16px"><br/>
          </div>
        </div>

        <div class="text-right" style="margin-top: 180px">
          <button class="btn btn-details">Salvar</button>
        </div>

      </form>
    </div>
  </div>

  <div class="row" style="margin-top: 80px; margin-bottom: 80px;">
    <h1 class="text-center" style="margin-bottom: 60px; background: #E5001C; padding: 15px; color: #fcfcfc;">Benchmarks</h1>
    <div class="text-right" style="margin: 30px 0;">
      <a href="#" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-plus-circled"></span> Adicionar Benchmark</a>
    </div>

    <form>

      <table style="width: 80%; margin-left: 10%">
        <tr>
          <td class="col-md-1 lbl text-center"><img src="images/challenge.png" ></td>
          <td class="col-md-6 lbl">30 Muscle-ups</td>
          <td class="col-md-4 lbl"><input value="02:59" /></td>
          <td class="col-md-1"><a href="#" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-trash-b"></span> </a></td>
        </tr>
        <tr>
          <td class="col-md-1 lbl text-center"><img src="images/hero.png" ></td>
          <td class="col-md-7 lbl">Abbate</td>
          <td class="col-md-4 lbl"><input value="28:56" /></td>
          <td class="col-md-1"><a href="#" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-trash-b"></span> </a></td>
        </tr>
        <tr>
          <td class="col-md-1 lbl text-center"><img src="images/girl.png" ></td>
          <td class="col-md-7 lbl">Qualquer Girl</td>
          <td class="col-md-4 lbl"><input value="02:05" /></td>
          <td class="col-md-1"><a href="#" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-trash-b"></span> </a></td>
        </tr>
  <!-- <tr> para add um novo benchmark. a ideia é que só apareça pra ser preenchida qdo clicar em "adicionar benchmark"-->
        <tr>
          <td class="col-md-1 lbl text-center">
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
          <td class="col-md-4 lbl"><input value="" /></td>
          <td class="col-md-1"><a href="#" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-trash-b"></span> </a></td>
        </tr>
      </table>
      <div class="text-right" style="margin-top: 60px">
        <button class="btn btn-details">Salvar</button>
      </div>

    </form>
  </div>
</div>



  <?php
  include("footer-logado.php");
  ?>
