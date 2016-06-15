<?php
	
	class crossfitBO {
		
		public $paginaAdmin;
		
		function editarTexto($crossfitVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `crossfit` SET";
			
			$query .= " `texto` = '".$crossfitVO->getTexto()."'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function get() {
			
			$db = new DBMySQL();
				
			$query = "SELECT texto FROM `crossfit`";
				
			$db->do_query($query);
				
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