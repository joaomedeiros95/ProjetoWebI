<?php

include_once('header.php');

?>

<?php include_once('navbar.php') ?> 

<?php
include_once('ControlePerfil.php');
?>



<div class="container-fluid row">
    
	
            <form class="list-group col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 " method="post" action="AtualizarPerfil.php">
                
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input class="input-sm form-control " type="text" value="<?php echo $nome_retorno?>" name="nome">
                </div>
              
                <div class="form-group">
                    <label for="data">Data de Nascimento</label>
                    <input class="input-sm form-control" type="text" name="data" value="<?php echo $data_retorno?>" onkeyup="formatarData(this)" maxlength="10" required>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input class="input-sm form-control" type="text" name="cpf" value="<?php echo $cpf_retorno?>" onkeyup="return formatarInteiros(this);" maxlength="11" required>
                </div>
                <div class="form-group">
                    <label for="rg">RG</label>
                    <input class="input-sm form-control" type="text" name="rg" value="<?php echo $rg_retorno?>" onkeyup="return formatarInteiros(this);" maxlength="11" required>
                </div>
                <div class="form-group">
                    <label for="rua">Rua</label>
                    <input class="input-sm form-control" type="text" value="<?php echo $rua_retorno?>" name="rua">
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade/Estado</label>
                    <input class="input-sm form-control" type="text" value="<?php echo $cidade_retorno?>" name="cidade" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="input-sm form-control" type="text" value="<?php echo $email_retorno?>" name="email" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input class="input-sm form-control" type="text" value="<?php echo $telefone_retorno?>" name="telefone" required>
                </div>
                 
                <button class="btn btn-danger " type="submit">Atualizar Dados</button>
               
            </form>

	
	
</div>

