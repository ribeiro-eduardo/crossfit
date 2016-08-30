<?php

/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 29/08/2016
 * Time: 23:35
 */
class contatosBO
{

    public $paginaAdmin;

    function newContato($contatosVO)
    {

        $db = new DBMySQL();

        $query = "INSERT INTO `contatos` (`nome`,`email`, `id_assunto`, `mensagem`, `status`) VALUES ";

        $query .= "('" . $contatosVO->getNome() . "','" . $contatosVO->getEmail() . "', '" . $contatosVO->getIdAssunto() . "', '" . $contatosVO->getMensagem() . "', 1);";

        $db->do_query($query);

        return $query;

        $db->close();

    }


    function deleteContato($contatosVO)
    {

        $db = new DBMySQL();

        $query = "UPDATE `contatos` SET `status` = 0 WHERE `id` = '" . $contatosVO->getId() . "'";

        $db->do_query($query);

        return $query;

        $db->close();

    }

    function get($contatosVO)
    {

        $db = new DBMySQL();

        if ($contatosVO->getId() != "") {

            $query = "SELECT * FROM `contatos` WHERE `id` = '" . $contatosVO->getId() . "'";

            $db->do_query($query);

            $result = $db->getRow();


        } else {

            $query = "SELECT * FROM `contatos` WHERE `status` = 1 ORDER BY `id` ASC";

            $db->do_query($query);

            $r = 0;

            while ($row = $db->getRow()) {

                $result[$r] = $row;

                $r++;

            }

        }

        return $result;

    }

    function getAssuntos()
    {
        $db = new DBMySQL();

        $query = "SELECT * FROM `assuntos_contato` ORDER BY `id` ASC";

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

        $db->do_query("SELECT COUNT(`id`) AS 'total' FROM `contatos`");

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