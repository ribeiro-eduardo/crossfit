<body>
<header class="navbar-fixed-top">
<!-- Navigation -->
    <!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="padding: 0.7% 0"> -->
    <nav class="navbar navbar-inverse" role="navigation" style="padding: 0.7% 0; border-radius: 0;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" <?=$style?>>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="inicio.php">
                    <img src="img/logo_teste_cOriginal.png" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" role="navigation" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav lk">
                  
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Sobre<span class="caret"></span></a>
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
                        <a href="galerias.php">Fotos</a>
                    </li>
                    <li>
                        <a href="processausuarios.php?operacao=sair">Sair</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
        </div>
        <!-- /.container -->
    </nav>
</header>
