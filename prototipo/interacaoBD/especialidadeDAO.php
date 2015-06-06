<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 29/05/15
 * Time: 15:31
 */

class especialidadeDAO extends DAO {

    public function findByDescricao($descricao) {
        $sql = "SELECT * FROM " . $this->tabela . " WHERE denominacao LIKE '%{$descricao}%' ";

        $return = mysqli_query($this->conexao, $sql);
        return $return;
    }

}