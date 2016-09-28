<?php
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");
$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['id'])) {
    //var_dump($_SESSION);
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
            $dir = "fotos-coaches";
            break;
        case 2:
            $dir = "fotos-coaches";
            break;
        case 3:
            $dir = "fotos-atletas";
            break;
    }

    include("header-logado.php");
} else {
    @session_destroy();
    //var_dump($_SESSION);
    include("header.php");
}
require("../admin/classe/bo/noticiasBO.php");
require("../admin/classe/vo/noticiasVO.php");
$noticiasVO = new noticiasVO();
$noticiasBO = new noticiasBO();

$noticias = $noticiasBO->get($noticiasVO);
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
            <? for ($i = 0; $i < count($noticias); $i++) {
                $id = $noticias[$i]['id'];
                date_default_timezone_set('America/Sao_Paulo');
                $data_completa = $noticias[$i]['data'];
                $datetime = new DateTime($data_completa);
                $data = $datetime->format('d/m/Y');
                $time = $datetime->format('H:i');
                $texto_completo = $noticias[$i]['descricao'];
                $texto = strip_tags(urldecode($texto_completo));
                //echo $texto;
            ?>
                <div class="col-md-6" >
                    <article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
                      <a href="single-post.php?id=<?=$id?>" >
                        <div class="blog-post-image" style="height: 370px; background: url('../noticias-imagem/<?=$noticias[$i]['imagem']?>') no-repeat 50%;
background-size: cover;">
                          <!-- <img class="img-responsive" src="../noticias-imagem/<?=$noticias[$i]['imagem']?>" alt=""/></a> -->
                        </div>
                      </a>
                        <div class="blog-content">
                            <h2 class="blogpost-title">
                                <a href="single-post.php?id=<?=$id?>"><?= $noticias[$i]['titulo'] ?></a>
                            </h2>

                            <div class="blog-meta" style="color: #5f5f5f;">
                                <span><?= $data ?>, &agrave;s <?= $time ?></span>
                            </div>
                            <p style="color: #acacac">
                                <?
                                    if(strlen($texto) > 300){
                                        echo mb_substr($texto, 0, 300);?>...<?
                                    }else{
                                        echo $texto;?>...<?
                                    }
                                ?>
                            </p>
                            <a href="single-post.php?id=<?=$id?>" class="btn btn-dafault btn-details">Continue Lendo</a>
                        </div>
                    </article>
                </div>
            <? } ?>
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
