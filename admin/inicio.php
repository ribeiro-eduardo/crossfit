<?
if (!isset($_SESSION)){
    session_start();
}
//echo "<pre>";
//var_dump($_SESSION);
//echo "</pre>";
//exit;
if(!isset($_SESSION['id'])){
    @session_destroy();
    @header("Location: index.php");
    exit;
}
if($_SESSION["id_tipo_usuario"] != 1){
    @header("Location: index.php");
    exit;
}
include("meta.php");
include("header.php");
$nome = $_SESSION['nome'];
?>
<link rel="stylesheet" href="css/inicio.css">

    <section>
        <div class="container">
      <!--      <div class="row">
              <h2 style="padding: 5% 0" class="subtitle wow fadeInUp text-center" data-wow-delay=".3s" data-wow-duration="500ms">Bem vindo, <?=$nome?>!</h2>
            </div>

          -->

            <div class="icones">

                <div class="col-md-4 wow fadeInLeft" data-wow-delay=".3s" >
                  <div class="block">
                      <div class="row">
                          <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                            <span>
                              <a href="visualizar-hd.php">
                                <img src="img/icons/icone_sobre-hd.png"/>
                                HD Elite Team
                              </a>
                            </span>
                          </p>
                        </div>
                        <div class="row">
                            <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                              <span>
                                <a href="visualizar-crossfit.php">
                                  <img src="img/icons/sobre-crossfit.png" />
                                  CrossFit
                                </a>
                              </span>
                            </p>
                        </div>
                        <div class="row">
                            <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                              <span>
                                <a href="usuarios.php">
                                  <img src="img/icons/icone_usuarios.png" />
                                  Usuários
                                </a>
                              </span>
                            </p>
                          </div>
                    </div>
                  </div>

                  <div class="col-md-4 wow fadeInRight" data-wow-delay=".5s" >
                      <div class="block">
                        <div class="row">
                            <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                              <span>
                                <a href="form-treinos.php">
                                  <img src="img/icons/icone_treinos.png" />
                                  WOD
                                </a>
                              </span>
                            </p>
                          </div>
                          <div class="row">
                                <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                  <span>
                                    <a href="benchmarks.php">
                                      <img src="img/icons/icone_benchmark.png" />
                                      Benchmarks
                                    </a>
                                  </span>
                                </p>
                          </div>
                          <div class="row">
                                <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                  <span>
                                    <a href="demos.php">
                                      <img src="img/icons/icone_demos.png" />
                                      Demonstrações
                                    </a>
                                  </span>
                                </p>
                          </div>
                        </div>
                  </div>


                  <div class="col-md-4 wow fadeInRight" data-wow-delay=".5s" >
                      <div class="block">
                        <div class="row">
                            <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                              <span>
                                <a href="noticias.php">
                                  <img src="img/icons/icone_news.png" />
                                  Notícias
                                </a>
                              </span>
                            </p>
                          </div>
                          <div class="row">
                              <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                <span>
                                  <a href="eventos.php">
                                    <img src="img/icons/icone_eventos.png" />
                                    Eventos
                                  </a>
                                </span>
                              </p>
                          </div>
                          <div class="row">
                              <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                <span>
                                  <a href="galerias.php">
                                    <img src="img/icons/icone_fotos.png" />
                                    Fotos
                                  </a>
                                </span>
                              </p>
                            </div>
                        </div>
                </div>
              </div>
        </div>
    </section>

<?php
 include("footer.php");
?>

        <!-- Page Content
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Bem vindo,!</h1>
                    <p>Essa &eacute; a p&aacute;gina inicial do painel administrativo HD Elite Team. Navegue pelo abas acima para acessar os menus desejados.</p>
                </div>
            </div>
        </div> -->
