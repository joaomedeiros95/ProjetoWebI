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
		
		
		$sql = "SELECT pessoa.nome, Hentrada, procedimento.nome, procedimento.codigo";
		$sql .=" FROM procedimento";
		$sql .=" INNER JOIN pessoa ON cpf = id_medico";
		$sql .=" WHERE id_tipo_pessoa = " . tipo_pessoaDAO::$MEDICO;
		$sql .=" AND id_paciente =".$id_paciente;

		$resultado = mysqli_query($this->conexao, $sql);
		
		return $resultado;
	}
	 public function quantidadeConsultas(){

        $sql = "SELECT COUNT(nome) as totalConsulta FROM procedimento WHERE Hentrada >NOW() AND tipo_procedimento = 1";
        $result = mysqli_query($this->conexao, $sql);

        return $result;

    }

    public function verificaVagas($dia){
        $diat = $dia."08:00:00";
        $sql = "SELECT Count(nome) as totalConsultaHoje FROM procedimento WHERE tipo_procedimento = 1 AND Hentrada >".$dia."00:00:00 and Hentrada >".$diat;
        $result = mysqli_query($this->conexao, $sql);

        $aux = mysqli_fetch_assoc($result);

        return $aux['totalConsultaHoje'];
    }
	
	 public function resultadoExame($paciente){
       
        $sql = "SELECT a.exame FROM arquivos a";
		$sql .= " JOIN resultado r ON a.id = r.id_arquivo";
		$sql .= " JOIN procedimento p ON r.id_procedimento = p.codigo";
		$sql .= " WHERE p.id_paciente = ".$paciente;

        $result = mysqli_query($this->conexao, $sql);

        return $result;
    }

}