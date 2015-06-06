<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 03/06/15
 * Time: 18:35
 */

include_once('../../config.php');

if (isset($_REQUEST['query']) && isset($_REQUEST['campo'])) {
    $query = $_REQUEST['query'];
    $campo = $_REQUEST['campo'];

    $especialidade = new especialidadeDAO();
    $result = $especialidade->findByDescricao($query);

    $array = array();
    $id = array();
    if($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row['denominacao'];
            $id[] = $row['id_especialidade'];
        }
    }

    echo '<ul>';
    if(sizeof($array) >= 1) {
        //i = 1 para excluir o primeiro hint que é vazio somente para iniciar a variável
        for($i = 0; $i < sizeof($array); $i++) {
            echo '<li><a href="#" onclick="selecionar(this.innerHTML,' . trim($id[$i]) . ',' . trim($campo) . ');populateSelect(' . trim($id[$i]) . ');">'.htmlentities($array[$i]).'</a></li>';
        }
    } else {
        echo '<li><a href="#" onclick="selecionar(false, false, false);">'.htmlentities('Sem Sugestão').'</a></li>';
    }
    echo '</ul>';

}