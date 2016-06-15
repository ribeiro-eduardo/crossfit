<?php
	
	class servicosBO {
		
		public $paginaAdmin;
		
		function editServico($servicosVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `servicos` SET";
			
			$query .= " `texto` = '".$servicosVO->getTexto()."'";
								
			$query .= " WHERE `id` = '".$servicosVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		
		function get($servicosVO) {
			
			$db = new DBMySQL();
			
			if($servicosVO->getId() != "") {
				
				$query = "SELECT * FROM `servicos` WHERE `id` = '".$servicosVO->getId()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `servicos` ORDER BY `id` ASC";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
			}
			
			return $result;
			
		}

		function getAdmin(){

			$db = new DBMySQL();

			$query = "SELECT * FROM `servicos` ORDER BY `id` ASC";
				
			$db->do_query($query);
				
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