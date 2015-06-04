<?php 
	include_once('../../config.php');
	
	$tipo_exame = new tipo_procedimentoDAO();
	
	$nome = $_REQUEST['nome'];
	
	$tipo_exame->inserir("descricao", "'" . $nome . "'");
	
	echo '<script>alert("Cadastrado com Sucesso.");window.location.replace("http://joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/CadastrarProcedimento.php");</script>';