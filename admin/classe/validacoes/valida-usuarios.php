<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Ribeiro
 * Date: 08/04/2016
 * Time: 23:22
 */
$acao = $_GET['a'];

if($id_tipo_usuario == ""){
    ?>
    <script>
        alert("Por favor, selecione o tipo de usu\u00e1rio");
    </script>
    <?
    return false;
}
if($nome == ""){
    ?>
    <script>
        alert("Por favor, preencha o nome do usu\u00e1rio");
    </script>
    <?
    return false;
}
if($cpf == ""){
    ?>
    <script>
        alert("Por favor, preencha o CPF do usu\u00e1rio");
    </script>
    <?
    return false;
}
if($data_nascimento == ""){
    ?>
    <script>
        alert("Por favor, selecione a data de nascimento do usu\u00e1rio");
    </script>
    <?
    return false;
}
if($email == ""){
    ?>
    <script>
        alert("Por favor, preencha o e-mail do usu\u00e1rio");
    </script>
    <?
    return false;
}
if($login == ""){
    ?>
    <script>
        alert("Por favor, preencha o login do usu\u00e1rio");
    </script>
    <?
    return false;
}
if($acao == "cadastrar"){
    if($senha == ""){
        ?>
        <script>
            alert("Por favor, preencha a senha do usu\u00e1rio");
        </script>
        <?
        return false;
    }
}

if($telefone == ""){
    ?>
    <script>
        alert("Por favor, preencha o telefone do usu\u00e1rio");
    </script>
    <?
    return false;
}
if($celular == ""){
    ?>
    <script>
        alert("Por favor, preencha o celular do usu\u00e1rio");
    </script>
    <?
    return false;
}