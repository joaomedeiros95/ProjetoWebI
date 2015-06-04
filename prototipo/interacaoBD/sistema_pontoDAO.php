<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 29/05/15
 * Time: 15:34
 */

class sistema_pontoDAO extends DAO {

    function getPontoDoDiaByUsuario($cpf) {
        $sql = "SELECT * FROM " . $this->tabela . " WHERE id_pessoa = " . (int) $cpf . " AND hentrada > CURDATE()";
        $result = mysqli_query($this->conexao, $sql);

        return $result;
    }
	
	function getAllJoinPessoa() {
		$sql = "SELECT sp.hentrada, sp.hsaida, sp.id_pessoa, p.nome FROM " . $this->tabela . " sp ";
		$sql .= "JOIN pessoa p ON sp.id_pessoa = p.cpf";
		
		$result = mysqli_query($this->conexao, $sql);

        return $result;
	}

}