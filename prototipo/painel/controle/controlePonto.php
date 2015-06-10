<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 30/05/15
 * Time: 20:54
 */

session_start();

include_once('../../config.php');

$hentrada = $_POST['hora_entrada'];
$hsaida = $_POST['hora_saida'];
$estado = $_POST['estado'];
$codigo = $_POST['codigo'];
$usuario = (int) $_SESSION['senha'];

switch($estado) {
    case 0:
        $valores = "'" .$hentrada . "', " . $usuario;
        $campos = "hentrada, id_pessoa";
        break;
    case 1:
        $camposvalores = "hsaida = '" . $hsaida . "', id_pessoa = " . $usuario;
        break;
    case 2:
        $valores = "'" .$hentrada . "', " . $usuario;
        $campos = "hentrada, id_pessoa";
        break;
}

$sistema_ponto = new sistema_pontoDAO();
if($estado == 0 || $estado == 2) //Caso for registrar entrada inserir
    $sistema_ponto->inserir($campos, $valores);
else //Caso for registrar saida atualizar
    $sistema_ponto->atualizar($camposvalores, " codigo = " . $codigo);

header('location:registrarPonto.php');