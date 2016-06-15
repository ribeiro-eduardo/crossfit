<?php

	class galeriaFotosBO {

		function newImagem($galeriaFotosVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `galeria-fotos` (`idGaleria`,`descricao`,`imagem`,`destaque`) ";
			
			$query .= "VALUES (".$galeriaFotosVO->getIdGaleria().",'".$galeriaFotosVO->getDescricao()."','".$galeriaFotosVO->getImagem()."','".$galeriaFotosVO->getDestaque()."');";
			
			$db->do_query($query);
			
			$db->close();			
			
		}
		
		function updateImagem($galeriaFotosVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `galeria-fotos` SET ";
			
			$query .= "`descricao` = '".$galeriaFotosVO->getDescricao()."',";

			$query .= "`destaque` = '".$galeriaFotosVO->getDestaque()."'";
			
			$query .= " WHERE `id` = '".$galeriaFotosVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();			
			
		}
		
		function deleteImagem($id) {
			
			$db = new DBMySQL(); 
			
			$db->do_query("DELETE FROM `galeria-fotos` WHERE `id` = ".$id.";");
			
			$db->close();
			
		}

		function alterarDestaque() {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `galeria-fotos` SET";
			
			$query .= " `destaque` = '0'";
			
			$query .= " WHERE `destaque` = '1'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function get($galeriaFotosVO) {
			
			$db = new DBMySQL();
			
			$query = "SELECT * FROM `galeria-fotos` WHERE `idGaleria` = ".$galeriaFotosVO->getIdGaleria()."";
			
			$db->do_query($query);
			
			$c = 0;
			
			while($row = $db->getRow()) {
				
				$result[$c] = $row;
				
				$c++;
				
			}
			
			return $result;
			
		}
		
		
		
	}