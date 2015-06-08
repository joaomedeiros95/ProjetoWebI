<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 06/06/15
 * Time: 14:30
 */

include_once('../../config.php');

if (isset($_REQUEST['id_especialidade'])) {
    $id_especialidade = $_REQUEST['id_especialidade'];

    $medicoespecialidade = new medico_especialidadeDAO();
    $result = $medicoespecialidade->findByEspecialidadeJoinPessoa($id_especialidade);


    $retorno = "";
    while($row = mysqli_fetch_assoc($result)) {
        if($retorno != "") {$retorno .= ",";}

        $retorno .= '{"Nome":"' . $row['nome'] . '",';
        $retorno .= '"CPF":"' . $row['cpf'] . '"}';
    }

    $retorno = '[' . $retorno .']';

    echo $retorno;

}