<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 29/05/15
 * Time: 15:31
 */

class materialDAO extends DAO {

    public function findAllJoinTipoPessoa() {
        $sql = "SELECT m.nome, tm.descricao as tipo, tm.id_tipo_material as id_tipo , m.quantidade, m.lote, m.fornecedor, p.nome as solicitador, m.codigo FROM " . $this->tabela . " m ";
        $sql .= "JOIN tipo_material tm USING (id_tipo_material) ";
        $sql .= "JOIN pessoa p ON p.cpf = m.id_solicitacao_pessoa";

        $result = mysqli_query($this->conexao, $sql);
        return $result;
    }

}