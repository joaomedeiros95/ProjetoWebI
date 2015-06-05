<?php

include_once('header.php');

?>
<div class="container row " ng-app="estoque" ng-controller="estoqueControle">
    <?php include_once('navbar.php') ?>
    <div class ="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 ">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Quantidade</th>
                    <th>Lote</th>
                    <th>Fornecedor</th>
                    <th>Solicitador</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="material in materiais">
                    <td>{{ material.Nome }}</td>
                    <td>{{ material.Tipo }}</td>
                    <td>
                        {{ material.Quantidade }}
                        <a ng-click="diminuirQuantidade(material.id)">
                            <span class="glyphicon glyphicon-arrow-down"></span>
                        </a>
                        <a ng-click="aumentarQuantidade(material.id)">
                            <span class="glyphicon glyphicon-arrow-up"></span>
                        </a>
                    </td>
                    <td>{{ material.Lote }}</td>
                    <td>{{ material.Fornecedor }}</td>
                    <td>{{ material.Solicitador }}</td>

                    <td>
                        <button class="btn" ng-click="editar(material.id)">
                            <span class="glyphicon glyphicon-pencil"></span>  Editar
                        </button>
                    </td>
					
					<td>
						<button class="btn btn-danger" ng-click="remover(material.id)">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
					</td>
                </tr>

            </tbody>
        </table>

        <hr>
            <button class="btn btn-danger" ng-click="editar('new')" ng-disabled="!edit">
                <span class="glyphicon glyphicon-user"></span>  Adicionar Estoque
            </button>
        <hr>

        <h3 ng-hide="edit">Adicionar Estoque:</h3>
        <h3 ng-show="edit">Editar Estoque:</h3>

        <form class="list-group">
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" ng-model="Nome">
            </div>
            <div class="form-group">
                <label>Tipo:</label>
                <select ng-model="Tipo">
                    <?php
                        $tipoMaterial = new tipo_materialDAO();
                        $result = $tipoMaterial->getALL();

                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id_tipo_material'] . "'>" . $row['descricao'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Quantidade:</label>
                <input type="text" ng-model="Quantidade" ng-disabled="edit">
            </div>
            <div class="form-group">
                <label>Lote:</label>
                <input type="text" ng-model="Lote">
            </div>
            <div class="form-group">
                <label>Fornecedor:</label>
                <input type="text" ng-model="Fornecedor">
            </div>
            <input type="hidden" id="cpf" value="<?php echo $_SESSION['senha']; ?>">

            <hr>
            <button class="btn btn-success" ng-click="gravar('new')" ng-hide="edit">
                <span class="glyphicon glyphicon-save"></span>  Criar
            </button>
            <button class="btn btn-success" ng-click="gravar(idGravar)" ng-hide="!edit">
                <span class="glyphicon glyphicon-save"></span>  Salvar
            </button>
        </form>
    </div>
</div>

<?php include_once('../../footer.php'); ?>
<script>
    angular.module('estoque', []).controller('estoqueControle', function($scope, $http) {
        $scope.edit = false;
        $scope.materiais = [];
        $scope.idGravar = '';

        $scope.Nome = '';
        $scope.Tipo = '';
        $scope.Quantidade = '';
        $scope.Lote = '';
        $scope.Fornecedor = '';

        $http.get("http://www.joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/quadroMateriais.php")
            .success(function (response) {$scope.materiais = response.records;});

        $scope.reiniciar = function() {
            $http.get("http://www.joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/quadroMateriais.php")
                .success(function (response) {$scope.materiais = response.records;});
        }

        $scope.editar = function(campo) {
            if (campo == 'new') {
                $scope.edit = false;
                $scope.idGravar = '';

                $scope.Nome = '';
                $scope.Tipo = '';
                $scope.Quantidade = '';
                $scope.Lote = '';
                $scope.Fornecedor = '';
            } else {
                for(i = 0; i < $scope.materiais.length; i++) {
                    if ($scope.materiais[i].id == campo) {
                        $scope.edit = true;
                        $scope.idGravar = campo;

                        $scope.Nome = $scope.materiais[i].Nome;
                        $scope.Tipo = $scope.materiais[i].id_tipo;
                        $scope.Quantidade = $scope.materiais[i].Quantidade;
                        $scope.Lote = $scope.materiais[i].Lote;
                        $scope.Fornecedor = $scope.materiais[i].Fornecedor;
                    }
                }
            }
        }

        $scope.gravar = function(campo) {
            var cpf = parseInt(document.getElementById("cpf").value);
            $http.get("http://www.joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/editarEstoque.php?tipo=2&id="+campo+"&nome="+$scope.Nome+"&tipo_material="+$scope.Tipo+"&quantidade="+$scope.Quantidade+"&lote="+$scope.Lote+"&fornecedor="+$scope.Fornecedor+"&cpf="+cpf)
                .success(function (response) {$scope.resposta = response.records; $scope.reiniciar();});


        }

        $scope.diminuirQuantidade = function(campo) {
            for(i = 0; i < $scope.materiais.length; i++) {
                if($scope.materiais[i].id == campo) {
                    var quantidade = parseInt($scope.materiais[i].Quantidade) - 1;
                    $scope.resposta = 'false';

                    var HTTP = $http.get("http://www.joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/editarEstoque.php?tipo=1&id=" + campo + "&quantidade=" + quantidade)
                        .success(function (response) {$scope.resposta = response.records;});
                    $scope.materiais[i].Quantidade = quantidade;
                }
            }
        };

        $scope.aumentarQuantidade = function(campo) {
            for(i = 0; i < $scope.materiais.length; i++) {
                if($scope.materiais[i].id == campo) {
                    var quantidade = parseInt($scope.materiais[i].Quantidade) + 1;
                    $scope.resposta = 'false';
                    var HTTP = $http.get("http://www.joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/editarEstoque.php?tipo=1&id=" + campo + "&quantidade=" + quantidade)
                        .success(function (response) {$scope.resposta = response.records;});

                    $scope.materiais[i].Quantidade = quantidade;
                }
            }
        };
		
		$scope.remover = function(campo) {
			for(i = 0; i < $scope.materiais.length; i++) {
                if($scope.materiais[i].id == campo) {
					var res = confirm('Tem certeza que deseja excluir o material?' + campo);
					if(res) {
						$scope.resposta = 'false';
						var HTTP = $http.get("http://www.joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/editarEstoque.php?tipo=3&id=" + campo)
							.success(function (response) {$scope.resposta = response.records; $scope.reiniciar()});
					}
                }
            }
		}

    });
</script>