<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 20/08/2016
 * Time: 14:41
 */
require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/comentariosBO.php");
require("../admin/classe/vo/comentariosVO.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");

$comentariosVO = new comentariosVO();
$comentariosBO = new comentariosBO();
$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();

$id_logado = $_POST['id_logado'];
$id_treino = $_POST['id_treino'];
$comentariosVO->setIdTreino($id_treino);
$comentarios = $comentariosBO->get($comentariosVO);

if(!empty($comentarios)){
    for($j = 0; $j < count($comentarios); $j++){
        $id_atleta = $comentarios[$j]['id_atleta'];
        $nome = $comentarios[$j]['nome_atleta'];
        $texto = $comentarios[$j]['texto'];
        $texto = nl2br($texto);
        $imagem = $comentarios[$j]['imagem'];
        $id_tipo_usuario = $comentarios[$j]['id_tipo_usuario'];
        $dir = '';

        switch ($id_tipo_usuario) {
            case 1:
                $icone = "images/coach.png";
                $dir = 'fotos-coaches';
                break;
            case 2:
                $icone = "images/coach.png";
                $dir = 'fotos-coaches';
                break;
            case 3:
                $icone = "images/athlete.png";
                $dir = 'fotos-atletas';
                break;
        }
        $datetime = $comentarios[$j]['data'];
        $aux = explode(" ", $datetime);
        $data = $aux[0];
        $aux_data = explode("-", $data);
        $dia = $aux_data[2];
        $mes = $aux_data[1];
        $ano = $aux_data[0];

        switch($mes){
            case '01':
                $mes = 'janeiro';
                break;
            case '02':
                $mes = 'fevereiro';
                break;
            case '03':
                $mes = 'março';
                break;
            case '04':
                $mes = 'abril';
                break;
            case '05':
                $mes = 'maio';
                break;
            case '06':
                $mes = 'junho';
                break;
            case '07':
                $mes = 'julho';
                break;
            case '08':
                $mes = 'agosto';
                break;
            case '09':
                $mes = 'setembro';
                break;
            case '10':
                $mes = 'outubro';
                break;
            case '11':
                $mes = 'novembro';
                break;
            case '12':
                $mes = 'dezembro';
                break;
        }
        $time = $aux[1];
        $aux_time = explode(":", $time);
        $hora = $aux_time[0];
        $minuto = $aux_time[1];

        $html .= "<div class='media'>
        <a href='atleta.php?id=$id_atleta' class='pull-left'>
          <div class='circle-avatar' style='background: url($dir/$imagem) no-repeat; width: 120px; height: 120px;'></div>
        </a>

        <div class='media-body'>
            <a href='atleta.php?id=$id_atleta'>
                <h4 class='media-heading'>
                    $nome
                </h4>
            </a>

            <p class='text-muted'>
                $dia de $mes de $ano, às $hora:$minuto
            </p>

            <p>
                $texto
            </p>
        </div>
    </div>";
    }
}else{
    $html = "
        <div class='media'>
            <h4>Nenhum comentário registrado. Seja o primeiro a deixar sua marca!</h4>
        </div>
        ";
}
$html .= "<div class='post-comment'>
        <h3>Deixe um comentário</h3>

        <form role='form' id='comentario' method='POST' onsubmit='return comentar()' class='form-horizontal'>
            <div class='form-group'>
                <div class='col-lg-12'>
                    <textarea class=' form-control' rows='2' maxlength='255' id='texto' name='texto' placeholder='Mensagem'></textarea>
                </div>
            </div>
            <input type='hidden' name='id_treino' id='id_treino' value='$id_treino'>
            <input type='hidden' name='id_logado' id='id_logado' value='$id_logado'>
            <p>
                <input type='submit' class='btn btn-send' value='Comentar' type='submit'/>
            </p>

            <p></p>
        </form>
    </div>";


echo $html;
