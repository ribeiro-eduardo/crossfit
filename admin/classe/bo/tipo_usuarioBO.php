<?php
	
	class tipo_usuarioBO {
		
		public $paginaAdmin;
		
		function get() {
			
			$db = new DBMySQL();
				
			$query = "SELECT * FROM `tipo_usuario` ORDER BY `id` ASC";
				
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

			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `tipo_usuario`");

			$result = $db->getRow();

			return $result;

		}
		
	}


?>