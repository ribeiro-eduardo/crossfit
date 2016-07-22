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

                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sobre <span class="caret"></span></a>
                          <div class="dropdown-menu">
                              <ul>
                                  <li><a href="about.php">HD Elite Team</a></li>
                                  <li><a href="about-crossfit.php">Crossfit</a></li>
                              </ul>
                          </div>
                      </li>
                        <li><a href="index.php#wod-area">WOD</a></li>
                        <li><a href="gallery.php">Demonstrações</a></li>
                        <li><a href="news.php">Notícias</a></li>
                        <li><a href="eventos.php">Eventos</a></li>
                        <li><a href="contact.php">Contato</a></li>
                        <li><a href="#">Sair</a></li>
                        <li><img class="img-circle foto-nav" src="images/coach2.jpg"></li>
                    </ul>
                </div>
            </nav>
            <!-- /main nav -->
        </div>
    </header>
