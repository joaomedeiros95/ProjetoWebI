<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 29/05/15
 * Time: 15:32
 */

class medico_especialidadeDAO extends DAO {

    public function findByEspecialidadeJoinPessoa($especialidade) {
        $sql = "SELECT p.nome, p.cpf FROM " . $this->tabela . " me ";
        $sql .= "JOIN pessoa p ON p.cpf = me.id_medico ";
        $sql .= "WHERE me.id_especialidade = {$especialidade}";

        $result = mysqli_query($this->conexao, $sql);
        return $result;
    }

}