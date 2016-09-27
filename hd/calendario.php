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
if($imagem == ""){
    $imagem = 'sem-imagem.jpg';
}
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
    });

    function getTreinoDia() {
        $("#treino").html("");
        var datepicker = $('#datepicker').val();
        if (datepicker != "") {
            $.ajax({
                url: "ajaxGetTreino.php",
                dataType: "html",
                data: {'datepicker': datepicker, 'id_logado': <?=$id?>},
                type: "POST",
                success: function (data) {
                    $('#treino').html(data);
                    $('#treino').show();
                }
            });
        }
    }

    function mostrarComments(i, id_logado){
        console.log("mostrarComments");
        $('.comments-'+i).show();
        $.ajax({
            url: "ajaxGetComments.php",
            dataType: "html",
            data: {'id_treino': i, 'id_logado': id_logado},
            type: "POST",
            success: function (data) {
                $('.comments-'+i).html(data);
            }
        });
        $('#mostrarComments-'+i).html("Ocultar comentários");
        $('#mostrarComments-'+i).attr("onclick", "ocultarComments("+i+")");
    }

    function ocultarComments(i){
        $('.comments-'+i).hide();
        $('#mostrarComments-'+i).html("Mostrar comentários");
        $('#mostrarComments-'+i).attr("onclick", "mostrarComments("+i+")");
    }

    function comentar(){
        var texto = $('#texto').val();
        var id_atleta = $('#id_logado').val();
        var id_treino = $('#id_treino').val();

        if(!texto){
            alert("Por favor, deixe um comentário!");
            texto.focus();
            return false;
        }
        else{
            $.ajax({
                url: "ajaxPutComments.php",
                dataType: "html",
                data: {'id_treino': id_treino, 'id_atleta': id_atleta, 'texto': texto},
                type: "POST",
                success: function (data) {
                    console.log(data);
                    mostrarComments(id_treino, id_atleta);
                }
            });
        }
        return false;
    }
    function remover(i){
        if(confirm("Deseja excluir esse comentário?")){
            var id_atleta = $('#id_logado').val();
            var id_treino = $('#id_treino').val();
            $.ajax({
                url: "ajaxPutComments.php",
                dataType: "html",
                data: {'acao': 'remover', 'id_comentario': i},
                type: "POST",
                success: function (data) {
                    console.log(data);
                    mostrarComments(id_treino, id_atleta);
                }
            });
            return false;
        }

    }

</script>
