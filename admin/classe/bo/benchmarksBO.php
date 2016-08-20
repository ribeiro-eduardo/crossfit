<?php

/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 30/05/2016
 * Time: 13:51
 */
class benchmarksBO
{

    public $paginaAdmin;

    function newBenchmark($benchmarksVO)
    {

        $db = new DBMySQL();

        $query = "INSERT INTO `benchmarks` (`id_categoria_treino`, `id_classe_treino`, `titulo`,`descricao`,`status`) VALUES ";

        $query .= "('" . $benchmarksVO->getIdCategoriaTreino() . "', '" . $benchmarksVO->getIdClasseTreino() . "','" . $benchmarksVO->getTitulo() . "','" . $benchmarksVO->getDescricao() . "','" . $benchmarksVO->getStatus() . "');";

        $db->do_query($query);

        return $query;

        $db->close();

    }

    function editBenchmark($benchmarksVO)
    {

        $db = new DBMySQL();

        $query = "UPDATE `benchmarks` SET";

        $query .= " `id_categoria_treino` = '".$benchmarksVO->getIdCategoriaTreino()."',";

        $query .= " `id_classe_treino` = '".$benchmarksVO->getIdClasseTreino()."',";

        $query .= " `titulo` = '" . $benchmarksVO->getTitulo() . "',";

        $query .= " `descricao` = '" . $benchmarksVO->getDescricao() . "'";

        $query .= " WHERE `id` = '" . $benchmarksVO->getId() . "'";

        $db->do_query($query);

        return $query;

        $db->close();

    }

    function deleteBenchmark($benchmarksVO)
    {

        $db = new DBMySQL();

        $query = "UPDATE `benchmarks` SET `status` = 0 WHERE `id` = '" . $benchmarksVO->getId() . "'";

        $db->do_query($query);

        return $query;

        $db->close();

    }

    function get($benchmarksVO)
    {

        $db = new DBMySQL();

        if ($benchmarksVO->getId() != "") {

            $query = "SELECT * FROM `benchmarks` WHERE `id` = '" . $benchmarksVO->getId() . "' AND `status` = 1 ";

            $db->do_query($query);

            $result = $db->getRow();


        } elseif($benchmarksVO->getIdCategoriaTreino() != "") {

            $query = "SELECT * FROM `benchmarks` WHERE `id_categoria_treino` = '".$benchmarksVO->getIdCategoriaTreino()."'AND `status` = 1 ORDER BY `id` ASC";

            $db->do_query($query);

            $r = 0;

            while ($row = $db->getRow()) {

                $result[$r] = $row;

                $r++;

            }

        }
        else{

            $query = "SELECT * FROM `benchmarks` WHERE `status` = 1 ORDER BY `id` ASC";

            $db->do_query($query);

            $r = 0;

            while ($row = $db->getRow()) {

                $result[$r] = $row;

                $r++;

            }
        }

        return $result;

    }

    function getPorAtleta($usuariosVO){

        $db = new DBMySQL();

        $query = "SELECT * FROM benchmark_atleta ba join benchmarks b ON(ba.id_benchmark = b.id) join usuarios u on (ba.id_atleta = u.id) WHERE `id_atleta` = '".$usuariosVO->getId()."'";

        $db->do_query($query);

        $r = 0;

        while ($row = $db->getRow()) {

            $result[$r] = $row;

            $r++;

        }

        return $result;
    }

    function getPorCategoria($benchmarksVO){

        $db = new DBMySQL();

        $query = "SELECT * FROM `benchmarks` WHERE `id_categoria_treino` = '".$benchmarksVO->getIdCategoriaTreino()."'AND `status` = 1 ORDER BY `titulo` ASC";

        $db->do_query($query);

        $r = 0;

        while ($row = $db->getRow()) {

            $result[$r] = $row;

            $r++;

        }

        return $result;
    }

    function getBest($benchmarksVO, $ordem){

        $db = new DBMySQL();

        $query = "SELECT *, u.id as id_atleta FROM benchmark_atleta b JOIN usuarios u ON(b.id_atleta = u.id) WHERE id_benchmark = '".$benchmarksVO->getId()."' ORDER BY b.tempo $ordem";

        $db->do_query($query);

        $r = 0;

        while ($row = $db->getRow()) {

            $result[$r] = $row;

            $r++;

        }

        return $result;

    }

    function count()
    {

        $db = new DBMySQL();

        $db->do_query("SELECT COUNT(`id`) AS 'total' FROM `benchmarks`");

        $result = $db->getRow();

        return $result;

    }

    function paginaAdmin($admin)
    {
        if ($admin == TRUE) {
            $this->paginaAdmin = TRUE;
        } else {
            $this->paginaAdmin = FALSE;
        }
    }

}


?>