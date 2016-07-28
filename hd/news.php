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
                            <h2>Notícias</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active">Notícias</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            </section><!--/#Page header-->
            <section id="blog-full-width">
                <div class="container">
                    <div class="row">
                      <!-------------------INICIO DO FOREACH------------------->
                        <div class="col-md-6">
                            <article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
                                <div class="blog-post-image">
                                    <a href="single-post.php"><img class="img-responsive" src="images/fitness3.jpg" alt="" /></a>
                                </div>
                                <div class="blog-content">
                                    <h2 class="blogpost-title">
                                    <a href="single-post.php">Título notícia 1</a>
                                    </h2>
                                    <div class="blog-meta" style="color: #5f5f5f;">
                                        <span>Dec 11, 2020</span>
                                        <span>by Admin</span>
                                        <!-- <span><a href="">business</a>,<a href="">people</a></span> -->
                                    </div>
                                    <p style="color: #acacac">Ultrices posuere cubilia curae curabitur sit amet tortor ut massa commodo. Vestibulum consectetur euismod malesuada tincidunt cum. Sed ullamcorper dignissim consectetur ut tincidunt eros sed sapien consectetur dictum. Pellentesques sed volutpat ante, cursus port. Praesent mi magna, penatibus et magniseget dis parturient montes sed quia consequuntur magni dolores eos qui ratione.
                                    </p>
                                    <a href="single-post.php" class="btn btn-dafault btn-details">Continue Lendo</a>
                                </div>
                            </article>
                          </div>
                          <!-------------------FIM DO FOREACH------------------>
                          <!---------Abaixo são exemplos, pode excluir--------->
                          <div class="col-md-6">
                            <article class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">
                                <div class="blog-post-image">
                                    <a href="single-post.php"><img class="img-responsive" src="images/fitness2.jpg" alt="" /></a>
                                </div>
                                <div class="blog-content">
                                    <h2 class="blogpost-title">
                                    <a href="single-post.php">Título notícia 2</a>
                                    </h2>
                                    <div class="blog-meta" style="color: #5f5f5f;">
                                        <span>Dec 11, 2020</span>
                                        <span>by Admin</span>
                                        <!-- <span><a href="">business</a>,<a href="">people</a></span> -->
                                    </div>
                                    <p style="color: #acacac;">Ultrices posuere cubilia curae curabitur sit amet tortor ut massa commodo. Vestibulum consectetur euismod malesuada tincidunt cum. Sed ullamcorper dignissim consectetur ut tincidunt eros sed sapien consectetur dictum. Pellentesques sed volutpat ante, cursus port. Praesent mi magna, penatibus et magniseget dis parturient montes sed quia consequuntur magni dolores eos qui ratione.
                                    </p>
                                    <a href="single-post.php" class="btn btn-dafault btn-details">Continue Lendo</a>
                                </div>
                            </article>
                          </div>
                          <div class="col-md-6">
                            <article class="wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">
                                <div class="blog-post-image">
                                    <a href="single-post.php"><img class="img-responsive" src="images/fitness3.jpg" alt="" /></a>
                                </div>
                                <div class="blog-content">
                                    <h2 class="blogpost-title">
                                    <a href="single-post.php">Título notícia 3</a>
                                    </h2>
                                    <div class="blog-meta" style="color: #5f5f5f;">
                                        <span>Dec 11, 2020</span>
                                        <span>by Admin</span>
                                      <!--  <span><a href="">business</a>,<a href="">people</a></span>-->
                                    </div>
                                    <p style="color: #acacac;">Ultrices posuere cubilia curae curabitur sit amet tortor ut massa commodo. Vestibulum consectetur euismod malesuada tincidunt cum. Sed ullamcorper dignissim consectetur ut tincidunt eros sed sapien consectetur dictum. Pellentesques sed volutpat ante, cursus port. Praesent mi magna, penatibus et magniseget dis parturient montes sed quia consequuntur magni dolores eos qui ratione.
                                    </p>
                                    <a href="single-post.php" class="btn btn-dafault btn-details">Continue Lendo</a>
                                </div>
                            </article>
                          </div>
                          <!--------------Excluir até aqui--------------------->
                        </div>
                    </div>
                </div>
            </section>
            <!--
            ==================================================
            Call To Action Section Start
            ================================================== -->
            <?php
            include("call-to-action.php");
            ?>
            <!--
            ==================================================
            Footer Section Start
            ================================================== -->
            <?php
            include("footer.php");
            ?>
