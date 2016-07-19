<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 24/05/2016
 * Time: 16:52
 */
@session_start();
if($_SESSION["id_tipo_usuario"] != 1){
    header("Location: index.php");
}
include("meta.php");
include("header.php");

require("lib/DBMySql.php");
require("classe/bo/benchmarksBO.php");
require("classe/vo/benchmarksVO.php");

$benchmarksBO = new benchmarksBO();
$benchmarksVO = new benchmarksVO();

$id = $_GET["id"];

$benchmarksVO->setId($id);

$benchmark = $benchmarksBO->get($benchmarksVO);

$classes = getClassesTreinos();
$categorias = getCategoriasTreinos();

?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Por favor, preencha os dados a seguir:</h1>

            <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>

            <form id="benchmarks" action="action/benchmark-action.php" name="benchmarks" method="POST">
                <div class="form-group">
                    <label for="id_categoria_treino">Categoria de treino:<span style="color: red"> *</span></label>
                    <select class="form-control" id="id_categoria_treino" name="id_categoria_treino">
                        <option value="" disabled selected>Selecione</option>
                        <?
                        for ($i = 0; $i < count($categorias); $i++) {
                            ?>
                            <option value="<?= $categorias[$i]['id'] ?>"<? if($benchmark["id_categoria_treino"] == $categorias[$i]["id"]){ echo "selected";}?>><?= $categorias[$i]["nome"] ?></option>
                            <?
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_classe_treino">Classe de treino:<span style="color: red"> *</span></label>
                    <select class="form-control" id="id_classe_treino" name="id_classe_treino">
                        <option value="" disabled selected>Selecione</option>
                        <?
                        for ($i = 0; $i < count($classes); $i++) {
                            ?>
                            <option value="<?= $classes[$i]['id'] ?>"<? if($benchmark["id_classe_treino"] == $classes[$i]["id"]){ echo "selected";}?>><?= $classes[$i]["titulo"] ?></option>
                            <?
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="titulo">T&iacute;tulo:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?=$benchmark["titulo"]?>">
                </div>
                <div class="form-group">
                    <label for="descricao">Descri&ccedil;&atilde;o:<span style="color: red"> *</span></label>
                    <textarea class="form-control" id="descricao" name="descricao"><?=$benchmark["descricao"]?></textarea>
                </div>
                <input type="hidden" name="id" value="<?=$benchmark['id']?>">
                <input type="submit" name="editar" id="editar" class="btn btn-default" value="Salvar altera&ccedil;&otilde;es">
            </form>
        </div>
    </div>
</div>

<script>

    $('#cadastrar').click(function () {
        var id_categoria_treino = $('#id_categoria_treino').val();
        var id_classe_treino = $('#id_classe_treino').val();
        var titulo = $('#titulo').val();
        var descricao = $("#descricao").val();

        if (id_categoria_treino == null) {
            alert("Por favor, selecione a categoria do treino!");
            $('#id_categoria_treino').focus();
            return false;
        }
        else if (id_classe_treino == null) {
            alert("Por favor, selecione a classe do treino!");
            $('#id_classe_treino').focus();
            return false;
        } else if (titulo == "") {
            alert("Por favor, preencha o título!");
            $('#titulo').focus();
            return false;
        } else if (descricao == "") {
            alert("Por favor, preencha a descrição!");
            $('#descricao').focus();
            return false;
        }
    });

</script>
