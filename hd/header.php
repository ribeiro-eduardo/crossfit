<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 20/07/2016
 * Time: 01:23
 */
include("meta.php");
?>
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

                            <!-- <li><a href="about.html">About</a></li> -->
                            <li><a href="index.php#about">WOD</a></li>
                            <li><a href="gallery.html">Demonstra&ccedil;&otilde;es</a></li>
                            <li><a href="news.html">Not&iacute;cias</a></li>
                            <li><a href="#about">Eventos</a></li>

                            <!-- <li><a href="service.html">Service</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a href="404.html">404 Page</a></li>
                                        <li><a href="gallery.html">Gallery</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <span class="caret"></span></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a href="blog-fullwidth.html">Blog Full</a></li>
                                        <li><a href="blog-left-sidebar.html">Blog Left sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">Blog Right sidebar</a></li>
                                    </ul>
                                </div>
                            </li>
-->
                            <li><a href="contact.html">Contato</a></li>
                            <li><a href="contact.html">Login</a></li>
                        </ul>
                    </div>
                </nav>
                <!-- /main nav -->
            </div>
        </header>