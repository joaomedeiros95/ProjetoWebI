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
            <input type="number" placeholder="Digite o Número Identificador" id="especialidade" class="form-control" name="especialidade" required>
			<label for="hentrada">Hora de Entrada: </label>
            <input type="text" id="hentrada" class="form-control" name="hentrada" value="yyyy-mm-dd hh:mm:ss" required>
			<label for="hsaida">Hora de Saída: </label>
            <input type="text" id="hsaida" class="form-control" name="hsaida" value="yyyy-mm-dd hh:mm:ss" required>
			<label for="id_funcionario">CPF do Funcionário: </label>
            <input type="number" id="id_funcionario" placeholder="Apenas Números" class="form-control" name="id_funcionario" required>
        </div>
       
		
		<button class="btn btn-danger" type="submit">Cadastrar Plantão</button>
		<br>
		<br>
    </form>
	
			<div  ng-app="PlantaoAPP" ng-controller="PlantaoControl">
            <h2 class="sub-header">Plantões Cadastrados</h2>
            <input type="text" placeholder="Pesquise Pelo CPF" ng-model="filtroPaciente.CPF">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Especialidade </th>
                    <th>Entrada </th>
                    <th>Saída</th>
                    <th>CPF</th>
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

<?php include_once('../../footer.php'); ?>
<script>
    var app = angular.module('PlantaoAPP', []);
    app.controller('PlantaoControl', function($scope, $http) {
        $http.get("http://www.joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/DadosPlantao.php")
            .success(function (response) {$scope.consultas = response.records;});
    });
</script>