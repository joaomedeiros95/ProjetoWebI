<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 04/06/15
 * Time: 14:52
 */

include_once('../../config.php');

session_start();

$exameOrProcedimento = $_REQUEST['tipoProcedimento'];

$id_paciente = $_REQUEST['id_paciente'];
$descricao = $_REQUEST['nome'];
$dataInicio = $_REQUEST['data'];
$horaInicio = $_REQUEST['hora'];
$horaFim = $_REQUEST['duracao'];
$atendente = $_SESSION['senha'];

$entrada = $dataInicio . " " . $horaInicio . ":00";
$saida = $dataInicio . " " . $horaFim . ":00";

if($exameOrProcedimento == tipo_procedimentoDAO::$CONSULTA) {
    $medico = $_REQUEST['id_medico'];
    $tipoProcedimento = $_REQUEST['id_tipo_procedimento'];

    $campos = "id_tipo_procedimento, id_paciente, nome, Hentrada, HSaida, id_medico, id_atendente";
    $valores = "" . intval($tipoProcedimento) . "," . intval($id_paciente) . ",'" . $descricao . "','" . $entrada . "','" . $saida . "'," . intval($medico) . "," . intval($atendente);
} else {
    $enfermeira = $_REQUEST['id_enfermeira'];
    $tipoExame = $_REQUEST['id_tipo_exame'];

    $campos = "id_tipo_exame, id_paciente, nome, Hentrada, HSaida, id_enfermeira, id_atendente";
    $valores = "" . intval($tipoExame) . "," . intval($id_paciente) . ",'" . $descricao . "','" . $entrada . "','" . $saida . "'," . intval($enfermeira) . "," . intval($atendente);
}

$procedimento = new procedimentoDAO();
$procedimento->inserir($campos,$valores);

echo '<script>alert("Cadastrado com Sucesso.");window.location.replace("http://joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/marcarProcedimento.php");</script>';