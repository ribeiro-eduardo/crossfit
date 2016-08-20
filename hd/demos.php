<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 22/07/2016
 * Time: 01:42
 */
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");
$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();

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
        $dir = "fotos-coaches";
        break;
    case 2:
        $dir = "fotos-coaches";
        break;
    case 3:
        $dir = "fotos-atletas";
        break;
}

if ($header_logado == 1) {
    include("header-logado.php");
}
require_once("../admin/classe/bo/demosBO.php");
require_once("../admin/classe/vo/demosVO.php");

$demosBO = new demosBO();
$demosVO = new demosVO();

$demos = $demosBO->get($demosVO);
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
                    <h2>Demonstrações</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Demonstrações</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section><!--/#Page header-->
<section id="gallery" class="gallery">
    <div class="container">
        <div class="row">
            <? for ($i = 0; $i < count($demos); $i++) {
                $aux = $demos[$i]["link"];
                $aux = explode("=", $aux);
                $link = $aux[1];
                ?>
                <div class="video-demo col-md-4">
                    <iframe src="https://www.youtube.com/embed/<?=$link?>" frameborder="0" allowfullscreen
                            width="360" height="220"></iframe>
                    <p class="nome-video"><?=$demos[$i]['titulo']?></p>
                </div>
            <? } ?>
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
