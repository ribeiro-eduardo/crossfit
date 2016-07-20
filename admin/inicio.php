<?
if (!isset($_SESSION)){
    session_start();
}
//echo "<pre>";
//var_dump($_SESSION);
//echo "</pre>";
//exit;
if(!isset($_SESSION['id'])){
    @session_destroy();
    @header("Location: index.php");
    exit;
}
if($_SESSION["id_tipo_usuario"] != 1){
    @header("Location: index.php");
    exit;
}
include("meta.php");
include("header.php");
$nome = $_SESSION['nome'];
?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Bem vindo, <?=$nome?>!</h1>
                <p>Essa &eacute; a p&aacute;gina inicial do painel administrativo HD Elite Team. Navegue pelo abas acima para acessar os menus desejados.</p>
            </div>
        </div>
    </div>