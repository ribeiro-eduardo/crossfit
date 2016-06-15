<?php

	class galeriasVO {
		
		// Definições
		
		private $id;
		private $nome;
		private $status;

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

		/**
		 * @param mixed $nome
		 */
		public function setNome($nome)
		{
			$this->nome = $nome;
		}

		public function getStatus()
		{
		  return $this->status;
		}
		
		public function setStatus($value)
		{
		  $this->status = $value;
		}
	}

	?>