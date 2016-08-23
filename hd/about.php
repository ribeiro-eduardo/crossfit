<?
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");
$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['id'])) {
    var_dump($_SESSION);
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

    include("header-logado.php");
} else {
    @session_destroy();
    var_dump($_SESSION);
    include("header.php");
}

require("../admin/classe/bo/sobreBO.php");
require("../admin/classe/vo/sobreVO.php");
$sobreBO = new sobreBO();
$sobreVO = new sobreVO();
$texto = $sobreBO->get(1);

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
                            <h2>Sobre a HD Elite Team</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="ion-ios-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="active">Sobre</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--
        ==================================================
            Company Description Section Start
        ================================================== -->
        <section class="company-description">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft" data-wow-delay=".3s" >
                        <img src="images/group.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <div class="block">
                            <h3 class="subtitle wow fadeInUp" data-wow-delay=".3s" data-wow-duration="500ms">Porque somos diferentes</h3>
                            <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                <? echo urldecode($texto['texto']); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--
        ==================================================
            Company Feature Section Start
        ================================================== -->
        <section class="about-feature clearfix">
            <div class="container-fluid">
                <div class="row">
                    <div class="block about-feature-1 wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">
                        <h2>
                        Porque Escolher A HD
                        </h2>
                        <p>
                            Pensando sempre no seu bem estar, não medimos esforços para atender as suas necessidades. Cada particularidade importante para você é importante para nós também. Escolha o plano que mais se adeque à sua rotina e venha fazer parte do nosso time!
                        </p>
                    </div>
                    <div class="block about-feature-2 wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                        <h2 class="item_title">
                        O Que Você Ganha
                        </h2>
                        <p>
                            Horários flexíveis para melhor atende-lo. Estacionamento particular. Apoio nas competições dentro e fora do país. Avaliação física gratuita em intervalos de tempo definidos por você. Essas são algumas das vantagens que oferecemos aos nosso alunos.
                        </p>
                    </div>
                    <div class="block about-feature-3 wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".7s">
                        <h2 class="item_title">
                        Encontre A Energia
                        </h2>
                        <p>
                            Além do condicionamento físico oferecido, trabalhamos para que você vença, diariamente, o único que pode te deter, você mesmo. Queremos que sua mente acompanhe sua superação, tornando nosso alunos não apenas saudáveis, mas pessoas mais fortes.
                        </p>
                    </div>
                </div>
            </div>
        </section>


        <!--
        ==================================================
            Team Section Start
        ================================================== -->
        <section id="team">
            <div class="container">
                <div class="row">
                    <!-- <h2 class="subtitle text-center wow fadeInUp" data-wow-delay=".3s" data-wow-duration="500ms">Um pouco de história</h2>

                    <!--
                    <div class="col-md-3">
                        <div class="team-member wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".3s">
                            <div class="team-img">
                                <img src="images/team/team-1.jpg" class="team-pic" alt="">
                            </div>
                            <h3 class="team_name">Jonathon Andrew</h3>
                            <p class="team_designation">CEO, Project Manager</p>
                            <p class="team_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
                            <p class="social-icons">
                                <a href="#" class="facebook" target="_blank"><i class="ion-social-facebook-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-twitter-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-linkedin-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-googleplus-outline"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="team-member wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".5s">
                            <div class="team-img">
                                <img src="images/team/team-2.jpg" class="team-pic" alt="">
                            </div>
                            <h3 class="team_name">Jesmin Martina</h3>
                            <p class="team_designation">CEO, Project Manager</p>
                            <p class="team_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore .</p>
                            <p class="social-icons">
                                <a href="#" class="facebook" target="_blank"><i class="ion-social-facebook-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-twitter-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-linkedin-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-googleplus-outline"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="team-member wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".7s">
                            <div class="team-img">
                                <img src="images/team/team-3.jpg" class="team-pic" alt="">
                            </div>
                            <h3 class="team_name">Deu John</h3>
                            <p class="team_designation">CEO, Project Manager</p>
                            <p class="team_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore .</p>
                            <p class="social-icons">
                                <a href="#" class="facebook" target="_blank"><i class="ion-social-facebook-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-twitter-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-linkedin-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-googleplus-outline"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="team-member wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".9s">
                            <div class="team-img">
                                <img src="images/team/team-4.jpg" class="team-pic" alt="">
                            </div>
                            <h3 class="team_name">Anderson Martin</h3>
                            <p class="team_designation">CEO, Project Manager</p>
                            <p class="team_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore .</p>
                            <p class="social-icons">
                                <a href="#" class="facebook" target="_blank"><i class="ion-social-facebook-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-twitter-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-linkedin-outline"></i></a>
                                <a href="#" target="_blank"><i class="ion-social-googleplus-outline"></i></a>
                            </p>
                        </div>
                    </div> -->


                    <div class="col-md-6">
                        <div class="block">
                            <h3 class="subtitle wow fadeInUp" data-wow-delay=".3s" data-wow-duration="500ms">Um pouco de história</h3>

                            <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                Fundada em 2016 por Thiago William Ribeiro, Bacharel em Educação Física pela PUCPR, especialista na modalidade CrossFit, a HD Elite Team surgiu com propósito de mudar a vida das pessoas através do esporte.
                            </p>
                            <p  class="wow fadeInUp" data-wow-delay=".7s" data-wow-duration="500ms">
                                Focados na superação diária dos seus alunos, os integrantes do time de treinamento da HD Elite Team buscam incentiva-los à quebrar seus próprios recordes, vencerem à si mesmos e conquistarem seus objetivos.
                                Apesar da rivalidade natural do esporte, em cada um querer ser melhor, essa garra é cultivada para que a cada dia, cada um de nós supere suas próprias marcas. Crescemos separados, agindo como um time.
                            </p>
                            <p  class="wow fadeInUp" data-wow-delay=".9s" data-wow-duration="500ms">
                                Participamos de todas as competições da modalidade e queremos, junto com você, ter nosso nome reconhecido como referência em qualidade ao tratar-se de CrossFit.
                            </p>
                        </div>
                  </div>
                  <div class="col-md-6 wow fadeInRight" data-wow-delay=".3s" >
                      <img src="images/barra.jpg" alt="" class="img-responsive">
                  </div>
            </div>
        </section>
        <!--
        ==================================================
        Clients Section Start
        ================================================== -->
        <!-- <section id="clients">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="subtitle text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">Our Happy Clinets</h2>
                        <p class="subtitle-des text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, error.</p>
                        <div id="clients-logo" class="owl-carousel">
                            <div>
                                <img src="images/clients/logo-1.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-2.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-3.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-4.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-5.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-1.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-2.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-3.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-4.jpg" alt="">
                            </div>
                            <div>
                                <img src="images/clients/logo-5.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!--
        ==================================================
        Call To Action Section Start
        ================================================== -->
        <? include("call-to-action.php"); ?>
        <!--
        ==================================================
        Footer Section Start
        ================================================== -->

        <? include("footer.php"); ?>
        <!-- /#footer -->
