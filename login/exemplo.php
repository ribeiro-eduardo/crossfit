<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');

$utilidadesBO = new utilidadesBO();

if(!empty($_POST['alterar'])){
	$senhaAt = $_POST['senhaAt'];
	$senhaNv = $_POST['senhaNv'];
	$senhaCf = $_POST['senhaCf'];

	$vetRes = $utilidadesBO->executaSQL("SELECT `senha` FROM `admin` WHERE `idAdmin` = '".$_SESSION['autenticado_id']."'");
	if($vetRes[0]['senha'] == sha1($senhaAt)){
		if(sha1($senhaNv) == sha1($senhaCf)){
			$senhaBD = sha1($senhaNv);
			@$vetAtu = $utilidadesBO->executaSQL("UPDATE `admin` SET `senha`='".$senhaBD."' WHERE `idAdmin`='".$_SESSION['autenticado_id']."';");
			$msgS = "Senha alterada com sucesso.";
		} else {
		$msgE = "A nova senha e a confirmação não coincidem.";
		}
	} else {
		$msgE = "Senha atual incorreta.";
	}
}

/*$count = $noticias->count();

$TAMANHO_PAGINA = 10;

$total_paginas = ceil(($count['total']) / $TAMANHO_PAGINA);

$pagina = $_GET['page'];

if(!$pagina) {

	$pagina = 1;

	$inicio = 0;

} else {

	if($pagina > $total_paginas) {
		$pagina = $total_paginas;
	}

	if($pagina < 0 || !is_numeric($pagina)) {
		$pagina = 1;
	}

	$inicio = ($pagina - 1) * $TAMANHO_PAGINA;

}

$all = $noticias->paginacao($inicio, $TAMANHO_PAGINA);*/

$areaAdmin = 'exemplo';
?>
<?php include('meta.php')?>
</head>

<body>
	<div id="wrapper">    	
    	<?php include('header.php')?>        
        <div id="containerHolder">
			<div id="container">            	
                <div id="sidebar">
                	<ul class="sideNav">
                        <li><a href="categoria.php" 	<?php if(preg_match("/categoria/i", $nome))	{ echo "class='active'" ;} ?>>Adicionar usuário </a></li>
                        <li><a href="categoria.php" 	<?php if(preg_match("/categoria/i", $nome))	{ echo "class='active'" ;} ?>>Ver todos os usuários </a></li>
                    </ul>
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">Usuários</a></h2>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Exemplo de título</h3>
						<p>Este é o painel de administração do seu site. Utilize as abas acima para navegar e gerenciar o conteúdo.</p>
                        <form action="" method="post" >
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>Vivamus rutrum nibh in felis tristique vulputate</td>
                                    <td class="action">
                                        <a href="#" class="add">Ver</a>
                                        <a href="#" class="Editar">Editar</a>
                                        <a href="#" class="delete">Delete</a>
                                    </td>
                                </tr>                        
                                <tr class="odd">
                                    <td>Duis adipiscing lorem iaculis nunc</td>
                                    <td class="action">
                                        <a href="#" class="add">Ver</a>
                                        <a href="#" class="Editar">Editar</a>
                                        <a href="#" class="delete">Delete</a>
                                    </td>
                                </tr>                        
                                <tr>
                                    <td>Donec sit amet nisi ac magna varius tempus</td>
                                    <td class="action">
                                        <a href="#" class="add">Ver</a>
                                        <a href="#" class="Editar">Editar</a>
                                        <a href="#" class="delete">Delete</a>
                                    </td>
                                </tr>                        
                                <tr class="odd">
                                    <td>Duis ultricies laoreet felis</td>
                                    <td class="action">
                                        <a href="#" class="add">Ver</a>
                                        <a href="#" class="Editar">Editar</a>
                                        <a href="#" class="delete">Delete</a>
                                    </td>
                                </tr>                        
                                <tr>
                                    <td>Vivamus rutrum nibh in felis tristique vulputate</td>
                                    <td class="action">
                                        <a href="#" class="add">Ver</a>
                                        <a href="#" class="Editar">Editar</a>
                                        <a href="#" class="delete">Delete</a>
                                    </td>
                                </tr>                        
                            </table>
                        	<h3>Layout de formulário</h3>
                            <fieldset>
                                <p><label>Exemplo de input:</label><input type="text" class="text-long" /></p>
                                <p><label>Exemplo de input:</label>
                                <input type="text" class="text-medium" />
                                <input type="text" class="text-small" />
                                <input type="text" class="text-small" /></p>
                                <p><label>Exemplo de input:</label>
                                <select>
                                    <option>Select um</option>
                                    <option>Select dois</option>
                                    <option>Select tres</option>
                                    <option>Select quatro</option>
                                </select>
                                </p>
                                <p><label>Exemplo de input:</label><textarea rows="1" cols="1"></textarea></p>
                                <input type="submit" value="Submit Query" />
                            </fieldset>
                        </form>
                    </div>
                    <?php if($total_paginas > 1) { ?>
                    <div class="paginacao">
                    	<?php if($pagina > 1) { ?><span class="prev"><a href="noticias.php?page=<?=$pagina-1?>">&laquo; Anterior</a></span><?php } ?>
                    	<?php if($pagina < $total_paginas) { ?><span class="next"><a href="noticias.php?page=<?=$pagina+1?>">Próxima &raquo;</a></span><?php } ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <p id="footer"><a href="http://www.legulas.com.br">L&eacute;gulas Solu&ccedil;&otilde;es para Web</a></p>
    </div>
</body>
</html>
