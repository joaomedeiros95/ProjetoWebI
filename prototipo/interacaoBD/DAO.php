<?php
/** Classe CRUD - Create, Recovery, Update and Delete
 * @author - Rodolfo Leonardo Medeiros
 * @date - 25/09/2009
 * Arquivo - DAO.php
 */

/** Modificação e melhoria, agora usando mysqli ao invés de mysql e novos métodos escritos
 * Classe CRUD - Create, Recovery, Update and Delete
 * @author - Grupo Bixo Solto
 * @date - 29/05/2015
 * Arquivo - DAO.php
 */

/**
 * Ler README no GITHUB que mostra como deve ser usado os DAOs corretamente.
 */

abstract class DAO
{
    protected $tabela = "";
    protected $conexao;

    /** Método construtor
     * @method __construct
     */
    public function __construct()
    {
        $this->tabela = str_replace("DAO", "", get_class($this));
        $this->conexao = conectaBD(USER, PASSWORD, HOST, DATABASE);
    }

    /** Método destrutor mata a conexão com o BC
     * @method __construct
     */
    public function __destruct() {
        desconectarBD($this->conexao);
    }

    /** Pega todas tuplas de uma tabela
     * @method getALL
     * @return array
     */
    public function getALL() {
        $sql = "SELECT * FROM " . $this->tabela;
        $results = mysqli_query($this->conexao, $sql);

        return $results;
    }

    /** Método inserir
     * @method inserir
     * @param string $campos
     * @param string $valores
     * @example: $campos = "codigo, nome, email" e $valores = "1, 'João Brito', 'joao@joao.net'"
     * @return void
     */
    public function inserir($campos, $valores) // funçao de inserçao, campos e seus respectivos valores como parametros
    {
        $sql_ins = "INSERT INTO " . $this->tabela . " ($campos) VALUES ($valores)";
        $ins = mysqli_query($this->conexao, $sql_ins);
        if (!$ins) {
            die ("Ocorreu um erro na inserçao: " . mysql_error());
        }
    }

    /** Método atualizar
     * @method atualizar
     * @param string $where
     * @param string $camposvalores
     * @example: $camposvalores = " codigo = 2, nome = 'Andrea' " e $where = " codigo=2 AND nome='João' "
     * @return void
     */
    public function atualizar($camposvalores, $where = NULL) {
        if ($where) {
            $sql_upd = "UPDATE  " . $this->tabela . " SET $camposvalores WHERE $where";
        } else {
            $sql_upd = "UPDATE  " . $this->tabela . " SET $camposvalores";
        }

        $upd = mysqli_query($this->conexao, $sql_upd);
        if (!$upd) {
            die ("Ocorreu um erro na atualizaçao: " . mysql_error());
        }
    }

    /** Método excluir
     * @method excluir
     * @param string $where
     * @example: $where = " codigo=2 AND nome='João' "
     * @return void
     */
    public function excluir($where = NULL) {
        if ($where) {
            $sql_del = "DELETE FROM " . $this->tabela . " WHERE $where";
        } else {
            $sql_del = "DELETE FROM " . $this->tabela;
        }
        $del = mysqli_query($this->conexao, $sql_del);

        if (!$del) {
            die ("Ocorreu um erro na remoção: " . mysql_error());
        }
    }

}
