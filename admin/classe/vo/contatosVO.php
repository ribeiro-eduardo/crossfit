<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 30/08/2016
 * Time: 00:05
 */

class contatosVO {

    private $id;
    private $nome;
    private $email;
    private $id_assunto;
    private $mensagem;

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getIdAssunto()
    {
        return $this->id_assunto;
    }

    /**
     * @param mixed $id_assunto
     */
    public function setIdAssunto($id_assunto)
    {
        $this->id_assunto = $id_assunto;
    }

    /**
     * @return mixed
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }

    /**
     * @param mixed $mensagem
     */
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }



}
