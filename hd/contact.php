<?php
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/contatosBO.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");

$contatosBO = new contatosBO();
$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['id'])) {
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
    include("header.php");
}

$assuntos = $contatosBO->getAssuntos();
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
                            <h2>Contato</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active">Contato</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#page-header-->


        <!--
        ==================================================
            Contact Section Start
        ================================================== -->
        <section id="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="block">
                            <h2 class="subtitle wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s" style="color: #5f5f5f;">Entre em contato conosco</h2>
                            <p class="subtitle-des wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s" style="color: #acacac;">
                                Envie sua mensagem que responderemos o mais breve possível.
                            </p>
                            <p style="color: red;">* campos obrigatórios</p>
                            <div class="contact-form">
                                <form id="contato" method="post">

                                    <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".6s">
                                        <input type="text" placeholder="Seu Nome" class="form-control" name="nome" id="nome" style=" display: inline-block; width: 98%;">
                                        <span style="color: red">*</span>
                                    </div>

                                    <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".8s">
                                        <input type="email" placeholder="Seu Email" class="form-control" name="email" id="email" style=" display: inline-block; width: 98%;">
                                        <span style="color: red">*</span>
                                    </div>

                                    <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1s">
                                        <select class="form-control" name="assunto" id="id_assunto" style=" display: inline-block; width: 98%;">
                                            <option value="" disabled selected>Assunto...</option>
                                          <? for($i = 0; $i < count($assuntos); $i++){?>
                                                <option value="<?=$assuntos[$i]['id']?>"><?=$assuntos[$i]['nome']?></option>
                                          <? } ?>
                                        </select>
                                        <span style="color: red">*</span>
                                    </div>

                                    <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1.2s">
                                        <textarea rows="6" placeholder="Mensagem" class="form-control" name="mensagem" id="mensagem" style=" display: inline-block; width: 98%;"></textarea>
                                        <span style="color: red">*</span>
                                    </div>


                                    <div id="submit" class="wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1.4s">
                                        <input type="submit" id="contact-submit" class="btn btn-default btn-send" value="Enviar Mensagem">
                                        <span id="confirmacao" style="color: #e5001c;"></span>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="map-area">
                            <h2 class="subtitle  wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s" style="color: #5f5f5f;">Localização</h2>
                            <p class="subtitle-des wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s" style="color: #acacac;">
                                Saiba onde nos encontrar.
                            </p>
                            <div class="map">
                                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDDQmPCutGJeaBWS68lRx5Jq33rUdnLmz0'></script><div style='overflow:hidden;height:400px;width:100%;'><div id='gmap_canvas' style='height:400px;width:100%;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='http://maps-generator.com/pt' style="color: #1C1C1C;">www.maps-generator.com</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=60a28654da4bc62ae6dc1a2fd860f2a3b381525a'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:15,center:new google.maps.LatLng(-25.4471962,-49.24752509999996),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-25.4471962,-49.24752509999996)});infowindow = new google.maps.InfoWindow({content:'<strong>HD Elite Team</strong><br>Avenida Comendador Franco, 1234<br> Curitiba<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row address-details">
                    <div class="col-md-3">
                        <div class="address wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".5s">
                            <i class="ion-ios-location-outline"></i>
                            <h5>Avenida Comendador Franco, 1234 <br>Curitiba/PR</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="email wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".7s">
                            <i class="ion-ios-email-outline"></i>
                            <h5>hdeliteteam@email.com<br>thiagoribeiro@gmail.com</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="phone wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".9s">
                            <i class="ion-ios-telephone-outline"></i>
                            <h5>(41) 3030 3030<br>(41) 9999 9999</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="address wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".3s">
                            <i class="ion-social-whatsapp-outline"></i>
                            <h5>(41) 9999 9999 <br>(41) 8888 8888</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>






        <!--
        ==================================================
            Call To Action Section Start
        ================================================== -->
        <section id="call-to-action">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">Interessado em trabalhar conosco?</h2>
                            <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Envie seu currículo para um dos emails informados ou faça-nos uma visita.</br>Esperamos por você.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!--
        ==================================================
            Footer Section Start
        ================================================== -->
        <?php
        include("footer.php");
        ?>
        <!-- /#footer -->

<script>
    $("#contato").submit(function(e) {
        e.preventDefault();
        var nome = $("#nome").val();
        var email = $("#email").val();
        var id_assunto = $("#id_assunto").val();
        var mensagem = $("#mensagem").val();

        if(!nome || !email || !mensagem || !id_assunto){
            $("#confirmacao").html("Os campos nome, email, assunto e mensagem são obrigatórios!");
            return false;
        }

        $.ajax({
            url: "ajaxEnviaContato.php",
            dataType: "html",
            data: {'nome': nome, 'email': email, 'id_assunto': id_assunto, 'mensagem': mensagem},
            type: "POST",
            success: function (data) {
                $("#confirmacao").html(data);
                $(".form-control").val("");
            }
        });
    });
</script>
