<?php

	class galeriasBO {
		
		
		function newGaleria($galeriasVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `galerias` (`nome`,`dataInicio`,`dataFim`,`local`,`imagem`,`link`,`destaque`) ";
			
			$query .= "VALUES ('".$galeriasVO->getNome()."','".$galeriasVO->getDataInicio()."','".$galeriasVO->getDataFim()."','".$galeriasVO->getLocal()."','".$galeriasVO->getImagem()."','".$galeriasVO->getLink()."','".$galeriasVO->getDestaque()."');";
			
			$db->do_query($query);
			
			$db->close();			
			
		}
		
		function editGaleria($galeriasVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `galerias` SET ";
			
			$query .= "`nome` = '".$galeriasVO->getNome()."',";

			$query .= " `dataInicio` = '".$galeriasVO->getDataInicio()."',";

			$query .= " `dataFim` = '".$galeriasVO->getDataFim()."',";

			$query .= " `local` = '".$galeriasVO->getLocal()."',";

			if($galeriasVO->getImagem() != "") {
			
				$query .= " `imagem` = '".$galeriasVO->getImagem()."',";
			
			}

			$query .= " `link` = '".$galeriasVO->getLink()."',";

			$query .= "`destaque` = '".$galeriasVO->getDestaque()."'";
			
			$query .= " WHERE `id` = '".$galeriasVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();			
			
		}
		
		function deleteGaleria($galeriasVO) {
			
			$db = new DBMySQL(); 
			
			$db->do_query("DELETE FROM `galerias` WHERE `id` = ".$galeriasVO->getId().";");
			
			$db->close();
			
		}


		function alterarDestaque() {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `galerias` SET";
			
			$query .= " `destaque` = '0'";
			
			$query .= " WHERE `destaque` = '1'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function get($galeriasVO) {
			
			$db = new DBMySQL();
			
			if($galeriasVO->getId() != "") {
				
				$query = "SELECT * FROM `galerias` WHERE `id` = '".$galeriasVO->getId()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `galerias` ORDER BY `id` ASC";
				
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
		
			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `galerias`");
		
			$result = $db->getRow();
		
			return $result;
		
		}	

		function getDestaque(){

			$db = new DBMySQL();

			$db->do_query("SELECT * FROM `galerias` WHERE `destaque` = 1");

			$result = $db->getRow();

			return $result;

		}	
		
		function paginacaoGaleriasAdmin($inicio,$TAMANHO_PAGINA) {
		
			$db = new DBMySQL();
		
			$db->do_query("SELECT * FROM `galerias` ORDER BY `nome` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
		
			$r = 0;
		
			while($row = $db->getRow()) {
		
				$result[$r] = $row;
		
				$r++;
		
			}
		
			return $result;
		
		}

		function paginacao($inicio,$TAMANHO_PAGINA) {
		
			$db = new DBMySQL();
		
			$db->do_query("SELECT * FROM `galerias` ORDER BY `id` DESC LIMIT ".$TAMANHO_PAGINA);
		
			$r = 0;
		
			while($row = $db->getRow()) {
		
				$result[$r] = $row;
		
				$r++;
		
			}
		
			return $result;
		
		}

	}

?>