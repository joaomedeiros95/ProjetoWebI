<?php 

	include_once('../controle/header.php');

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


        <div class="container conteudoTeste">
            
            <div class="row">
              
                <div  class="main">
                    <h1 class="page-header">Painel do paciente</h1>

                    <div class="row" style="text-align: center;">
                        
                        <div id="a" onclick="selectButton('a')" onmouseover="buttonColor(1,'a')" onmouseout="buttonColor(2,'a')" class="col-xs-6 col-sm-4"  >
                            
                            <span class="img-responsive glyphicon glyphicon-calendar" ></span>
                            <h4>Agenda</h4>
                            <span class="text-muted">Agendamento de consultas</span>
                        </div>
                        
                        <div id="b" onclick="selectButton('b')" onmouseover="buttonColor(1,'b')" onmouseout="buttonColor(2,'b')" class="col-xs-6 col-sm-4 placeholder" >
                            
                            <span class="img-responsive glyphicon glyphicon-folder-open"  data-holder-rendered="true"></span>
                            <h4>Consultas</h4>
                            <span class="text-muted">Suas consultas</span>
                        </div>
                        
                        <div id="c"   onclick="selectButton('c')" onmouseover="buttonColor(1,'c')" onmouseout="buttonColor(2,'c')" class="col-xs-6 col-sm-4 placeholder" >
                            
                            <span class="img-responsive glyphicon glyphicon-paste"   data-holder-rendered="true"></span>
                            <h4>Exames</h4>
                            <span class="text-muted">Resultado de exames</span>
                        </div>
                   
                    </div>

        
                    <section id="conteudo" class="table-responsive">
                        
                          <h2 id="menuSelect">Agenda</h2>


                          <div class="agenda" >
                             	<?php include 'funcaoCalendario.php' ?>
                          </div>
						  <div class="consultas noVisible" >
                             	<?php include'consultasPaciente.php' ?>
                          </div>
						  <div class="exames noVisible">
							  
							 <?php include'baixarExames.php';?>
                          </div>
                   
                    </section>
                </div>
            </div>
        </div>


        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Marcar Consulta</h4>
                    </div>
                    <form method="post" action="../controle/controleMarcarProcedimento.php">
                        <div class="modal-body">
                            <div class="checkbox">
                                <label>
                                    <input id="consulta" type="radio" name="tipoProcedimento" value="<?php echo tipo_procedimentoDAO::$CONSULTA; ?>" checked> Consulta
                                </label>
                                <label>
                                    <input id="exame" type="radio" name="tipoProcedimento" value="<?php echo tipo_procedimentoDAO::$EXAME; ?>"> Exame
                                </label>
                            </div>
                            <div class="form-group consulta">
                                <label for="medico">Médico: </label>
                                <input autocomplete="off" type="text" id="medico" class="form-control" name="medico" onkeyup="showHint(this.value, this.id, <?php echo tipo_pessoaDAO::$MEDICO; ?>)">
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
                                <label for="nome">Data:</label>
                                <input id="dia_hidden" class="form-control" type="text" name="data"/>
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
                            <input type="hidden" name="id_paciente" value="<?php echo $_SESSION['senha'] ?>">
                            <input type="hidden" name="nome" value="Marcado pelo portal do paciente.">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php include_once('../../footer.php') ?>
<script src="../../js/menu.js"></script>
<?php echo '<script src= ' . getResource(AUTOCOMPLETEJS) . '></script>'; ?>
<script>

    function passVariableForModal(valor) {
        $('#dia_hidden').val(valor);
    }

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
