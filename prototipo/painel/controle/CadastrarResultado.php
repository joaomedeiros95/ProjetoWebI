<?php

include_once('header.php');

?>
<div class="container-fluid row">
    <?php include_once('navbar.php') ?>
	
	<form class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 " method="post" action="ControleResultado.php">
      <h2> Cadastre o Resultado de Um Procedimento</h2>
		<br>
        <div class="form-group">
            <label for="examidado">Nome do Paciente: </label>
            <input type="text" id="examinado" class="form-control" name="examinado" required>
			<label for="laudo">Laudo: </label>
            <input type="text" id="laudo" class="form-control" name="laudo" required>
			<label for="id_procedimento">identificador do Procedimento </label>
            <input type="number" id="id_procedimento" placeholder="Somente Números" class="form-control" name="id_procedimento" required>
        </div>
       
		
		<button class="btn btn-danger" type="submit">Cadastrar Resultado</button>
    </form>


</div>
		
	