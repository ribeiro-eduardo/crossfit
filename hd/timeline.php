<?php
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");
require("../admin/classe/bo/treinosBO.php");
require("../admin/classe/vo/treinosVO.php");

$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();
$treinosBO = new treinosBO();

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
if ($header_logado == 1) {
    include("header-logado.php");
}
date_default_timezone_set('America/Sao_Paulo');
$datas[0] = date("Y-m-d", strtotime("today"));
for ($i = 1; $i < 7; $i++) {
    $datas[$i] = date("Y-m-d", strtotime("$i days ago"));
}
$treinos = $treinosBO->getTimeline("'$datas[0]', '$datas[1]', '$datas[2]', '$datas[3]', '$datas[4]', '$datas[5]', '$datas[6]'");
for($i = 0; $i < count($treinos); $i++)
//include("header-logado.php");
?>

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

            <? for ($i = 0; $i < count($treinos); $i++) {
                $id_treino = $treinos[$i]['id'];
                $descricao = $treinos[$i]['descricao'];
                $descricao = nl2br($descricao);
                $data = date("d/m/Y", strtotime($treinos[$i]['data']));
                ?>
                <div class=" pdg">
                    <h5 class="text-right"><?=$data?></h5>

                    <h2 class="text-center"><?=$treinos[$i]['titulo']?></h2>
<!--                    <h4 class="text-center">Subtítulo do WOD(ex: homem/mulher/iniciante</h4>-->

                    <p class="text-center"><?=$descricao?>
                    </p>

                    <div class="text-right">
                        <button id="mostrarComments-<?=$id_treino?>" class="btn btn-send" onclick="mostrarComments(<?=$id_treino?>, <?=$id?>)">Mostrar Comentários</button>
                    </div>

                    <div class="comments-<?=$id_treino?>" style="display:none;">
                    </div>

                </div>
            <? } ?>

        </div>
    </div>
</div>



<script>

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

<?php
include("footer-logado.php");
?>
