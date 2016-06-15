<?php
	
	class associadosBO {
		
		public $paginaAdmin;

		function newAssociado($associadosVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `associados` (`nome`,`cpf`, `crea`, `endereco`, `cidade`, `estado`, `login`, `senha`) VALUES ";
			
			$query .= "('".$associadosVO->getNome()."',

				'".$associadosVO->getCpf()."',

				'".$associadosVO->getCrea()."',

				'".$associadosVO->getEndereco()."',

				'".$associadosVO->getCidade()."',

				'".$associadosVO->getEstado()."',

				'".$associadosVO->getLogin()."',

				'".$associadosVO->getSenha()."');";
			
			$db->do_query($query);
			
			$db->close();			
			
		}
		
		function editAssociado($associadosVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `associados` SET";
			
			$query .= " `nome` = '".$associadosVO->getNome()."',";

			$query .= " `cpf` = '".$associadosVO->getCpf()."',";

			$query .= " `crea` = '".$associadosVO->getCrea()."',";
			
			$query .= " `endereco` = '".$associadosVO->getEndereco()."',";
			
			$query .="  `cidade` = '".$associadosVO->getCidade()."',";

			$query .="  `estado` = '".$associadosVO->getEstado()."',";

			if($associadosVO->getLogin() != "") {
			
				$query .= " `login` = '".$associadosVO->getLogin()."',";
			
			}

			if($associadosVO->getSenha() != "") {
			
				$query .= " `senha` = '".$associadosVO->getSenha()."'";
			
			}
								
			$query .= " WHERE `id` = '".$associadosVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function deleteAssociado($associadosVO) {
			
			$db = new DBMySQL();
			
			$query = "DELETE FROM `associados` WHERE `id` = '".$associadosVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();		
			
		}
		
		function get($associadosVO) {
			
			$db = new DBMySQL();
			
			if($associadosVO->getId() != "") {
				
				$query = "SELECT * FROM `associados` WHERE `id` = '".$associadosVO->getId()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `associados` ORDER BY `id` ASC";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
			}
			
			return $result;
			
		}

		function buscaAssociados($associadosVO, $inicio, $TAMANHO_PAGINA, $palavra = ""){

			$db = new DBMySQL();

			if(!empty($palavra)){

				$query = "SELECT * FROM `associados` where `nome` LIKE '%".$palavra."%' LIMIT ".$inicio.", ".$TAMANHO_PAGINA."";
			}else{

				$query = "SELECT * FROM `associados` LIMIT ".$inicio.", ".$TAMANHO_PAGINA."";					
			}
			
			$db->do_query($query);

			$r = 0;
			
			while($row = $db->getRow()) {
				
				$result[$r] = $row;
				
				$r++;
				
			}
		
			return $result;
		}
		
		function getAll() {
				
			$db = new DBMySQL();
		
			$query = "SELECT * FROM `associados` ORDER BY `id` ASC";
		
			$db->do_query($query);
		
			$r = 0;
		
			while($row = $db->getRow()) {
						
				$result[$r] = $row;
						
				$r++;
						
			}
				
			return $result;
				
		}
		
		function count($palavra="") {
			
			$db = new DBMySQL();
			
			if(!empty($palavra)){

				$query = "SELECT COUNT(`id`) AS 'total' FROM `associados` where `nome` LIKE '%".$palavra."%'";
			
			}else{

				$query = "SELECT COUNT(`id`) AS 'total' FROM `associados`";
					
			}

			$db->do_query($query);
			
			$result = $db->getRow();
			
			return $result;
			
		}
		
		function paginacao($inicio,$TAMANHO_PAGINA) {
			
			$db = new DBMySQL();
		
			$db->do_query("SELECT * FROM `associados`  ORDER BY `id` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
			
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