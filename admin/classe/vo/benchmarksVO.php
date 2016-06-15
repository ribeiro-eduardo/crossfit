<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 30/05/2016
 * Time: 13:39
 */
	class benchmarksVO
    {

        private $id;
        private $id_categoria_treino;
        private $id_classe_treino;
        private $titulo;
        private $descricao;
        private $data;
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
        public function getIdCategoriaTreino()
        {
            return $this->id_categoria_treino;
        }

        /**
         * @param mixed $id_categoria_treino
         */
        public function setIdCategoriaTreino($id_categoria_treino)
        {
            $this->id_categoria_treino = $id_categoria_treino;
        }

        /**
         * @return mixed
         */
        public function getIdClasseTreino()
        {
            return $this->id_classe_treino;
        }

        /**
         * @param mixed $id_classe_treino
         */
        public function setIdClasseTreino($id_classe_treino)
        {
            $this->id_classe_treino = $id_classe_treino;
        }

        /**
         * @return mixed
         */
        public function getTitulo()
        {
            return $this->titulo;
        }

        /**
         * @param mixed $titulo
         */
        public function setTitulo($titulo)
        {
            $this->titulo = $titulo;
        }

        /**
         * @return mixed
         */
        public function getDescricao()
        {
            return $this->descricao;
        }

        /**
         * @param mixed $descricao
         */
        public function setDescricao($descricao)
        {
            $this->descricao = $descricao;
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