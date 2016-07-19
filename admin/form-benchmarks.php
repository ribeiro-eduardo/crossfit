<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 09/05/2016
 * Time: 21:08
 */
@session_start();
if($_SESSION["id_tipo_usuario"] != 1){
    header("Location: index.php");
}
include("meta.php");
include("header.php");

require("lib/DBMySql.php");
$classes = getClassesTreinos();
$categorias = getCategoriasTreinos();

?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Por favor, preencha os dados a seguir:</h1>

            <p style="color: red"><i>campos marcados com * s&atilde;o obrigat&oacute;rios</i></p>

            <form id="treinos" action="action/benchmark-action.php" name="treinos" method="POST">
                <div class="form-group">
                    <label for="id_categoria_treino">Categoria de treino:<span style="color: red"> *</span></label>
                    <select class="form-control" id="id_categoria_treino" name="id_categoria_treino">
                        <option value="" disabled selected>Selecione</option>
                        <?
                        for ($i = 0; $i < count($categorias); $i++) {
                            ?>
                            <option value="<?= $categorias[$i]['id'] ?>"><?= $categorias[$i]["nome"] ?></option>
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
                            <option value="<?= $classes[$i]['id'] ?>"><?= $classes[$i]["titulo"] ?></option>
                            <?
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="titulo">T&iacute;tulo:<span style="color: red"> *</span></label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <div class="form-group">
                    <label for="descricao">Descri&ccedil;&atilde;o:<span style="color: red"> *</span></label>
                    <textarea rows="6" class="form-control" id="descricao" name="descricao"></textarea>
                </div>
                <input type="hidden" name="acao" value="benchmark">
                <input type="submit" name="cadastrar" id="cadastrar" class="btn btn-default" value="Enviar">
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
