<?php
	
	class sobreBO {
		
		public $paginaAdmin;
		
		function editarTexto($sobreVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `sobre` SET";
			
			$query .= " `texto` = '".$sobreVO->getTexto()."'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function get() {
			
			$db = new DBMySQL();
				
			$query = "SELECT texto FROM `sobre`";
				
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