<?php
	
	class treinosBO {
		
		public $paginaAdmin;

		function newTreino($treinosVO) {
			
			$db = new DBMySQL();

			$query = "INSERT INTO `treinos` (`id_tipo_treino`, `id_classe_treino`, `titulo`,`descricao`,`data`, `status`) VALUES ";
			
			$query .= "('".$treinosVO->getIdTipoTreino()."', '".$treinosVO->getIdClasseTreino()."','".$treinosVO->getTitulo()."','".$treinosVO->getDescricao()."','".$treinosVO->getData()."','".$treinosVO->getStatus()."');";

			$db->do_query($query);

			return $query;

			$db->close();			
			
		}
		
		function editTreino($treinosVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `treinos` SET";
			
			$query .= " `data` = '".$treinosVO->getData()."',";
			
			$query .= " `titulo` = '".$treinosVO->getTitulo()."',";

			$query .= " `descricao` = '".$treinosVO->getDescricao()."',";

			$query .= " `data` = '".$treinosVO->getData()."',";

			$query .= " `status` = '".$treinosVO->getStatus()."'";
								
			$query .= " WHERE `id` = '".$treinosVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function deleteTreino($treinosVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `treinos` SET `status` = 0 WHERE `id` = '".$treinosVO->getId()."'";
			
			$db->do_query($query);

			return $query;
			
			$db->close();		
			
		}
		
		function get($treinosVO) {
			
			$db = new DBMySQL();
			
			if($treinosVO->getId() != "") {
				
				$query = "SELECT * FROM `treinos` WHERE `id` = '".$treinosVO->getId()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `treinos` ORDER BY `id` ASC";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
			}
			
			return $result;
			
		}

		function buscaPorData($treinosVO) {
			
			$db = new DBMySQL();
			
			$query = "SELECT * from treinos WHERE `data` = '".$treinosVO->getData()."'";

			$db->do_query($query);

			$result = $db->getRow();
						
			return $result;
			
		}

		
		function getTreino($dia) {

			$db = new DBMySQL();

			$query = "SELECT * FROM `treinos` WHERE `data` = '".$dia."' ORDER BY `titulo` ";
			
							
			$db->do_query($query);
				
			$r = 0;
				
			while($row = $db->getRow()) {
						
				$result[$r] = $row;
					
				$r++;
					
			}

			return $result;

			
		}
		
		function getBenchmarks($treinosVO){

			$db = new DBMySQL();

			$query = "SELECT * FROM `treinos` WHERE `id_tipo_treino` = '".$treinosVO->getIdTipoTreino()."'";

			$db->do_query($query);

			$r = 0;

			while($row = $db->getRow()) {

				$result[$r] = $row;

				$r++;

			}

			return $result;
		}
		
		function count() {
			
			$db = new DBMySQL();
			
			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `treinos`");
			
			$result = $db->getRow();
			
			return $result;
			
		}
		
		function paginacao() {
			
			$db = new DBMySQL();
		
			$db->do_query("SELECT * FROM `treinos`  ORDER BY `id` ASC");
			
			$r = 0;
			
			while($row = $db->getRow()) {
				
				$result[$r] = $row;
				
				$r++;
				
			}
			
			return $result;
			
		}
		
		function countAll() {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `treinos` ");
				
			$result = $db->getRow();
				
			return $result;
				
		}
		
		function paginacaoAll($inicio,$TAMANHO_PAGINA) {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT * FROM `treinos` ORDER BY `id` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
				
			$r = 0;
				
			while($row = $db->getRow()) {
		
				$result[$r] = $row;
		
				$r++;
		
			}
				
			return $result;
				
		}

		function paginaAdmin($admin){
			if($admin == TRUE){
				$this->paginaAdmin = TRUE;
			}else{
				$this->paginaAdmin = FALSE;
			}
		}
		
	}


?>