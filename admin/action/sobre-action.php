<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 17/06/2016
 * Time: 01:29
 */

@session_start();
if ($_SESSION["autenticado_painel"] != "SIM") {
    header("Location: index.php");
}
require_once("../lib/DBMySql.php");
require("../classe/bo/sobreBO.php");
require("../classe/vo/sobreVO.php");

$sobreBO = new sobreBO();
$sobreVO = new sobreVO();

if (isset($_POST["editar"])) {
    $id_modulo = $_POST["id_modulo"];
    $id_usuario = $_POST["id_usuario"];
    $texto = $_POST["texto"];
//    echo "id modulo".$id_modulo."<br>";
//    echo "id usuario".$id_usuario."<br>";
//    exit;
    $sobreVO->setIdModulo($id_modulo);
    $sobreVO->setIdUsuario($id_usuario);
    $sobreVO->setTexto($texto);

    if ($sobreBO->editarTexto($sobreVO)) {
        ?>
        <script>
            var id_modulo = <?=$id_modulo?>;
            alert("Conte�do atualizado com sucesso!");
            if (id_modulo == 1) {
                location.href = "../visualizar-hd.php";
            } else if (id_modulo == 2) {
                location.href = "../visualizar-crossfit.php";
            }
        </script>
        <?
        exit;
    } else {
        ?>
        <script>
            var id_modulo = <?=$id_modulo?>;
            alert("Ocorreu um erro na atualiza��o do conte�do. Por favor, tente novamente!");
            if (id_modulo == 1) {
                location.href = "../visualizar-hd.php";
            } else if (id_modulo == 2) {
                location.href = "../visualizar-crossfit.php";
            }
        </script>
        <?
        exit;
    }
}
