<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once('../../config.php');

$horarios = new sistema_pontoDAO();
$resultados = $horarios->getAllJoinPessoa();

$retorno = "";
while($row = mysqli_fetch_assoc($resultados)) {
    if($retorno != "") {$retorno .= ",";}

    
    $retorno .= '{"Entrada":"' . $row['hentrada'] . '",';
    $retorno .= '"Saida":"' . $row['hsaida'] . '",';
	$retorno .= '"Nome":"' . $row['nome'] . '",';
    $retorno .= '"CPF":"' . $row['id_pessoa'] . '"}';
}

$retorno = '{"records":[' . $retorno .']}';

echo $retorno;

