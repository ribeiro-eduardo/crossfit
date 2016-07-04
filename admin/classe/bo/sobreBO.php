<?php
	
	class sobreBO {
		
		public $paginaAdmin;
		
		function editarTexto($sobreVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `sobre` SET";
			
			$query .= " `texto` = '".$sobreVO->getTexto()."',";

			$query .= " `id_usuario` = '".$sobreVO->getIdUsuario()."'";

			$query .= " WHERE `id_modulo` = '".$sobreVO->getIdModulo()."'";
			
			$db->do_query($query);

			return $query;
			
			$db->close();
			
		}
		
		function get($idModulo) {
			
			$db = new DBMySQL();
				
			$query = "SELECT * FROM `sobre` WHERE `id_modulo` = $idModulo";
				
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