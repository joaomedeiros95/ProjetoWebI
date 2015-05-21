<?php

function desconectarBD($conecta) {
    
    $fechar = mysql_close($conecta);
    if(!$fechar){
        
        echo "Não foi possivel desconectar";
        return false;
    }
    else{
        return true;
    }
    
}
?>