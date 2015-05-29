<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 29/05/15
 * Time: 19:21
 */

include_once('../config.php');

/** Dados vindo do formulario de cadastro do paciente **/
$nome = $_REQUEST['Pnome'] . " " . $_REQUEST['Snome'];
$cpf = $_REQUEST['cpf'];
$rg = $_REQUEST['rg'];
$dataNascimento = $_REQUEST['dtnascimento'];
$rua = $_REQUEST['rua'];
$cidadeEstado = $_REQUEST['cidadeEstado'];
$email = $_REQUEST['email'];
$telefone = $_REQUEST['telefone'];

/** Define o login e a senha do paciente**/
$login = $email;
$senha = $cpf;

/** Define o modelo para envio dos dados para o BD**/
$valores = "" . $cpf . "" . ",'" . $nome . "'" . ",'" . $rua . "'" . ",'" . $cidadeEstado . "'," . $rg . "" . ",'" . $dataNascimento . "','" . $email . "'" . "," . $telefone . "" . "," . tipo_pessoaDAO::$PACIENTE . "";
$campos = "cpf, nome, endereco, cidade_estado, rg, data_nascimento, email, telefone, id_tipo_pessoa";

$pessoa = new pessoaDAO();
echo $valores . '<br>' . $campos;
$pessoa->inserir($campos, $valores);

echo $nome . 'foi inserido com sucesso';