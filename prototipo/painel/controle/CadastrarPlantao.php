<?php

include_once('header.php');

?>
<div class="container-fluid row">
    <?php include_once('navbar.php') ?>
	
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 ">
		
	
	<form  method="post" action="ControlePlantao.php">
      <h2> Cadastre Aqui um Plantão	</h2>
		<br>
        <div class="form-group">
            <label for="especialidade">Especialidade: </label>
            <input type="text" placeholder="Digite o nome da especialidade" onkeyup="showHint(this.value, this.id)" id="especialidade" class="form-control" name="especialidade" required>
            <div id="suggestion_especialidade" class="autocomplete"></div>
            <input type="hidden" name="id_especialidade" id="especialidade_hidden" />
        </div>
        <div class="form-group">
			<label for="hentrada">Data/Hora de Entrada: </label>
            <?php echo '<input type="date" id="data" class="form-control" name="dataentrada" min=' . date('Y-m-d') . ' required>'; ?>
            <input type="time" id="hentrada" class="form-control" name="hentrada" required>
        </div>
        <div class="form-group">
			<label for="hsaida">Hora de Saída: </label>
            <?php echo '<input type="date" id="data" class="form-control" name="datasaida" min=' . date('Y-m-d') . ' required>'; ?>
            <input type="time" id="hsaida" class="form-control" name="hsaida" required>
        </div>
        <div class="form-group">
			<label for="medico">Médico: </label>
            <select id="medico" class="form-control" name="id_medico">
                <option value="-1">Selecione uma Especialidade</option>
            </select>
        </div>


		
		<button class="btn btn-danger" type="submit">Cadastrar Plantão</button>
		<br>
		<br>
    </form>
	
			<div  ng-app="PlantaoAPP" ng-controller="PlantaoControl">
            <h2 class="sub-header">Plantões Cadastrados</h2>
            <input type="text" placeholder="Pesquise Pelo Nome" ng-model="filtroPaciente.CPF">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Especialidade </th>
                    <th>Entrada </th>
                    <th>Saída</th>
                    <th>Nome</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="x in consultas | filter:filtroPaciente">
                    <td>{{ x.Especialidade }}</td>
                    <td>{{ x.Entrada }}</td>
                    <td>{{ x.Saida }}</td>
                    <td>{{ x.CPF }}</td>

                </tr>
                </tbody>
            </table>
        </div>
		
		
		
		
		
	</div>
	
</div>

<?php include_once('../../footer.php');
echo '<script src= ' . getResource(AUTOCOMPLETEESPECIALIDADEJS) . '></script>';?>
<script>
    var app = angular.module('PlantaoAPP', []);
    app.controller('PlantaoControl', function($scope, $http) {
        $http.get("http://www.joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/DadosPlantao.php")
            .success(function (response) {$scope.consultas = response.records;});
    });


    function populateSelect(id_especialidade) {
        //get a reference to the select element
        var $select = $('#medico');

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                $select.html('');
                var resposta = JSON.parse(xmlhttp.responseText);
                for(i = 0; i < resposta.length; i++) {
                    //iterate over the data and append a select option
                    $select.append('<option value="' + resposta[i].CPF + '">' + resposta[i].Nome + '</option>');
                }
            }
        }
        xmlhttp.open("GET", "medicoEspecialidade.php?id_especialidade=" + id_especialidade, true);
        xmlhttp.send();

    }
</script>