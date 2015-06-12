<?php

include_once('header.php');

?>
<div class="container-fluid row">
    <?php include_once('navbar.php') ?>
	
	<form class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 " method="post" action="ControleResultado.php" enctype="multipart/form-data">
      <h2>Cadastre o Resultado de Um Procedimento</h2>
		<br>
        <div class="form-group">
            <label for="examidado">Nome do Paciente: </label>
            <input autocomplete="off" type="text" id="examinado" class="form-control" name="examinado" onkeyup="showHint(this.value, this.id, <?php echo tipo_pessoaDAO::$PACIENTE; ?>) " required>
            <div id="suggestion_examinado" class="autocomplete" onclick="populateSelect()"></div>
            <input type="hidden" name="id_examinado" id="examinado_hidden" />
        </div>
        <div class="form-group">
			<label for="laudo">Laudo: </label>
            <input type="text" id="laudo" class="form-control" name="laudo" required>
        </div>
        <div class="form-group">
			<label for="id_procedimento">Procedimento</label>
            <select id="id_procedimento" class="form-control" name="id_procedimento">
                <option value="-1">Selecione um Paciente</option>
            </select>
        </div>
        <div class="form-group">
            <label for="id_procedimento">Arquivo</label>
            <input type="file" name="arquivo" class="form-control">
        </div>
       
		
		<button class="btn btn-danger" type="submit">Cadastrar Resultado</button>
    </form>

</div>

<?php include_once('../../footer.php') ?>
<?php echo '<script src= ' . getResource(AUTOCOMPLETEJS) . '></script>'; ?>

<script>
    function populateSelect() {
        //get a reference to the select element
        var $select = $('#id_procedimento');
        var $id_paciente = $('#examinado_hidden').val();

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $select.html('');
                var resposta = JSON.parse(xmlhttp.responseText);
                for(i = 0; i < resposta.length; i++) {
                    //iterate over the data and append a select option
                    $select.append('<option value="' + resposta[i].Codigo + '">' + resposta[i].Nome + '</option>');
                }
            }
        }
        xmlhttp.open("GET", "pacienteProcedimento.php?id_paciente=" + $id_paciente, true);
        xmlhttp.send();
    }
</script>
		
	