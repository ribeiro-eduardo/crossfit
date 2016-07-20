<?php
include("header.php");
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
                    <h2 style="margin-bottom: 0">já é nosso aluno?</h2>
                    <h3 style="margin-top: 0" class="text-uppercase">Faça seu login</h3>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Login</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#Page header-->

<section>
    <div class="container">
        <div class="row">
          <div class="wow fadeInRight" data-wow-delay=".3s" >
            <form class="login text-center" method="post">
              <div class="form-group input-group">
                <span class="input-group-addon">
                  <span class="ion-at"></span>
                </span>
                <input class="form-control" placeholder="Email">
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon">
                  <span class="ion-unlocked"></span>
                </span>
                <input class="form-control" placeholder="Senha">
              </div>
              <button type="submit" class="btn btn-details">Submit</button>
            </form>
          </div>
        </div>
    </div>
</section>


<!--
==================================================
    Call To Action Section Start
================================================== -->
<section id="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">Ainda não é nosso aluno?</h1>
                    <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Agende uma aula experimental. Esperamos por você!</p>
                    <a href="contact.php" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Entre em contato</a>
                </div>
            </div>

        </div>
    </div>
</section>


<?php
include("footer.php");
?>
