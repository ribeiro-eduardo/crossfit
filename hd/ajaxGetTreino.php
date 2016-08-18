<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 18/08/2016
 * Time: 16:56
 */
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/treinosBO.php");
require("../admin/classe/vo/treinosVO.php");

$treinosBO = new treinosBO();
$treinosVO = new treinosVO();

$data = $_POST["datepicker"];
$aux = explode('/', $data);
$datepicker = $aux[2]."-".$aux[1]."-".$aux[0];
$datepicker = preg_replace("/(0)(.)-/", "$2-",$datepicker);

$treinosVO->setData($datepicker);
$treino = $treinosBO->buscaPorData($treinosVO);

if($treino['titulo'] != "") {
    $titulo = $treino['titulo'];
}else{
    $titulo = "";
}

if($treino['descricao'] != ""){
    $descricao = $treino['descricao'];
    $descricao = nl2br($descricao);
}else{
    $descricao = "";
}

if($treino['id'] != ""){
    $id = $treino['id'];
}else{
    $id = "";
}

//esse talvez viria ap�s o h2 class text center
$talvez = '<h4 class="text-center">Subt�tulo do WOD(ex: homem/mulher/inici</h4>';

echo
    '
        <h5 class="text-right">'.$data.'</h5>
              <h2 class="text-center">'.$titulo.'</h2>
              <p class="text-center">'.$descricao.'<br/>
              </p>
              <div class="text-right">
                <button id="comentar" class="btn btn-send" onclick="mostrarComentarios()">Comentar</button>
              </div>

              <div class="comments">
                  <div class="media">
                      <a href="" class="pull-left">
                          <img alt="" src="images/coach4.jpg" class="media-object">
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
                                  <img alt="" src="images/coach4.jpg" class="media-object">
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
                                  <img alt="" src="images/coach4.jpg" class="media-object">
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
                          <img alt="" src="images/coach4.jpg" class="media-object">
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
                          <img alt="" src="images/coach4.jpg" class="media-object">
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
    ';














