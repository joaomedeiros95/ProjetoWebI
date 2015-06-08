<?php
include '../config.php';
?>
<html>
<head>
    <title>Cadastro - Hospital Web</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/principal.css">
</head>
<body class="login-body">

<div class="localForm container">
    <form class="form-horizontal" method="post" action="controleCadastro.php">
        <h2 class="form-horizontal-heading text-center">Cadastro Paciente</h2>

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

        <button class="btn btn-danger " type="submit">Enviar</button>
        <button class="btn btn-danger " type="reset">Limpar</button>
    </form>
</div>
<div class="btn-default"></div>

<?php
include '../footer.php';
?>

</body>
</html>