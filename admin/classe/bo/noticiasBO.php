<?php
	
	class noticiasBO {
		
		public $paginaAdmin;

		function newNoticia($noticiasVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `noticias` (`titulo`, `imagem`, `descricao`,`data`,`status`) VALUES ";
			
			$query .= "('".$noticiasVO->getTitulo()."', '".$noticiasVO->getImagem()."', '".$noticiasVO->getDescricao()."','".$noticiasVO->getData()."','".$noticiasVO->getStatus()."');";
			
			$db->do_query($query);

			return $query;
			
			$db->close();			
			
		}
		
		function editNoticia($noticiasVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `noticias` SET";
			
			$query .= " `titulo` = '".$noticiasVO->getTitulo()."',";

			if($noticiasVO->getImagem() != ""){
				$query .= " `imagem` = '".$noticiasVO->getImagem()."',";
			}
			
			$query .= " `descricao` = '".$noticiasVO->getDescricao()."'";

			$query .= " WHERE `id` = '".$noticiasVO->getId()."'";
			
			$db->do_query($query);

			return $query;
			
			$db->close();
			
		}
		
		function deleteNoticia($noticiasVO) {
			
			$db = new DBMySQL();
			
			$query = "DELETE FROM `noticias` WHERE `id` = '".$noticiasVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();

			return $query;
			
		}
		
		function get($noticiasVO) {
			
			$db = new DBMySQL();

			if($noticiasVO->getId() != "") {
				
				$query = "SELECT * FROM `noticias` WHERE `id` = '".$noticiasVO->getId()."' AND `status` = 1";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `noticias` WHERE `status` = 1 ORDER BY `data` DESC";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
			}
			
			return $result;
			
		}
		
		function paginacao($inicio,$TAMANHO_PAGINA) {
			
			$db = new DBMySQL();

			if($this->paginaAdmin === FALSE){
				$whereStatus = "WHERE `status` = '1'";
			}
			$db->do_query("SELECT * FROM `noticias` $whereStatus ORDER BY `id` DESC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
			
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