<?php

    include_once('../../config.php');

    session_start();
    if(!verificaUsuarioLogado()) {
        header('Location:../login.php');
    }
    verificaPainelCorreto($_SESSION['nivel'], $_SERVER['REQUEST_URI']);

    $logado = $_SESSION['login'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hospital Web</title>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        echo '<link rel="stylesheet" href=' . getResource(BSCSS . '/bootstrap.min.css') . '>';
        echo '<link rel="stylesheet" href=' . getResource(CSS . '/principal.css') . '>';
        echo '<link rel="stylesheet" href=' . getResource(CSS . '/localizacao.css') . '>';
    ?>
    <link rel="icon" href="../../favicon.ico">
</head>
<body class="panel-body">

	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php if($_SESSION['nivel'] == 4) { echo getResource(PAINELPACIENTE . '/painelPaciente.php');} else { echo getResource(PAINELCONTROLE . '/index.php'); } ?>">Hospital Web</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php if($_SESSION['nivel'] == 4) { echo getResource(PAINELPACIENTE . '/painelPaciente.php');} else { echo getResource(PAINELCONTROLE . '/index.php'); } ?>">Painel</a></li>
            <li><a href="<?php echo getResource(PAINELCONTROLE . '/perfil.php');?>">Meu Perfil</a></li>
            <?php if($_SESSION['nivel'] != 4){ echo '<li><a href="registrarPonto.php">Registrar Ponto</a></li>' ; } ?>
            <li><a href="ajuda.php" >Ajuda</a></li>
              <li><a href="../logout.php">Sair</a></li>
          </ul>
        </div>
      </div>
    </nav>