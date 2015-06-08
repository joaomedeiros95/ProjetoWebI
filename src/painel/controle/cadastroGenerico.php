<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 30/05/15
 * Time: 13:16
 */

    include_once('header.php');

    function selectTipoPessoa() {
        $tipoPessoa = new tipo_pessoaDAO();
        $result = $tipoPessoa->getALL();

        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id_tipo_pessoa'] . "'>" . $row['denominacao'] . "</option>";
        }
    }
?>

    <div class="container localForm">
        <div class="row">
            <?php include_once('navbar.php') ?>
            <form class="list-group col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 " method="post" action="../controleCadastro.php" onsubmit="validarFormulario()">
                <div class="form-group">
                    <label for="tipo_pessoa">Tipo Pessoa</label>
                    <select name="id_tipo_pessoa" onchange="tipoChanged(this.value)" class="form-control">
                        <option value="0">-- SELECIONE --</option>
                        <?php echo selectTipoPessoa() ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Pnome">Nome</label>
                    <input class="input-sm form-control " type="text" name="Pnome">
                </div>
                <div class="form-group">
                    <label for="Snome">Sobrenome</label>
                    <input class="input-sm form-control" type="text" name="Snome">
                </div>
                <div class="form-group">
                    <label for="dtNascimento">Data de Nascimento</label>
                    <input class="input-sm form-control" type="text" name="dtnascimento" onkeyup="formatarData(this)" maxlength="10" required>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input class="input-sm form-control" type="text" name="cpf" onkeyup="return formatarInteiros(this);" maxlength="11" required>
                </div>
                <div class="form-group">
                    <label for="rg">RG</label>
                    <input class="input-sm form-control" type="text" name="rg" onkeyup="return formatarInteiros(this);" maxlength="11" required>
                </div>
                <div class="form-group">
                    <label for="rua">Rua</label>
                    <input class="input-sm form-control" type="text" name="rua">
                </div>
                <div class="form-group">
                    <label for="cidadeEstado">Cidade/Estado</label>
                    <input class="input-sm form-control" type="text" name="cidadeEstado" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="input-sm form-control" type="text" name="email" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input class="input-sm form-control" type="text" name="telefone" required>
                </div>
                 <div class="form-group dependente enfermeira noVisible">
                    <label for="nivel_enfermeira">Nível Enfermeira</label>
                    <select name="nivel_enfermeira">
                        <option value = "0">-- SELECIONE --</option>
                        <?php
                            for($i = 1; $i <= 10; $i++) {
                                echo "<option value = '" . $i . "'>" . $i . "</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group dependente funcionario noVisible">
                    <label for="carga_horaria_semana">Carga Horária Semanal</label>
                    <input type="number" name="carga_horaria_semana" min="20" max="60">
                </div>
                <div class="form-group dependente paciente noVisible">
                    <label for="plano_saude">Plano de Saúde</label>
                    <input class="input-sm form-control" type="text" name="plano_saude">
                </div>
                <button class="btn btn-danger " type="submit">Enviar</button>
                <button class="btn btn-danger " type="reset">Limpar</button>
            </form>
        </div>
    </div>


<?php include_once('../../footer.php') ?>

<script>
    function tipoChanged(valor) {
        var tipo = '';
        valor = parseInt(valor);
        switch (valor) {
            case 1:
                tipo = 'medico';
                break;
            case 2:
                tipo = 'enfermeira';
                break;
            case 3:
                tipo = 'atendente';
                break;
            case 4:
                tipo = 'paciente';
                break;
            case 5:
                tipo = 'administrador';
                break;
        }
        /* Deixa invísivel todos os campos */
        $('.dependente').each(function() {
            $(this).addClass('noVisible');
        });

        if(valor > 0) {
            /* Deixa visível os campos do tipo selecionado */
            var tipoClasse = '.'.concat(tipo);
            $(tipoClasse).each(function() {
                $(this).removeClass('noVisible');
            });

            if(valor != 4) {
                $('.funcionario').each(function () {
                    $(this).removeClass('noVisible');
                });
            }
        }
    }

    function validarFormulario() {
        return true;
    }
</script>