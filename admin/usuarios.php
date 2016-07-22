<?

@session_start();
if($_SESSION["id_tipo_usuario"] != 1){
    header("Location: index.php");
}
$admin = false;


include('meta.php');

include("header.php");
require("lib/DBMySql.php");
require_once("classe/bo/usuariosBO.php");
require_once("classe/vo/usuariosVO.php");

$usuariosBO = new usuariosBO();
$usuariosVO = new usuariosVO();

$filtro = $_GET["filtro"];

switch ($filtro) {
    case "administradores":
        $usuariosVO->setId_tipo_usuario(1);
        break;
    case "coaches":
        $usuariosVO->setId_tipo_usuario(2);
        break;
    case "atletas":
        $usuariosVO->setId_tipo_usuario(3);
        break;
}

$usuarios = $usuariosBO->get($usuariosVO);
?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <h1>Usuários cadastrados</h1>
        <section>
          <div class="col-sm-4">
            <div class="form-group">
                  <label for="celular">Filtrar por tipo de usu&aacute;rio:</label>
                  <select class="form-control" id="filtro" name="filtro" onchange="filtrar()">
                      <option value="Todos" <? if ($filtro == "") echo "selected"; ?>>Todos</option>
                      <option value="Administradores" <? if ($filtro == "administradores") echo "selected"; ?>>
                          Administradores
                      </option>
                      <option value="Coaches" <? if ($filtro == "coaches") echo "selected"; ?>>Coaches</option>
                      <option value="Atletas" <? if ($filtro == "atletas") echo "selected"; ?>>Atletas</option>
                  </select>
              </div>
          </div>
          <div class="col-sm-8 text-right">
            <a href="form-usuarios.php" type="button" class="btn btn-default" style="font-weight: bold">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              Novo
            </a>
          </div>
        </section>

        <div class="col-lg-12">
            <table border="1" class="table table-striped">
                <thead>
                <tr>
                    <!--<th>ID</th>-->
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <? for ($i = 0; $i < count($usuarios); $i++) {
                    switch ($usuarios[$i]['id_tipo_usuario']) {
                        case 1:
                            $icone = "<img src='img/admin.png' width='20px' height='20px' title='Administrador'>";
                            break;
                        case 2:
                            $icone = "<img src='img/coach.png' width='20px' height='20px' title='Coach'>";
                            break;
                        case 3:
                            $icone = "<img src='img/athlete.png' width='20px' height='20px' title='Atleta'>";
                            break;
                    }
                    ?>
                    <tr>
                      <!--  <td><?= $usuarios[$i]['id'] ?></td> -->
                        <td onclick="document.location = 'visualizar-usuario.php?id=<?=$usuarios[$i]['id']?>'; "><?= $icone ?>&nbsp;&nbsp;<? echo $usuarios[$i]['nome']; ?></td>
                        <td><?= $usuarios[$i]['cpf'] ?></td>
                        <td>
                            <a href="javascript:void(0);" onclick="visualizar(<?= $usuarios[$i]['id'] ?>);"><span
                                    class="glyphicon glyphicon-edit" title="Visualizar" style="padding: 0 3%;"></span></a>
                            <a href="javascript:void(0);" onclick="excluir(<?= $usuarios[$i]['id'] ?>);"><span
                                    class="glyphicon glyphicon-trash" title="Excluir"></span></a>
                        </td>
                    </tr>
                <? } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">

    function visualizar(id) {
        window.location = 'visualizar-usuario.php?id=' + id;
    }

    function excluir(id) {
        if (confirm('Você tem certeza que deseja excluir esse usuário?')) {
            window.location = 'usuarios-action.php?acao=e&id=' + id;
        }
    }

    function filtrar() {
        var x = document.getElementById("filtro").value;
        if (x == "Administradores") {
            window.location = "usuarios.php?filtro=administradores";
        } else if (x == "Coaches") {
            window.location = "usuarios.php?filtro=coaches";
        } else if (x == "Atletas") {
            window.location = "usuarios.php?filtro=atletas";
        }
        else if (x == "Todos") {
            window.location = "usuarios.php";
        }
    }

</script>

<?php
 include("footer.php");
?>
