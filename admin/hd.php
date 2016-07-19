<?
@session_start();
if($_SESSION["id_tipo_usuario"] != 1){
    header("Location: index.php");
}
include('meta.php');

include('lib/DBMySql.php');
include('classe/bo/sobreBO.php');

$sobreBO = new sobreBO();

$texto = $sobreBO->get();

include("header.php");

?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Sobre o HD Elite Team</h1>
                <p><?=$texto['texto']?></p>
            <input type="button" onclick="document.location.href='editar-hd.php'" value="Editar">
            </div>
        </div>
    </div>
    
