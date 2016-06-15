<?php
	
	class noticiasBO {
		
		public $paginaAdmin;

		function newNoticia($noticiasVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `noticias` (`titulo`,`texto`,`data`,`status`,`destaque`) VALUES ";
			
			$query .= "('".$noticiasVO->getTitulo()."','".$noticiasVO->getTexto()."','".implode("-",array_reverse(explode("/",$noticiasVO->getData())))."','".$noticiasVO->getStatus()."','".$noticiasVO->getDestaque()."');";
			
			$db->do_query($query);

			echo $query;
			
			$db->close();			
			
		}
		
		function editNoticia($noticiasVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `noticias` SET";
			
			$query .= " `titulo` = '".$noticiasVO->getTitulo()."',";
			
			$query .= " `texto` = '".$noticiasVO->getTexto()."',";
		
			//$query .= " `data` = '".implode("-",array_reverse(explode("/",$noticiasVO->getdata())))."',";
			
			$query .= " `status` = '".$noticiasVO->getStatus()."',";

			$query .= " `destaque` = '".$noticiasVO->getDestaque()."'";
			
			$query .= " WHERE `id` = '".$noticiasVO->getId()."'";
			
			$db->do_query($query);
			//echo $query;
			
			$db->close();
			
		}

		function alterarDestaque() {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `noticias` SET";
			
			$query .= " `destaque` = '0'";
			
			$query .= " WHERE `destaque` = '1'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function deleteNoticia($noticiasVO) {
			
			$db = new DBMySQL();
			
			$query = "DELETE FROM `noticias` WHERE `id` = '".$noticiasVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();		
			
		}
		
		function get($noticiasVO) {
			
			$db = new DBMySQL();
			if($this->paginaAdmin === FALSE){
				$whereStatus = "AND `status` = '1'";
				$whereStatusWhere = "WHERE `status` = '1'";
			}
			if($noticiasVO->getId() != "") {
				
				$query = "SELECT * FROM `noticias` WHERE `id` = '".$noticiasVO->getId()."' $whereStatus";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `noticias` $whereStatusWhere ORDER BY `data` DESC";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
			}
			
			return $result;
			
		}
		
		function getAll($noticiasVO) {
				
			$db = new DBMySQL();
				
			if($noticiasVO->getId() != "") {
		
				$query = "SELECT * FROM `noticias` WHERE `id` = '".$noticiasVO->getid()."'";
		
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
		
		function count() {
			
			$db = new DBMySQL();
			if($this->paginaAdmin === FALSE){
				$whereStatus = "WHERE `status` = '1'";
			}
			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `noticias` $whereStatus");
			
			$result = $db->getRow();
			
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
		
		function getNoticiaDestaque(){
			$db = new DBMySQL();

			$db->do_query("SELECT * FROM `noticias` WHERE `destaque`= 1 LIMIT 1");

			$result = $db->getRow();
				
			return $result;
		}

		function countAll() {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `noticias` WHERE `status` = 1");
				
			$result = $db->getRow();
				
			return $result;
				
		}
		
		function paginacaoAll($inicio,$TAMANHO_PAGINA) {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT * FROM `noticias` WHERE `status` = 1 ORDER BY `data` DESC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
				
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