<?php

include_once('header.php');

?>
<div class="container-fluid row">
    <?php include_once('navbar.php') ?>
	
	

            <form class="list-group col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 " method="post" action="../ControlePerfil.php">
                
                <div class="form-group">
                    <label for="Pnome">Nome</label>
                    <input class="input-sm form-control " type="text" name="Pnome">
                </div>
                <div class="form-group">
                    <label for="Snome">Sobrenome</label>
                    <input class="input-sm form-control" type="text" name="Snome">
                </div>
                <div class="form-group">
                    <label for="dtNascimento">Data de Nascimento</label>
                    <input class="input-sm form-control" type="text" name="dtnascimento" onkeyup="formatarData(this)" maxlength="10" required>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input class="input-sm form-control" type="text" name="cpf" onkeyup="return formatarInteiros(this);" maxlength="11" required>
                </div>
                <div class="form-group">
                    <label for="rg">RG</label>
                    <input class="input-sm form-control" type="text" name="rg" onkeyup="return formatarInteiros(this);" maxlength="11" required>
                </div>
                <div class="form-group">
                    <label for="rua">Rua</label>
                    <input class="input-sm form-control" type="text" name="rua">
                </div>
                <div class="form-group">
                    <label for="cidadeEstado">Cidade/Estado</label>
                    <input class="input-sm form-control" type="text" name="cidadeEstado" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="input-sm form-control" type="text" name="email" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input class="input-sm form-control" type="text" name="telefone" required>
                </div>
                 <div class="form-group dependente enfermeira noVisible">
                    <label for="nivel_enfermeira">Nível Enfermeira</label>
                    <select name="nivel_enfermeira">
                        <option value = "0">-- SELECIONE --</option>
                        <?php
                            for($i = 1; $i <= 10; $i++) {
                                echo "<option value = '" . $i . "'>" . $i . "</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group dependente funcionario noVisible">
                    <label for="carga_horaria_semana">Carga Horária Semanal</label>
                    <input type="number" name="carga_horaria_semana" min="20" max="60">
                </div>
                <div class="form-group dependente paciente noVisible">
                    <label for="plano_saude">Plano de Saúde</label>
                    <input class="input-sm form-control" type="text" name="plano_saude">
                </div>
                <button class="btn btn-danger " type="submit">Atualizar Dados</button>
               
            </form>

	
	
</div>