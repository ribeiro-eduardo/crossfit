<? include("meta.php");
error_reporting(E_ALL ^ E_NOTICE);

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
        <div class="col-md-offset-5 col-md-3">
            <img src="img/logo.png" width="100%" height="25%">
            <div class="form-login">
                <h4>Preencha login e senha:</h4>
                <span id="erro" style="color: red; <?=$display?>"><?=$erro?></span>
                <form action="processausuarios.php" method="POST">
                    <input type="text" id="userName" name="login" class="form-control input-sm chat-input"
                           placeholder="Login"/>
                    </br>
                    <input type="password" id="userPassword" name="senha" class="form-control input-sm chat-input"
                           placeholder="Senha"/>
                    </br>
                    <div class="wrapper">
                <span class="group-btn"> 
                    <input type="submit" value="entrar" id="entrar" name="entrar">
                    <a href="#" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></a>
                </span>
                    </div>

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