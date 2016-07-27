<?php
	
	class eventosVO {
		
		private $id;
		private $nome;
		private $local;
		private $data;
		private $link;
		private $infos;
		private $imagem;
		private $status;

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
		public function getNome()
		{
			return $this->nome;
		}

		/**
		 * @param mixed $nome
		 */
		public function setNome($nome)
		{
			$this->nome = $nome;
		}

		/**
		 * @return mixed
		 */
		public function getLocal()
		{
			return $this->local;
		}

		/**
		 * @param mixed $local
		 */
		public function setLocal($local)
		{
			$this->local = $local;
		}

		/**
		 * @return mixed
		 */
		public function getData()
		{
			return $this->data;
		}

		/**
		 * @param mixed $data
		 */
		public function setData($data)
		{
			$this->data = $data;
		}

		/**
		 * @return mixed
		 */
		public function getLink()
		{
			return $this->link;
		}

		/**
		 * @param mixed $link
		 */
		public function setLink($link)
		{
			$this->link = $link;
		}

		/**
		 * @return mixed
		 */
		public function getInfos()
		{
			return $this->infos;
		}

		/**
		 * @param mixed $infos
		 */
		public function setInfos($infos)
		{
			$this->infos = $infos;
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

		/**
		 * @return mixed
		 */
		public function getStatus()
		{
			return $this->status;
		}

		/**
		 * @param mixed $status
		 */
		public function setStatus($status)
		{
			$this->status = $status;
		}


		
	}


?>