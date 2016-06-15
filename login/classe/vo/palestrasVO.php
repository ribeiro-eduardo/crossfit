<?php
	
	class PalestrasVO {
		
		private $idPalestra;
		private $tituloPalestra;
		private $textoPalestra;
		private $imagemPalestra;



		public function getidPalestra() 
		{
		  return $this->idPalestra;
		}
		
		public function setidPalestra($value) 
		{
		  $this->idPalestra = $value;
		}    
		
		public function gettituloPalestra() 
		{
		  return $this->tituloPalestra;
		}
		
		public function settituloPalestra($value) 
		{
		  $this->tituloPalestra = $value;
		}
		public function gettextoPalestra() 
		{
		  return $this->textoPalestra;
		}
		
		public function settextoPalestra($value) 
		{
		  $this->textoPalestra = $value;
		}

		public function getimagemPalestra() 
		{
		  return $this->imagemPalestra;
		}
		
		public function setimagemPalestra($value) 
		{
		  $this->imagemPalestra = $value;
		}
		    
		
	}


?>