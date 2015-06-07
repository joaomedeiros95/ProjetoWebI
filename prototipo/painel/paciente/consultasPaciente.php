<?php

	//session_start();

	include_once('../../config.php');

	$consultas = new procedimentoDAO();
	$resultado = $consultas->consultasPaciente($_SESSION['senha']);

    $imprimir = "";
    $teste = mysqli_num_rows($resultado);
    if ($teste > 0) {
        $imprimir .= "<table class='table'><tr><th>Procedimento</th><th>Data</th><th>Paciente</th></tr>";
        while ($row = mysqli_fetch_assoc($resultado)) {
            $data = date($row['Hentrada']);
                $imprimir .= "<tr>";
                $imprimir .= "<td>" . $row['pnome'] . "</td><td>" . $data . "</td><td>" . $row['nome'] . "</td>";
                $imprimir .= "</tr>";
            }
        $imprimir .= "</table>";

    }
    else{
		$imprimir.= "Não há consultas no momento!";
	}
 	echo $imprimir;