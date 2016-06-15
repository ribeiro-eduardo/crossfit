<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/mensagemVO.php';
require_once 'classe/bo/mensagemBO.php';
require 'classe/bo/uploadBO.php';

$mensagemVO = new mensagemVO();
$mensagemBO = new mensagemBO();
$uploadBO = new uploadBO();

$utilidadesBO = new utilidadesBO();

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'Cadastrar') {
	
	if((!empty($_POST['tituloMensagem'])) && (!empty($_POST['descricao'])) && (!empty($_POST['mes']))) {
		
		if($_FILES["imagem"]['error'] == 0 && $_FILES["imagem"]['size'] > 0){
	
			$uploadBO->pasta     = "../upload";
		
			$uploadBO->nome      = $_FILES["imagem"]['name'];
		
			$uploadBO->tmp_name  = $_FILES["imagem"]['tmp_name'];
		
			$uploadBO->img_marca = "";
			
			$imagem = $uploadBO->uploadArquivo(TRUE);
			
		} else {
			
			$imagem = "";
			
		}
		
		$mensagemVO->setImagem($imagem);
	
		$mensagemVO->settituloMensagem(urlencode($_POST['tituloMensagem']));
		
		$mensagemVO->setDescricao(urlencode($_POST['descricao']));

		$mensagemVO->setMes(urlencode($_POST['mes']));
		
		$mensagemBO->newMensagem($mensagemVO);
		
		$msg = "Mensagem do m&ecirc;s cadastrada com sucesso";
	
	} else {
		
		$msg = "Preencha os campos obrigat&oacute;rios";
		
	}
	
}

if(isset($_POST['editar']) && $_POST['editar'] == 'Editar') {
	
	if((!empty($_POST['tituloMensagem'])) && (!empty($_POST['descricao'])) && (!empty($_POST['mes']))) {
		
		if($_POST['idhash'] == md5($_POST['id'])) {
			
			if($_FILES["imagem"]['error'] == 0 && $_FILES["imagem"]['size'] > 0){
		
				$uploadBO->pasta     = "../upload";
			
				$uploadBO->nome      = $_FILES["imagem"]['name'];
			
				$uploadBO->tmp_name  = $_FILES["imagem"]['tmp_name'];
			
				$uploadBO->img_marca = "";
				
				$imagem = $uploadBO->uploadArquivo(TRUE);
				
			} else {
				
				$imagem = "";
				
			}
			
			$mensagemVO->setidMensagem($_POST['id']);
			
			if($imagem != "") {
				
				$mensagem = $mensagemBO->get($mensagemVO);
				
				if(!empty($mensagem["imagem"])){
					unlink("../upload/".$mensagem['imagem']);
				}
			}
	
			$mensagemVO->setImagem($imagem);
	
			$mensagemVO->settituloMensagem(urlencode($_POST['tituloMensagem']));
			
			$mensagemVO->setDescricao(urlencode($_POST['descricao']));

			$mensagemVO->setMes(urlencode($_POST['mes']));
		
			$mensagemBO->editMensagem($mensagemVO);
		
			$msg = "Dados editados com sucesso";
		
		} else {
			
			$msg = "Dados corrompidos";
			
		}
	
	} else {
	
		$msg = "Dados corrompidos";
	
	}
	
}

if(isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
	
	if($_GET['token'] == md5($_GET['id'])) {
		
		$mensagemVO->setidMensagem($_GET['id']);
		
		$mensagem = $mensagemBO->get($mensagemVO);
		
		if(!empty($mensagem["imagem"])){
			unlink("../upload/".$mensagem['imagem']);
		}

		$mensagemBO->deleteMensagem($mensagemVO);
		
		$msg = "Mensagem do m&ecirc;s exclu&iacute;da com sucesso";
		
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

$count = $mensagemBO->count();

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

$all = $mensagemBO->paginacao($inicio, $TAMANHO_PAGINA);

$areaAdmin = 'mensagem';
?>
<?php include('meta.php') ?>
<script language="javascript">
	function exclui(id,token){
		if(confirm("Tem certeza que deseja excluir essa mensagem?")) {

			window.location.href = "mensagem.php?acao=excluir&id="+id+"&token="+token;
			
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
                        <li><a href="mensagem_ins.php">Cadastrar mensagem</a></li>
                    </ul>
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">Mensagem</a></h2>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Mensagens cadastradas</h3>
                    	<?php if(count($all) > 0) { ?>
						<table cellpadding="0" cellspacing="0">
							<?php for($c = 0; $c < count($all); $c++) { ?>
                         	<tr <?php if($c%2 == 0){echo 'class="odd"';}?>>
                              	<td><?=urldecode($all[$c]['tituloMensagem'])?></td>
                              	<td class="action">
                              		<a href="mensagem_edt.php?i=<?=$all[$c]['idMensagem']?>&token=<?=md5($all[$c]['idMensagem'])?><?php if($_SESSION['autenticado_login'] == 'admin') { ?><?php } ?>" class="edit">Editar</a>
                               		<a href="javascript:void(0);" onclick="javascript:exclui('<?=$all[$c]['idMensagem']?>','<?=md5($all[$c]['idMensagem'])?>');" class="delete">Delete</a>
                             	</td>
                      		</tr>
                      		<?php } ?>
                     	</table>
                     	<?php } else { ?>
                     	<div class="warnZero">Nenhuma mensagem foi cadastrada ainda. Para adicionar uma clique <a href="mensagem_ins.php">aqui</a></div>
                     	<?php } ?>
                    </div>
                    <?php if($total_paginas > 1) { ?>
                    <div class="paginacao">
                    	<?php if($pagina > 1) { ?><span class="prev"><a href="palestras.php?page=<?=$pagina-1?>">&laquo; Anterior</a></span><?php } ?>
                    	<?php if($pagina < $total_paginas) { ?><span class="next"><a href="palestras.php?page=<?=$pagina+1?>">Próxima &raquo;</a></span><?php } ?>
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
