<?php
    include_once('header.php');

    function contarPessoasPorTipoPessoa($tipo_pessoa) {
        $pessoa = new pessoaDAO();
        return mysqli_num_rows($pessoa->selecionaTodosOsPacientes($tipo_pessoa));
    }
?>

	<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="cadastroGenerico.php">Cadastro Pessoa</a></li>
            <li><a href="cadastroProcedimento.php">Cadastro Procedimento</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Consultas</a></li>
            <li><a href="">Exames</a></li>
            <li><a href="">Procedimentos</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Controle estoque</a></li>
            <li><a href="">Controle horário</a></li>
            <li><a href="">Controle plantões</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Nome do Hospital</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
            	<img src="../../img/avatar.png" class="img-responsive center-block" width="100px" height="100px" />
              <h4>Pacientes</h4>
              <span class="text-muted"><?php echo contarPessoasPorTipoPessoa(tipo_pessoaDAO::$PACIENTE); ?> Pacientes</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
            	<img src="../../img/avatar.png" class="img-responsive center-block" width="100px" height="100px" />
              <h4>Médicos</h4>
              <span class="text-muted"><?php echo contarPessoasPorTipoPessoa(tipo_pessoaDAO::$MEDICO); ?> Médicos</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
            	<img src="../../img/avatar.png" class="img-responsive center-block" width="100px" height="100px" />
              <h4>Enfermeiros</h4>
              <span class="text-muted"><?php echo contarPessoasPorTipoPessoa(tipo_pessoaDAO::$ENFERMEIRA); ?> Enfermeiros</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
            	<img src="../../img/avatar.png" class="img-responsive center-block" width="100px" height="100px" />
              <h4>Procedimentos Marcadas</h4>
              <span class="text-muted">X Procedimentos</span>
            </div>
          </div>

          <h2 class="sub-header">Próximas Consultas</h2>
          <div class="table-responsive">
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
                <?php 
					include_once('quadroConsultas.php');
				?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<?php include_once('../../footer.php') ?>

