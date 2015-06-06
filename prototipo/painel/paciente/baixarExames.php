<?php

	include_once('../../config.php');

	$consultas = new procedimentoDAO();
	$resultado = $consultas->resultadoExame($_SESSION['senha']);

	$imprimi = "<tr>";
   
	$verifica = mysqli_num_rows($resultado);
	if($verifica > 0){
	    while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<span>Exame: </span><td><a href'".$row['exame']."'></a></td>";
        }
	}
	else {
		
		echo "<h3>Não há exames disponiveís no momento!</h3>";
	}
?>