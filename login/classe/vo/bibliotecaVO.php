<?php
	
	class bibliotecaVO {
		
		private $id;
		private $titulo;
		private $autor;


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

		public function getAutor() 
		{
		  return $this->autor;
		}
		
		public function setAutor($value) 
		{
		  $this->autor = $value;
		}
		    
		
	}


?>