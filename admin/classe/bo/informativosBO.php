<?php
	
	class informativosBO {
		
		public $paginaAdmin;

		function newInformativo($informativosVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `informativos` (`idInformativo`, `descricao`, `arquivo`) VALUES ";
			
			$query .= "('".$informativosVO->getidInformativo()."','".$informativosVO->getDescricao()."','".$informativosVO->getArquivo()."');";
			
			$db->do_query($query);
			
			$db->close();			
			
		}
		
		function editInformativo($informativosVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `informativos` SET";

			$query .= " `descricao` = '".$informativosVO->getDescricao()."',";
			
			$query .= " `arquivo` = '".$informativosVO->getArquivo()."'";

			$query .= " WHERE `idInformativo` = '".$informativosVO->getidInformativo()."'";
						
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function deleteInformativo($informativosVO) {
			
			$db = new DBMySQL();
			
			$query = "DELETE FROM `informativos` WHERE `idInformativo` = '".$informativosVO->getidInformativo()."'";
			
			$db->do_query($query);
			
			$db->close();		
			
		}
		
		function get($informativosVO) {
			
			$db = new DBMySQL();
			
			if($informativosVO->getidInformativo() != "") {
				
				$query = "SELECT * FROM `informativos` WHERE `idInformativo` = '".$informativosVO->getidInformativo()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `informativos` ORDER BY `idInformativo` ASC";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
			}
			
			return $result;
			
		}
		
		function getAll($informativosVO) {
				
			$db = new DBMySQL();
		
			$query = "SELECT * FROM `informativos` ORDER BY `idInformativo` DESC";
		
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

			$db->do_query("SELECT COUNT(`idInformativo`) AS 'total' FROM `informativos`");
			
			$result = $db->getRow();
			
			return $result;
			
		}
		
		function paginacao($inicio,$TAMANHO_PAGINA) {
			
			$db = new DBMySQL();
			
			$db->do_query("SELECT * FROM `informativos` ORDER BY `idInformativo` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
			
			$r = 0;
			
			while($row = $db->getRow()) {
				
				$result[$r] = $row;
				
				$r++;
				
			}
			
			return $result;
			
		}
		
		function countAll() {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT COUNT(`idInformativo`) AS 'total' FROM `informativos` ");
				
			$result = $db->getRow();
				
			return $result;
				
		}
		
		function paginacaoAll($inicio,$TAMANHO_PAGINA) {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT * FROM `informativos` ORDER BY `idInformativo` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
				
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