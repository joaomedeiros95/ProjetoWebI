<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 29/05/15
 * Time: 15:33
 */

class procedimentoDAO extends DAO {

	public function findAllAfterNow() {
		$sql = "SELECT p.hentrada as hora_entrada, pa.nome as paciente, me.nome as medico, tp.descricao as tipo_procedimento FROM " . $this->tabela . " p ";
		$sql .= "JOIN pessoa pa ON p.id_paciente = pa.cpf ";
		$sql .= "JOIN pessoa me ON p.id_medico = me.cpf "; 
		$sql .= "JOIN tipo_procedimento tp USING (id_tipo_procedimento) ";
		$sql .= "WHERE hentrada > NOW()";
		$result = mysqli_query($this->conexao, $sql);
		
		return $result;
	}
	
}