<?php

include_once('header.php');

?>

<div class="container-fluid row">
    <?php include_once('navbar.php') ?>
    <form class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 " method="post" action="ControleExame.php">
      <h2> Cadastre Aqui um Novo tipo de Exame:		</h2>
		<br>
        <div class="form-group">
            <label for="nome">Nome do Exame: </label>
            <input type="text" id="nome" class="form-control" name="nome" required>
        </div>
       
		
		<button class="btn btn-danger" type="submit">Cadastrar Exame</button>
    </form>

</div>