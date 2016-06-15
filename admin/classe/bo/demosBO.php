<?php

class demosBO {

    public $paginaAdmin;

    function newDemo($demosVO) {

        $db = new DBMySQL();

        $query = "INSERT INTO `demos` (`titulo`,`link`) VALUES ";

        $query .= "('".$demosVO->getTitulo()."','".$demosVO->getLink()."');";

        $db->do_query($query);

        return $query;

        $db->close();

    }

    function editDemo($demosVO) {

        $db = new DBMySQL();

        $query = "UPDATE `demos` SET";

        $query .= " `titulo` = '".$demosVO->getTitulo()."',";

        $query .= " `link` = '".$demosVO->getLink()."'";

        $query .= " WHERE `id` = '".$demosVO->getId()."'";

        $db->do_query($query);

        return $query;

        $db->close();

    }

    function deleteDemo($demosVO) {

        $db = new DBMySQL();

        $query = "UPDATE `demos` SET `status` = 0 WHERE `id` = '".$demosVO->getId()."'";

        $db->do_query($query);

        return $query;

        $db->close();

    }

    function get($demosVO) {

        $db = new DBMySQL();

        if($demosVO->getId() != "") {

            $query = "SELECT * FROM `demos` WHERE `id` = '".$demosVO->getId()."'";

            $db->do_query($query);

            $result = $db->getRow();


        } else {

            $query = "SELECT * FROM `demos` WHERE `status` = 1 ORDER BY `id` ASC";

            $db->do_query($query);

            $r = 0;

            while($row = $db->getRow()) {

                $result[$r] = $row;

                $r++;

            }

        }

        return $result;

    }


    function count() {

        $db = new DBMySQL();

        $db->do_query("SELECT COUNT(`id`) AS 'total' FROM `demos`");

        $result = $db->getRow();

        return $result;

    }


    function paginaAdmin($admin){
        if($admin == TRUE){
            $this->paginaAdmin = TRUE;
        }else{
            $this->paginaAdmin = FALSE;
        }
    }

}


?>