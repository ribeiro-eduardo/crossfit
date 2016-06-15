<?php
	
	class linksBO {
		
		public $paginaAdmin;

		function newLink($linksVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `links` (`nome`,`texto`) VALUES ";
			
			$query .= "('".$linksVO->getNome()."','".$linksVO->getTexto()."');";
			
			$db->do_query($query);
			
			$db->close();			
			
		}
		
		function editLink($linksVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `links` SET";
			
			$query .= " `nome` = '".$linksVO->getNome()."',";

			$query .= " `texto` = '".$linksVO->getTexto()."'";
								
			$query .= " WHERE `id` = '".$linksVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function deleteLink($linksVO) {
			
			$db = new DBMySQL();
			
			$query = "DELETE FROM `links` WHERE `id` = '".$linksVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();		
			
		}
		
		function get($linksVO) {
			
			$db = new DBMySQL();
			
			if($linksVO->getId() != "") {
				
				$query = "SELECT * FROM `links` WHERE `id` = '".$linksVO->getId()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `links` ORDER BY `id` ASC";
				
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

			$query = "SELECT * FROM `links` ORDER BY `id` ASC";
				
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
			
			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `links`");
			
			$result = $db->getRow();
			
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