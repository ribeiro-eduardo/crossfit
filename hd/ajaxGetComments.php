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

$id_treino = $_POST['id_treino'];
$comentariosVO->setIdTreino($id_treino);
$comentarios = $comentariosBO->get($comentariosVO);

if(!empty($comentarios)){
    for($j = 0; $j < count($comentarios); $j++){
        $nome = $comentarios[$j]['nome_atleta'];
        $texto = $comentarios[$j]['texto'];
        $texto = nl2br($texto);
        $imagem = $comentarios[$j]['imagem'];
        $id_tipo_usuario = $usuario['id_tipo_usuario'];
        $dir = '';

        switch ($id_tipo_usuario) {
            case 1:
                $icone = "images/coach.png";
                $dir = 'fotos-coaches/';
                break;
            case 2:
                $icone = "images/coach.png";
                $dir = 'fotos-coaches/';
                break;
            case 3:
                $icone = "images/athlete.png";
                $dir = 'fotos-atletas/';
                break;
        }
        $html .= "<div class='media'>
        <a href='' class='pull-left'>
            <img alt='' src='fotos-coaches/$imagem' class='media-object'>
        </a>

        <div class='media-body'>
            <h4 class='media-heading'>
                $nome</h4>

            <p class='text-muted'>
                12 July 2013, 10:20 PM
            </p>

            <p>
                $texto
            </p>
        </div>
    </div>

    <div class='post-comment'>
        <h3>Deixe um comentário</h3>

        <form role='form' class='form-horizontal'>
            <div class='form-group'>
                <div class='col-lg-12'>
                    <textarea class=' form-control' rows='8' placeholder='Mensagem'></textarea>
                </div>
            </div>
            <p>
            </p>

            <p>
                <button class='btn btn-send' type='submit'>Comentar</button>
            </p>

            <p></p>
        </form>
    </div>";
    }
}
echo $html;

//echo"
//
//    <div class='media'>
//        <a href='' class='pull-left'>
//            <img alt='' src='images/avater-2.jpg' class='media-object'>
//        </a>
//
//        <div class='media-body'>
//            <h4 class='media-heading'>
//                $id_treino</h4>
//
//            <p class='text-muted'>
//                12 July 2013, 10:20 PM
//            </p>
//
//            <p>
//                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus
//                commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
//                Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
//            </p>
//        </div>
//    </div>
//
//    <div class='post-comment'>
//        <h3>Deixe um comentário</h3>
//
//        <form role='form' class='form-horizontal'>
//            <div class='form-group'>
//                <div class='col-lg-12'>
//                    <textarea class=' form-control' rows='8' placeholder='Mensagem'></textarea>
//                </div>
//            </div>
//            <p>
//            </p>
//
//            <p>
//                <button class='btn btn-send' type='submit'>Comentar</button>
//            </p>
//
//            <p></p>
//        </form>
//    </div>";
