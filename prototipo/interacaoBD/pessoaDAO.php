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

    public function findByNameTipo($nome, $tipoPessoa) {
        $sql = "SELECT * FROM " . $this->tabela . " WHERE nome LIKE '%{$nome}%' AND id_tipo_pessoa = " . $tipoPessoa;
        $result = mysqli_query($this->conexao, $sql);

        return $result;
    }
	
	public function findByCPF($CPF) {
        $sql = "SELECT * FROM " . $this->tabela . " WHERE cpf = " . $CPF;
        $result = mysqli_query($this->conexao, $sql);

        return $result;
    }

    /**
     * Verifica se login está correto
     * @param $senha
     * @param $login
     * @return bool
     */
    public function verificaLogin($senha, $login) {
        $senha = (int) $senha;
        $sql = "SELECT * FROM " . $this->tabela . " WHERE cpf = " . $senha . " AND email = '" . $login . "'";
        $result = mysqli_query($this->conexao, $sql);

        $resultados = mysqli_num_rows($result);
        return $resultados > 0 ? true : false;
    }

    /**
     * Verifica o tipo da pessoa usando o CPF
     * @param $cpf
     * @return int
     */
    public function verificaNivelPessoa($cpf) {
        $sql = "SELECT id_tipo_pessoa FROM " . $this->tabela . " WHERE cpf = " . $cpf;
        $result = mysqli_query($this->conexao, $sql);

        while($row = mysqli_fetch_assoc($result)) {
            return $row['id_tipo_pessoa'];
        }

        return -1;
    }

}