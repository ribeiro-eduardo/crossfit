<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/linksVO.php';
require_once 'classe/bo/linksBO.php';
require 'classe/bo/uploadBO.php';

$linksVO = new linksVO();
$linksBO = new linksBO();
$uploadBO = new uploadBO();

$utilidadesBO = new utilidadesBO();

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'Cadastrar') {
	
	if(!empty($_POST['nome']) && !empty($_POST['texto'])) {
		
		$linksVO->setNome(urlencode($_POST['nome']));

		$linksVO->setTexto(urlencode($_POST['texto']));
		
		$linksBO->newLink($linksVO);
		
		$msg = "Link util cadastrado com sucesso";
	
	} else {
		
		$msg = "Preencha todos os campos";
		
	}
	
}

if(isset($_POST['editar']) && $_POST['editar'] == 'Editar') {
	
	if(!empty($_POST['nome']) && !empty($_POST['texto'])) {
		
		if($_POST['idhash'] == md5($_POST['id'])) {
			
			$linksVO->setId($_POST['id']);
	
			$linksVO->setNome(urlencode($_POST['nome']));
	
			$linksVO->settexto(urlencode($_POST['texto']));
			
			$linksBO->editLink($linksVO);
		
			$msg = "Dados editados com sucesso";
		
		} else {
			
			$msg = "Dados corrompidos";
			
		}
	
	} else {
	
		$msg = "Preencha todos os campos";
	
	}
	
}

if(isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
	
	if($_GET['token'] == md5($_GET['id'])) {
		
		$linksVO->setId($_GET['id']);

		$linksBO->deleteLink($linksVO);
		
		$msg = "Link exclu&iacute;do com sucesso";
		
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

$all = $linksBO->getAdmin();

$areaAdmin = 'links';
?>
<?php include('meta.php') ?>
<script language="javascript">
	function exclui(id,token){
		if(confirm("Tem certeza que deseja excluir esse link?")) {

			window.location.href = "links.php?acao=excluir&id="+id+"&token="+token;
			
		}
	}
</script>
</head>

<body>
	<div id="wrapper">    	
    	<?php include('header.php') ?>        
        <div id="containerHolder">
			<div id="container">            	
                <div id="sidebar">
                	<ul class="sideNav">
                        <li><a href="links_ins.php">Cadastrar link </a></li>
                    </ul>
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">Links</a></h2>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Links cadastrados</h3>
                    	<?php if(count($all) > 0) { ?>
						<table cellpadding="0" cellspacing="0">
							<?php for($c = 0; $c < count($all); $c++) { ?>
                         	<tr <?php if($c%2 == 0){echo 'class="odd"';}?>>
                              	<td><?=urldecode($all[$c]['nome'])?></td>
                              	<td class="action">
                              		<a href="links_edt.php?i=<?=$all[$c]['id']?>&token=<?=md5($all[$c]['id'])?><?php if($_SESSION['autenticado_login'] == 'admin') { ?>&cd=<?=$all[$c]['id']?><?php } ?>" class="edit">Editar</a>
                               		<a href="javascript:void(0);" onclick="javascript:exclui('<?=$all[$c]['id']?>','<?=md5($all[$c]['id'])?>');" class="delete">Delete</a>
                             	</td>
                      		</tr>
                      		<?php } ?>
                     	</table>
                     	<?php } else { ?>
                     	<div class="warnZero">Nenhum link foi cadastrado ainda. Para adicionar um link, clique <a href="links_ins.php">aqui</a></div>
                     	<?php } ?>
                    </div>
                    <?php if($total_paginas > 1) { ?>
                    <div class="paginacao">
                    	<?php if($pagina > 1) { ?><span class="prev"><a href="links.php?page=<?=$pagina-1?>">&laquo; Anterior</a></span><?php } ?>
                    	<?php if($pagina < $total_paginas) { ?><span class="next"><a href="links.php?page=<?=$pagina+1?>">Próxima &raquo;</a></span><?php } ?>
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
