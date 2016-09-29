<?php
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
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");
require_once("../admin/classe/functions.php");

$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();
$usuario_logadoVO = new usuariosVO();

$busca = (isset($_GET['busca'])) ? $_GET['busca'] : "";
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
$atletas = $usuariosBO->get($usuariosVO);
$total = count($atletas);
$registros = 9;
$numPaginas = ceil($total/$registros);
$inicio = ($registros*$pagina)-$registros;
$atletas = $usuariosBO->paginacao($busca, $inicio, $registros);

$id = $_SESSION["id"];
$usuario_logadoVO->setId($id);

$usuario_logado = $usuariosBO->get($usuario_logadoVO);
$imagem = $usuario_logado['imagem'];
if($imagem == ""){
    $imagem = 'sem-imagem.jpg';
}
$id_tipo_usuario = $usuario_logado['id_tipo_usuario'];

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


if($header_logado == 1){
    include("header-logado.php");
}

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
                    <h2>Atletas</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-home"></i>
                                Home
                            </a>
                        </li>
                        <li>Login</li>
                        <li class="active">Atletas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    </section><!--/#Page header-->

    <div class="container" style="margin-top: 60px; margin-bottom: 60px">

      <div class="busca text-center" style="font-size: 16px;">
        <input type="text" id="busca" placeholder="Faça sua busca aqui..." />
        <a href="javascript:void(0);" onclick="buscar();">
            <span class="ion-search"></span>
        </a>
      </div>

      <div id="atletas" style="padding-top: 100px; color: #fcfcfc;">

        <!-- div inserida para cada atleta -->
          <? for($i = 0; $i < count($atletas); $i++){
              $id_tipo_usuario = $atletas[$i]['id_tipo_usuario'];
              $imagemAtleta = $atletas[$i]['imagem'];
			  if($imagemAtleta == ""){
    		     $imagemAtleta = 'sem-imagem.jpg';
			  }	              

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

              $data_nascimento = @date('d/m/Y', strtotime($atletas[$i]["data_nascimento"]));
              $idade = calculaIdade($data_nascimento);
              ?>


                  <div class="col-md-4 col-sm-6 img-wrapper" style="margin-bottom: 60px; height: 131px">
                    <a href="atleta.php?id=<?=$atletas[$i]['id']?>">
                      <div class="circle-avatar col-md-3" style="background: url('<?=$dir?>/<?=$imagemAtleta?>') no-repeat; height: 131px; width: 131px; margin-right: 20px"></div>
                      <div>
                        <h3><?=$atletas[$i]['nome']?><span><img src="<?=$icone?>"></span></h3>
                        <p><?=$idade?> anos</p>
                      </div>
                    </a>
                  </div>

         <? } ?>
         <div class="clearfix">

         </div>
          <div align="right">
              <?
          for($i = 1; $i < $numPaginas + 1; $i++) {
              if($i == 1){
                  echo "<a href='atletas.php?pagina=$i'>".$i."</a> ";
              }else{
                  echo "| <a href='atletas.php?pagina=$i'>".$i."</a> ";
              }
          } ?>
          </div>
      </div>
  </div>


<?php
include("footer-logado.php");
?>
<script>
    function buscar(){
        var busca = $("#busca").val();
        console.log(busca);
        window.location = 'atletas.php?busca='+busca;
    }
</script>
