<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 22/08/2016
 * Time: 15:36
 */

require("../admin/classe/bo/treinosBO.php");
require("../admin/classe/vo/treinosVO.php");
$treinosVO = new treinosVO();
$treinosBO = new treinosBO();

$date = @date("Y-m-d", @strtotime("today"));
$treinosVO->setData($date);
$treino = $treinosBO->buscaPorData($treinosVO);
$aux = explode("-", $date);
$ano = $aux[0];
$mes = $aux[1];
$dia = $aux[2];
$data = $aux[2]."/".$aux[1]."/".$aux[0];
$titulo = $treino['titulo'];
$descricao = $treino['descricao'];
$descricao = nl2br($descricao);
?>


<section id="wod-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <div class="block wow fadeInUp" data - wow - delay=".3s">
                    <h1 class="wow fadeInUp animated cd-headline slide" data - wow - delay=".4s">
                        WOD - Workout Of the Day
                    </h1>
                    <h2>
                        <?=$data?>
                    </h2>
                    <h4>
                        <?=$titulo?>
                    </h4>
                    <p>
                        <?=$descricao?>
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>