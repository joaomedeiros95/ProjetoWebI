<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once('../../config.php');

$material = new materialDAO();
$resultados = $material->findAllJoinTipoPessoa();

$retorno = "";
while($row = mysqli_fetch_assoc($resultados)) {
    if($retorno != "") {$retorno .= ",";}

    $retorno .= '{"Nome":"' . $row['nome'] . '",';
    $retorno .= '"Tipo":"' . $row['tipo'] . '",';
    $retorno .= '"Quantidade":"' . $row['quantidade'] . '",';
    $retorno .= '"Lote":"' . $row['lote'] . '",';
    $retorno .= '"Fornecedor":"' . $row['fornecedor'] . '",';
    $retorno .= '"Solicitador":"' . $row['solicitador'] . '",';
    $retorno .= '"id_tipo":"' . $row['id_tipo'] . '",';
    $retorno .= '"id":"' . $row['codigo'] . '"}';
}

$retorno = '{"records":[' . $retorno .']}';

echo $retorno;

