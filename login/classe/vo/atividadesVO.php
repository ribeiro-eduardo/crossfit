<?php
	
	class atividadesVO {
		
		private $id;
		private $data;
		private $horarioInicio;
		private $horarioFim;
		private $atividade;
		private $link;

		public function getId() 
		{
		  return $this->id;
		}
		
		public function setId($value) 
		{
		  $this->id = $value;
		}    
		
		public function getData() 
		{
		  return $this->data;
		}
		
		public function setData($value) 
		{
		  $this->data = $value;
		}

		public function getHorarioInicio() 
		{
		  return $this->horarioInicio;
		}
		
		public function setHorarioInicio($value) 
		{
		  $this->horarioInicio = $value;
		}

		public function getHorarioFim() 
		{
		  return $this->horarioFim;
		}
		
		public function setHorarioFim($value) 
		{
		  $this->horarioFim = $value;
		}

		public function getAtividade() 
		{
		  return $this->atividade;
		}
		
		public function setAtividade($value) 
		{
		  $this->atividade = $value;
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