<?php 
	include_once('../../config.php');
	
	$tipo_exame = new tipo_exameDAO();
	
	$nome = $_REQUEST['nome'];
	
	$tipo_exame->inserir("nome", "'" . $nome . "'");
	
	echo '<script>alert("Cadastrado com Sucesso.");window.location.replace("http://joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/CadastroExames.php");</script>';