<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once('../../config.php');

$procedimento = new procedimentoDAO();
$resultados = $procedimento->findAllAfterNow();

$retorno = "";
while($row = mysqli_fetch_assoc($resultados)) {
    if($retorno != "") {$retorno .= ",";}

    $retorno .= '{"HoraEntrada":"' . $row['hora_entrada'] . '",';
    $retorno .= '"Paciente":"' . $row['paciente'] . '",';
    $retorno .= '"Medico":"' . $row['medico'] . '",';
    $retorno .= '"TipoProcedimento":"' . ($row['tipo_procedimento'] != null ? $row['tipo_procedimento'] : $row['tipo_exame']) . '"}';
}

$retorno = '{"records":[' . $retorno .']}';

echo $retorno;

