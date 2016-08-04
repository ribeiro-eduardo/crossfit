<?php
include("header.php");
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
                            <div class="contact-form">
                                <form id="contact-form" method="post" action="sendmail.php" role="form">

                                    <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".6s">
                                        <input type="text" placeholder="Seu Nome" class="form-control" name="name" id="name">
                                    </div>

                                    <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".8s">
                                        <input type="email" placeholder="Seu Email" class="form-control" name="email" id="email" >
                                    </div>

                                    <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1s">
                                        <select class="form-control" name="subject" id="subject">
                                          <option value="">Assunto</option>
                                          <option value="mensalidade">Mensalidade</option>
                                          <option value="academia">Academia</option>
                                          <option value="horario">Horário</option>
                                          <option value="outro">Outro</option>
                                        </select>
                                    </div>

                                    <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1.2s">
                                        <textarea rows="6" placeholder="Mensagem" class="form-control" name="message" id="message"></textarea>
                                    </div>


                                    <div id="submit" class="wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1.4s">
                                        <input type="submit" id="contact-submit" class="btn btn-default btn-send" value="Enviar Mensagem">
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
<!--                               <img src="images/mapa.png" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen>-->
                                <!-- PRECISA DA API DO GOOGLE PRA KEY
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.277552998015!2d90.3678744!3d23.773128800000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0ae4adf3cb9%3A0x7f2cf443b764e4a4!2sShishu+Mela!5e0!3m2!1sen!2s!4v1435516022247" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDDQmPCutGJeaBWS68lRx5Jq33rUdnLmz0'></script><div style='overflow:hidden;height:400px;width:520px;'><div id='gmap_canvas' style='height:400px;width:520px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='http://maps-generator.com/pt'>www.maps-generator.com</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=60a28654da4bc62ae6dc1a2fd860f2a3b381525a'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:15,center:new google.maps.LatLng(-25.4471962,-49.24752509999996),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-25.4471962,-49.24752509999996)});infowindow = new google.maps.InfoWindow({content:'<strong>HD Elite Team</strong><br>Avenida Comendador Franco, 1234<br> Curitiba<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
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
                            <h5>hdeliteteam@email.com<br>tiagoribeiro@gmail.com</h5>
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
