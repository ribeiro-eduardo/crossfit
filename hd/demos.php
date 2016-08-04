<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 22/07/2016
 * Time: 01:42
 */
include("header.php");

require("../admin/lib/DBMySql.php");
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
                <div class="video col-md-4">
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
