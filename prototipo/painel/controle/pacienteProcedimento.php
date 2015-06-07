<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 07/06/15
 * Time: 13:49
 */

include_once('../../config.php');

if (isset($_REQUEST['id_paciente'])) {
    $id_paciente = $_REQUEST['id_paciente'];

    $procedimento = new procedimentoDAO();
    $result = $procedimento->consultasPaciente($id_paciente);

    $retorno = "";
    while($row = mysqli_fetch_assoc($result)) {
        if($retorno != "") {$retorno .= ",";}

        $retorno .= '{"Nome":"' . $row['nome'] . '",';
        $retorno .= '"Codigo":"' . $row['codigo'] . '"}';
    }

    $retorno = '[' . $retorno .']';

    echo $retorno;

}