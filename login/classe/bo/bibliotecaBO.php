<?php
	
	class bibliotecaBO {
		
		public $paginaAdmin;

		function newObra($bibliotecaVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `biblioteca` (`titulo`,`autor`) VALUES ";
			
			$query .= "('".$bibliotecaVO->getTitulo()."','".$bibliotecaVO->getAutor()."');";
			
			$db->do_query($query);
			
			$db->close();			
			
		}
		
		function editObra($bibliotecaVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `biblioteca` SET";
			
			$query .= " `titulo` = '".$bibliotecaVO->getTitulo()."',";
			
			$query .= " `autor` = '".$bibliotecaVO->getAutor()."'";
								
			$query .= " WHERE `id` = '".$bibliotecaVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function deleteObra($bibliotecaVO) {
			
			$db = new DBMySQL();
			
			$query = "DELETE FROM `biblioteca` WHERE `id` = '".$bibliotecaVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();		
			
		}
		
		function get($bibliotecaVO) {
			
			$db = new DBMySQL();
			
			if($bibliotecaVO->getId() != "") {
				
				$query = "SELECT * FROM `biblioteca` WHERE `id` = '".$bibliotecaVO->getId()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `biblioteca` ORDER BY `id` ASC";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
			}
			
			return $result;
			
		}
		
		function getAll($bibliotecaVO) {
				
			$db = new DBMySQL();
				
			if($bibliotecaVO->getId() != "") {
		
				$query = "SELECT * FROM `biblioteca` WHERE `id` = '".$bibliotecaVO->getId()."'";
		
				$db->do_query($query);
		
				$result = $db->getRow();
		
		
			} else {
		
				$query = "SELECT * FROM `biblioteca` ORDER BY `id` ASC";
		
				$db->do_query($query);
		
				$r = 0;
		
				while($row = $db->getRow()) {
						
					$result[$r] = $row;
						
					$r++;
						
				}
		
			}
				
			return $result;
				
		}
		
		function count() {
			
			$db = new DBMySQL();
			
			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `biblioteca`");
			
			$result = $db->getRow();
			
			return $result;
			
		}
		
		function paginacao($inicio,$TAMANHO_PAGINA) {
			
			$db = new DBMySQL();
		
			$db->do_query("SELECT * FROM `biblioteca`  ORDER BY `id` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
			
			$r = 0;
			
			while($row = $db->getRow()) {
				
				$result[$r] = $row;
				
				$r++;
				
			}
			
			return $result;
			
		}

		function paginacaoSite() {
			
			$db = new DBMySQL();
		
			$db->do_query("SELECT * FROM `biblioteca`  ORDER BY `titulo` ASC");
			
			$r = 0;
			
			while($row = $db->getRow()) {
				
				$result[$r] = $row;
				
				$r++;
				
			}
			
			return $result;
			
		}
		
		function countAll() {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `biblioteca` ");
				
			$result = $db->getRow();
				
			return $result;
				
		}
		
		function paginacaoAll() {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT * FROM `biblioteca` ORDER BY `titulo` ASC");
				
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