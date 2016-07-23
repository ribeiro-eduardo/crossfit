<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 30/05/2016
 * Time: 10:03
 */

@session_start();
if ($_SESSION["id_tipo_usuario"] != 1) {
    header("Location: index.php");
}
require_once("../lib/DBMySql.php");
require("../classe/bo/noticiasBO.php");
require("../classe/vo/noticiasVO.php");

require_once('../classe/bo/uploadBO.php');

$noticiasBO = new noticiasBO();
$noticiasVO = new noticiasVO();

$uploadBO = new uploadBO();

$_UP['extensoes'] = array('jpg', 'jpeg', 'png', 'gif');

$titulo = $_POST["titulo"];
$descricao = urlencode($_POST["descricao"]);


if (isset($_POST["cadastrar"])) {
    $noticiasVO->setTitulo($titulo);
    $noticiasVO->setDescricao($descricao);

    date_default_timezone_set('America/Sao_Paulo');
    $t = time();
    $data_cadastro = @date("Y-m-d H:i:s", $t);
    $noticiasVO->setData($data_cadastro);
    $noticiasVO->setStatus(1);

    $imagem = $_FILES["imagem"];

    //print_r($imagem); exit;
    if($imagem['error'] == 1){
        ?>
        <script>
            alert("Escolha uma imagem de no m�ximo 1,5 MB!");
            location.href = "../form-noticias.php";
        </script>
        <?
        exit;
    }

    if ($imagem['error'] == 0 && $imagem['size'] > 0) {

        if ($imagem['size'] > 1500000) {

            $msg = "Escolha imagens de no m&aacute;ximo 1,5 MB";
            //echo $msg;

            //die("se ferrou");

        } else {

            $nomeArquivo = $imagem['name'];
            $auxiliar = explode('.', $nomeArquivo);
            $auxiliar2 = end($auxiliar);
            $extensao = strtolower($auxiliar2);

            if (array_search($extensao, $_UP['extensoes']) === false) {
                $msg = "Por favor, envie arquivos com as seguintes extens&otilde;es: jpg, png ou gif";
                //return;
            } else {

                $uploadBO->pasta = "../../noticias-imagem/";

                $uploadBO->nome = $_FILES["imagem"]['name'];

                $uploadBO->tmp_name = $_FILES["imagem"]['tmp_name'];

                $uploadBO->img_marca = "";

                $imagem = $uploadBO->uploadArquivo(TRUE);

                $noticiasVO->setImagem($imagem);

            }

        }

    } else {

        $msg = "Escolha imagens dos tipos jpg, jpeg, gif ou png de no m&aacute;ximo 1,5 MB";
    }


    if ($noticiasBO->newNoticia($noticiasVO)) {
        ?>
        <script>
            alert("Not�cia inserida com sucesso!");
            location.href = "../noticias.php";
        </script>
        <?
        exit;
    } else {
        ?>
        <script>
            alert("Ocorreu um erro na grava��o da not�cia. Por favor, tente novamente!");
            location.href = "../noticias.php";
        </script>
        <?
        exit;
    }
}elseif (isset($_POST['editar'])){
    $id = $_POST['id_noticia'];
    $noticiasVO->setId($id);
    $noticiasVO->setTitulo($titulo);
    $noticiasVO->setDescricao($descricao);
    $noticiasVO->setStatus(1);

    $imagem = $_FILES["imagem"];

    //print_r($imagem); exit;
    if($imagem['error'] == 1){
        ?>
        <script>
            alert("Escolha uma imagem de no m�ximo 1,5 MB!");
            location.href = "../visualizar-noticia.php?id=<?=$id?>";
        </script>
        <?
        exit;
    }

    if ($imagem['error'] == 0 && $imagem['size'] > 0) {

        if ($imagem['size'] > 1500000) {

            $msg = "Escolha imagens de no m&aacute;ximo 1,5 MB";
            //echo $msg;

            //die("se ferrou");

        } else {

            $nomeArquivo = $imagem['name'];
            $auxiliar = explode('.', $nomeArquivo);
            $auxiliar2 = end($auxiliar);
            $extensao = strtolower($auxiliar2);

            if (array_search($extensao, $_UP['extensoes']) === false) {
                $msg = "Por favor, envie arquivos com as seguintes extens&otilde;es: jpg, png ou gif";
                //return;
            } else {

                $uploadBO->pasta = "../../noticias-imagem/";

                $uploadBO->nome = $_FILES["imagem"]['name'];

                $uploadBO->tmp_name = $_FILES["imagem"]['tmp_name'];

                $uploadBO->img_marca = "";

                $imagem = $uploadBO->uploadArquivo(TRUE);

                echo $imagem; exit;
                $noticiasVO->setImagem($imagem);

            }

        }

    } else {
        echo "vish"; exit;
        $msg = "Escolha imagens dos tipos jpg, jpeg, gif ou png de no m&aacute;ximo 1,5 MB";
    }

    if ($noticiasBO->editNoticia($noticiasVO)) {
        ?>
        <script>
            alert("Not�cia alterada com sucesso!");
            location.href = "../noticias.php";
        </script>
        <?
        exit;
    } else {
        ?>
        <script>
            alert("Ocorreu um erro na edi��o da not�cia. Por favor, tente novamente!");
            location.href = "../noticias.php";
        </script>
        <?
        exit;
    }
}elseif (isset($_GET['acao_e'])){
    $id = $_GET['id'];
    $noticiasVO->setId($id);
    if ($noticiasBO->deleteNoticia($noticiasVO)) {
        ?>
        <script>
            alert("Not�cia exclu�da com sucesso!");
            location.href = "../noticias.php";
        </script>
        <?
        exit;
    } else {
        ?>
        <script>
            alert("Ocorreu um erro na remo��o da not�cia. Por favor, tente novamente!");
            location.href = "../noticias.php";
        </script>
        <?
        exit;
    }
}