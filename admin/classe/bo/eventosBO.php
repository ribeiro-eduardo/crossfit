<?php
	
	class eventosBO {
		
		public $paginaAdmin;

		function newEvento($eventosVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `eventos` (`nome`, `local`,`data`,`status`) VALUES ";
			
			$query .= "('".$eventosVO->getNome()."','".$eventosVO->getLocal()."','".$eventosVO->getData()."','".$eventosVO->getStatus()."');";
			
			$db->do_query($query);

			return $query;
			
			$db->close();			
			
		}
		
		function editEvento($eventosVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `eventos` SET";
			
			$query .= " `nome` = '".$eventosVO->getNome()."',";

			$query .= " `local` = '".$eventosVO->getLocal()."',";
			
			$query .= " `data` = '".$eventosVO->getData()."'";

			$query .= " WHERE `id` = '".$eventosVO->getId()."'";
			
			$db->do_query($query);

			return $query;
			
			$db->close();
			
		}
		
		function deleteEvento($eventosVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `eventos` SET `status` = 0 WHERE `id` = '".$eventosVO->getId()."'";
			
			$db->do_query($query);

			return $query;
			
			$db->close();		
			
		}

		
		function get($eventosVO) {
			
			$db = new DBMySQL();
			
			if($eventosVO->getId() != "") {
				
				$query = "SELECT * FROM `eventos` WHERE `id` = '".$eventosVO->getId()."' AND `status` = 1";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `eventos` WHERE `status` = 1  ORDER BY `id` ASC";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
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