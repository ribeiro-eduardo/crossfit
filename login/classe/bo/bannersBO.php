<?php
	
	class bannersBO {
		
		public $paginaAdmin;

		function newBanner($bannersVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `banners` (`imagem`,`nome`, `link`) VALUES ";
			
			$query .= "('".$bannersVO->getImagem()."','".$bannersVO->getNome()."','".$bannersVO->getLink()."')";
			
			$db->do_query($query);
			
			$db->close();			
			
		}
		
		function editBanner($bannersVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `banners` SET";
			
			if($bannersVO->getImagem() != "") {
			
				$query .= " `imagem` = '".$bannersVO->getImagem()."',";
			
			}
			
			$query .= " `nome` = '".$bannersVO->getNome()."',";

			$query .= " `link` = '".$bannersVO->getLink()."'";
			
			$query .= " WHERE `id` = '".$bannersVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function deleteBanner($bannersVO) {
			
			$db = new DBMySQL();
			
			$query = "DELETE FROM `banners` WHERE `id` = '".$bannersVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();		
			
		}
		
		function get($bannersVO) {
			
			$db = new DBMySQL();
		
			if($bannersVO->getid() != "") {
				
				$query = "SELECT * FROM `banners` WHERE `id` = '".$bannersVO->getId()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `banners` ORDER BY `id` ASC";
				
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

			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `banners`");
			
			$result = $db->getRow();
			
			return $result;
			
		}
		
		function paginacao($inicio, $TAMANHO_PAGINA) {
			
			$db = new DBMySQL();
		
			$db->do_query("SELECT * FROM `banners` ORDER BY `id` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
			
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