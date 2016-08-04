<?php
include("header-logado.php");
?>
<body>


  <!--
  ==================================================
  Global Page Section Start
  ================================================== -->
  <section class="global-page-header log">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="block">
                      <h2>Confira os Treinos da Semana</h2>
                  </div>
              </div>
          </div>
      </div>
  </section><!--/#Page header-->

  <div class="container timeline">
    <div class="row">
      <div class="conteudo">
        <!-- foreach WOD -->
        <div class=" pdg">
            <h5 class="text-right">03/03/2016</h5>
            <h2 class="text-center">Título do WOD</h2>
            <h4 class="text-center">Subtítulo do WOD(ex: homem/mulher/iniciante/intermediario/avançado) CASO EXISTA</h4>
            <p class="text-center">30 Box Jump – Salto na Caixa<br/>
              30 KB SW 12kg/16kg<br/>
              30 Burpee<br/>
              30 Abmat
            </p>
            <h4 class="text-center">Intermediário</h4>
            <p class="text-center">40 Box Jump<br/>
              40 KB SW 16kg/20kg<br/>
              40 Burpee<br/>
              40 V-up – Canivete
            </p>
            <h4 class="text-center">Avançado</h4>
            <p class="text-center">50 Box Jump<br/>
              50 KB SW 20kg/24kg<br/>
              50 Burpee<br/>
              50 V-up com peso 10lbs/15lbs
            </p>
            <div class="text-right">
              <button class="btn btn-send">Comentar</button>
            </div>

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
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus
                            commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                            Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
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
                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac
                                    cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit
                                    amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio
                                    dui.
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
                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac
                                    cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit
                                    amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio
                                    dui.
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
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus
                            commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                            Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
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
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus
                            commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                            Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                        </p>
                        <a href="">Reply</a>
                    </div>
                </div>

                <div class="post-comment">
                    <h3>Deixe um comentário</h3>

                    <form role="form" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <textarea class=" form-control" rows="8" placeholder="Mensagem"></textarea>
                            </div>
                        </div>
                        <p>
                        </p>

                        <p>
                            <button class="btn btn-send" type="submit">Comentar</button>
                        </p>

                        <p></p>
                    </form>
                </div>
            </div>
          <!---  <div class="post-comment">
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
            </div> -->

        </div>
<!-- FIM DO FOREACH.   MAIS PARA EXEMPLO:-->
        <div class=" pdg">
            <h5 class="text-right">03/03/2016</h5>
            <h2 class="text-center">Título do WOD</h2>
            <h4>Subtítulo do WOD(ex: homem/mulher/iniciante/intermediario/avançado) CASO EXISTA</h4>
            <p>30 Box Jump – Salto na Caixa<br/>
              30 KB SW 12kg/16kg<br/>
              30 Burpee<br/>
              30 Abmat
            </p>
            <h4>Intermediário</h4>
            <p>40 Box Jump<br/>
              40 KB SW 16kg/20kg<br/>
              40 Burpee<br/>
              40 V-up – Canivete
            </p>
            <h4>Avançado</h4>
            <p>50 Box Jump<br/>
              50 KB SW 20kg/24kg<br/>
              50 Burpee<br/>
              50 V-up com peso 10lbs/15lbs
            </p>
            <div class="text-right">
              <button class="btn btn-send">Comentar</button>
            </div>

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
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus
                            commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                            Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
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
                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac
                                    cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit
                                    amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio
                                    dui.
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
                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac
                                    cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit
                                    amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio
                                    dui.
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
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus
                            commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                            Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
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
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus
                            commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                            Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                        </p>
                        <a href="">Reply</a>
                    </div>
                </div>

                <div class="post-comment">
                    <h3>Deixe um comentário</h3>

                    <form role="form" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <textarea class=" form-control" rows="8" placeholder="Mensagem"></textarea>
                            </div>
                        </div>
                        <p>
                        </p>

                        <p>
                            <button class="btn btn-send" type="submit">Comentar</button>
                        </p>

                        <p></p>
                    </form>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>



  <div class="row">
      <div class="col-md-12">

<!--
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
                          Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus
                          commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                          Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                      </p>
                      <a href="">Reply</a>
                      <hr>
                      <!-- Nested media object -
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
                                  Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac
                                  cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit
                                  amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio
                                  dui.
                              </p>
                          </div>
                      </div>
                      <!--end media-
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
                                  Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac
                                  cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit
                                  amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio
                                  dui.
                              </p>
                          </div>
                      </div>
                      <!--end media-
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
                          Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus
                          commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                          Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
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
                          Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus
                          commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                          Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
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
-->



<script>
$('button').on('click',function(){
    $('.comments').show(); // aparece o div
    //$('.post-comment textarea').focus();
});
</script>

<?php
include("footer-logado.php");
?>
