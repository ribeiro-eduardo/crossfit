<?php

	class galeriasVO {
		
		// Definições
		
		private $id;
		private $nome;
		private $descricao;
		private $imagem;
		private $link;
		private $destaque;

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

		public function getDataInicio() 
		{
		  return $this->dataInicio;
		}
		
		public function setDataInicio($value) 
		{
		  $this->dataInicio = $value;
		}

		public function getDataFim() 
		{
		  return $this->dataFim;
		}
		
		public function setDataFim($value) 
		{
		  $this->dataFim = $value;
		}

		public function getLocal() 
		{
		  return $this->local;
		}
		
		public function setLocal($value) 
		{
		  $this->local = $value;
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