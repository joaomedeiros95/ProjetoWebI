<?php
include_once('header.php');
?>
    <div class="container row">
        <?php include_once('navbar.php') ?>
        <div class="table-responsive col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 " ng-app="PontoAPP" ng-controller="PontoControl">
            <h2 class="sub-header">Horários Cadastrados no Ponto</h2>
            <input type="text" placeholder="Pesquise Pelo Nome" ng-model="filtroPaciente.Nome">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome </th>
                    <th>Entrada </th>
                    <th>Saída</th>
                    <th>CPF</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="x in consultas | filter:filtroPaciente">
                    <td>{{ x.Nome }}</td>
                    <td>{{ x.Entrada }}</td>
                    <td>{{ x.Saida }}</td>
                    <td>{{ x.CPF }}</td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php include_once('../../footer.php'); ?>
<script>
    var app = angular.module('PontoAPP', []);
    app.controller('PontoControl', function($scope, $http) {
        $http.get("http://www.joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/HorariosPonto.php")
            .success(function (response) {$scope.consultas = response.records;});
    });
</script>