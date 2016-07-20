<? if(isMobile()){
    $style = "style='height: 80px;'";
}else{
    $style="style='height: 80px;'";
} ?>
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" <?=$style?>>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span8 class="sr-only">Toggle navigation</span8
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="hd.php">
                    <img src="img/logo.png" width="150px" height="60px" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="inicio.php">Início</a>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Conteúdo<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="visualizar-hd.php">HD Elite Team</a></li>
                            <li><a href="visualizar-crossfit.php">Crossfit</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuários<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="usuarios.php">Todos os usuários</a></li>
                            <li><a href="form-usuarios.php">Cadastrar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="form-treinos.php">Treinos mês</a>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Benchmarks<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="benchmarks.php">Ver todos</a></li>
                            <li><a href="form-benchmarks.php">Cadastrar</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Demonstra&ccedil;&otilde;es<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="demos.php">Todas as demonstra&ccedil;&otilde;es</a></li>
                            <li><a href="form-demos.php">Cadastrar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="noticias.php">Notícias</a>
                    </li>
                    <li>
                        <a href="eventos.php">Eventos</a>
                    </li>
                    <li>
                        <a href="galerias.php">Galerias de fotos</a>
                    </li>
                    <li>
                        <a href="processausuarios.php?operacao=sair">Sair</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>