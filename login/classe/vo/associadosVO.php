<?php
	
	class associadosVO {
		
		private $id;
		private $nome;
		private $cpf;
		private $crea;
		private $endereco;
		private $cidade;
		private $estado;
		private $login;
		private $senha;
		

		public function getId() 
		{
		  return $this->id;
		}
		
		public function setId($value) 
		{
		  $this->id = $value;
		}    
		
		public function getNome() 
		{
		  return $this->nome;
		}
		
		public function setNome($value) 
		{
		  $this->nome = $value;
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
		
		public function getEndereco() 
		{
		  return $this->endereco;
		}
		
		public function setEndereco($value) 
		{
		  $this->endereco = $value;
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

		public function getLogin() 
		{
		  return $this->login;
		}
		
		public function setLogin($value) 
		{
		  $this->login = $value;
		}

		public function getSenha() 
		{
		  return $this->senha;
		}
		
		public function setSenha($value) 
		{
		  $this->senha = $value;
		}            

	}


?>