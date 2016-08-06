<?
if (!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    @session_destroy();
    include("header.php");
    //exit;
}else{
    include("header-logado.php");
}
?>

        <section class="moduler wrapper_404">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s" >404</h1>
                            <h2 class="wow fadeInUp animated" data-wow-delay=".6s">Ops! Temos um problema!</h2>
                            <p class="wow fadeInUp animated" data-wow-delay=".9s" style="color: white;">A página que você estava buscando não existe.</p>
                            <a href="index.php" class="btn btn-dafault btn-home wow fadeInUp animated" data-wow-delay="1.1s">Voltar ao início</a>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--
        ==================================================
            Footer Section Start
        ================================================== -->
        <? include ("footer.php"); ?>
        <!-- /#footer -->
