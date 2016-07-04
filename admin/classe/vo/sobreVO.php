<?php
	
	class sobreVO {
		
		private $id;
		private $id_modulo;
		private $id_usuario;
		private $texto;

		/**
		 * @return mixed
		 */
		public function getId()
		{
			return $this->id;
		}

		/**
		 * @param mixed $id
		 */
		public function setId($id)
		{
			$this->id = $id;
		}

		/**
		 * @return mixed
		 */
		public function getIdModulo()
		{
			return $this->id_modulo;
		}

		/**
		 * @param mixed $id_modulo
		 */
		public function setIdModulo($id_modulo)
		{
			$this->id_modulo = $id_modulo;
		}

		/**
		 * @return mixed
		 */
		public function getIdUsuario()
		{
			return $this->id_usuario;
		}

		/**
		 * @param mixed $id_usuario
		 */
		public function setIdUsuario($id_usuario)
		{
			$this->id_usuario = $id_usuario;
		}

		/**
		 * @return mixed
		 */
		public function getTexto()
		{
			return $this->texto;
		}

		/**
		 * @param mixed $texto
		 */
		public function setTexto($texto)
		{
			$this->texto = $texto;
		}
		

		
	}


?>