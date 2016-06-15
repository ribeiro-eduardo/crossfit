<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/pessoasVO.php';
require_once 'classe/bo/pessoasBO.php';
require 'classe/bo/uploadBO.php';

$pessoasVO = new pessoasVO();
$pessoasBO = new pessoasBO();
$uploadBO = new uploadBO();

$utilidadesBO = new utilidadesBO();

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'Cadastrar') {
	
	if(!empty($_POST['nome']) && !empty($_POST['cidade']) && !empty($_POST['funcao'])) {
		
		$pessoasVO->setNome(urlencode($_POST['nome']));
		
		$pessoasVO->setTelefone(urlencode($_POST['telefone']));

		$pessoasVO->setCidade(urlencode($_POST['cidade']));

		$pessoasVO->setEstado(urlencode($_POST['estado']));

		$pessoasVO->setCelular(urlencode($_POST['celular']));

		$pessoasVO->setEmail(urlencode($_POST['email']));

		$pessoasVO->setFuncao(urlencode($_POST['funcao']));

		$pessoasVO->setCpf(urlencode($_POST['cpf']));

		$pessoasVO->setCurriculum(urlencode($_POST['curriculum']));

		$pessoasVO->setEndereco(urlencode($_POST['endereco']));

		$pessoasBO->newPessoa($pessoasVO);
		
		$msg = "Pessoa cadastrada com sucesso";
	
	} else {
		
		$msg = "Preencha os campos nome e telefone";
		
	}
	
}

if(isset($_POST['editar']) && $_POST['editar'] == 'Editar') {
	
	if(!empty($_POST['nome']) && !empty($_POST['cidade']) && !empty($_POST['funcao'])) {
		
		if($_POST['idhash'] == md5($_POST['id'])) {
			
			$pessoasVO->setId($_POST['id']);
	
			$pessoasVO->setNome(urlencode($_POST['nome']));
			
			$pessoasVO->setTelefone(urlencode($_POST['telefone']));

			$pessoasVO->setCidade(urlencode($_POST['cidade']));

			$pessoasVO->setEstado(urlencode($_POST['estado']));

			$pessoasVO->setCelular(urlencode($_POST['celular']));

			$pessoasVO->setEmail(urlencode($_POST['email']));

			$pessoasVO->setFuncao(urlencode($_POST['funcao']));

			$pessoasVO->setCpf(urlencode($_POST['cpf']));

			$pessoasVO->setCurriculum(urlencode($_POST['curriculum']));

			$pessoasVO->setEndereco(urlencode($_POST['endereco']));
			
			$pessoasBO->editPessoa($pessoasVO);
		
			$msg = "Dados editados com sucesso";
		
		} else {
			
			$msg = "Dados corrompidos";
			
		}
	
	} else {
	
		$msg = "Preencha os campos nome e telefone";
	
	}
	
}

if(isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
	
	if($_GET['token'] == md5($_GET['id'])) {
		
		$pessoasVO->setId($_GET['id']);

		$pessoasBO->deletePessoa($pessoasVO);
		
		$msg = "Pessoa exclu&iacute;da com sucesso";
		
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

$count = $pessoasBO->count();

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

$all = $pessoasBO->paginacao($inicio, $TAMANHO_PAGINA);

$areaAdmin = 'pessoas';
?>
<?php include('meta.php') ?>
<script language="javascript">
	function exclui(id,token){
		if(confirm("Tem certeza que deseja excluir essa pessoa?")) {

			window.location.href = "pessoas.php?acao=excluir&id="+id+"&token="+token;
			
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
                        <li><a href="pessoas_ins.php">Cadastrar pessoa </a></li>
                    </ul>
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">Pessoas</a></h2><form action="pessoas.php"><input type="text" name="busca" style="width: 150px;" placeholder="Pesquisa por nome"> <input type="submit" name="buscar" value="Buscar"></form>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Pessoas cadastradas</h3>
                    	<?php if(count($all) > 0) { ?>
						<table cellpadding="0" cellspacing="0">
							<?php for($c = 0; $c < count($all); $c++) { ?>
                         	<tr <?php if($c%2 == 0){echo 'class="odd"';}?>>
                              	<td><?=urldecode($all[$c]['nome'])?></td>
                              	<td class="action">
                              		<a href="pessoas_edt.php?i=<?=$all[$c]['id']?>&token=<?=md5($all[$c]['id'])?><?php if($_SESSION['autenticado_login'] == 'admin') { ?>&cd=<?=$all[$c]['id']?><?php } ?>" class="edit">Editar</a>
                               		<a href="javascript:void(0);" onclick="javascript:exclui('<?=$all[$c]['id']?>','<?=md5($all[$c]['id'])?>');" class="delete">Delete</a>
                             	</td>
                      		</tr>
                      		<?php } ?>
                     	</table>
                     	<?php } else { ?>
                     	<div class="warnZero">Nenhuma pessoa foi cadastrada ainda. Para adicionar uma pessoa, clique <a href="pessoas_ins.php">aqui</a></div>
                     	<?php } ?>
                    </div>
                    <?php if($total_paginas > 1) { ?>
                    <div class="paginacao">
                    	<?php if($pagina > 1) { ?><span class="prev"><a href="pessoas.php?page=<?=$pagina-1?>">&laquo; Anterior</a></span><?php } ?>
                    	<?php if($pagina < $total_paginas) { ?><span class="next"><a href="pessoas.php?page=<?=$pagina+1?>">Próxima &raquo;</a></span><?php } ?>
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
