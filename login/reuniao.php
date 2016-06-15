<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
	
	header("Location: index.php");
	
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');
require('classe/bo/uploadBO.php');
require_once 'classe/vo/reuniaoVO.php';
require_once 'classe/bo/reuniaoBO.php';

$util = new utilidadesBO();
$uploadBO = new uploadBO();
$reuniaoBO = new reuniaoBO();
$reuniaoVO = new reuniaoVO();

$msg = "";
$title = "Cadastrar";

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'Cadastrar') {
	
	if(!empty($_POST['nome']) && !empty($_POST['data']) && !empty($_POST['local']) && !empty($_POST['horario']) && !empty($_POST['endereco'])) {
		
		$reuniaoVO->setNome(urlencode($_POST['nome']));
		
		$reuniaoVO->setHorario(urlencode($_POST['horario']));

		$reuniaoVO->setData(urlencode($_POST['data']));
		
		$reuniaoVO->setLocal(urlencode($_POST['local']));

		$reuniaoVO->setEndereco(urlencode($_POST['endereco']));

		$reuniaoBO->newReuniao($reuniaoVO);
		
		$msg = "Reuni&atilde;o cadastrada com sucesso";
	
	} else {
		
		$msg = "Preencha todos os campos";
		
	}
	
}

if(isset($_POST['editar']) && $_POST['editar'] == 'Editar') {
	
	if(!empty($_POST['nome']) && !empty($_POST['data']) && !empty($_POST['local']) && !empty($_POST['horario']) && !empty($_POST['endereco'])) {
		
		if($_POST['idhash'] == md5($_POST['id'])) {
			
			$reuniaoVO->setId($_POST['id']);
	
			$reuniaoVO->setNome(urlencode($_POST['nome']));
			
			$reuniaoVO->setHorario(urlencode($_POST['horario']));

			$reuniaoVO->setData(urlencode($_POST['data']));

			$reuniaoVO->setLocal(urlencode($_POST['local']));
			
			$reuniaoVO->setEndereco(urlencode($_POST['endereco']));
			
			$reuniaoBO->editReuniao($reuniaoVO);

			$reuniaoVO = new reuniaoVO();
		
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
		
		$reuniaoVO->setId($_GET['id']);

		$reuniaoBO->deleteReuniao($reuniaoVO);
		
		$msg = "Reuniao exclu&iacute;da com sucesso";
		
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

//$count = $linksBO->count();

$inicio = 0;
$TAMANHO_PAGINA = 10;

$all = $reuniaoBO->get($reuniaoVO);
//print_r($all);
$areaAdmin = 'reuniao';
?>
<?php include('meta.php') ?>
<script language="javascript">
	function exclui(id,token){
		if(confirm("Tem certeza que deseja excluir essa reuniao?")) {

			window.location.href = "reuniao.php?acao=excluir&id="+id+"&token="+token;
			
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
                        <li><a href="reuniao_ins.php">Cadastrar reuni&atilde;o </a></li>
                    </ul>
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">Reuni&atilde;o</a></h2>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Reuni&otilde;es cadastradas</h3>
                    	<?php if(count($all) > 0) { ?>
						<table cellpadding="0" cellspacing="0">
							<?php for($c=0; $c<count($all);$c++) { ?>
                         	<tr <?php if($c%2 == 0){echo 'class="odd"';}?>>
                              	<td><?=urldecode($all[$c]['nome'])?></td>
                              	<td class="action">
                              		<a href="reuniao_edt.php?i=<?=$all[$c]['id']?>&token=<?=md5($all[$c]['id'])?><?php if($_SESSION['autenticado_login'] == 'admin') { ?>&cd=<?=$all[$c]['id']?><?php } ?>" class="edit">Editar</a>
                               		<a href="javascript:void(0);" onclick="javascript:exclui('<?=$all[$c]['id']?>','<?=md5($all[$c]['id'])?>');" class="delete">Delete</a>
                             	</td>
                      		</tr>
                      		<?php } ?>
                     	</table>
                     	<?php } else { ?>
                     	<div class="warnZero">Nenhuma reuni&atilde;o foi cadastrada ainda. Para adicionar uma reuni&atilde;o, clique <a href="reuniao_ins.php">aqui</a></div>
                     	<?php } ?>
                    </div>
                    <?php if($total_paginas > 1) { ?>
                    <div class="paginacao">
                    	<?php if($pagina > 1) { ?><span class="prev"><a href="reuniao.php?page=<?=$pagina-1?>">&laquo; Anterior</a></span><?php } ?>
                    	<?php if($pagina < $total_paginas) { ?><span class="next"><a href="reuniao.php?page=<?=$pagina+1?>">Próxima &raquo;</a></span><?php } ?>
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
