<?php
	
	class pessoasBO {
		
		public $paginaAdmin;

		function newPessoa($pessoasVO) {
			
			$db = new DBMySQL();
			
			$query = "INSERT INTO `pessoas` (`nome`,`telefone`, `cidade`, `estado`, `celular`, `email`, `funcao`, `cpf`,`crea`, `curriculum`, `endereco`) VALUES ";
			
			$query .= "('".$pessoasVO->getNome()."','".$pessoasVO->getTelefone()."','".$pessoasVO->getCidade()."','".$pessoasVO->getEstado()."','".$pessoasVO->getCelular()."','".$pessoasVO->getEmail()."','".$pessoasVO->getFuncao()."','".$pessoasVO->getCpf()."','".$pessoasVO->getCrea()."','".$pessoasVO->getCurriculum()."','".$pessoasVO->getEndereco()."');";
			
			$db->do_query($query);
			
			$db->close();			
			
		}
		
		function editPessoa($pessoasVO) {
			
			$db = new DBMySQL();
			
			$query = "UPDATE `pessoas` SET";
			
			$query .= " `nome` = '".$pessoasVO->getNome()."',";
			
			$query .= " `telefone` = '".$pessoasVO->getTelefone()."',";

			$query .="  `cidade` = '".$pessoasVO->getCidade()."',";

			$query .="  `estado` = '".$pessoasVO->getEstado()."',";

			$query .= " `celular` = '".$pessoasVO->getCelular()."',";

			$query .= " `email` = '".$pessoasVO->getEmail()."',";

			$query .="  `funcao` = '".$pessoasVO->getFuncao()."',";

			$query .= " `cpf` = '".$pessoasVO->getCpf()."',";

			$query .= " `crea` = '".$pessoasVO->getCrea()."',";

			$query .= " `curriculum` = '".$pessoasVO->getCurriculum()."',";

			$query .= " `endereco` = '".$pessoasVO->getEndereco()."'";
								
			$query .= " WHERE `id` = '".$pessoasVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();
			
		}
		
		function deletepessoa($pessoasVO) {
			
			$db = new DBMySQL();
			
			$query = "DELETE FROM `pessoas` WHERE `id` = '".$pessoasVO->getId()."'";
			
			$db->do_query($query);
			
			$db->close();		
			
		}
		
		function get($pessoasVO) {
			
			$db = new DBMySQL();
			
			if($pessoasVO->getId() != "") {
				
				$query = "SELECT * FROM `pessoas` WHERE `id` = '".$pessoasVO->getId()."'";
				
				$db->do_query($query);
				
				$result = $db->getRow();
				
				
			} else {
				
				$query = "SELECT * FROM `pessoas` ORDER BY `id` ASC";
				
				$db->do_query($query);
				
				$r = 0;
				
				while($row = $db->getRow()) {
					
					$result[$r] = $row;
					
					$r++;
					
				}
				
			}
			
			return $result;
			
		}

		function buscaPessoas($pessoasVO, $inicio, $TAMANHO_PAGINA, $palavra = ""){

			$db = new DBMySQL();

			if(!empty($palavra)){

				$query = "SELECT * FROM `pessoas` where `nome` LIKE '%".$palavra."%' LIMIT ".$inicio.", ".$TAMANHO_PAGINA."";
			}else{

				$query = "SELECT * FROM `pessoas` LIMIT ".$inicio.", ".$TAMANHO_PAGINA."";					
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

				$query = "SELECT * FROM `pessoas` where `cidade` LIKE '%".$palavra."%' LIMIT ".$inicio.", ".$TAMANHO_PAGINA."";
			}
			elseif($tipo=="Formacao"){

				$query = "SELECT * FROM `pessoas` where `funcao` LIKE '%".$palavra."%' LIMIT ".$inicio.", ".$TAMANHO_PAGINA."";
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
		
			$query = "SELECT * FROM `pessoas` ORDER BY `id` ASC";
		
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

				$query = "SELECT COUNT(`id`) AS 'total' FROM `pessoas` where `nome` LIKE '%".$palavra."%'";
			
			}else{

				$query = "SELECT COUNT(`id`) AS 'total' FROM `pessoas`";
					
			}

			$db->do_query($query);
			
			$result = $db->getRow();
			
			return $result;
			
		}
		
		function paginacao($inicio,$TAMANHO_PAGINA) {
			
			$db = new DBMySQL();
		
			$db->do_query("SELECT * FROM `pessoas`  ORDER BY `id` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
			
			$r = 0;
			
			while($row = $db->getRow()) {
				
				$result[$r] = $row;
				
				$r++;
				
			}
			
			return $result;
			
		}


		function countAll() {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT COUNT(`id`) AS 'total' FROM `pessoas` ");
				
			$result = $db->getRow();
				
			return $result;
				
		}
		
		function paginacaoAll($inicio,$TAMANHO_PAGINA) {
				
			$db = new DBMySQL();
				
			$db->do_query("SELECT * FROM `pessoas` ORDER BY `id` ASC LIMIT ".$inicio.",".$TAMANHO_PAGINA);
				
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