<?php 
	include_once('../../config.php');
	
	$plantao = new plantaoDAO();
	
	$especialidade = $_REQUEST['id_especialidade'];
	$datahentrada = $_REQUEST['dataentrada'] . " " . $_REQUEST['hentrada'];
	$datahsaida = $_REQUEST['datasaida'] . " " . $_REQUEST['hsaida'];
	$id_funcionario = $_REQUEST['id_medico'];

	$plantao->inserir("especialidade, hentrada, hsaida, id_funcionario", "" .$especialidade .  ",'". $datahentrada . "','". $datahsaida . "',".$id_funcionario."" );

	
	echo '<script>alert("Cadastrado com Sucesso.");window.location.replace("http://joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/CadastrarPlantao.php");</script>';