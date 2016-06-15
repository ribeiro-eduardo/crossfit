<?php
	
	class cursosBO {
		
		public $paginaAdmin;

		function newCurso($cursosVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `cursos` (`nome`,`descricao`,`dataInicio`,`dataFim`,`local`,`numVagas`,`obs`,`destaque`) VALUES ";
			
			$query .= "('".$cursosVO->getNome()."','".$cursosVO->getDescricao()."','".$cursosVO->getDataInicio()."','".$cursosVO->getDataFim()."','".$cursosVO->getLocal()."','".$cursosVO->getNumVagas()."','".$cursosVO->getObs()."','".$cursosVO->getDestaque()."');";
			
			$db->do_query($query);
			
			$db->close();			
			
		}
		
		function editCurso($cursosVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `cursos` SET";
			
			$query .= " `nome` = '".$cursosVO->getNome()."',";

			$query .= " `descricao` = '".$cursosVO->getDescricao()."',";

			$query .= " `dataInicio` = '".$cursosVO->getDataInicio()."',";

			$query .= " `dataFim` = '".$cursosVO->getDataFim()."',";
			
			$query .= " `local` = '".$cursosVO->getLocal()."',";

			$query .= " `numVagas` = '".$cursosVO->getNumVagas()."',";

			$query .= " `obs` = '".$cursosVO->getObs()."',";

			$query .= " `destaque` = '".$cursosVO->getDestaque()."'";
								
			$query .= " WHERE `id` = '".$cursosVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function deletecurso($cursosVO) {
			
			$db = new DBMySQL();
			
			$query = "DELETE FROM `cursos` WHERE `id` = '".$cursosVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();		
			
		}

		function alterarDestaque() {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `cursos` SET";
			
			$query .= " `destaque` = '0'";
			
			$query .= " WHERE `destaque` = '1'";
			
			$db->do_query($query);
			
			$db->close();
			
		}

		function getDestaque(){

			$db = new DBMySQL();

			$db->do_query("SELECT * FROM `cursos` WHERE `destaque` = 1");

			$result = $db->getRow();

			return $result;
		}
		
		function get($cursosVO) {
			
			$db = new DBMySQL();
			
			if($cursosVO->getId() != "") {
				
				$query = "SELECT * FROM `cursos` WHERE `id` = '".$cursosVO->getId()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `cursos` ORDER BY `id` ASC";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
			}
			
			return $result;
			
		}
		
		function getAll() {
				
			$db = new DBMySQL();
		
			$query = "SELECT * FROM `cursos` ORDER BY `id` ASC";
		
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
			
			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `cursos`");
			
			$result = $db->getRow();
			
			return $result;
			
		}
		
		function paginacao($inicio,$TAMANHO_PAGINA) {
			
			$db = new DBMySQL();
		
			$db->do_query("SELECT * FROM `cursos`  ORDER BY `id` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
			
			$r = 0;
			
			while($row = $db->getRow()) {
				
				$result[$r] = $row;
				
				$r++;
				
			}
			
			return $result;
			
		}
		
		function countAll() {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `cursos` ");
				
			$result = $db->getRow();
				
			return $result;
				
		}
		
		function paginacaoAll($inicio,$TAMANHO_PAGINA) {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT * FROM `cursos` ORDER BY `id` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
				
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