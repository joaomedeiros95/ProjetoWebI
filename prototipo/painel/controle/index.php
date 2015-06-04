<?php
include_once('header.php');

function contarPessoasPorTipoPessoa($tipo_pessoa)
{
    $pessoa = new pessoaDAO();
    return mysqli_num_rows($pessoa->selecionaTodosOsPacientes($tipo_pessoa));
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="cadastroGenerico.php">Cadastro Pessoa</a></li>
                <li><a href="marcarProcedimento.php">Marcar Procedimento</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Consultas</a></li>
                <li><a href="CadastroExames.php">Cadastro de Exames</a></li>
                <li><a href="CadastrarProcedimento.php">Cadastro de Procedimentos</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Controle estoque</a></li>
                <li><a href="ControleHorario.php">Controle horário</a></li>
                <li><a href="">Controle plantões</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Nome do Hospital</h1>

            <div class="row placeholders">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="../../img/avatar.png" class="img-responsive center-block" width="100px" height="100px"/>
                    <h4>Pacientes</h4>
                    <span class="text-muted"><?php echo contarPessoasPorTipoPessoa(tipo_pessoaDAO::$PACIENTE); ?>
                        Pacientes</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="../../img/avatar.png" class="img-responsive center-block" width="100px" height="100px"/>
                    <h4>Médicos</h4>
                    <span class="text-muted"><?php echo contarPessoasPorTipoPessoa(tipo_pessoaDAO::$MEDICO); ?>
                        Médicos</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="../../img/avatar.png" class="img-responsive center-block" width="100px" height="100px"/>
                    <h4>Enfermeiros</h4>
                    <span class="text-muted"><?php echo contarPessoasPorTipoPessoa(tipo_pessoaDAO::$ENFERMEIRA); ?>
                        Enfermeiros</span>
                </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <img src="../../img/avatar.png" class="img-responsive center-block" width="100px" height="100px"/>
                    <h4>Procedimentos Marcadas</h4>
                    <span class="text-muted">X Procedimentos</span>
                </div>
            </div>

            <h2 class="sub-header">Próximas Consultas</h2>
            <div class="table-responsive" ng-app="quadroConsultasAPP" ng-controller="consultasControl">
                <input type="text" ng-model="filtroPaciente.Paciente">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th>Tipo de Procedimento</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="x in consultas | filter:filtroPaciente">
                        <td>{{ x.HoraEntrada }}</td>
                        <td>{{ x.Paciente }}</td>
                        <td>{{ x.Medico }}</td>
                        <td>{{ x.TipoProcedimento }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once('../../footer.php') ?>
<script>
    var app = angular.module('quadroConsultasAPP', []);
    app.controller('consultasControl', function($scope, $http) {
        $http.get("http://www.joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/quadroConsultas.php")
            .success(function (response) {$scope.consultas = response.records;});
    });
</script>
