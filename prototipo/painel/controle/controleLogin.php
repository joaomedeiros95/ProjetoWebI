<?php
    include_once('../../config.php');

    /** Inicia a Sessão */
    session_start();

    $login = $_POST["Login"];
    $senha = $_POST["Senha"];
    
    $pessoa = new pessoaDAO();
    $logou = $pessoa->verificaLogin($senha, $login);
    
    if($logou == true) {
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;

        $tipo_pessoa = $pessoa->verificaNivelPessoa($senha);
        if($tipo_pessoa != 4)
            header('location:index.php');
        else
            echo 'Faltando implementar';
    } else {
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        header('location:../login.php');
    }


