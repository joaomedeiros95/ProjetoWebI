<?php

$procedimento = new procedimentoDAO();
$resultados = $procedimento->findAllAfterNow();

$retorno = "";
while($row = mysqli_fetch_assoc($resultados)) {
	$retorno .= "<tr><td>";
	$retorno .= $row['hora_entrada'] . "</td>";
	$retorno .= "<td>" . $row['paciente'] . "</td>";
	$retorno .= "<td>" . $row['medico'] . "</td>";
	$retorno .= "<td>" . $row['tipo_procedimento'] . "</td>";
	$retorno .= "</tr>";
}

echo $retorno;