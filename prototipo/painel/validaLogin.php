<?php
    
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    
    $filename = "regLogin.txt";
    $read = file($filename, FILE_IGNORE_NEW_LINES);
    $idex = 0;
    $aux = explode(" ", $read);
    $aux2 = 0;
    
    while (index < count($read)){
        
        
        if(login == $aux[$index] && senha == $aux[$index+1]){
            
            echo '<label class="btn-success"> Sucesso!</label>';
        }
        
        
        $index++;
        $aux2++;
    }
    if($aux2 == count($read)) {
            
            
            echo '<label class="btn-danger">Login ou senha incorretos</label>';
        }
    
    
        fclose($read);
?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

