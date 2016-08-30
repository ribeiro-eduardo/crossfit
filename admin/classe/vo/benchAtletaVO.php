<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 28/08/2016
 * Time: 01:09
 */
class benchAtletaVO
{

    private $id;
    private $id_atleta;
    private $id_benchmark;
    private $tempo;

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
    public function getIdBenchmark()
    {
        return $this->id_benchmark;
    }

    /**
     * @param mixed $id_benchmark
     */
    public function setIdBenchmark($id_benchmark)
    {
        $this->id_benchmark = $id_benchmark;
    }

    /**
     * @return mixed
     */
    public function getTempo()
    {
        return $this->tempo;
    }

    /**
     * @param mixed $tempo
     */
    public function setTempo($tempo)
    {
        $this->tempo = $tempo;
    }



}