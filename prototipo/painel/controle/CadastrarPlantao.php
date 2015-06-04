<?php

include_once('header.php');

?>
<div class="container row">
    <?php include_once('navbar.php') ?>
	
	<form class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 " method="post" action="ControlePlantao.php">
      <h2> Cadastre Aqui um Plantão	</h2>
		<br>
        <div class="form-group">
            <label for="especialidade">Especialidade: </label>
            <input type="number" placeholder="Digite o Número Identificador" id="especialidade" class="form-control" name="especialidade" required>
			<label for="hentrada">Hora de Entrada: </label>
            <input type="text" id="hentrada" class="form-control" name="hentrada" value="yyyy-mm-dd hh:mm:ss" required>
			<label for="hsaida">Hora de Saída: </label>
            <input type="text" id="hsaida" class="form-control" name="hsaida" value="yyyy-mm-dd hh:mm:ss" required>
			<label for="id_funcionario">CPF do Funcionário: </label>
            <input type="number" id="id_funcionario" placeholder="Apenas Números" class="form-control" name="id_funcionario" required>
        </div>
       
		
		<button class="btn btn-danger" type="submit">Cadastrar Plantão</button>
    </form>
	
	
</div>