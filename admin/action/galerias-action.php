<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 05/06/2016
 * Time: 13:40
 */
require_once("../lib/DBMySql.php");

require("../classe/bo/galeriasBO.php");
require("../classe/vo/galeriasVO.php");

require("../classe/bo/galeriaFotosBO.php");
require("../classe/vo/galeriaFotosVO.php");

require_once('../classe/bo/uploadBO.php');

$galeriasVO = new galeriasVO();
$galeriasBO = new galeriasBO();

$galeriaFotosBO = new galeriaFotosBO();
$galeriaFotosVO = new galeriaFotosVO();

$uploadBO = new uploadBO();

$_UP['extensoes'] = array('jpg', 'jpeg', 'png', 'gif');

if (isset($_POST["cadastrar"])) {

    $nome = $_POST['nome'];
    $idGaleria = $galeriasBO->getNext();
    mkdir("../../galerias/".$idGaleria["AUTO_INCREMENT"]);
    $galeriasVO->setNome($nome);
    $galeriasVO->setStatus(1);

    if ($galeriasBO->newGaleria($galeriasVO)) {
//var_dump($_FILES);
        $file = $_FILES["arquivos"];
        $numFile = count(array_filter($file['name']));

        for ($i = 0; $i < $numFile; $i++) {

            if ($file['error'][$i] == 1) {
                ?>
                <script>
                    alert("Escolha imagens de no máximo 1,5 MB!");
                    location.href = "../galerias.php";
                </script>
                <?
                exit;
            }
            if ($file['error'][$i] == 0 && $file['size'][$i] > 0) {

                if ($file['size'][$i] > 1500000) {

                    $msg = "Escolha imagens de no m&aacute;ximo 1,5 MB";
                    //echo $msg;

                    //die("se ferrou");

                } else {

                    $nomeArquivo = $file['name'][$i];
                    $auxiliar = explode('.', $nomeArquivo);
                    $auxiliar2 = end($auxiliar);
                    $extensao = strtolower($auxiliar2);

                    if (array_search($extensao, $_UP['extensoes']) === false) {
                        $msg = "Por favor, envie arquivos com as seguintes extens&otilde;es: jpg, png ou gif";
                        //return;
                    } else {

                        $uploadBO->pasta = "../../galerias/".$idGaleria["AUTO_INCREMENT"];

                        $uploadBO->nome = $_FILES["arquivos"]['name'][$i];

                        $uploadBO->tmp_name = $_FILES["arquivos"]['tmp_name'][$i];

                        $uploadBO->img_marca = "";

                        $imagem = $uploadBO->uploadArquivo(TRUE);

                        $galeriaFotosVO->setIdGaleria($idGaleria["AUTO_INCREMENT"]);

                        $galeriaFotosVO->setNome($imagem);

//                        echo "<pre>";
//                        print_r($galeriaFotosVO);
//                        echo "</pre>";

                        if($galeriaFotosBO->newImagem($galeriaFotosVO)){
                            if($i == $numFile - 1){
                                $ultima = 1;
                            }
                        }

                        if ($ultima == 1) {
                            ?>
                            <script>
                                alert("Galeria inserida com sucesso!");
                                location.href = "../galerias.php";
                            </script>
                            <?
                            exit;
                        }
                    }

                }

            } else {

                $msg = "Escolha imagens dos tipos jpg, jpeg, gif ou png de no m&aacute;ximo 1,5 MB";
            }

        }
    } else {
        ?>
        <script>
            alert("Ocorreu um erro na gravação da galeria. Por favor, tente novamente!");
            location.href = "../galerias.php";
        </script>
        <?
        exit;
    }
}elseif(isset($_POST["editar"])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $file = $_FILES["arquivos"];
    $numFile = count(array_filter($file['name']));

    $galeriasVO->setId($id);
    $galeriasVO->setNome($nome);

    if($numFile == 0){
        if ($galeriasBO->editGaleria($galeriasVO)){
            ?>
            <script>
                alert("Galeria alterada com sucesso!");
                location.href = "../galerias.php";
            </script>
            <?
            exit;
        }
    }elseif($numFile > 0){
        if ($galeriasBO->editGaleria($galeriasVO)) {

            for ($i = 0; $i < $numFile; $i++) {

                if ($file['error'][$i] == 1) {
                    ?>
                    <script>
                        alert("Escolha imagens de no máximo 1,5 MB!");
                        location.href = "../visualizar-galeria.php?id="+<?=$id?>;
                    </script>
                    <?
                    exit;
                }
                if ($file['error'][$i] == 0 && $file['size'][$i] > 0) {

                    if ($file['size'][$i] > 1500000) {

                        $msg = "Escolha imagens de no m&aacute;ximo 1,5 MB";
                        //echo $msg;

                        //die("se ferrou");

                    } else {

                        $nomeArquivo = $file['name'][$i];
                        $auxiliar = explode('.', $nomeArquivo);
                        $auxiliar2 = end($auxiliar);
                        $extensao = strtolower($auxiliar2);

                        if (array_search($extensao, $_UP['extensoes']) === false) {
                            $msg = "Por favor, envie arquivos com as seguintes extens&otilde;es: jpg, png ou gif";
                            //return;
                        } else {

                            $uploadBO->pasta = "../../galerias/".$id;

                            $uploadBO->nome = $_FILES["arquivos"]['name'][$i];

                            $uploadBO->tmp_name = $_FILES["arquivos"]['tmp_name'][$i];

                            $uploadBO->img_marca = "";

                            $imagem = $uploadBO->uploadArquivo(TRUE);

                            $galeriaFotosVO->setIdGaleria($id);

                            $galeriaFotosVO->setNome($imagem);

//                        echo "<pre>";
//                        print_r($galeriaFotosVO);
//                        echo "</pre>";

                            if($galeriaFotosBO->newImagem($galeriaFotosVO)){
                                if($i == $numFile - 1){
                                    $ultima = 1;
                                }
                            }

                            if ($ultima == 1) {
                                ?>
                                <script>
                                    alert("Galeria alterada com sucesso!");
                                    location.href = "../galerias.php";
                                </script>
                                <?
                                exit;
                            }
                        }

                    }

                } else {

                    $msg = "Escolha imagens dos tipos jpg, jpeg, gif ou png de no m&aacute;ximo 1,5 MB";
                }

            }
        } else {
            ?>
            <script>
                alert("Ocorreu um erro na alteração da galeria. Por favor, tente novamente!");
                location.href = "../galerias.php";
            </script>
            <?
            exit;
        }
    }

}
elseif (isset($_GET["e"]) && $_GET["e"] == "excluir" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $galeriasVO->setId($id);
    if ($galeriasBO->deleteGaleria($galeriasVO)) {
        ?>
        <script>
            alert("Galeria excluída com sucesso!");
            location.href = "../galerias.php";
        </script>
        <?
        exit;
    } else {
        ?>
        <script>
            alert("Ocorreu um erro na remoção da galeria. Por favor, tente novamente!");
            location.href = "../galerias.php";
        </script>
        <?
        exit;
    }
}elseif(isset($_GET["e"]) && $_GET["e"] == "removeImg" && isset($_GET['idImg'])){
    $id = $_GET["idImg"];
    $idG = $_GET["idG"];
    $galeriaFotosVO->setId($id);
    if($galeriaFotosBO->deleteImagem($id)){
        ?>
        <script>
            alert("Imagem excluída com sucesso!");
            location.href = "../visualizar-galeria.php?id="+<?=$idG?>;
        </script>
        <?
        exit;
    } else {
        ?>
        <script>
            alert("Ocorreu um erro na remoção da galeria. Por favor, tente novamente!");
            location.href = "../visualizar-galeria.php?id="+<?=$idG?>;
        </script>
        <?
        exit;
    }
}