<?php 
	include_once('../../config.php');
	
	$plantao = new plantaoDAO();
	
	$especialidade = $_REQUEST['especialidade'];
	$hentrada = $_REQUEST['hentrada'];
	$hsaida = $_REQUEST['hsaida'];
	$id_funcionario = $_REQUEST['id_funcionario'];
	
	$plantao->inserir("especialidade, hentrada, hsaida, id_funcionario", "" .$especialidade .  ",'". $hentrada . "','". $hsaida . "',".$id_funcionario."" );

	
	echo '<script>alert("Cadastrado com Sucesso.");window.location.replace("http://joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/CadastrarPlantao.php");</script>';