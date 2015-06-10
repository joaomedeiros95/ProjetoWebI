<?php
    include_once('../config.php');

    session_start();
    if(verificaUsuarioLogado()) {
        if($_SESSION['nivel'] == tipo_pessoaDAO::$PACIENTE) {
            header('Location:paciente/index.php');
        } else {
            header('Location:controle/index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - Hospital Web</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/principal.css">
</head>
<body class="login-body">

<div class="container">

    <form class="form-signin" method="post" action="controle/controleLogin.php">
        <h2 class="form-signin-heading text-center">Hospital Web</h2>
        <input type="email" id="inputEmail" class="form-control" placeholder="Login" name="Login" required autofocus>
        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="Senha" required>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Lembrar de mim
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Fazer login</button>
    </form>

</div>
<!-- /container -->

<?php include_once('../footer.php') ?>