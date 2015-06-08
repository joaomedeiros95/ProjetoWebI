<?php

     $login = $_POST["login"];
     $senha = $_POST["senha"];
     $resenha = $_POST["resenha"];

     if($senha == $resenha){
         
         echo '<html>
            <head>
                <meta charset="UTF-8">
                <link rel="stylesheet" href="bs/css/bootstrap.min.css">
                <link rel="stylesheet" href="css/principal.css">
            </head>

            <body>
                <label class="btn-success"> Sucesso!!</label>
            </body>
            </html>';
         
         $cadastroUsr = "$login $senha";
         $grava = fopen("regLogin.txt", "rw+");
         fwrite($f, $cadastroUsr);
         fclose($f);
     }
     else{
         
         echo '<html>
            <head>
                <meta charset="UTF-8">
                <link rel="stylesheet" href="bs/css/bootstrap.min.css">
                <link rel="stylesheet" href="css/principal.css">
            </head>

            <body>
                <label class="btn-sucess"> Repita a senha!!</label>
            </body>
            </html>';
         
     }
     
?>


