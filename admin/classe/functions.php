<?php

function getUsuario($login, $senha){

    $db = new DBMySQL();

    $query = "SELECT * FROM `usuarios` WHERE `login` = '$login' AND `senha`= '$senha'";

    $db->do_query($query);

    $r = 0;

    while ($row = $db->getRow()) {

        $result[$r] = $row;

        $r++;

    }

    return $result;
}

function isMobile()
{
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
    $ipad = strpos($_SERVER['HTTP_USER_AGENT'], "iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
    $palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
    $berry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
    $ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");
    $symbian = strpos($_SERVER['HTTP_USER_AGENT'], "Symbian");

    if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
        return true;
    } else {
        return false;
    }
}

function getClassesTreinos()
{

    $db = new DBMySQL();

    $query = "SELECT * FROM `classe_treino` ORDER BY `id` ASC";

    $db->do_query($query);

    $r = 0;

    while ($row = $db->getRow()) {

        $result[$r] = $row;

        $r++;

    }

    return $result;
}

function getCategoriasTreinos()
{
    $db = new DBMySQL();

    $query = "SELECT * FROM `categoria_treino` ORDER BY `id` ASC";

    $db->do_query($query);

    $r = 0;

    while ($row = $db->getRow()) {

        $result[$r] = $row;

        $r++;

    }

    return $result;
}

function calculaIdade($data){
// Separa em dia, mês e ano
    list($dia, $mes, $ano) = explode('/', $data);

// Descobre que dia é hoje e retorna a unix timestamp
    $hoje = @mktime(0, 0, 0, @date('m'), @date('d'), @date('Y'));
// Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = @mktime(0, 0, 0, $mes, $dia, $ano);

// Depois apenas fazemos o cálculo já citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
    return $idade;
}