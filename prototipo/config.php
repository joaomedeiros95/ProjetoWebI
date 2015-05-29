<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 29/05/15
 * Time: 15:54
 */

    /*Arquivo de configuração principal do site, aqui serão colocadas variáveis globais e métodos para acessá-las*/
    define('WEBSITE', 'http://www.joaoemedeiros.com/');
    define('WEBSITE_ROOT', '/ufrn/hospitalweb/prototipo/');
    define('BASE', dirname(__FILE__));
    define('DAO', BASE . '/interacaoBD');
    define('CONEXAO', BASE . '/conexaoBD');

    /* Varíaveis do BD */
    define('HOST', 'localhost');
    define('USER', 'hospitalweb');
    define('PASSWORD', 'hospitalwebufrn');
    define('DATABASE', 'hospital_web');

    /* Inclui arquivos do banco */
    include_once(getPHP(DAO) . '/DAO.php');
    include_once(getPHP(DAO) . '/pessoaDAO.php');
    include_once(getPHP(CONEXAO) . '/conectaBD.php');
    include_once(getPHP(CONEXAO) . '/desconectBD.php');

    /* Função para retornar o caminho de um JS ou CSS ou qualquer outro recurso */
    function getResource($string)
    {
        return WEBSITE . str_replace('/var/www/html/', '', $string);
    }

    function getPrincipal()
    {
        return WEBSITE . str_replace('/var/www/html/', '', BASE . '/');
    }

    function getPHP($string) {
        return str_replace('/var/www/html' . WEBSITE_ROOT , '', $string);
    }