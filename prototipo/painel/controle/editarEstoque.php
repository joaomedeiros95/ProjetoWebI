<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 04/06/15
 * Time: 18:21
 */

include_once('../../config.php');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$material = new materialDAO();
if($_REQUEST['tipo'] == 1) {
    $id = $_REQUEST['id'];
    $quantidade = $_REQUEST['quantidade'];

    $material->atualizar(" quantidade = " . $quantidade, "codigo = " . $id);

    $retorno = '{"records":"true"}';
} else if ($_REQUEST['tipo'] == 2) {
    $id = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];
    $tipo = $_REQUEST['tipo_material'];
    $quantidade = $_REQUEST['quantidade'];
    $lote = $_REQUEST['lote'];
    $fornecedor = $_REQUEST['fornecedor'];
    $id_solicitacao_pessoa = $_REQUEST['cpf'];

    if($id == 'new') {
        $campos = "id_tipo_material, quantidade, lote, fornecedor, nome, id_solicitacao_pessoa";
        $valores = $tipo . "," . $quantidade . "," . $lote . ",'" . $fornecedor . "','" . $nome . "'," . $id_solicitacao_pessoa;
        $material->inserir($campos, $valores);
    } else {
        $camposvalores = "id_tipo_material = " . $tipo . ", quantidade = " . $quantidade . ", lote = " . $lote . ", fornecedor = '" . $fornecedor . "', nome = '" . $nome . "'";
        $material->atualizar($camposvalores, "codigo = " . $id);
    }

    $retorno = '{"records":"true"}';
}

echo $retorno;