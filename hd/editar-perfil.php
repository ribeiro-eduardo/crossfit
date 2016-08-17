<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    @session_destroy();
    @header("Location: index.php");
    exit;
} else {
    include("header-logado.php");
}
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");
require_once("../admin/classe/functions.php");

require("../admin/classe/bo/benchmarksBO.php");
require("../admin/classe/vo/benchmarksVO.php");

$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();

$benchmarksVO = new benchmarksVO();
$benchmarksBO = new benchmarksBO();

$id = $_POST["id"];
$usuariosVO->setId($id);

$usuario = $usuariosBO->get($usuariosVO);
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

$data_nascimento = @date('d/m/Y', strtotime($usuario["data_nascimento"]));
$idade = calculaIdade($data_nascimento);
$peso = $usuario['peso'];
$altura = $usuario['altura'];

$mostra_peso = 0;
$mostra_altura = 0;
if ($peso != 0) {
    $mostra_peso = 1;
    $peso = str_replace(".", ",", $peso);
} else {
    $peso = "";
}
if ($altura != 0) {
    $mostra_altura = 1;
} else {
    $altura = "";
}

$benchmarks = $benchmarksBO->getPorAtleta($usuariosVO);

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
                    <h2>Editar Perfil</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li>Login</li>
                        <li><a href="perfil.php">Meu Perfil</a></li>
                        <li class="active">Editar Perfil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section><!--/#Page header-->


<div class="container" style="margin-top: 60px">
    <div class="row">

        <!-- form dados pessoais -->
        <form id="form" role="form" method="POST" action="../admin/action/usuarios-action.php"
              enctype="multipart/form-data">


            <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms"
                    data-wow-delay="0ms" style="background: none;">
                <div class="col-md-4 img-wrapper">
                    <!--  <div id="preview" class="center-block circle-avatar" style="background: url('fotos-coaches/<?= $usuario['imagem'] ?>') no-repeat; "></div> -->
                    <div id="preview" class="center-block circle-avatar"
                         style="background: url('<?= $dir ?>/<?= $usuario['imagem'] ?>') no-repeat; "></div>
                    <div class="overlay center-block" style="background: none; width: 220px;">
                        <div class="buttons" style="background: rgba(0, 0, 0, 0.7); top: 40%; left: 30%;">
                            <input type="file" name="file" id="file" class="inputfile"/>
                            <a><label for="file">Alterar</label></a>
                        </div>
                    </div>
                </div>
            </figure>


            <!-- PRIMEIRA VERSAO. OK PARA FOTOS QUADRADAS

      <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms"
              data-wow-delay="0ms" style="background: none;">
        <div class="col-md-4 img-wrapper">
          <img id="preview" class="img-circle center-block img-perfil" src="fotos-coaches/<?= $usuario['imagem'] ?>" style="margin-top: 24px; margin-bottom:40px">
<!--            <img id="preview" src="#" width="100px" height="100px">-->
            <!--      <div class="overlay center-block" style="background: none; width: 220px;">
                      <div class="buttons" style="background: rgba(0, 0, 0, 0.7); top: 40%; left: 30%;">
                          <input type="file" name="file" id="file" class="inputfile" />
                          <a><label for="file">Alterar</label></a>
                          <!-- <a href="#">Alterar</a> -->
            <!--        </div>
                </div>
              </div>
            </figure> -->


            <div class="col-md-8" style="margin-top: 20px">
                <span style="margin-right: 15px"><img src="<?= $icone ?>"></span>
                <input type="text" id="nome" name="nome" value="<?= $usuario['nome'] ?>"
                       style="font-size: 25px; font-weight: bold; width: 74%">
                <span id="nome-obrig" style="display: none; color: red">Campo obrigatório!</span>

                <div id="dados" style="padding-top: 30px">
                    <div class="form-group" style="margin-bottom: 2px">
                        <label class="lbl col-xs-5 text-center" for="email" style="padding-bottom: 5px">Email:</label>
                        <input type="text" name="email" id="email" value="<?= $usuario['email'] ?>"
                               style="width: 40%; font-size: 16px">
                        <span id="email-obrig" style="display: none; color: red">Campo obrigatório!</span>
                    </div>
                    <div class="form-group" style="margin-bottom: 2px">
                        <label class="lbl col-xs-5 text-center" for="data_nascimento" style="padding-bottom: 5px">Data
                            de nascimento:</label>
                        <input type="text" name="data_nascimento" id="data_nascimento"
                               value="<?= @date('d/m/Y', strtotime($usuario["data_nascimento"])) ?>"
                               style="width: 40%; font-size: 16px">
                        <span id="data_nascimento-obrig" style="display: none; color: red">Campo obrigatório!</span>
                    </div>
                    <div class="form-group" style="margin-bottom: 2px">
                        <label class="lbl col-xs-5 text-center" for="altura" style="padding-bottom: 5px">Altura:
                            (m)</label>
                        <input type="text" name="altura" id="altura"
                               value="<? echo substr_replace($altura, ',', 1, 0); ?> m"
                               style="width: 40%; font-size: 16px">
                        <span id="altura-obrig" style="display: none; color: red">Campo obrigatório!</span>
                    </div>
                    <div class="form-group" style="margin-bottom: 2px">
                        <label class="lbl col-xs-5 text-center" for="peso" style="padding-bottom: 5px">Peso:
                            (kg)</label>
                        <input type="text" id="peso" name="peso" value="<?= $peso ?> kg"
                               style="width: 40%; font-size: 16px">
                        <span id="peso-obrig" style="display: none; color: red">Campo obrigatório!</span>
                        <br/>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 2px">
                    <input type="hidden" name="id" value="<?= $id ?>">
                </div>
                <div class="form-group" style="margin-bottom: 2px">
                    <input type="hidden" name="dir" value="<?= $dir ?>">
                </div>
                <div class="text-right" style="margin-top: 100px">
                    <input type="submit" id="salvar" name="editar-hd" class="btn btn-details" value="Salvar">
                </div>

        </form>
        <!--fim form dados pessoais-->
    </div>
