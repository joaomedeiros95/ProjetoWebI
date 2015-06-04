<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 30/05/15
 * Time: 20:14
 */

include_once('header.php');

function selecioneTipoExame() {
    $tipoExame = new tipo_exameDAO();
    $result = $tipoExame->getALL();

    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id_tipo_exame'] . "'>" . $row['nome'] . "</option>";
    }
}

function selecioneTipoProcedimento() {
    $tipoExame = new tipo_procedimentoDAO();
    $result = $tipoExame->getALL();

    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id_tipo_procedimento'] . "'>" . $row['descricao'] . "</option>";
    }
}

?>

<div class="container row">
    <?php include_once('navbar.php') ?>
    <form class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 " method="post" action="controleMarcarProcedimento.php">
        <div class="checkbox">
            <label>
                <input id="consulta" type="radio" name="tipoProcedimento" value="<?php echo tipo_procedimentoDAO::$CONSULTA; ?>" checked> Consulta
            </label>
            <label>
                <input id="exame" type="radio" name="tipoProcedimento" value="<?php echo tipo_procedimentoDAO::$EXAME; ?>"> Exame
            </label>
        </div>
        <div class="form-group">
            <label for="paciente">Paciente: </label>
            <input type="text" id="paciente" class="form-control" name="paciente" onkeyup="showHint(this.value, this.id, <?php echo tipo_pessoaDAO::$PACIENTE; ?>) " required>
            <div id="suggestion_paciente" class="autocomplete"></div>
            <input type="hidden" name="id_paciente" id="paciente_hidden" />
        </div>
        <div class="form-group consulta">
            <label for="medico">Médico: </label>
            <input type="text" id="medico" class="form-control" name="medico" onkeyup="showHint(this.value, this.id, <?php echo tipo_pessoaDAO::$MEDICO; ?>)">
            <div id="suggestion_medico" class="autocomplete"></div>
            <input type="hidden" name="id_medico" id="medico_hidden" />
        </div>
        <div class="form-group exame noVisible">
            <label for="medico">Enfermeira: </label>
            <input type="text" id="enfermeira" class="form-control" name="enfermeira" onkeyup="showHint(this.value, this.id, <?php echo tipo_pessoaDAO::$ENFERMEIRA; ?>)">
            <div id="suggestion_enfermeira" class="autocomplete"></div>
            <input type="hidden" name="id_enfermeira" id="enfermeira_hidden" />
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
            <label for="duracao">Hora Fim: </label>
            <input type="time" id="duracao" class="form-control" name="duracao" required>
        </div>
        <div class="form-group exame noVisible">
            <label for="duracao">Tipo Exame: </label>
            <select name="id_tipo_exame" class="form-control">
                <option value="0">-- SELECIONE --</option>
                <?php echo selecioneTipoExame() ?>
            </select>
        </div>
        <div class="form-group consulta">
            <label for="duracao">Tipo Procedimento: </label>
            <select name="id_tipo_procedimento" class="form-control">
                <option value="0">-- SELECIONE --</option>
                <?php echo selecioneTipoProcedimento() ?>
            </select>
        </div>

        <button class="btn btn-danger" type="submit">Registrar Ponto</button>
    </form>

</div>


<?php include_once('../../footer.php') ?>
<?php echo '<script src= ' . getResource(AUTOCOMPLETEJS) . '></script>'; ?>
<script>
    $(':radio').on('change', function () {
        var th = $(this), value = th.attr('value');
        var campo1 = ".consulta";
        var campo2 = ".exame";
        if(th.is(':checked')) {
            switch (value) {
                case '1':
                    $(campo1).removeClass('noVisible');
                    $(campo2).addClass('noVisible');
                    break;
                case '2':
                    $(campo1).addClass('noVisible');
                    $(campo2).removeClass('noVisible');
                    break;
            }
        }
    });
</script>