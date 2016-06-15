<?php
	
	class informativosVO {
		
		private $idInformativo;
		private $descricao;
		private $arquivo;
		
		public function getidInformativo() 
		{
		  return $this->idInformativo;
		}
		
		public function setidInformativo($value) 
		{
		  $this->idInformativo = $value;
		}    
		
		public function getDescricao() 
		{
		  return $this->descricao;
		}
		
		public function setDescricao($value) 
		{
		  $this->descricao = $value;
		}
		public function getArquivo() 
		{
		  return $this->arquivo;
		}
		
		public function setArquivo($value) 
		{
		  $this->arquivo = $value;
		}
		    
	}


?>