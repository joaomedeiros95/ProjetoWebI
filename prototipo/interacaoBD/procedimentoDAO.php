<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 29/05/15
 * Time: 15:33
 */

class procedimentoDAO extends DAO {

	public function findAllAfterNow() {
		
		$sql = "SELECT p.hentrada as hora_entrada, pa.nome as paciente, me.nome as medico, ef.nome as enfermeira, tp.descricao as tipo_procedimento, te.nome as tipo_exame FROM " . $this->tabela . " p ";
		$sql .= "JOIN pessoa pa ON p.id_paciente = pa.cpf ";
		$sql .= "LEFT JOIN pessoa me ON p.id_medico = me.cpf ";
        $sql .= "LEFT JOIN pessoa ef ON p.id_enfermeira = ef.cpf ";
		$sql .= "LEFT JOIN tipo_procedimento tp USING (id_tipo_procedimento) ";
        $sql .= "LEFT JOIN tipo_exame te USING (id_tipo_exame) ";
		$sql .= "WHERE hentrada > NOW()";
		$result = mysqli_query($this->conexao, $sql);

		return $result;
	}
	
	//public function procuraExame($id_paciente){}
	
	public function consultasPaciente($id_paciente){
		
		
		$sql = "SELECT nome, Hentrada, descricao";
		$sql .=	"FROM procedimento";
		$sql .=	"INNER JOIN tipo_procedimento";
		$sql .=	"WHERE procedimento.id_tipo_procedimento = tipo_procedimento.id_tipo_procedimento";
		
		
	}
}