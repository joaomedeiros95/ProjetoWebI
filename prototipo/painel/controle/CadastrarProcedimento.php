<?php

include_once('header.php');

?>

<div class="container row">
    <?php include_once('navbar.php') ?>
    <form class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 " method="post" action="ControleProcedimento.php">
      <h2> Cadastre Aqui um Novo tipo de Procedimento</h2>
		<br>
        <div class="form-group">
            <label for="nome">Nome do Procedimento: </label>
            <input type="text" id="nome" class="form-control" name="nome" required>
        </div>
       
		
		<button class="btn btn-danger" type="submit">Cadastrar Procedimento</button>
    </form>

</div>