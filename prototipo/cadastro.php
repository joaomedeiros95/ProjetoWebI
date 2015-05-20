<html>

    
        <head>
            <title>Cadastro</title>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="bs/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/principal.css">
        </head>
    
    
    <body>
        
            <div class="imgForm">

                <img src="img/sgh.jpg">

            </div>
        
            <div class="localForm">
                <form class="list-group" method="post" action="painel/validaCadastro.php" >
                    <table class="">
  
                        <tr><td><label for="Pnome" >Nome</label><td/> <td> <input class="input-sm " type="text" name="Pnome"></td></tr>
                        <tr><td><label class=""for="Snome">Sobrenome</label><td/> <td><input class="input-sm" type="text" name="Snome"></td></tr>
                        <tr><td><label class=""for="login">Login</label><td/> <td><input class="input-sm" type="text" name="login" required="1"></td></tr>
                        <tr><td><label for="endereco">Endereço</label><td/> <td><input class="input-sm" type="text" name="endereco"></td></tr>
                        <tr><td><label for="email">Email</label><td/> <td><input class="input-sm" type="text" name="email"></td></tr>
                        <tr><td><label for="senha">Senha</label><td/> <td><input class="input-sm" type="password" name="senha" required="1"></td></tr> 
                        <tr><td> <label  for="resenha">Repetir senha</label><td/> <td><input class="input-sm" type="password" name="resenha"required="1"> </td></tr> 

                           
                        
                        <tr >
                         
                            <td>
                                <button class="btn danger cor " type="submit">Enviar</button>
                            </td>
                            <td >
                                <button class="btn danger cor " type="reset">Limpar</button>
                            </td>
                        
                        </tr>
                        
                        
                  </table>   
                </form>
            </div>
            <div class="btn-default"></div>
            <?php
                include 'footer.php';
            ?>

           
    </body>
</html>