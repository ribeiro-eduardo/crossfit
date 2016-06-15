<?php
	
	class linksVO {
		
		private $id;
		private $nome;
		private $texto;
		
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

		public function getTexto() 
		{
		  return $this->texto;
		}
		
		public function setTexto($value) 
		{
		  $this->texto = $value;
		}
		    	
	}


?>