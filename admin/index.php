<?

@session_start();
//echo "<pre>";
//var_dump($_SESSION);
//echo "</pre>";
if($_SESSION["autenticado_painel"] != "SIM"){
    header("Location: index.php");
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