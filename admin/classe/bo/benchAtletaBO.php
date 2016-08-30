<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 28/08/2016
 * Time: 01:07
 */
class benchAtletaBO
{

    public $paginaAdmin;

    function newTempo($benchAtletaVO)
    {

        $db = new DBMySQL();

        $query = "INSERT INTO `benchmark_atleta` (`id_atleta`, `id_benchmark`, `tempo`) VALUES ";

        $query .= "('" . $benchAtletaVO->getIdAtleta() . "', '" . $benchAtletaVO->getIdBenchmark() . "','" . $benchAtletaVO->getTempo() . "');";

        $db->do_query($query);

        return $query;

        $db->close();

    }

    function editBenchAtleta($benchAtletaVO)
    {

        $db = new DBMySQL();

        $query = "UPDATE `benchmark_atleta` SET";

        $query .= " `tempo` = '" . $benchAtletaVO->getTempo() . "'";

        $query .= " WHERE `id` = '" . $benchAtletaVO->getId() . "'";

        $db->do_query($query);

        return $query;

        $db->close();

    }

    function deleteBenchAtleta($benchAtletaVO)
    {

        $db = new DBMySQL();

        $query = "DELETE FROM `benchmark_atleta` WHERE `id` = '" . $benchAtletaVO->getId() . "'";

        $db->do_query($query);

        return $query;

        $db->close();

    }

    function get($benchAtletaVO)
    {

        $db = new DBMySQL();

        if ($benchAtletaVO->getId() != "") {

            $query = "SELECT * FROM `benchmark_atleta` WHERE `id` = '" . $benchAtletaVO->getId() . "' AND `status` = 1 ";

            $db->do_query($query);

            $result = $db->getRow();


        } elseif($benchAtletaVO->getIdCategoriaTreino() != "") {

            $query = "SELECT * FROM `benchmark_atleta` WHERE `id_categoria_treino` = '".$benchAtletaVO->getIdCategoriaTreino()."'AND `status` = 1 ORDER BY `id` ASC";

            $db->do_query($query);

            $r = 0;

            while ($row = $db->getRow()) {

                $result[$r] = $row;

                $r++;

            }

        }
        else{

            $query = "SELECT * FROM `benchmark_atleta` WHERE `status` = 1 ORDER BY `id` ASC";

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

        $query = "SELECT * FROM benchmark_atleta ba join benchmark_atleta b ON(ba.id_benchmark = b.id) join usuarios u on (ba.id_atleta = u.id) WHERE `id_atleta` = '".$usuariosVO->getId()."'";

        $db->do_query($query);

        $r = 0;

        while ($row = $db->getRow()) {

            $result[$r] = $row;

            $r++;

        }

        return $result;
    }

    function getPorCategoria($benchAtletaVO){

        $db = new DBMySQL();

        $query = "SELECT * FROM `benchmark_atleta` WHERE `id_categoria_treino` = '".$benchAtletaVO->getIdCategoriaTreino()."'AND `status` = 1 ORDER BY `titulo` ASC";

        $db->do_query($query);

        $r = 0;

        while ($row = $db->getRow()) {

            $result[$r] = $row;

            $r++;

        }

        return $result;
    }

    function getBest($benchAtletaVO, $ordem){

        $db = new DBMySQL();

        $query = "SELECT *, u.id as id_atleta FROM benchmark_atleta b JOIN usuarios u ON(b.id_atleta = u.id) WHERE id_benchmark = '".$benchAtletaVO->getId()."' ORDER BY b.tempo $ordem";

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

        $db->do_query("SELECT COUNT(`id`) AS 'total' FROM `benchmark_atleta`");

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
