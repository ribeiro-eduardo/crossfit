<?php

	class usuariosVO {

		private $id;
		private $nome;
		private $cpf;
		private $email;
		private $telefone;
		private $celular;
        private $permissao;
		private $senha;
		private $login;
		private $id_tipo_usuario;
        private $descricao;
		private $data_nascimento;
		private $altura;
		private $peso;
        private $imagem;
		private $status;

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

        function getId()
        {
            return $this->id;
        }

        function getNome()
        {
            return $this->nome;
        }

        function getCpf()
        {
            return $this->cpf;
        }

        function getEmail()
        {
            return $this->email;
        }

        function getTelefone()
        {
            return $this->telefone;
        }

        function getCelular()
        {
            return $this->celular;
        }

        /**
         * @return mixed
         */
        public function getPermissao()
        {
            return $this->permissao;
        }


        function getLogin()
        {
            return $this->login;
        }

        function getSenha()
        {
            return $this->senha;
        }

        function getId_tipo_usuario()
        {
            return $this->id_tipo_usuario;
        }

        function getData_nascimento()
        {
            return $this->data_nascimento;
        }

        function getAltura()
        {
            return $this->altura;
        }

        function getPeso()
        {
            return $this->peso;
        }

        function getData_cadastro()
        {
            return $this->data_cadastro;
        }

        function getStatus()
        {
            return $this->status;
        }

        function setId($id)
        {
            $this->id = $id;
        }

        function setNome($nome)
        {
            $this->nome = $nome;
        }

        function setCpf($cpf)
        {
            $this->cpf = $cpf;
        }

        function setEmail($email)
        {
            $this->email = $email;
        }

        function setTelefone($telefone)
        {
            $this->telefone = $telefone;
        }

        function setCelular($celular)
        {
            $this->celular = $celular;
        }

        /**
         * @param mixed $permissao
         */
        public function setPermissao($permissao)
        {
            $this->permissao = $permissao;
        }

        function setLogin($login)
        {
            $this->login = $login;
        }

        function setSenha($senha)
        {
            $this->senha = $senha;
        }

        function setId_tipo_usuario($id_tipo_usuario)
        {
            $this->id_tipo_usuario = $id_tipo_usuario;
        }

        function setData_nascimento($data_nascimento)
        {
            $this->data_nascimento = $data_nascimento;
        }

        function setAltura($altura)
        {
            $this->altura = $altura;
        }

        function setPeso($peso)
        {
            $this->peso = $peso;
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

        function setData_cadastro($data_cadastro)
        {
            $this->data_cadastro = $data_cadastro;
        }

        function setStatus($status)
        {
            $this->status = $status;
        }

	}


?>