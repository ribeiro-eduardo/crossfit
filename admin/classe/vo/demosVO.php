<?php
	
	class demosVO {
		
		private $id;
		private $titulo;
		private $link;
		
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

		public function getLink()
		{
		  return $this->link;
		}
		
		public function setLink($value)
		{
		  $this->link = $value;
		}
		    	
	}


?>