<script type="text/javascript" src="http://platform.twitter.com/widgets.js">
</script>
<?php
include("header.php");

require("../admin/lib/DBMySql.php");
require("../admin/classe/bo/noticiasBO.php");
require("../admin/classe/vo/noticiasVO.php");
$noticiasVO = new noticiasVO();
$noticiasBO = new noticiasBO();

$id = $_GET['id'];
$noticiasVO->setId($id);
$noticia = $noticiasBO->get($noticiasVO);
date_default_timezone_set('America/Sao_Paulo');
$data_completa = $noticia['data'];
$datetime = new DateTime($data_completa);
$data = $datetime->format('d/m/Y');
$time = $datetime->format('H:i');
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
                            <a href="http://twitter.com/share" class="twitter-share-button"
                               data-url="www.devmedia.com.br" data-text="Teste" data-count="horizontal" data-via="aqui-seu-nome-de-usuario-do-twitter" data-lang="pt">Tweetar</a>

                            <h2><?=$noticia['titulo']?></h2>
                            <div class="portfolio-meta">
                                <span><?= $data ?>, &agrave;s <?= $time ?></span>
<!--                                |<span> Category: typography</span>|-->
<!--                                <span> Tags: <a href="">business</a>,<a href="">people</a></span>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section><!--/#Page header-->
            <section class="single-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="post-img">
                                <img class="img-responsive" alt="" src="../noticias-imagem/<?= $noticia['imagem']?>">
                            </div>
                            <div class="post-content">
                                <p>
                                <?=urldecode($noticia['descricao'])?>
                                </p>
                            </div>
                            <ul class="social-share">
                                <h4>Share this article</h4>
                                <li>
                                    <a href="#" class="Facebook">
                                        <i class="ion-social-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="Twitter">
                                        <i class="ion-social-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="Linkedin">
                                        <i class="ion-social-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="Google Plus">
                                        <i class="ion-social-googleplus"></i>
                                    </a>
                                </li>

                            </ul>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="comments">
                                <div class="media">
                                    <a href="" class="pull-left">
                                        <img alt="" src="images/avater.jpg" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                        Jonathon Andrew</h4>
                                        <p class="text-muted">
                                            12 July 2013, 10:20 PM
                                        </p>
                                        <p>
                                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                        </p>
                                        <a href="">Reply</a>
                                        <hr>
                                        <!-- Nested media object -->
                                        <div class="media">
                                            <a href="" class="pull-left">
                                                <img alt="" src="images/avater-1.jpg" class="media-object">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                Tom Cruse </h4>
                                                <p class="text-muted">
                                                    12 July 2013, 10:20 PM
                                                </p>
                                                <p>
                                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                                </p>
                                            </div>
                                        </div>
                                        <!--end media-->
                                        <hr>
                                        <div class="media">
                                            <a href="" class="pull-left">
                                                <img alt="" src="images/avater-1.jpg" class="media-object">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                Nicolus Carolus </h4>
                                                <p class="text-muted">
                                                    12 July 2013, 10:20 PM
                                                </p>
                                                <p>
                                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                                </p>
                                            </div>
                                        </div>
                                        <!--end media-->
                                    </div>
                                </div>
                                <div class="media">
                                    <a href="" class="pull-left">
                                        <img alt="" src="images/avater-2.jpg" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                        Rob Martin</h4>
                                        <p class="text-muted">
                                            12 July 2013, 10:20 PM
                                        </p>
                                        <p>
                                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                        </p>
                                        <a href="">Reply</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <a href="" class="pull-left">
                                        <img alt="" src="images/avater-2.jpg" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                        Mastarello </h4>
                                        <p class="text-muted">
                                            12 July 2013, 10:20 PM
                                        </p>
                                        <p>
                                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                        </p>
                                        <a href="">Reply</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-comment">
                                <h3>Deixe um comentário</h3>
                                <form role="form" class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <input type="text" class="col-lg-12 form-control" placeholder="Nome">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="col-lg-12 form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <textarea class=" form-control" rows="8" placeholder="Mensagem"></textarea>
                                        </div>
                                    </div>
                                    <p>
                                    </p>
                                    <p>
                                        <button class="btn btn-send" type="submit">Comment</button>
                                    </p>

                                    <p></p>
                                </form>
                            </div>

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
            <!-- /#footer -->
