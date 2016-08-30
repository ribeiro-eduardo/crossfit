<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 04/08/2016
 * Time: 14:30
 */

require_once("../admin/classe/bo/usuariosBO.php");
require_once("../admin/classe/vo/usuariosVO.php");

$usuariosBO = new usuariosBO();

$coaches = $usuariosBO->getCoaches();

?>
<section id="feature">
    <div class="container">
        <div class="section-heading">
            <h1 class="title wow fadeInDown" data-wow-delay=".3s" style="color: #5f5f5f;">Equipe</h1>

            <p class="wow fadeInDown" data-wow-delay=".5s" style="color: #acacac;">
                Conhe&ccedil;a alguns dos profissionais que trabalham conosco. Um time preparado para te atender.
            </p>
        </div>
        <div class="row">
            <? for ($i = 0; $i < count($coaches); $i++) {
                if($coaches[$i]['imagem'] == ""){
                    $imagem = "fotos-coaches/sem-imagem.jpg";
                }else{
                    $imagem = "fotos-coaches/".$coaches[$i]['imagem'];
                }
                ?>
                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="media wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
                        <div class="media-left">
                            <div class="icon">
                                <img src="<?=$imagem?>" class="img-responsive" alt="">
                                <!-- <i class="ion-ios-flask-outline"></i> -->
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading" style="color: #5f5f5f;"><?=$coaches[$i]['nome']?></h4>

                            <p><?=$coaches[$i]['descricao']?></p>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
</section>