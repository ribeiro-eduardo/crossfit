<?php
	
	class MensagemVO {
		
		private $idMensagem;
		private $tituloMensagem;
		private $descricao;
		private $imagem;



		public function getidMensagem() 
		{
		  return $this->idMensagem;
		}
		
		public function setidMensagem($value) 
		{
		  $this->idMensagem = $value;
		}    
		
		public function gettituloMensagem() 
		{
		  return $this->tituloMensagem;
		}
		
		public function settituloMensagem($value) 
		{
		  $this->tituloMensagem = $value;
		}
		public function getDescricao() 
		{
		  return $this->descricao;
		}
		
		public function setDescricao($value) 
		{
		  $this->descricao = $value;
		}

		public function getMes() 
		{
		  return $this->mes;
		}
		
		public function setMes($value) 
		{
		  $this->mes = $value;
		}

		public function getImagem() 
		{
		  return $this->imagem;
		}
		
		public function setImagem($value) 
		{
		  $this->imagem = $value;
		}
		    
		
	}


?>