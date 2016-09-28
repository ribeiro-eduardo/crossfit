<?php
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
if($imagem == ""){
    $imagem = 'sem-imagem.jpg';
}
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
        <form id="form" role="form" method="POST" action="actionPerfil.php"
              enctype="multipart/form-data">


            <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms"
                    data-wow-delay="0ms" style="background: none;">
                <div class="col-md-4 img-wrapper">
                    <div id="preview" class="center-block circle-avatar"
                         style="background: url('<?= $dir ?>/<?= $imagem ?>') no-repeat; "></div>
                    <div class="overlay center-block" style="background: none; width: 220px;">
                        <div class="buttons" style="background: rgba(0, 0, 0, 0.7); top: 40%; left: 30%;">
                            <input type="file" name="file" id="file" class="inputfile"/>
                            <a><label for="file">Alterar</label></a>
                        </div>
                    </div>
                </div>
            </figure>

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
                    <div class="clearfix">

                    </div>
                    <div class="form-group" style="margin-bottom: 2px">
                        <label class="lbl col-xs-5 text-center" for="data_nascimento" style="padding-bottom: 5px">Data
                            de nascimento:</label>
                        <input type="text" name="data_nascimento" id="data_nascimento"
                               value="<?= @date('d/m/Y', strtotime($usuario["data_nascimento"])) ?>"
                               style="width: 40%; font-size: 16px">
                        <span id="data_nascimento-obrig" style="display: none; color: red">Campo obrigatório!</span>
                    </div>
                    <div class="clearfix">

                    </div>
                    <div class="form-group" style="margin-bottom: 2px">
                        <label class="lbl col-xs-5 text-center" for="altura" style="padding-bottom: 5px">Altura:
                            (m)</label>
                        <input type="text" name="altura" id="altura"
                               value="<? echo substr_replace($altura, ',', 1, 0); ?> m"
                               style="width: 40%; font-size: 16px">
                        <span id="altura-obrig" style="display: none; color: red">Campo obrigatório!</span>
                    </div>
                    <div class="clearfix">

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

<div class="row" id="benchmarks" style="margin: 70px 0;">
    <h1 class="text-center" style="margin-bottom: 60px; background: #E5001C; padding: 15px; color: #fcfcfc;">
        Benchmarks</h1>

    <div id="add" class="text-right" style="margin: 30px;">
        <a id="add-benchmark" style="color: #e5001c; text-transform: uppercase; font-size: 16px;"
           onclick="adicionar(1)"><span
                class="ion-plus-circled"></span> Adicionar Benchmark</a>
    </div>

    <!--form benchs-->
    <form id="lista">
        <!--
        CARREGA VIA AJAX, FUNÇÃO carregarTempos();
        -->
    </form>
    <!--fim form benchs-->
</div>
<div class="clearfix">

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
        carregarTempos();
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
    function carregarTempos() {
        $.ajax({
            url: "ajaxTempoBenchmarks.php",
            dataType: "html",
            data: {'acao': 'carregar', 'id_atleta': <?=$id?>},
            type: "POST",
            success: function (data) {
                $("#lista").html(data);
            }
        });
    }

    function adicionar(n) {
        $('#add-benchmark').attr("onclick", "adicionar(" + (n + 1) + ")");
        $('#benchmarks').append("<div class='row' id='novos-" + (n + 1) + "'><div class='col-md-2 text-center lbl' style='height: 30px; font-size: 16px; padding-top: 4px;'><select required id='id_categoria_treino-" + (n + 1) + "' style='border-radius: 0; width: 80%; height: 100%;' onchange='carregaBenchs(this.options[this.selectedIndex].value, "+(n + 1)+")'><option value=''>SELECIONE</option><option value='1'>HERO</option><option value='2'>GIRL</option><option value='3'>CHALLENGE</option></select><p style='display: inline; color: #e5001c;'> *</p></div><div class='col-md-6 lbl' style='height: 30px; font-size: 16px; padding-top: 4px;'><select id='id_benchmark-" + (n + 1) + "' style='border-radius: 0; width: 95%; height: 100%;' required><option value=''>SELECIONE</option></select><p style='display: inline; color: #e5001c;'> *</p></div><div class='col-md-2 lbl' style='height: 30px; font-size: 16px; padding-top: 2px;'><input id='tempo-" + (n + 1) + "' style='width: 92%' required><p style='display: inline; color: #e5001c;'> *</p></div><div class='col-md-2' style='height: 30px; font-size: 16px; padding-top: 4px;'><a style='color: #e5001c;' alt='ADICIONAR' onclick='salvar(" + (n + 1) + ")'><i class='fa fa-check-circle' aria-hidden='true'></i></a>&nbsp;&nbsp;&nbsp;<a style='color: #e5001c;' alt='REMOVER' onclick='removerNovos(" + (n + 1) + ")'><span class='ion-trash-b' style='padding-right: 7px'></span></a></div></div><span id='campos_obrigatorios' style='color: #e5001c; display: none;'>Preencha todos os campos obrigatórios!</span>");
    }

    function salvar(n) {
        var id_categoria = $("#id_categoria_treino-" + n).val();
        var id_benchmark = $("#id_benchmark-" + n).val();
        var tempo = $("#tempo-" + n).val();
        if(!id_categoria || !id_benchmark || !tempo){
            $("#campos_obrigatorios").show();
        }else {
            $("#campos_obrigatorios").hide();
            $.ajax({
                url: "ajaxTempoBenchmarks.php",
                dataType: "html",
                data: {'acao': 'salvar', 'id_benchmark': id_benchmark, 'id_atleta': <?=$id?>, 'tempo': tempo},
                type: "POST",
                success: function (data) {
                    console.log(data);
                    carregarTempos();
                    $("#novos-" + n).remove();
                }
            });
        }
    }

    function carregaBenchs(index, n){
        console.log("SELECIONADO: "+index+ " n: "+n);
        $('#id_benchmark-'+n).find("option:gt(0)").remove();
        if(index != ""){
            $.ajax({
                url: "ajaxGetBenchmarks.php",
                data: {'id_categoria_treino': index},
                type: "POST",
                success: function (data) {
                    var benchs = $.parseJSON(data);
                    $.each(benchs, function (i, d) {
                        $('#id_benchmark-'+n).append('<option value="' + d.id + '">' + d.titulo + '</option>');
                    });
                }
            });
        }

    }

    function remover(i) {
        if (confirm("Tem certeza?")) {
            $("#gif-" + i).show();
            $.ajax({
                url: "ajaxTempoBenchmarks.php",
                dataType: "html",
                data: {'acao': 'remover', 'id': i},
                type: "POST",
                success: function (data) {
                    $("#bench-" + i).hide();
                }
            });
        }
    }

    function removerNovos(n) {
        $("#novos-" + n).hide();
    }

    function alterar(i) {
        $("#gif-" + i).show();
        var tempo = $("#tempo-" + i).val();
        $.ajax({
            url: "ajaxTempoBenchmarks.php",
            dataType: "html",
            data: {'acao': 'alterar', 'id': i, 'tempo': tempo},
            type: "POST",
            success: function (data) {
                $("#gif-" + i).hide();
            }
        });
    }

</script>
