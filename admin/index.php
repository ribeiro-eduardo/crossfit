<? include("meta.php");

$erro = $_GET["e"];
$display = "display: none";

if($erro == 1){
    //não é admin
    $erro = "Ops! Esse usuário não é um administrador!";
    $display = "";
}elseif($erro == 2){
    //usuário inexistente
    $erro = "Ops! Usuário e/ou senha incorretos!";
    $display = "";
}elseif($erro == 3){
    //logout
    $erro = "";
}

?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/login-css.css">


<div class="container">
    <div class="row">
        <div class="login">
            <img class="img-responsive" src="img/logo.png">
            <div >
                <h4 class="text-uppercase text-center" style="padding: 5%">  <a class="link-login" href="../hd">Acesse o site aqui</a><br/>    ou<br/>Faça seu login</h4>
                <span id="erro" style="color: red; <?=$display?>"><?=$erro?></span>
                <form action="processausuarios.php" class="text-center" method="POST">
                    <div class=" form-group input-group">
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-user"></span>
                      </span>
                      <input type="text" id="userName" name="login" class="form-control chat-input"
                             placeholder="Usuário"/>
                     </div>
                    </br>
                    <div class=" form-group input-group">
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-lock"></span>
                      </span>
                      <input type="password" id="userPassword" name="senha" class="form-control chat-input"
                           placeholder="Senha"/>
                   </div>
                   <button type="submit" value="entrar" id="entrar" name="entrar" class="btn btn-details">Entrar</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    function mostraErro(){
        $('#erro').show();
    }
</script>
