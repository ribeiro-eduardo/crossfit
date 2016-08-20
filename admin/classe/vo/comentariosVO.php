<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 20/08/2016
 * Time: 15:06
 */

class comentariosVO
{

    private $id;
    private $id_atleta;
    private $id_treino;
    private $texto;
    private $data;

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
    public function getIdAtleta()
    {
        return $this->id_atleta;
    }

    /**
     * @param mixed $id_atleta
     */
    public function setIdAtleta($id_atleta)
    {
        $this->id_atleta = $id_atleta;
    }

    /**
     * @return mixed
     */
    public function getIdTreino()
    {
        return $this->id_treino;
    }

    /**
     * @param mixed $id_treino
     */
    public function setIdTreino($id_treino)
    {
        $this->id_treino = $id_treino;
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


}