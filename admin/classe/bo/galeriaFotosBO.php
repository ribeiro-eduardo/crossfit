<?php

	class galeriaFotosBO {

		function newImagem($galeriaFotosVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `galerias_fotos` (`id_galeria`,`nome`) ";
			
			$query .= "VALUES (".$galeriaFotosVO->getIdGaleria().",'".$galeriaFotosVO->getNome()."');";

			$db->do_query($query);

			return $query;
			
			$db->close();			
			
		}
		
		function deleteImagem($id) {
			
			$db = new DBMySQL(); 
			
			$db->do_query("DELETE FROM `galerias_fotos` WHERE `id` = ".$id.";");
			
			$db->close();
			
		}

		
		function get($galeriaFotosVO) {
			
			$db = new DBMySQL();
			
			$query = "SELECT * FROM `galerias_fotos` WHERE `id_galeria` = ".$galeriaFotosVO->getIdGaleria()."";
			
			$db->do_query($query);
			
			$c = 0;
			
			while($row = $db->getRow()) {
				
				$result[$c] = $row;
				
				$c++;
				
			}
			
			return $result;
			
		}
		
		
		
	}