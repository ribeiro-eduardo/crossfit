<?php
	
	class reuniaoVO {
		
		private $id;
		private $nome;
		private $data;
		private $horario;
		private $local;

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

		public function getData() 
		{
		  return $this->data;
		}
		
		public function setData($value) 
		{
		  $this->data = $value;
		}
		
		public function getHorario() 
		{
		  return $this->horario;
		}
		
		public function setHorario($value) 
		{
		  $this->horario = $value;
		}

		public function getLocal() 
		{
		  return $this->local;
		}
		
		public function setLocal($value) 
		{
		  $this->local = $value;
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