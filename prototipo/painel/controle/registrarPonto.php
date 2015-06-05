<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 30/05/15
 * Time: 20:14
 */

include_once('header.php');

$horaentrada = date("Y-m-d H:i:s", time());
/**
 * Valores possíveis
 * 0 - Nada foi registrado hoje
 * 1 - Entrada foi registrada hoje
 * 2 - Saída foi registrada hoje
 */
$estado = 0;

$sistema_ponto = new sistema_pontoDAO();
$result = $sistema_ponto->getPontoDoDiaByUsuario($_SESSION['senha']);
$hentrada = null;
$hsaida = null;
$codigo = null;

if(mysqli_num_rows($result) != 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $hentrada = $row['hentrada'];
        $hsaida = $row['hsaida'];
        $codigo = $row['codigo'];

        if($row['hentrada'] != null)
            $estado = 1;
        if($row['hsaida'] != null)
            $estado = 2;
    }
}

function mostrarPontosDia() {
	$retorno = "";
	$sistema_ponto = new sistema_pontoDAO();
	$result = $sistema_ponto->getPontoDoDiaByUsuario($_SESSION['senha']);
	while($row = mysqli_fetch_assoc($result)) {
		$retorno .= "<tr><td>";
		$retorno .= $row['hentrada'];
		$retorno .= "</td><td>";
		$retorno .= $row['hsaida'];
		$retorno .= "</td></tr>";
	}
	
	return $retorno;
}

?>

<div class="container ponto row">
    <?php include_once('navbar.php') ?>
    <div class="col-lg-10 col-lg-offset-2">
        <form class="form-ponto" method="post" action="controlePonto.php">
            <div class="form-group">
                <label for="hora_entrada">Entrada: </label>
                <?php echo '<input type="text" id="hora_entrada" class="form-control" name="hora_entrada" value = "' . ($estado == 1 ? $hentrada : $horaentrada) . '">'; ?>
            </div>
            <div class="form-group">
                <label for="hora_saida">Saída: </label>
                <?php echo '<input type="text" id="hora_saida" class="form-control" name="hora_saida" value = "' . ($estado == 1 ? $horaentrada : null) . '">' ?>
            </div>
            <?php echo '<input type="hidden" name = "estado" value="' . $estado . '">'; ?>
            <?php echo '<input type="hidden" name = "codigo" value="' . $codigo . '">'; ?>

            <button class="btn btn-danger" type="submit">Registrar Ponto</button>
        </form>

        <div class = "ponto-dia">
            <table class="table">
                <caption><b>Ponto do Dia</b></caption>
                <tr>
                    <th>Entrada</th>
                    <th>Saída</th>
                </tr>
                <?php echo mostrarPontosDia(); ?>
            </table>
        </div>
    </div>

</div>