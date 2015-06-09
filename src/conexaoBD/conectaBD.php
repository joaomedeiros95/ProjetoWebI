<?php

function conectaBD($usr,$senha,$host, $database) {
    
    $conecta = mysqli_connect($host,$usr,$senha, $database);
    
    if(!$conecta){
        die(trigger_error("Conexão falhou!"));
        return false;
    }
    else {
        return $conecta;
    }
}


?>
