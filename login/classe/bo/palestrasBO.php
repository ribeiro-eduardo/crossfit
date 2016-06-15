<?php
	
	class palestrasBO {
		
		public $paginaAdmin;

		function newPalestra($palestrasVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `palestras` (`tituloPalestra`,`textoPalestra`) VALUES ";
			
			$query .= "('".$palestrasVO->gettituloPalestra()."','".$palestrasVO->gettextoPalestra()."');";
			
			$db->do_query($query);
			
			$db->close();			
			
		}
		
		function editPalestra($palestrasVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `palestras` SET";
			
			$query .= " `tituloPalestra` = '".$palestrasVO->gettituloPalestra()."',";
			
			$query .= " `textoPalestra` = '".$palestrasVO->gettextoPalestra()."'";
								
			$query .= " WHERE `idPalestra` = '".$palestrasVO->getidPalestra()."'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function deletePalestra($palestrasVO) {
			
			$db = new DBMySQL();
			
			$query = "DELETE FROM `palestras` WHERE `idPalestra` = '".$palestrasVO->getidPalestra()."'";
			
			$db->do_query($query);
			
			$db->close();		
			
		}
		
		function get($palestrasVO) {
			
			$db = new DBMySQL();
			
			if($palestrasVO->getidPalestra() != "") {
				
				$query = "SELECT * FROM `palestras` WHERE `idPalestra` = '".$palestrasVO->getidPalestra()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `palestras` ORDER BY `idPalestra` ASC";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
			}
			
			return $result;
			
		}
		
		function getAll($palestrasVO) {
				
			$db = new DBMySQL();
				
			if($palestrasVO->getidPalestra() != "") {
		
				$query = "SELECT * FROM `palestras` WHERE `idPalestra` = '".$palestrasVO->getidPalestra()."'";
		
				$db->do_query($query);
		
				$result = $db->getRow();
		
		
			} else {
		
				$query = "SELECT * FROM `palestras` ORDER BY `idPalestra` ASC";
		
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
			
			$db->do_query("SELECT COUNT(`idPalestra`) AS 'total' FROM `palestras`");
			
			$result = $db->getRow();
			
			return $result;
			
		}
		
		function paginacao($inicio,$TAMANHO_PAGINA) {
			
			$db = new DBMySQL();
		
			$db->do_query("SELECT * FROM `palestras`  ORDER BY `idPalestra` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
			
			$r = 0;
			
			while($row = $db->getRow()) {
				
				$result[$r] = $row;
				
				$r++;
				
			}
			
			return $result;
			
		}

		function exibePalestra() {
			
			$db = new DBMySQL();
		
			$db->do_query("SELECT * FROM `palestras`  ORDER BY `idPalestra` DESC LIMIT 1");
			
			$r = 0;
			
			while($row = $db->getRow()) {
				
				$result[$r] = $row;
				
				$r++;
				
			}
			
			return $result;
			
		}
		
		function countAll() {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT COUNT(`idPalestra`) AS 'total' FROM `palestras` ");
				
			$result = $db->getRow();
				
			return $result;
				
		}
		
		function paginacaoAll($inicio,$TAMANHO_PAGINA) {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT * FROM `palestras` ORDER BY `idPalestra` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
				
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