<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once('../../config.php');

$plantoes = new plantaoDAO();
$resultados = $plantoes->findAllJoinPessoaEspecialidade();

$retorno = "";
while($row = mysqli_fetch_assoc($resultados)) {
    if($retorno != "") {$retorno .= ",";}

    
    $retorno .= '{"Entrada":"' . $row['hentrada'] . '",';
    $retorno .= '"Saida":"' . $row['hsaida'] . '",';
	$retorno .= '"Especialidade":"' . $row['especialidade'] . '",';
    $retorno .= '"CPF":"' . $row['nome'] . '"}';
}

$retorno = '{"records":[' . $retorno .']}';

echo $retorno;

