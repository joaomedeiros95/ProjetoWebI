<html>

    
        <head>
            <title>Cadastro</title>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="bs/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/principal.css">
        </head>
    
    
    <body>
        
            <div class="imgForm form-group">

                <img src="img/sgh.jpg">

            </div>
        
            <div class="localForm">
                <form class="list-group" method="post" action="interacaoBD/dadosPaciente.php" >
                    <table class="">
  
                        <tr><td><label for="Pnome" >Nome</label><td/> <td> <input class="input-sm form-control " type="text" name="Pnome"></td></tr>
                        <tr><td><label for="Snome">Sobrenome</label><td/> <td><input class="input-sm form-control" type="text" name="Snome"></td></tr>
                        <tr><td><label for="dtNascimento">Data de Nascimento</label><td/> <td><input class="input-sm form-control" type="text" name="dtnascimento" required></td></tr>
                        <tr><td><label for="cpf">CPF</label><td/> <td><input class="input-sm form-control" type="text" name="cpf" required></td></tr>
                        <tr><td><label for="rg">RG</label><td/> <td><input class="input-sm form-control" type="text" name="rg" required></td></tr>
                        <tr><td><label for="rua">Rua</label><td/> <td><input class="input-sm form-control" type="text" name="rua"></td></tr>
                        <tr><td><label for="cidadeEstado">Cidade/Estado</label><td/> <td><input class="input-sm form-control" type="text" name="cidadeEstado" required ></td></tr>
                        <tr><td><label for="email">Email</label><td/> <td><input class="input-sm form-control" type="text" name="email" required></td></tr>
                        <tr><td><label for="telefone">Telefone</label><td/> <td><input class="input-sm form-control" type="text" name="telefone" required></td></tr> 
                        
                        <tr>
                         
                            <td class="">
                                <button class="btn btn-group cor " type="submit">Enviar</button>
                            </td>
                            <td class="">
                                <button class="btn btn-group cor " type="reset">Limpar</button>
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