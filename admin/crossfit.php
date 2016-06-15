<?
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
    header("Location: index.php");
}
include('meta.php');

include('lib/DBMySql.php');
include('classe/bo/crossfitBO.php');

$crossfitBO = new crossfitBO();

$texto = $crossfitBO->get();

include("header.php");
?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Sobre o Crossfit</h1>
                <p><?=$texto['texto']?></p>
            <input type="button" onclick="document.location.href='editar-crossfit.php'" value="Editar">
            </div>
        </div>
    </div>
    
