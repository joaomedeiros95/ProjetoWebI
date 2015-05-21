<?php

function conectaBD($banco,$usr,$senha,$host) {
    
    $conecta = mysql_connect($host,$usr,$senha);
    
    if(!conecta){
        
        die(trigger_error("Conexão falhou!"));
        return false;
    }
    else{
        
        echo 'conectou!';
        $bd = mysql_select_db($banco, $conecta);
        
        if(!$bd){
            
            die(trigger_error("Falha na conexaõ com o Banco de Dados!"));
            return false;
        }
        else{
            
            echo "sucess";
            return $conecta;
        }
    }
}


?>
