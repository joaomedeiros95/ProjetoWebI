<?php

	//session_start();

	include_once('../../config.php');

	$consultas = new procedimentoDAO();
	$resultado = $consultas->consultasPaciente($_SESSION['senha']);

	$imprimi = "<h1>Suas Consultas</h1><tr></br>";
   	$teste = mysqli_fetch_assoc($resultado);
	if($teste){
	while ($row = mysqli_fetch_assoc($resultado)) {
        $data = date($row['Hentrada']);
		
           $imprimir .= "<td>" . $row['procedimento.nome'] ."</td> <td>".$data."</td> <td>".$row['pessoa.nome'] ."</td></br>";

    }
    $imprimi .= "</tr>";
	
    echo $imprimi;
	}
	else{
		
		echo "<h3>Você não tem nenhuma consulta cadastrada no momento!</h3>";
	}
?>