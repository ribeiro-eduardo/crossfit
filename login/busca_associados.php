<?php
require_once 'classe/vo/associadosVO.php';
require_once 'classe/bo/associadosBO.php';

$associadosVO = new associadosVO();
$associadosBO = new associadosBO();


?>

		<div class="search-box">
			<div class="container">
				<form method="POST" action="associados.php?a=buscar">
							<input type="text" name="palavra" placeholder="Fa&ccedil;a sua busca" autofocus>
							<input type="submit" style="width:80px; height:22px" class="btn-y" value="Buscar">
				</form>
			</div>
		</div>

