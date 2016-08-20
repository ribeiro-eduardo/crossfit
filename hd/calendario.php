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
                    <h2>Calendário de treinos</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li>Login</li>
                        <li class="active">Calendário</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  </section><!--/#Page header-->

  <div class="container">
    <div class="row" style="margin-top: 60px;">
      <div class="col-md-12 text-center">
        <h4 style="color: #fcfcfc; padding-bottom: 15px; text-transform: uppercase; font-family: 'Roboto', sans-serif;">Selecione a data:</h4>
        <div id="datepicker" onchange="getTreinoDia()"></div>
      </div>
    </div>
    <div class="row">
      <div id="exibe-treino" class="col-md-12">
        <div class="conteudo">
          <div class="pdg" style="display: none;" id="treino">
          </div>
      </div>
    </div>
  </div>
</div>

<?php
include("footer-logado.php");
?>
<script>
    $(function() {
        $('#datepicker').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: new Date()
        });
        //$("#datepicker").datepicker();
    });

    function getTreinoDia() {
        $("#treino").html("");
        //$("#treino").hide();
        var datepicker = $('#datepicker').val();
        if (datepicker != "") {
            $.ajax({
                url: "ajaxGetTreino.php",
                dataType: "html",
                data: {datepicker: datepicker},
                type: "POST",
                success: function (data) {
                    $('#treino').html(data);
                    $('#treino').show();
                }
            });
        }
    }

    $('#comentar').on('click',function(){
        $('.comments').show(); // aparece o div
        //$('.post-comment textarea').focus();
    });

    function mostrarComentarios(){
        $('.comments').show();
    }

</script>
