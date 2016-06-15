<?php
session_start();
if($_SESSION["autenticado_painel"] != "SIM"){
	header("Location: index.php");
}

require('lib/DBMySql.php');
require('classe/bo/utilidadesBO.php');

require_once 'classe/vo/atividadesVO.php';
require_once 'classe/bo/atividadesBO.php';
require 'classe/bo/uploadBO.php';

$atividadesVO = new atividadesVO();
$atividadesBO = new atividadesBO();
$uploadBO = new uploadBO();

$utilidadesBO = new utilidadesBO();

if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == 'Cadastrar') {

	
	if(!empty($_POST['data']) && !empty($_POST['horarioInicio']) && !empty($_POST['atividade'])) {
		
		$atividadesVO->setHorarioInicio(urlencode($_POST['horarioInicio']));

		$atividadesVO->setHorarioFim(urlencode($_POST['horarioFim']));

		$atividadesVO->setAtividade(urlencode($_POST['atividade']));

		$atividadesVO->setLink(urlencode($_POST['link']));

		
		$num = $_POST['numSemanas'];
		if(empty($num)){
			$atividadesVO->setData(urlencode($_POST['data']));
			$atividadesBO->newAtividade($atividadesVO);
		}
		else{
			$data = $_POST['data'];
			$d = strtotime($data);

			
			for($i=0;$i<$num;$i++){
				
				$atividadesVO->setData(date("Y-m-d", $d+86400*7*$i));						
				$atividadesBO->newAtividade($atividadesVO);
					
			}
		}
		

		$msg = "Atividade cadastrada com sucesso";
	
	} else {
		
		$msg = "Preencha todos os campos";
		
	}
	
}

if(isset($_POST['editar']) && $_POST['editar'] == 'Editar') {
	
	if(!empty($_POST['data']) && !empty($_POST['horarioInicio']) && !empty($_POST['atividade'])) {
		
		if($_POST['idhash'] == md5($_POST['id'])) {
			
			$atividadesVO->setId($_POST['id']);
	
			$atividadesVO->setData(urlencode($_POST['data']));
		
			$atividadesVO->setHorarioInicio(urlencode($_POST['horarioInicio']));

			$atividadesVO->setHorarioFim(urlencode($_POST['horarioFim']));

			$atividadesVO->setAtividade(urlencode($_POST['atividade']));

			$atividadesVO->setLink(urlencode($_POST['link']));
			
			$atividadesBO->editAtividade($atividadesVO);
		
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
		
		$atividadesVO->setId($_GET['id']);

		$atividadesBO->deleteAtividade($atividadesVO);
		
		$msg = "Atividade exclu&iacute;da com sucesso";
		
	} else {
		
		$msg = "Dados corrompidos";
		
	}
	
}

/*PAGINACAO
$count = $atividadesBO->count();

$TAMANHO_PAGINA = 20;

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

}*/

$all = $atividadesBO->paginacao();

$areaAdmin = 'atividades';
?>
<?php include('meta.php') ?>
<script language="javascript">
	function exclui(id,token){
		if(confirm("Tem certeza que deseja excluir essa atividade?")) {

			window.location.href = "atividades.php?acao=excluir&id="+id+"&token="+token;
			
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
                        <li><a href="atividades_ins.php">Cadastrar atividade </a></li>
                    </ul>
                </div>                
                <div id="conteudo">
                	<h2><a href="principal.php">Dashboard</a> &raquo; <a href="#" class="active">Atividades</a></h2>
                    <div id="main">
                    	<?php if($msg != "") { ?><div class="errMsg"><?=$msg?></div><?php } ?>
                    	<h3>Atividades cadastradas</h3>
                    	<?php if(count($all) > 0) { ?>
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td><b><u>Nome atividade</u></b></td>
								<td><b><u>Data</u></b></td>
								<td><b><u>Hora in&iacute;cio</u></b></td>
								<td></td>
								<td><b><u>Hora fim</u></b></td>
								<td></td>
							</tr>
							<?php for($c = 0; $c < count($all); $c++) { 
					
							?>
                         			<tr <?php if($c%2 == 0){echo 'class="odd"';}?>>

                              			<td><?=urldecode($all[$c]['atividade'])?></td>

                              			<td>
                              				<? 	
                              				$newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3/$2/$1",$all[$c]['data']);
                              				echo $newDate;
                              				?>
                              			</td>
                              	
                              			<td><?=urldecode($all[$c]['horarioInicio'])?></td>
                        				
                        			<?	$horariofim=urldecode($all[$c]['horarioFim']);
                        				if(!empty($horariofim)){ ?>
                              	
                              				<td>&agrave;s</td><td><?=$horariofim?></td>
                        
                        			<?  }
                        				else{ ?>
                        					<td></td><td align="center">-</td>
                     	     		<?	} ?>
                              			<td class="action">
                              				<a href="atividades_edt.php?i=<?=$all[$c]['id']?>&token=<?=md5($all[$c]['id'])?><?php if($_SESSION['autenticado_login'] == 'admin') { ?>&cd=<?=$all[$c]['id']?><?php } ?>" class="edit">Editar</a>
                               				<a href="javascript:void(0);" onclick="javascript:exclui('<?=$all[$c]['id']?>','<?=md5($all[$c]['id'])?>');" class="delete">Delete</a>
                             			</td>

                      				</tr>
                      		<?php } ?>
                     	</table>
                     	<?php } else { ?>
                     	<div class="warnZero">Nenhuma atividade cadastrada. Para adicionar uma atividade, clique <a href="atividades_ins.php">aqui</a></div>
                     	<?php } ?>
                    </div>
                    <?php if($total_paginas > 1) { ?>
                    <div class="paginacao">
                    	<?php if($pagina > 1) { ?><span class="prev"><a href="atividades.php?page=<?=$pagina-1?>">&laquo; Anterior</a></span><?php } ?>
                    	<?php if($pagina < $total_paginas) { ?><span class="next"><a href="atividades.php?page=<?=$pagina+1?>">Pr&oacute;xima &raquo;</a></span><?php } ?>
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
