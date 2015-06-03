<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 30/05/15
 * Time: 20:14
 */

include_once('header.php');

?>

<div class="container">

    <form class="" method="post" action="controleProcedimento.php">
        <div class="form-group">
            <label for="paciente">Paciente: </label>
            <input type="text" id="paciente" class="form-control" name="paciente" onkeyup="showHint(this.value, this.id)" required>
            <div id="suggestion_paciente" class="autocomplete"></div>
            <input type="hidden" name="id_paciente" id="paciente_hidden" />
        </div>
        <div class="form-group">
            <label for="nome">Descrição: </label>
            <input type="text" id="nome" class="form-control" name="nome" required>
        </div>
        <div class="form-group">
            <label for="data">Data: </label>
            <?php echo '<input type="date" id="data" class="form-control" name="data" min=' . date('Y-m-d') . ' required>'; ?>
        </div>
        <div class="form-group">
            <label for="hora">Hora: </label>
            <input type="time" id="hora" class="form-control" name="hora" required>
        </div>
        <div class="form-group">
            <label for="duracao">Duração: </label>
            <input type="time" id="duracao" class="form-control" name="duracao" required>
        </div>

        <input type="hidden" name = "estado" value="">
        <input type="hidden" name = "codigo" value="">

        <button class="btn btn-danger" type="submit">Registrar Ponto</button>
    </form>

</div>


<?php include_once('../../footer.php') ?>
<?php echo '<script src= ' . getResource(AUTOCOMPLETEJS) . '></script>';