</div>

<div class="row" style="margin: 70px 0;">
    <h1 class="text-center" style="margin-bottom: 60px; background: #E5001C; padding: 15px; color: #fcfcfc;">
        Benchmarks</h1>

    <div class="text-right" style="margin: 30px;">
        <a id="add-benchmark" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span
                class="ion-plus-circled"></span> Adicionar Benchmark</a>
    </div>

    <!--form benchs-->
    <form>
      <!--cada bench-->
      <div>
        <div class="col-md-1 text-center lbl">
          <img src="images/challenge.png"></td>
        </div>
        <div class="col-md-7 lbl" style="height: 30px; font-size: 16px; padding-top: 4px;">
          Nome do benchmark
        </div>
        <div class="col-md-2 lbl">
          <input value="02:59" style="width: 100%"/>
        </div>
        <div class="col-md-2">
          <a href="#" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-trash-b" style="padding-right: 7px"></span>   Remover </a>
        </div>
      </div>
      <div class="clearfix"></div>
      <!--fim de cada bench-->


      <div>
        <div class="col-md-1 text-center lbl">
          <img src="images/girl.png"></td>
        </div>
        <div class="col-md-7 lbl" style="height: 30px; font-size: 16px; padding-top: 4px;">
          Nome do benchmark
        </div>
        <div class="col-md-2 lbl">
          <input value="02:59" style="width: 100%"/>
        </div>
        <div class="col-md-2">
          <a href="#" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-trash-b" style="padding-right: 7px"></span>   Remover </a>
        </div>
      </div>
      <div class="clearfix"></div>

      <div>
        <div class="col-md-1 text-center lbl">
          <img src="images/hero.png"></td>
        </div>
        <div class="col-md-7 lbl" style="height: 30px; font-size: 16px; padding-top: 4px;">
          Nome do benchmark
        </div>
        <div class="col-md-2 lbl">
          <input value="02:59" style="width: 100%"/>
        </div>
        <div class="col-md-2">
          <a href="#" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-trash-b" style="padding-right: 7px"></span>   Remover </a>
        </div>
      </div>
      <div class="clearfix"></div>


      <!--inserir bench-->
      <div>
        <div class="col-md-1 text-center lbl" style="height: 30px; font-size: 16px; padding-top: 4px;">
          <select style="border-radius: 0; width: 100%; height: 100%;">
            <option value=""></option>
            <option value="challenge">CHALLENGE</option>
            <option value="girl">GIRL</option>
            <option value="hero">HERO</option>
          </select>
        </div>
        <div class="col-md-7 lbl" style="height: 30px; font-size: 16px; padding-top: 4px;">
          <select style="border-radius: 0; width: 100%; height: 100%;">
            <option value=""></option>
            <option value="1">Nome do benchmark dessa categoria</option>
            <option value="2">Nome do benchmark</option>
            <option value="3">Nome do benchmark</option>
          </select>
        </div>
        <div class="col-md-2 lbl" style="height: 30px; font-size: 16px; padding-top: 2px;">
          <input value="02:59" style="width: 100%"/>
        </div>
        <div class="col-md-2" style="height: 30px; font-size: 16px; padding-top: 4px;">
          <a href="#" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-trash-b" style="padding-right: 7px"></span>   Remover </a>
        </div>
      </div>
      <div class="clearfix"></div>
      <!--fim inserir bench-->


        <div class="text-right" style="margin-top: 60px">
            <input name="salvar" id="salvar" value="Salvar" type="submit" class="btn btn-details">
        </div>

    </form>
    <!--fim form benchs-->
</div>
</div>

<?php
include("footer-logado.php");
?>

<script>
    $(document).ready(function () {
        $("#data_nascimento").mask("00/00/0000");
        $("#altura").mask("0,00");
        $("#peso").mask("00,0");
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').css('background', 'url(' + e.target.result + ')');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file").change(function () {
        readURL(this);
    });

</script>
<script src="js/valida-form-perfil.js"></script>

<script>
    $('#add-benchmark').click(function () {
        $('#tr-benchmark').append('<tr><td class="col-sm-1 lbl text-center"><select id="id_categoria_treino" style="border-radius: 0; width: 60px; height: 100%"><option value=""></option><option value="1">Hero</option><option value="2">Girl</option><option value="3">Challenge</option></select><td class="col-md-7 lbl"><select id="titulo" style="border-radius: 0; width: 100%; height: 100%"><option value="">Benchmark</option><option value="">abc</option><option value="">abc</option></select></td><td class="col-md-3 lbl"><input value=""/></td><td class="col-md-1 text-right"><a href="#"style="color: #e5001c; text-transform: uppercase; font-size: 16px;"><span class="ion-trash-b"></span> </a></td></tr>');
    });

//    $('#id_categoria_treino').change(function(){
//        var id_categoria_treino = $('#id_categoria_treino').val();
//        console.log(id_categoria_treino);
//    });
    $( "#id_categoria_treino" ).change(function() {
        alert( "Handler for .change() called." );
    });

</script>
