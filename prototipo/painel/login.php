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

    <form class="form-signin" method="post" action="controle/validaLogin.php">
        <h2 class="form-signin-heading text-center">Hospital Web</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Login" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>

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