<?php include_once('config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hospital Web</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bs/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/principal.css">
</head>
<body>

<div class="logo-header" id="logo-header">
  <div class="container">
    <div class="header">
      <nav>
        <ul class="nav masthead-nav menu">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#sobre">Sobre</a></li>
          <li><a href="#contato">Contato</a></li>
          <li><a href="painel/login.php">Login</a></li>
          <li><a data-toggle='modal' data-target='#modalCadastro'>Cadastro</a></li>
        </ul>
      </nav>
      <h3 class="text-muted nome-logo">Hospital Web</h3>
    </div>
  </div>
</div>
