<?php
	
	class pessoasVO {
		
		private $id;
		private $nome;
		private $telefone;
		private $cidade;
		private $celular;
		private $email;
		private $funcao;
		private $cpf;
		private $crea;
		private $curriculum;
		private $endereco;


		public function getId() 
		{
		  return $this->id;
		}
		
		public function setId($value) 
		{
		  $this->id = $value;
		}    
		
		public function getnome() 
		{
		  return $this->nome;
		}
		
		public function setnome($value) 
		{
		  $this->nome = $value;
		}
		
		public function getTelefone() 
		{
		  return $this->telefone;
		}
		
		public function setTelefone($value) 
		{
		  $this->telefone = $value;
		}

		public function getCidade() 
		{
		  return $this->cidade;
		}
		
		public function setCidade($value) 
		{
		  $this->cidade = $value;
		}

		public function getEstado() 
		{
		  return $this->estado;
		}
		
		public function setEstado($value) 
		{
		  $this->estado = $value;
		}

		public function getCelular() 
		{
		  return $this->celular;
		}
		
		public function setCelular($value) 
		{
		  $this->celular = $value;
		}        
		
		public function getEmail() 
		{
		  return $this->email;
		}
		
		public function setEmail($value) 
		{
		  $this->email = $value;
		}

		public function getFuncao() 
		{
		  return $this->funcao;
		}
		
		public function setFuncao($value) 
		{
		  $this->funcao = $value;
		}             
	
		public function getCpf() 
		{
		  return $this->cpf;
		}
		
		public function setCpf($value) 
		{
		  $this->cpf = $value;
		}

		public function getCrea() 
		{
		  return $this->crea;
		}
		
		public function setCrea($value) 
		{
		  $this->crea = $value;
		}

		public function getCurriculum() 
		{
		  return $this->curriculum;
		}
		
		public function setCurriculum($value) 
		{
		  $this->curriculum = $value;
		}

		public function getEndereco() 
		{
		  return $this->endereco;
		}
		
		public function setEndereco($value) 
		{
		  $this->endereco = $value;
		}                     

	}


?>