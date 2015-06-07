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
    $result = $procedimento->examesPaciente($id_paciente);

    $retorno = "";
    while($row = mysqli_fetch_assoc($result)) {
        if($retorno != "") {$retorno .= ",";}

        $retorno .= '{"Nome":"' . $row['pnome'] . '",';
        $retorno .= '"Codigo":"' . $row['codigo'] . '"}';
    }

    $retorno = '[' . $retorno .']';

    echo $retorno;

}