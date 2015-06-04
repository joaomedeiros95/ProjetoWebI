<?php 
	include_once('../../config.php');
	
	$resultado = new resultadoDAO();
	
	$examinado = $_REQUEST['examinado'];
	$laudo = $_REQUEST['laudo'];
	$id_procedimento = $_REQUEST['id_procedimento'];
	
	$resultado->inserir("examinado, laudo, id_procedimento", "'" . $examinado . "','". $laudo. "'," .$id_procedimento. "");
	
	echo '<script>alert("Cadastrado com Sucesso.");window.location.replace("http://joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/CadastrarResultado.php");</script>';