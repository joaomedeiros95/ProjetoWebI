<?php

function desconectarBD($conecta) {
    
    $fechar = mysqli_close($conecta);
    if(!$fechar) {
        die("Ocorreu um erro ao fechar conexão com o Banco");
    }
    
}
