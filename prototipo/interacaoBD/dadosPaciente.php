<?php
//////////////////////////////////////////
include 'conexaoBD/conectaBD.php';////////       
include 'conexaoBD/desconectBD.php';/////
/////////////////////////////////////////


///////////////////Dados do Banco de Dados////////////////
$banco = "hospital_web";//////////////////////////////////
$usr = "root";////////////////////////////////////////////
$senha = "gugahmf8802";///////////////////////////////////
$host = "localhost";//////////////////////////////////////
//////////////////////////////////////////////////////////

/** Dados vindo do formulario de cadastro do paciente**/
$nome = $_REQUEST['Pnome']+" "+$_REQUEST['Snome'];
$cpf = $_REQUEST['cpf'];
$rg = $_REQUEST['rg'];
$dataNascimento = $_REQUEST['dtnascimento'];
$rua = $_REQUEST['rua'];
$cidadeEstado = $_REQUEST['cidadeEstado'];
$email = $_REQUEST['email'];
$telefone = $_REQUEST['tel'];

/** Define o login e a senha do paciente**/
$login = $email;
$senha = $cpf;


/** Define o modelo para envio dos dados para o BD**/
$enviarV1 = "'".$cpf."'".",'".$nome."'".",'".$rua."'".",'".$cidadeEstado."','".$rg."'".",'".$dataNascimento."','".$email."'".",'".$telefone."'"."";
$enviarV2 = "cpf, nome, , endereco, cidade_estado, rg, data_nascimento, email, telefone";
    
    
$inserir = "INSERT INTO 'pessoa' ($enviarV2) VALUES ($enviarV2)";//query para inserir
    
    
   
    
    if($conectar = conectaBD($banco, $usr, $senha, $host)){//tenta abrir a conexão
        
        if(mysql_query($inserir,$conectar)){//envia a query para o banco
            
            desconectarBD($conectar);
            echo 'query enviada!';
            return true;
        }
        else{
            
            echo 'Query invalida!';
            return true;
        }
    }
    else{
        
        return false;
    }
    


?>