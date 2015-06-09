<?php 
	include_once('../../config.php');
	
	$Atualiza_perfil = new pessoaDAO();
	
	$nome = $_REQUEST['nome'];
	$data = $_REQUEST['data'];
	$cpf = $_REQUEST['cpf'];
	$rg = $_REQUEST['rg'];
	$rua = $_REQUEST['rua'];
	$cidade = $_REQUEST['cidade'];
	$email = $_REQUEST['email'];
	$telefone = $_REQUEST['telefone'];
	
	$camposvalores = "nome = '" . $nome . "', data_nascimento = '" . $data."', rg = ". $rg. ", endereco = '". $rua . "', cidade_estado = '" . $cidade . "', email = '". $email. "', telefone =". $telefone. ""; 
	
	$where =  "cpf = " . $cpf;	

	$Atualiza_perfil->atualizar($camposvalores, $where );
	
	

	echo '<script>alert("Atualizado com Sucesso.");window.location.replace("http://joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/perfil.php");</script>';