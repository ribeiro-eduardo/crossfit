<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 03/06/2016
 * Time: 01:05
 */

@session_start();
if ($_SESSION["id_tipo_usuario"] != 1) {
    header("Location: index.php");
}
require_once("../lib/DBMySql.php");
require("../classe/bo/eventosBO.php");
require("../classe/vo/eventosVO.php");

require_once('../classe/bo/uploadBO.php');

$eventosBO = new eventosBO();
$eventosVO = new eventosVO();

$uploadBO = new uploadBO();

$_UP['extensoes'] = array('jpg', 'jpeg', 'png', 'gif');

$nome = $_POST["nome"];
$local = $_POST["local"];
$data = $_POST["data"];
$link = $_POST['link'];
$infos = $_POST['infos'];

if (isset($_POST["cadastrar"])) {
    $eventosVO->setNome($nome);
    $eventosVO->setLocal($local);
    $eventosVO->setData($data);
    $eventosVO->setLink($link);
    $eventosVO->setInfos($infos);
    $eventosVO->setStatus(1);

    $imagem = $_FILES["imagem"];

    if ($imagem['error'] == 0 && $imagem['size'] > 0) {

        if ($imagem['size'] > 8000000) {

            ?>
            <script>
                alert("Escolha uma imagem de no máximo 8 MB!");
                location.href = "../form-eventos.php";
            </script>
            <?
            exit;

        } else {

            $nomeArquivo = $imagem['name'];
            $auxiliar = explode('.', $nomeArquivo);
            $auxiliar2 = end($auxiliar);
            $extensao = strtolower($auxiliar2);

            if (array_search($extensao, $_UP['extensoes']) === false) {
                $msg = "Por favor, envie arquivos com as seguintes extens&otilde;es: jpg, png ou gif";
                //return;
            } else {

                $uploadBO->pasta = "../../eventos-imagem/";

                $uploadBO->nome = $_FILES["imagem"]['name'];

                $uploadBO->tmp_name = $_FILES["imagem"]['tmp_name'];

                $uploadBO->img_marca = "";

                $imagem = $uploadBO->uploadArquivo(TRUE);

                $eventosVO->setImagem($imagem);

            }

        }

    } else {

        $msg = "Escolha imagens dos tipos jpg, jpeg, gif ou png de no m&aacute;ximo 1,5 MB";
    }

    if ($eventosBO->newEvento($eventosVO)) {
        ?>
        <script>
            alert("Evento inserido com sucesso!");
            location.href = "../eventos.php";
        </script>
        <?
        exit;
    } else {
        ?>
        <script>
            alert("Ocorreu um erro na gravação do evento. Por favor, tente novamente!");
            location.href = "../eventos.php";
        </script>
        <?
        exit;
    }
}elseif(isset($_POST["editar"])){
    $id = $_POST["id"];
    $eventosVO->setId($id);
    $eventosVO->setNome($nome);
    $eventosVO->setLocal($local);
    $eventosVO->setData($data);
    $eventosVO->setLink($link);
    $eventosVO->setInfos($infos);

    $imagem = $_FILES["imagem"];

    if($imagem != ""){
        if ($imagem['error'] == 0 && $imagem['size'] > 0) {

            if ($imagem['size'] > 8000000) {

                ?>
                <script>
                    alert("Escolha uma imagem de no máximo 8 MB!");
                    location.href = "../visualizar-evento.php?id=<?=$id?>";
                </script>
                <?
                exit;

            } else {

                $nomeArquivo = $imagem['name'];
                $auxiliar = explode('.', $nomeArquivo);
                $auxiliar2 = end($auxiliar);
                $extensao = strtolower($auxiliar2);

                if (array_search($extensao, $_UP['extensoes']) === false) {
                    $msg = "Por favor, envie arquivos com as seguintes extens&otilde;es: jpg, png ou gif";
                    //return;
                } else {

                    $uploadBO->pasta = "../../eventos-imagem/";

                    $uploadBO->nome = $_FILES["imagem"]['name'];

                    $uploadBO->tmp_name = $_FILES["imagem"]['tmp_name'];

                    $uploadBO->img_marca = "";

                    $imagem = $uploadBO->uploadArquivo(TRUE);

                    $eventosVO->setImagem($imagem);

                }

            }

        } else {

            $msg = "Escolha imagens dos tipos jpg, jpeg, gif ou png de no m&aacute;ximo 1,5 MB";
        }
    }

    if($eventosBO->editEvento($eventosVO)){
        ?>
        <script>
            alert("Evento alterado com sucesso!");
            location.href = "../eventos.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro na alteração do evento. Por favor, tente novamente!");
            location.href = "../eventos.php";
        </script>
        <?
        exit;
    }
}elseif(isset($_GET["e"])){
    $id = $_GET["e"];
    $eventosVO->setId($id);
    if($eventosBO->deleteEvento($eventosVO)){
        ?>
        <script>
            alert("Evento excluído com sucesso!");
            location.href = "../eventos.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro na remoção do evento. Por favor, tente novamente!");
            location.href = "../eventos.php";
        </script>
        <?
        exit;
    }
}