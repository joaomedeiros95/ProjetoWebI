<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Realizar Cadastro</h4>
            </div>
            <form class="form-horizontal" method="post" action="painel/controleCadastro.php">
                <div class="modal-body modal-cadastro center-block">
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
                    <div class="form-group">
                        <label for="plano_saude">Plano de Saúde</label>
                        <input class="input-sm form-control" type="text" name="plano_saude">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>