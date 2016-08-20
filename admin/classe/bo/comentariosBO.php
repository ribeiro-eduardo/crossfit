<?php

/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 20/08/2016
 * Time: 15:09
 */
class comentariosBO
{

    public $paginaAdmin;

    function newComment($comentariosVO)
    {

        $db = new DBMySQL();

        $query = "INSERT INTO `comentarios` (`id_atleta`, `id_treino`, `texto`,`data`,`status`) VALUES ";

        $query .= "('" . $comentariosVO->getIdAtleta() . "', '" . $comentariosVO->getIdTreino() . "', '" . $comentariosVO->getTexto() . "','" . $comentariosVO->getData() . "');";

        $db->do_query($query);

        return $query;

        $db->close();

    }

    function editNoticia($comentariosVO)
    {

        $db = new DBMySQL();

        $query = "UPDATE `comentarios` SET";

        $query .= " `titulo` = '" . $comentariosVO->getTitulo() . "',";

        if ($comentariosVO->getImagem() != "") {
            $query .= " `imagem` = '" . $comentariosVO->getImagem() . "',";
        }

        $query .= " `descricao` = '" . $comentariosVO->getDescricao() . "'";

        $query .= " WHERE `id` = '" . $comentariosVO->getId() . "'";

        $db->do_query($query);

        return $query;

        $db->close();

    }

    function deleteNoticia($comentariosVO)
    {

        $db = new DBMySQL();

        $query = "DELETE FROM `comentarios` WHERE `id` = '" . $comentariosVO->getId() . "'";

        $db->do_query($query);

        $db->close();

        return $query;

    }

    function get($comentariosVO)
    {

        $db = new DBMySQL();

        $query = "SELECT tc.*, u.nome as nome_atleta, u.id_tipo_usuario, u.imagem FROM treinos_comentarios tc JOIN usuarios u ON (tc.id_atleta = u.id) JOIN treinos t ON(tc.id_treino = t.id) WHERE tc.id_treino = " . $comentariosVO->getIdTreino() . " ORDER BY tc.data DESC";

        $db->do_query($query);

        $r = 0;

        while ($row = $db->getRow()) {

            $result[$r] = $row;

            $r++;

        }

        return $result;

    }

    function paginacao($inicio, $TAMANHO_PAGINA)
    {

        $db = new DBMySQL();

        if ($this->paginaAdmin === FALSE) {
            $whereStatus = "WHERE `status` = '1'";
        }
        $db->do_query("SELECT * FROM `comentarios` $whereStatus ORDER BY `id` DESC LIMIT " . $inicio . "," . $TAMANHO_PAGINA);

        $r = 0;

        while ($row = $db->getRow()) {

            $result[$r] = $row;

            $r++;

        }

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