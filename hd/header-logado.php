<?php
include("meta.php");
?>
<link rel="stylesheet" href="css/logado.css">
<body>
    <!--
    ==================================================
    Header Section Start
    ================================================== -->
    <header id="top-bar" class="navbar-fixed-top animated-header">
        <div class="container">
            <div class="navbar-header">
                <!-- responsive nav button -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <!-- /responsive nav button -->

                <!-- logo -->
                <div class="navbar-brand">
                    <a href="index.php" >
                        <img src="images/logo_teste_cOriginal.png" alt="">
                    </a>
                </div>
                <!-- /logo -->
            </div>
            <!-- main menu -->
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
                <div class="main-menu">
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown" style="top: 15px">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sobre <span class="caret"></span></a>
                          <div class="dropdown-menu">
                              <ul>
                                  <li><a href="about.php">HD Elite Team</a></li>
                                  <li><a href="about-crossfit.php">Crossfit</a></li>
                              </ul>
                          </div>
                      </li>
                      <li style="top: 15px"><a href="index.php#wod-area">WOD</a></li>
                      <li class="dropdown" style="top: 15px">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Benchmarks <span class="caret"></span></a>
                          <div class="dropdown-menu">
                              <ul>
                                  <li><a href="benchmarks.php?b=heroes">Heroes</a></li>
                                  <li><a href="benchmarks.php?b=girls">Girls</a></li>
                                  <li><a href="benchmarks.php?b=challenges">Challenges</a></li>
                              </ul>
                          </div>
                      </li>

                      <li class="dropdown" style="top: 15px">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informações <span class="caret"></span></a>
                          <div class="dropdown-menu">
                              <ul>
                                  <li><a href="news.php">Notícias</a></li>
                                  <li><a href="eventos.php">Eventos</a></li>
                                  <li><a href="gallery.php">Fotos</a></li>
                                  <li><a href="demos.php">Demonstrações</a></li>
                              </ul>
                          </div>
                      </li>
                      <li><a href="contact.php" style="top: 15px">Contato</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img class="img-circle foto-nav" src="<?=$dir?>/<?=$imagem?>">
                          </a>
                          <div class="dropdown-menu">
                              <ul>
                                  <li><a href="timeline.php">Treinos da semana</a></li>
                                  <li><a href="perfil.php">Meu Perfil</a></li>
                                  <li><a href="atletas.php">Atletas</a></li>
                                  <li><a href="calendario.php">Calendário</a></li>
                                  <li><a href="ranking.php">Ranking</a></li>
                                  <li><a href="processausuarios.php?operacao=sair">Sair</a></li>
                              </ul>
                          </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- /main nav -->
        </div>
    </header>
