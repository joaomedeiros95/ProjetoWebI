<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 29/05/15
 * Time: 15:34
 */

class tipo_pessoaDAO extends DAO {
    /* Variáveis estáticas que indicam o id_tipo_pessoa no banco */
    public static $MEDICO = 1;
    public static $ENFERMEIRA = 2;
    public static $ATENDENTE = 3;
    public static $PACIENTE = 4;
    public static $ADMINISTRADOR = 5;

}