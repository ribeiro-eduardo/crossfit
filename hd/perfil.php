<?php
include("header-logado.php");
?>
<div class="container" style="margin-top: 100px">
  <div class="row">
    <div class="col-md-4">
      <img class="img-circle center-block img-perfil" src="images/coach2.jpg">
    </div>
    <div class="col-md-8">
      <span><img src="images/admin.png"></span>
      <input id="nome" value="Tio Patinhas" readonly class="ipts" style="font-size: 30px; font-weight: bold;">
      <div id="dados" style="padding-top: 30px">
        <label class="lbl" for="email">Email:</label>
        <input name="email" class="ipts" value="tiozinho@email.com" readonly><br/>
        <label class="lbl" for="data-nasc">Idade:</label>
        <input name="data-nasc" class="ipts" value="28 anos" readonly><br/>
        <label class="lbl" for="altura">Altura:</label>
        <input name="altura" class="ipts" value="1.96 m" readonly><br/>
        <label class="lbl" for="peso">Peso:</label>
        <input id="peso" class="ipts" value="90.3 kg" readonly><br/>
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
    </table>
  </div>
</div>



  <?php
  include("footer-logado.php");
  ?>
