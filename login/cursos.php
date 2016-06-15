<?php
@session_start();
if($_SESSION["autenticado_painel"] != "SIM") {
	
	header("Location: index.php");
	
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');
require('classe/bo/uploadBO.php');
require_once 'classe/vo/cursosVO.php';
require_once 'classe/bo/cursosBO.php';

$util = new utilidadesBO();
$uploadBO = new uploadBO();
$cursosBO = new cursosBO();
$cursosVO = new cursosVO();

$msg = "";
$title = "Cadastrar";

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'Cadastrar') {
	
	if(!empty($_POST['nome']) && !empty($_POST['dataInicio']) && !empty($_POST['local']) && !empty($_POST['descricao'])) {
		
		$cursosVO->setNome(urlencode($_POST['nome']));
		
		$cursosVO->setDescricao(urlencode($_POST['descricao']));

		$cursosVO->setDataInicio(urlencode($_POST['dataInicio']));

		$cursosVO->setDataFim(urlencode($_POST['dataFim']));
		
		$cursosVO->setLocal(urlencode($_POST['local']));
		
		$cursosVO->setNumVagas(urlencode($_POST['numVagas']));

		$cursosVO->setObs(urlencode($_POST['obs']));

		$destaque = $_POST['destaque'];

		if($destaque=='1'){
			$cursosBO->alterarDestaque();
		}

		$cursosVO->setDestaque($destaque);

		
		$cursosBO->newCurso($cursosVO);
		
		$msg = "Curso cadastrado com sucesso";
	
	} else {
		
		$msg = "Preencha todos os campos";
		
	}
	
}

if(isset($_POST['editar']) && $_POST['editar'] == 'Editar') {
	
	if(!empty($_POST['nome']) && !empty($_POST['descricao'])) {
		
		if($_POST['idhash'] == md5($_POST['id'])) {
			
			$cursosVO->setId($_POST['id']);
	
			$cursosVO->setNome(urlencode($_POST['nome']));
			
			$cursosVO->setDescricao(urlencode($_POST['descricao']));
			
			$cursosVO->setDataInicio(urlencode($_POST['dataInicio']));

			$cursosVO->setDataFim(urlencode($_POST['dataFim']));
			
			$cursosVO->setLocal(urlencode($_POST['local']));

			$cursosVO->setNumVagas(urlencode($_POST['numVagas']));

			$cursosVO->setObs(urlencode($_POST['obs']));

			$destaque = $_POST['destaque'];

			if($destaque=='1'){
				$cursosBO->alterarDestaque();
			}

			$cursosVO->setDestaque($destaque);
		
			$cursosBO->editCurso($cursosVO);
		
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
		
		$cursosVO->setId($_GET['id']);

		$cursosBO->deleteCurso($cursosVO);
		
		$msg = "Curso exclu&iacute;do com sucesso";
		
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

//$count = $linksBO->count();

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

$all = $cursosBO->paginacao($inicio, $TAMANHO_PAGINA);

$areaAdmin = 'eventos';
?>
<?php include('meta.php') ?>
<script language="javascript">
	function exclui(id,token){
		if(confirm("Tem certeza que deseja excluir esse evento?")) {

			window.location.href = "cursos.php?acao=excluir&id="+id+"&token="+token;
			
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
                        <li><a href="cursos_ins.php">Cadastrar curso </a></li>
                    </ul>
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">Cursos</a></h2>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Cursos cadastrados <i>(&#10004; = curso em destaque)</i></h3>
                    	<?php if(count($all) > 0) { ?>
						<table cellpadding="0" cellspacing="0">
							<?php for($c = 0; $c < count($all); $c++) { ?>
                         	<tr <?php if($c%2 == 0){echo 'class="odd"';}?>>
                              	<td><?=urldecode($all[$c]['nome'])?></td>
                              	<?  if($all[$c]['destaque']==1){
                            		echo '<td> &#10004 </td>';
                        		} 
                        		else{
                        			echo '<td></td>';
                        		}
                        		?>
                              	<td class="action">
                              		<a href="cursos_edt.php?i=<?=$all[$c]['id']?>&token=<?=md5($all[$c]['id'])?><?php if($_SESSION['autenticado_login'] == 'admin') { ?>&cd=<?=$all[$c]['id']?><?php } ?>" class="edit">Editar</a>
                               		<a href="javascript:void(0);" onclick="javascript:exclui('<?=$all[$c]['id']?>','<?=md5($all[$c]['id'])?>');" class="delete">Delete</a>
                             	</td>
                      		</tr>
                      		<?php } ?>
                     	</table>
                     	<?php } else { ?>
                     	<div class="warnZero">Nenhum curso foi cadastrado ainda. Para adicionar um curso, clique <a href="cursos_ins.php">aqui</a></div>
                     	<?php } ?>
                    </div>
                    <?php if($total_paginas > 1) { ?>
                    <div class="paginacao">
                    	<?php if($pagina > 1) { ?><span class="prev"><a href="cursos.php?page=<?=$pagina-1?>">&laquo; Anterior</a></span><?php } ?>
                    	<?php if($pagina < $total_paginas) { ?><span class="next"><a href="cursos.php?page=<?=$pagina+1?>">Próxima &raquo;</a></span><?php } ?>
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