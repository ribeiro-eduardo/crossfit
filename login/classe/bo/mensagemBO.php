<?php
	
	class mensagemBO {
		
		public $paginaAdmin;

		function newMensagem($mensagemVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `mensagem` (`imagem`,`tituloMensagem`,`descricao`,`mes`) VALUES ";
			
			$query .= "('".$mensagemVO->getImagem()."','".$mensagemVO->gettituloMensagem()."','".$mensagemVO->getDescricao()."','".$mensagemVO->getMes()."')";
			
			$db->do_query($query);
			
			$db->close();			
			
		}
		
		function editMensagem($mensagemVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `mensagem` SET";
			
			if($mensagemVO->getImagem() != "") {
			
				$query .= " `imagem` = '".$mensagemVO->getImagem()."',";
			
			}
			
			$query .= " `tituloMensagem` = '".$mensagemVO->gettituloMensagem()."',";
			
			$query .= " `descricao` = '".$mensagemVO->getDescricao()."',";
			
			$query .= " `mes` = '".$mensagemVO->getMes()."'";

			$query .= " WHERE `idMensagem` = '".$mensagemVO->getidMensagem()."'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function deleteMensagem($mensagemVO) {
			
			$db = new DBMySQL();
			
			$query = "DELETE FROM `mensagem` WHERE `idMensagem` = '".$mensagemVO->getidMensagem()."'";
			
			$db->do_query($query);
			
			$db->close();		
			
		}
		
		function get($mensagemVO) {
			
			$db = new DBMySQL();
			
			if($mensagemVO->getidMensagem() != "") {
				
				$query = "SELECT * FROM `mensagem` WHERE `idMensagem` = '".$mensagemVO->getidMensagem()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `mensagem` ORDER BY `idMensagem` ASC";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
			}
			
			return $result;
			
		}

		function getMensagem() {
			
			$db = new DBMySQL();
				
				$db->do_query("SELECT * FROM `mensagem` ORDER BY `idMensagem` DESC LIMIT 1");
				
				$r = 0;
			
			while($row = $db->getRow()) {
				
				$result[$r] = $row;
				
				$r++;
				
			}
			
			return $result;
			
		}
		
		function getAll($mensagemVO) {
				
			$db = new DBMySQL();
				
			if($mensagemVO->getidMensagem() != "") {
		
				$query = "SELECT * FROM `mensagem` WHERE `idMensagem` = '".$mensagemVO->getidMensagem()."'";
		
				$db->do_query($query);
		
				$result = $db->getRow();
		
		
			} else {
		
				$query = "SELECT * FROM `mensagem` ORDER BY `idMensagem` DESC";
		
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
		
			$db->do_query("SELECT COUNT(`idMensagem`) AS 'total' FROM `mensagem` ");
			
			$result = $db->getRow();
			
			return $result;
			
		}
		
		function paginacao($inicio,$TAMANHO_PAGINA) {
			
			$db = new DBMySQL();
			
			$db->do_query("SELECT * FROM `mensagem` ORDER BY `idMensagem` DESC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
			
			$r = 0;
			
			while($row = $db->getRow()) {
				
				$result[$r] = $row;
				
				$r++;
				
			}
			
			return $result;
			
		}
		
		function countAll() {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT COUNT(`idMensagem`) AS 'total' FROM `mensagem`");
				
			$result = $db->getRow();
				
			return $result;
				
		}
		
		function paginacaoAll($inicio,$TAMANHO_PAGINA) {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT * FROM `mensagem` ORDER BY `idMensagem` DESC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
				
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