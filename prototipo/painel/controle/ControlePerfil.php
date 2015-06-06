<?php

include_once('header.php');


$CPF = $_SESSION['senha'];
$dados = new pessoaDAO();
$dados_resultados = $dados->findByCPF($CPF);

$nome_retorno = "";
$sobrenome_retorno = "";
$data_retorno = "";
$cpf_retorno = "";
$rg_retorno = "";
$rua_retorno = "";
$cidade_retorno = "";
$email_retorno = "";
$telefone_retorno = "";
$espaco =" ";

while($row = mysqli_fetch_assoc($dados_resultados)) {
        
    $nome_retorno .= $row['nome'] ;
   	$data_retorno .= $row['data_nascimento'];
	$telefone_retorno .= $row['telefone'];
	$rg_retorno .= $row['rg'];
	$rua_retorno .= $row['endereco'];
	$cidade_retorno .= $row['cidade_estado'];
	$email_retorno .= $row['email'];
    $cpf_retorno .= $row['cpf'];
}

?>









