		

    	<h1 id="logo"><img src="../image/admin.png"><a href="../index.php">Logo da empresa</a></h1>
        
        <div id="mainNav">
        	<div>
                <ul>
                    <li><a <?php if(preg_match("/principal/i", $areaAdmin))	{ echo "class='active'" ;} ?> href="principal.php">Início</a></li>
                    <li><a <?php if(preg_match("/noticias/i", $areaAdmin))   { echo "class='active'" ;} ?> href="noticias.php">Notícias</a></li>
                    <li><a <?php if(preg_match("/cursos/i", $areaAdmin))   { echo "class='active'" ;} ?> href="cursos.php">Cursos</a></li>
                    <li><a <?php if(preg_match("/servicos/i", $areaAdmin))   { echo "class='active'" ;} ?> href="servicos.php">Serviços</a></li>
                    <li><a <?php if(preg_match("/links/i", $areaAdmin))   { echo "class='active'" ;} ?> href="links.php">Links úteis</a></li> 
                    <li><a <?php if(preg_match("/galerias/i", $areaAdmin))   { echo "class='active'" ;} ?> href="galerias.php">Galerias</a></li>
                    <li><a <?php if(preg_match("/reuniao/i", $areaAdmin))   { echo "class='active'" ;} ?> href="reuniao.php">Reunião</a></li>
                    <li><a <?php if(preg_match("/banners/i", $areaAdmin))   { echo "class='active'" ;} ?> href="banners.php">Banners</a></li>
                    <li><a <?php if(preg_match("/pessoas/i", $areaAdmin))   { echo "class='active'" ;} ?> href="pessoas.php">Pessoas</a></li>
                    <li><a <?php if(preg_match("/associados/i", $areaAdmin))   { echo "class='active'" ;} ?> href="associados.php">Associados</a></li>
                    <li><a <?php if(preg_match("/newsletter/i", $areaAdmin))   { echo "class='active'" ;} ?> href="newsletter.php">Newsletter</a></li>                    
                    <li><a <?php if(preg_match("/usuario/i", $areaAdmin)) 	{ echo "class='active'" ;} ?> href="usuario.php" >Usuário</a></li>
                    <li class="logout"><a href="processausuarios.php?operacao=sair">Sair</a></li>
                </ul>
            </div>
        </div>