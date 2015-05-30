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
$id_tipo_pessoa = 0;
$plano_saude = $_REQUEST['plano_saude'];

if(isset($_REQUEST['id_tipo_pessoa'])) {
    $id_tipo_pessoa = $_REQUEST['id_tipo_pessoa'];

    /**
     * Atributos específicos por tipo_pessoa
     */
    $nivel_enfermeira = $_REQUEST['nivel_enfermeira'];
    $carga_horaria_semana = $_REQUEST['carga_horaria_semana'];
}

/** Define o login e a senha do paciente**/
$login = $email;
$senha = $cpf;

/** Define o modelo para envio dos dados para o BD**/
$valores = "" . $cpf . "" . ",'" . $nome . "'" . ",'" . $rua . "'" . ",'" . $cidadeEstado . "'," . $rg . "" . ",'" . $dataNascimento . "','" . $email . "'" . "," . $telefone . "" . "," . ($id_tipo_pessoa > 0 ? $id_tipo_pessoa : tipo_pessoaDAO::$PACIENTE) . "" . ",'" . $plano_saude . "'";
$campos = "cpf, nome, endereco, cidade_estado, rg, data_nascimento, email, telefone, id_tipo_pessoa, plano_saude_paciente";

/**
 * Caso tenha sido definido no Painel de Controle Informações Extras serão necessárias
 */
if(isset($_REQUEST['id_tipo_pessoa'])) {
    $valores .= "," . $nivel_enfermeira . ", " . $carga_horaria_semana . "";
    $campos .= ", nivel_enfermeira, carga_horaria_semanal_funcionario";
}

$pessoa = new pessoaDAO();
$pessoa->inserir($campos, $valores);

echo $nome . 'foi inserido com sucesso';