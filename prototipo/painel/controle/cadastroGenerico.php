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

    <div class="localForm">
        <form class="list-group" method="post" action="../controleCadastro.php" onsubmit="validarFormulario()">
            <table class="">
                <tr>
                    <td>
                        <label for="tipo_pessoa">Tipo Pessoa</label>
                    </td>
                    <td></td>
                    <td>
                        <select name="id_tipo_pessoa" onchange="tipoChanged(this.value)">
                            <option value="0">-- SELECIONE --</option>
                            <?php echo selectTipoPessoa() ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="Pnome">Nome</label>
                    <td/>
                    <td><input class="input-sm form-control " type="text" name="Pnome"></td>
                </tr>
                <tr>
                    <td><label for="Snome">Sobrenome</label>
                    <td/>
                    <td><input class="input-sm form-control" type="text" name="Snome"></td>
                </tr>
                <tr>
                    <td><label for="dtNascimento">Data de Nascimento</label>
                    <td/>
                    <td><input class="input-sm form-control" type="text" name="dtnascimento" onkeyup="formatarData(this)" maxlength="10" required></td>
                </tr>
                <tr>
                    <td><label for="cpf">CPF</label>
                    <td/>
                    <td><input class="input-sm form-control" type="text" name="cpf" onkeyup="return formatarInteiros(this);" maxlength="11" required></td>
                </tr>
                <tr>
                    <td><label for="rg">RG</label>
                    <td/>
                    <td><input class="input-sm form-control" type="text" name="rg" onkeyup="return formatarInteiros(this);" maxlength="11" required></td>
                </tr>
                <tr>
                    <td><label for="rua">Rua</label>
                    <td/>
                    <td><input class="input-sm form-control" type="text" name="rua"></td>
                </tr>
                <tr>
                    <td><label for="cidadeEstado">Cidade/Estado</label>
                    <td/>
                    <td><input class="input-sm form-control" type="text" name="cidadeEstado" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label>
                    <td/>
                    <td><input class="input-sm form-control" type="text" name="email" required></td>
                </tr>
                <tr>
                    <td><label for="telefone">Telefone</label>
                    <td/>
                    <td><input class="input-sm form-control" type="text" name="telefone" required></td>
                </tr>
                <tr class = "dependente enfermeira noVisible">
                    <td><label for="nivel_enfermeira">Nível Enfermeira</label><td/>
                    <td>
                        <select name="nivel_enfermeira">
                            <option value = "0">-- SELECIONE --</option>
                            <?php
                                for($i = 1; $i <= 10; $i++) {
                                    echo "<option value = '" . $i . "'>" . $i . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr class = "dependente funcionario noVisible">
                    <td><label for="carga_horaria_semana">Carga Horária Semanal</label><td/>
                    <td>
                        <input type="number" name="carga_horaria_semana" min="20" max="60">
                    </td>
                </tr>

                <tr class = "dependente paciente noVisible">
                    <td><label for="plano_saude">Plano de Saúde</label><td/>
                    <td>
                        <input class="input-sm form-control" type="text" name="plano_saude">
                    </td>
                </tr>


                <tr>

                    <td class="">
                        <button class="btn btn-group cor " type="submit">Enviar</button>
                    </td>
                    <td class="">
                        <button class="btn btn-group cor " type="reset">Limpar</button>
                    </td>

                </tr>


            </table>
        </form>
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