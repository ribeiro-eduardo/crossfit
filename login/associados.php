<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/associadosVO.php';
require_once 'classe/bo/associadosBO.php';
require 'classe/bo/uploadBO.php';

$associadosVO = new associadosVO();
$associadosBO = new associadosBO();
$uploadBO = new uploadBO();

$utilidadesBO = new utilidadesBO();

$a = $_GET['a'];
if ($a == "buscar"){
	//echo 'entro';
	$palavra = urlencode(trim($_POST['palavra']));
	//echo $palavra;
}

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'Cadastrar') {
	
	if(!empty($_POST['nome']) && !empty($_POST['login']) && !empty($_POST['senha'])) {
		
		$associadosVO->setNome(urlencode($_POST['nome']));

		$associadosVO->setCpf(urlencode($_POST['cpf']));

		$associadosVO->setCrea(urlencode($_POST['crea']));

		$associadosVO->setEndereco(urlencode($_POST['endereco']));

		$associadosVO->setCidade(urlencode($_POST['cidade']));

		$associadosVO->setEstado(urlencode($_POST['estado']));

		$associadosVO->setLogin(urlencode($_POST['login']));

		$associadosVO->setSenha(urlencode($_POST['senha']));

		$associadosBO->newAssociado($associadosVO);
		
		$msg = "Associado cadastrado com sucesso";
	
	} else {
		
		$msg = "Preencha os campos nome, login e senha";
		
	}
	
}

if(isset($_POST['editar']) && $_POST['editar'] == 'Editar') {
	
	if(!empty($_POST['nome']) && !empty($_POST['login']) && !empty($_POST['senha'])) {
		
		if($_POST['idhash'] == md5($_POST['id'])) {
			
			$associadosVO->setId($_POST['id']);
	
			$associadosVO->setNome(urlencode($_POST['nome']));

			$associadosVO->setCpf(urlencode($_POST['cpf']));

			$associadosVO->setCrea(urlencode($_POST['crea']));

			$associadosVO->setEndereco(urlencode($_POST['endereco']));

			$associadosVO->setCidade(urlencode($_POST['cidade']));

			$associadosVO->setEstado(urlencode($_POST['estado']));

			$associadosVO->setLogin(urlencode($_POST['login']));

			$associadosVO->setSenha(urlencode($_POST['senha']));
			
			$associadosBO->editAssociado($associadosVO);
		
			$msg = "Dados editados com sucesso";
		
		} else {
			
			$msg = "Dados corrompidos";
			
		}
	
	} else {
	
		$msg = "Preencha os campos nome, login e senha";
	
	}
	
}

if(isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
	
	if($_GET['token'] == md5($_GET['id'])) {
		
		$associadosVO->setId($_GET['id']);

		$associadosBO->deleteAssociado($associadosVO);
		
		$msg = "Associado exclu&iacute;do com sucesso";
		
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

$count = $associadosBO->count($palavra);

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
$all = $associadosBO->buscaAssociados($associadosVO, $inicio, $TAMANHO_PAGINA,$palavra);
//print_r($all);
$areaAdmin = 'associados';
?>
<?php include('meta.php') ?>
<script language="javascript">
	function exclui(id,token){
		if(confirm("Tem certeza que deseja excluir esse associado?")) {

			window.location.href = "associados.php?acao=excluir&id="+id+"&token="+token;
			
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
                        <li><a href="associados_ins.php">Cadastrar associado </a></li>
                    </ul>
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">Associados</a></h2>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Associados cadastrados</h3>
                    	<h5>BUSCA POR NOMES</h5>
						<?php include('busca_associados.php'); ?>
                    	<?php if(count($all) > 0) { ?>
						<table cellpadding="0" cellspacing="0">
							<?php for($c = 0; $c < count($all); $c++) { ?>
                         	<tr <?php if($c%2 == 0){echo 'class="odd"';}?>>
                              	<td><?=urldecode($all[$c]['nome'])?></td>
                              	<td class="action">
                              		<a href="associados_edt.php?i=<?=$all[$c]['id']?>&token=<?=md5($all[$c]['id'])?><?php if($_SESSION['autenticado_login'] == 'admin') { ?>&cd=<?=$all[$c]['id']?><?php } ?>" class="edit">Editar</a>
                               		<a href="javascript:void(0);" onclick="javascript:exclui('<?=$all[$c]['id']?>','<?=md5($all[$c]['id'])?>');" class="delete">Delete</a>
                             	</td>
                      		</tr>
                      		<?php } ?>
                     	</table>
                     	<?php } else { ?>
                     	<div class="warnZero">Nenhum associado encontrado. Para adicionar um associado, clique <a href="associados_ins.php">aqui</a></div>
                     	<?php } ?>
                    </div>
                    <?php if($total_paginas > 1) { ?>
                    <div class="paginacao">
                    	<?php if($pagina > 1) { ?><span class="prev"><a href="associados.php?page=<?=$pagina-1?>">&laquo; Anterior</a></span><?php } ?>
                    	<?php if($pagina < $total_paginas) { ?><span class="next"><a href="associados.php?page=<?=$pagina+1?>">Pr&oacute;xima &raquo;</a></span><?php } ?>
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
