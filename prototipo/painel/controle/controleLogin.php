<?php
    include_once('../../config.php');

    /** Inicia a Sessão */
    session_start();

    $login = $_POST["Login"];
    $senha = $_POST["Senha"];
    
    $pessoa = new pessoaDAO();
    $logou = $pessoa->verificaLogin($senha, $login);
    
    if($logou == true) {
        unsetSession();
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;

        $tipo_pessoa = $pessoa->verificaNivelPessoa($senha);
        $_SESSION['nivel'] = $tipo_pessoa;
        if($tipo_pessoa != 4)
            header('location:index.php');
        else
            header('location:../paciente/painelPaciente.php');
    } else {
        destruirSessao();
        header('location:../login.php');
    }


