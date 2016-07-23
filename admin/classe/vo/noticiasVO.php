<?php
	
	class noticiasVO {
		
		private $id;
		private $titulo;
		private $imagem;
		private $descricao;
		private $data;
		private $status;

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

		/**
		 * @return mixed
		 */
		public function getImagem()
		{
			return $this->imagem;
		}

		/**
		 * @param mixed $imagem
		 */
		public function setImagem($imagem)
		{
			$this->imagem = $imagem;
		}


		public function getDescricao()
		{
			return $this->descricao;
		}
				
		public function setDescricao($value)
		{
			$this->descricao = $value;
		}

		public function getData() 
		{
		  return $this->data;
		}
		
		public function setData($value) 
		{
		  $this->data = $value;
		}
		    
		public function getStatus() 
		{
		  return $this->status;
		}
		
		public function setStatus($value) 
		{
		  $this->status = $value;
		}

	}


?>