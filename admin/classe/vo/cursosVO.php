<?php
	
	class cursosVO {
		
		private $id;
		private $nome;
		private $descricao;
		private $dataInicio;
		private $dataFim;
		private $local;
		private $numVagas;
		private $obs;
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
		public function getDescricao() 
		{
		  return $this->descricao;
		}
		
		public function setDescricao($value) 
		{
		  $this->descricao = $value;
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

		public function getNumVagas() 
		{
		  return $this->numVagas;
		}
		
		public function setNumVagas($value) 
		{
		  $this->numVagas = $value;
		}

		public function getObs() 
		{
		  return $this->obs;
		}
		
		public function setObs($value) 
		{
		  $this->obs = $value;
		}
		   
		public function getDestaque()
		{
			return $this->destaque;
		} 

		public function setDestaque($value)
		{
			$this->destaque=$value;
		}
		
	}


?>