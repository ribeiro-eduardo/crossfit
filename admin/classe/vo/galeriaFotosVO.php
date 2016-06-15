<?php

	class galeriaFotosVO {
		
		// Definições
		
		private $id;
		private $idGaleria;
		private $nome;
		
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
		
		public function getNome()
		{
		  return $this->nome;
		}
		
		public function setNome($value)
		{
		  $this->nome = $value;
		}

	}


?>