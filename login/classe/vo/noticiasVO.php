<?php
	
	class noticiasVO {
		
		private $id;
		private $titulo;
		private $texto;
		private $data;
		private $status;
		private $destaque;
		
		public function getId() 
		{
		  return $this->id;
		}
		
		public function setId($value) 
		{
		  $this->id = $value;
		}

		public function getTitulo() 
		{
		  return $this->titulo;
		}
		
		public function setTitulo($value) 
		{
		  $this->titulo = $value;
		}    

		public function getTexto() 
		{
			return $this->texto;
		}
				
		public function setTexto($value) 
		{
			$this->texto = $value;
		}

		public function getData() 
		{
		  return $this->data;
		}
		
		public function setData($value) 
		{
		  $this->data = $value;
		}
		    
		public function getStatus() 
		{
		  return $this->status;
		}
		
		public function setStatus($value) 
		{
		  $this->status = $value;
		}

		public function getDestaque() 
		{
		  return $this->status;
		}
		
		public function setDestaque($value) 
		{
		  $this->destaque = $value;
		}
		    
		
		    
		
		    
		    
		
		
	}


?>