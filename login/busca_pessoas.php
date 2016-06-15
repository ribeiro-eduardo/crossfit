<?php
require_once 'classe/vo/pessoasVO.php';
require_once 'classe/bo/pessoasBO.php';

$pessoasVO = new pessoasVO();
$pessoasBO = new pessoasBO();


?>

		<div class="search-box">
			<div class="container">
				<form method="POST" action="pessoas.php?a=buscar">
							<input type="text" name="palavra" placeholder="Fa&ccedil;a sua busca" autofocus>
							<input type="submit" style="width:80px; height:22px" class="btn-y" value="Buscar">
				</form>
			</div>
		</div>

