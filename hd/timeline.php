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
            <!-- foreach WOD -->
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
                        <button id="mostrarComments-<?=$id_treino?>" class="btn btn-send" onclick="mostrarComments(<?=$id_treino?>)">Mostrar Comentários</button>
                    </div>

                    <div class="comments-<?=$id_treino?>" style="display:none;">
<!--                        <div class="media">-->
<!--                            <a href="" class="pull-left">-->
<!--                                <img alt="" src="images/avater-2.jpg" class="media-object">-->
<!--                            </a>-->
<!---->
<!--                            <div class="media-body">-->
<!--                                <h4 class="media-heading">-->
<!--                                    Rob Martin</h4>-->
<!---->
<!--                                <p class="text-muted">-->
<!--                                    12 July 2013, 10:20 PM-->
<!--                                </p>-->
<!---->
<!--                                <p>-->
<!--                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus-->
<!--                                    commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.-->
<!--                                    Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="post-comment">-->
<!--                            <h3>Deixe um comentário</h3>-->
<!---->
<!--                            <form role="form" class="form-horizontal">-->
<!--                                <div class="form-group">-->
<!--                                    <div class="col-lg-12">-->
<!--                                        <textarea class=" form-control" rows="8" placeholder="Mensagem"></textarea>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <p>-->
<!--                                </p>-->
<!---->
<!--                                <p>-->
<!--                                    <button class="btn btn-send" type="submit">Comentar</button>-->
<!--                                </p>-->
<!---->
<!--                                <p></p>-->
<!--                            </form>-->
<!--                        </div>-->
                    </div>

                </div>
            <? } ?>

            <!-- FIM DO FOREACH.-->

        </div>
    </div>
</div>



<script>

    function mostrarComments(i){
        $('.comments-'+i).show();
        $.ajax({
            url: "ajaxGetComments.php",
            dataType: "html",
            data: {'id_treino': i},
            type: "POST",
            success: function (data) {
                console.log(data);
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
</script>

<?php
include("footer-logado.php");
?>
