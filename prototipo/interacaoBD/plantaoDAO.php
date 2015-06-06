<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 29/05/15
 * Time: 15:33
 */

class plantaoDAO extends DAO {

    public function findAllJoinPessoaEspecialidade() {
        $sql = "SELECT pl.hentrada, pl.hsaida, e.denominacao as especialidade, p.nome FROM plantao pl ";
        $sql .= 'JOIN pessoa p ON pl.id_funcionario = p.cpf ';
        $sql .= "JOIN especialidade e ON pl.especialidade = e.id_especialidade ";
        $sql .= "ORDER BY pl.hentrada desc";

        $return = mysqli_query($this->conexao, $sql);
        return $return;
    }

}