<?php

	include_once('../../config.php');

	$consultas = new procedimentoDAO();
	$resultado = $consultas->resultadoExame($_SESSION['senha']);

	$verifica = mysqli_num_rows($resultado);

    $imprimir = "";
	if($verifica > 0){
        $imprimir .= "<table class='table'><tr><th>Exame</th><th>Data</th><th></th></tr>";
        while ($row = mysqli_fetch_assoc($resultado)) {
            $imprimir .= '<tr>';
            $imprimir .= "<td>" . $row['nome'] . "</td>";
            $imprimir .= "<td>" . $row['Hentrada'] . "</td>";
            $imprimir .= "<td><a target='blank' href=" . $row['exame'] . "><span class='glyphicon glyphicon-cloud-download'</a></td>";
            $imprimir .= '</tr>';
        }
        $imprimir .= "</table>";
	}
	else {
		
		$imprimir .=  "<li class='list-group-item'>Não há exames disponiveís no momento!</li></ul>";
	}
	echo $imprimir;
?>