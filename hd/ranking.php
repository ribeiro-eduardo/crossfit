<?php
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");
require_once("../admin/classe/functions.php");

require("../admin/classe/bo/benchmarksBO.php");
require("../admin/classe/vo/benchmarksVO.php");

$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();

$benchmarksVO = new benchmarksVO();
$benchmarksBO = new benchmarksBO();

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    @session_destroy();
    @header("Location: index.php");
    exit;
} else {
    $header_logado = 1;
    //include("header-logado.php");
}

$id = $_SESSION["id"];
$usuariosVO->setId($id);

$usuario = $usuariosBO->get($usuariosVO);
$imagem = $usuario['imagem'];
$id_tipo_usuario = $usuario['id_tipo_usuario'];

switch ($id_tipo_usuario) {
    case 1:
        $icone = "images/coach.png";
        $dir = "fotos-coaches";
        break;
    case 2:
        $icone = "images/coach.png";
        $dir = "fotos-coaches";
        break;
    case 3:
        $icone = "images/athlete.png";
        $dir = "fotos-atletas";
        break;
}

if($header_logado == 1){
    include("header-logado.php");
}?>

<!--
==================================================
Global Page Section Start
================================================== -->
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Ranking</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li>Login</li>
                        <li class="active">Ranking</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->

    <div class="container" style="margin-top: 60px; margin-bottom: 60px">
        <div class="row">
          <div class="col-xs-12 text-center">
            <h4 style="color: #fcfcfc; padding-bottom: 15px; text-transform: uppercase; font-family: 'Roboto', sans-serif;">
              Selecione a categoria do benchmark que deseja ranquear:
            </h4>
          </div>
          <div class="col-md-offset-4 col-md-4 col-xs-12 text-center" style="height: 27px;">
            <select id="id_categoria_treino" style="border-radius: 0; width: 80%; height: 100%;">
              <option value="" disabled selected>Selecione</option>
              <option value="1">HERO</option>
                <option value="2">GIRL</option>
                <option value="3">CHALLENGE</option>

            </select>
          </div>
        </div>
        <div class="row" style="margin-top: 40px">
          <div class="col-xs-12 text-center">
            <h4 style="color: #fcfcfc; padding-bottom: 15px; text-transform: uppercase; font-family: 'Roboto', sans-serif;">
              Selecione o benchmark que deseja ranquear:
            </h4>
          </div>
          <div class="col-md-offset-3 col-md-6 col-xs-12 text-center" style="height: 27px;">
            <select id="id_benchmark" style="border-radius: 0; width: 80%; height: 100%;">
              <option value="" selected="selected">Selecione</option>
            </select>
          </div>
        </div>
        <div class="row" style="margin-top: 100px">
          <div class="col-xs-12 text-center">

            <div class="text-right">
              <button type="button" class="btn btn-default btn-lg" style="background: none; border: none; color: #ec001c">
                <span class="ion-arrow-up-b" aria-hidden="true"></span>
              </button>
              
              <button type="button" class="btn btn-default btn-lg" style="background: none; border: none; color: #ec001c">
                <span class="ion-arrow-down-b" aria-hidden="true"></span>
              </button>
            </div>


            <table class="table table-hover" id="listagem">
              <!--linha para cada atleta do ranking-->
<!--              <tr>-->
<!--                <td style="border-top: transparent">-->
<!--                  <a href="#" style="color: #5f5f5f;">-->
<!--                    <div class="col-sm-1">-->
<!--                      <h1 style="color: #e5001c">1</h1>-->
<!--                    </div>-->
<!--                      <div class="col-md-offset-2 col-md-6">-->
<!--                        <img class="img-circle img-busca col-md-4" src="fotos-atletas/sem-imagem.jpg">-->
<!--                        <h3><span><img src="images/athlete.png"></span>Meu nome horroroso</h3>-->
<!--                        <p>21 anos</p>-->
<!--                        <p style="font-weight: bold; color: #e5001c">meu tempinho</p>-->
<!--                      </div>-->
<!--                  </a>-->
<!--                </td>-->
<!--              </tr>-->
              <!--fim da linha para cada atleta do ranking-->
            </table>

          </div>
        </div>
    </div>

<?php
include ("footer-logado.php");
?>

<script>
    $('#id_categoria_treino').change(function(){
        var id_categoria_treino = $('#id_categoria_treino').val();
//        console.log("Id categoria: "+id_categoria_treino);
        if(id_categoria_treino != ""){
            $('#id_benchmark').find("option:gt(0)").remove();
            $('#listagem').html("");
            $.ajax({
                url: "ajaxGetBenchmarks.php",
                data: {'id_categoria_treino': id_categoria_treino},
                type: "POST",
                success: function (data) {
                    var benchs = $.parseJSON(data);
                    $.each(benchs, function(i, d) {
                        $('#id_benchmark').append('<option value="' + d.id + '">' + d.titulo + '</option>');
                    });
                    //$('#id_benchmark').html(data);
                }
            });
        }

    });

    $('#id_benchmark').change(function(){
       var id_benchmark = $('#id_benchmark').val();
       console.log("Id bench: "+id_benchmark);
       if(id_benchmark != ""){
           $.ajax({
              url: "ajaxGetBest.php",
              dataType: "html",
              data: {'id': id_benchmark},
              type: "POST",
              success: function(data){
                   $('#listagem').html(data);
              }
           });
       }
    });


</script>
