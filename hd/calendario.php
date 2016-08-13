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
                    <h2>Calendário de treinos</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li>Login</li>
                        <li class="active">Calendário</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  </section><!--/#Page header-->

  <div class="container">
    <div class="row">
      <h4 style="color: white;">Selecione a data:</h4>
        <div id="datepicker"></div>
    </div>
    <div id="exibe-treino" class="row">

    </div>
  </div>


<?php
include("footer-logado.php");
?>
<script>
    $(function() {
        $("#datepicker").datepicker();
    });
</script>