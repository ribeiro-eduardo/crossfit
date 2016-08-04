<?php
include("header.php");

$erro = $_GET["e"];
$display = "display: none";

if($erro == 1){
    //não é admin
    $erro = "Ops! Esse usuário não é um administrador!";
    $display = "";
}elseif($erro == 2){
    //usuário inexistente
    $erro = "Ops! Usuário e/ou senha incorretos!";
    $display = "";
}elseif($erro == 3){
    //logout
    $erro = "";
}
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
            <span><?=$erro?></span>
          <div class="wow fadeInRight" data-wow-delay=".3s" >
            <form class="login text-center" method="post" action="processausuarios.php">
              <div class="form-group input-group">
                <span class="input-group-addon">
                  <span class="ion-person"></span>
                </span>
                <input class="form-control" placeholder="Usuário" name="login">
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon">
                  <span class="ion-unlocked"></span>
                </span>
                <input type="password" class="form-control" placeholder="Senha" name="senha">
              </div>
              <button type="submit" name="entrar" value="entrar" class="btn btn-details">Entrar</button>
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
                    <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">Ainda não é nosso aluno?</h2>
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
