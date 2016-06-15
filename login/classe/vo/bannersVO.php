<?php
	
	class bannersVO {
		
		private $id;
		private $nome;
		private $imagem;
		private $link;
		    
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

		public function getImagem() 
		{
		  return $this->imagem;
		}
		
		public function setImagem($value) 
		{
		  $this->imagem = $value;
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