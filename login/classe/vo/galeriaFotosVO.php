<?php

	class galeriaFotosVO {
		
		// Definições
		
		private $id;
		private $idGaleria;
		private $descricao;
		private $imagem;
		private $destaque;
		
		// Métodos


		public function getId() 
		{
		  return $this->id;
		}
		
		public function setId($value) 
		{
		  $this->id = $value;
		}   

		public function getIdGaleria() 
		{
		  return $this->idGaleria;
		}
		
		public function setIdGaleria($value) 
		{
		  $this->idGaleria = $value;
		}   
		
		public function getDescricao() 
		{
		  return $this->descricao;
		}
		
		public function setDescricao($value) 
		{
		  $this->descricao = $value;
		}

		public function getImagem() 
		{
		  return $this->imagem;
		}
		
		public function setImagem($value) 
		{
		  $this->imagem = $value;
		}

		public function getDestaque() 
		{
		  return $this->destaque;
		}
		
		public function setDestaque($value) 
		{
		  $this->destaque = $value;
		}

	}


?>