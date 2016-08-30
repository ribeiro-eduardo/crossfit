<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 29/08/2016
 * Time: 23:28
 */

require_once("../admin/lib/DBMySql.php");
require("../admin/classe/bo/usuariosBO.php");
require("../admin/classe/vo/usuariosVO.php");

require_once('../admin/classe/bo/uploadBO.php');

$usuariosVO = new usuariosVO();
$usuariosBO = new usuariosBO();
$uploadBO = new uploadBO();

if(isset($_POST['editar-hd'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $aux = explode('/', $data_nascimento);
    $data_nascimento = $aux[2]."-".$aux[1]."-".$aux[0];
    $altura = $_POST['altura'];
    $altura = str_replace(",", "", $altura);
    $peso = $_POST['peso'];
    $peso = str_replace(",", ".", $peso);
    $dir = $_POST['dir'];
    //echo $dir; exit;

    $usuariosVO->setId($id);
    $usuariosVO->setNome($nome);
    $usuariosVO->setEmail($email);
    $usuariosVO->setData_nascimento($data_nascimento);
    $usuariosVO->setAltura($altura);
    $usuariosVO->setPeso($peso);

    $imagem = $_FILES["file"];

    $_UP['extensoes'] = array('jpg', 'jpeg', 'png', 'gif');

    if($imagem != ""){
        if ($imagem['error'] == 0 && $imagem['size'] > 0) {

            if ($imagem['size'] > 8000000) {

                ?>
                <script>
                    alert("Escolha uma imagem de no máximo 8 MB!");
                    window.history.back();
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

                    $uploadBO->pasta = "../../hd/$dir";

                    $uploadBO->nome = $_FILES["file"]['name'];

                    $uploadBO->tmp_name = $_FILES["file"]['tmp_name'];

                    $uploadBO->img_marca = "";

                    $imagem = $uploadBO->uploadArquivo(TRUE);

                    $usuariosVO->setImagem($imagem);

                }

            }

        } else {

            $msg = "Escolha imagens dos tipos jpg, jpeg, gif ou png de no m&aacute;ximo 1,5 MB";
        }
    }

    if($usuariosBO->editPerfil($usuariosVO)) {
        ?>
        <script>
            alert("Perfil alterado com sucesso!");
            location.href = "perfil.php";
        </script>
        <?
        exit;
    }else{
        ?>
        <script>
            alert("Ocorreu um erro na alteração do seu perfil. Por favor, tente novamente!");
            location.href = "perfil.php";
        </script>
        <?
        exit;
    }
}
