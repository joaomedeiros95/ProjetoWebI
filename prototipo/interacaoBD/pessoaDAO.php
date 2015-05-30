<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 29/05/15
 * Time: 15:33
 */

class pessoaDAO extends DAO {

    /**
     * Retorna todos os usuário do banco de dados de uma determinada categoria
     * @return bool|mysqli_result
     */
    public function selecionaTodosOsPacientes($categoria) {
        $sql = "SELECT * FROM " . $this->tabela . " WHERE id_tipo_pessoa = " . $categoria;
        $result = mysqli_query($this->conexao, $sql);

        return $result;
    }

}