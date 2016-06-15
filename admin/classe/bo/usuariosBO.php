<?php
	
	class usuariosBO {
		
		public $paginaAdmin;

		function newUsuario($usuariosVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `usuarios` (`nome`,`cpf`, `email`, `telefone`, `celular`, `login`, `senha`, `id_tipo_usuario`,`data_nascimento`, `altura`, `peso`, `data_cadastro`, `status`) VALUES ";

			$query .= "(
			'".$usuariosVO->getNome()."',
			'".$usuariosVO->getCpf()."',
			'".$usuariosVO->getEmail()."',
			'".$usuariosVO->getTelefone()."',
			'".$usuariosVO->getCelular()."',
			'".$usuariosVO->getLogin()."',
			'".$usuariosVO->getSenha()."',
			'".$usuariosVO->getId_tipo_usuario()."',
			'".$usuariosVO->getData_nascimento()."',
			'".$usuariosVO->getAltura()."',
			'".$usuariosVO->getPeso()."',
			'".$usuariosVO->getData_cadastro()."',
			'".$usuariosVO->getStatus()."');";
			
			$db->do_query($query);

			return $query;

			$db->close();
			
		}
		
		function editUsuario($usuariosVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `usuarios` SET";
			$query .= " `nome` = '".$usuariosVO->getNome()."',";
			$query .= " `cpf` = '".$usuariosVO->getCpf()."',";
			$query .= " `email` = '".$usuariosVO->getEmail()."',";
			$query .= " `telefone` = '".$usuariosVO->getTelefone()."',";
			$query .= " `celular` = '".$usuariosVO->getCelular()."',";
			$query .= " `login` = '".$usuariosVO->getLogin()."',";
			$query .= " `senha` = '".$usuariosVO->getSenha()."',";
			$query .= " `id_tipo_usuario` = '".$usuariosVO->getId_tipo_usuario()."',";
			$query .= " `data_nascimento` = '".$usuariosVO->getData_nascimento()."',";
			$query .= " `altura` = '".$usuariosVO->getAltura()."',";
			$query .= " `peso` = '".$usuariosVO->getPeso()."'";
			$query .= " WHERE `id` = '".$usuariosVO->getId()."'";
			
			$db->do_query($query);

			return $query;

			$db->close();
			
		}
		
		function deleteUsuario($usuariosVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `usuarios` SET `status` = 0  WHERE `id` = '".$usuariosVO->getId()."'";
			
			$db->do_query($query);

			return $query;

			$db->close();		
			
		}
		
		function get($usuariosVO) {
			
			$db = new DBMySQL();
			
			if($usuariosVO->getId() != "") {
				
				$query = "SELECT * FROM `usuarios` WHERE `id` = '".$usuariosVO->getId()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			}
			elseif($usuariosVO->getId_tipo_usuario() != ""){

				$query = "SELECT * FROM `usuarios` WHERE `id_tipo_usuario` = '".$usuariosVO->getId_tipo_usuario()."' AND `status` = 1";

				$db->do_query($query);

				$r = 0;

				while($row = $db->getRow()) {

					$result[$r] = $row;

					$r++;

				}
			}
			else {

				$query = "SELECT * FROM `usuarios` WHERE `status` = 1 ORDER BY `nome`";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
			}
			
			return $result;
			
		}

		function buscaPessoas($usuariosVO, $inicio, $TAMANHO_PAGINA, $palavra = ""){

			$db = new DBMySQL();

			if(!empty($palavra)){

				$query = "SELECT * FROM `usuarios` where `nome` LIKE '%".$palavra."%' LIMIT ".$inicio.", ".$TAMANHO_PAGINA."";
			}else{

				$query = "SELECT * FROM `usuarios` LIMIT ".$inicio.", ".$TAMANHO_PAGINA."";
			}
			
			$db->do_query($query);

			$r = 0;
			
			while($row = $db->getRow()) {
				
				$result[$r] = $row;
				
				$r++;
				
			}
		
			return $result;
		}

		function buscaPessoasSite($inicio, $TAMANHO_PAGINA, $tipo, $palavra){

			$db = new DBMySQL();

			if($tipo=="Cidade"){

				$query = "SELECT * FROM `usuarios` where `cidade` LIKE '%".$palavra."%' LIMIT ".$inicio.", ".$TAMANHO_PAGINA."";
			}
			elseif($tipo=="Formacao"){

				$query = "SELECT * FROM `usuarios` where `funcao` LIKE '%".$palavra."%' LIMIT ".$inicio.", ".$TAMANHO_PAGINA."";
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
		
			$query = "SELECT * FROM `usuarios` ORDER BY `id` ASC";
		
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

				$query = "SELECT COUNT(`id`) AS 'total' FROM `usuarios` where `nome` LIKE '%".$palavra."%'";
			
			}else{

				$query = "SELECT COUNT(`id`) AS 'total' FROM `usuarios`";
					
			}

			$db->do_query($query);
			
			$result = $db->getRow();
			
			return $result;
			
		}
		
		function paginacao($inicio,$TAMANHO_PAGINA) {
			
			$db = new DBMySQL();
		
			$db->do_query("SELECT * FROM `usuarios`  ORDER BY `id` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
			
			$r = 0;
			
			while($row = $db->getRow()) {
				
				$result[$r] = $row;
				
				$r++;
				
			}
			
			return $result;
			
		}


		function countAll() {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `usuarios` ");
				
			$result = $db->getRow();
				
			return $result;
				
		}
		
		function paginacaoAll($inicio,$TAMANHO_PAGINA) {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT * FROM `usuarios` ORDER BY `id` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
				
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