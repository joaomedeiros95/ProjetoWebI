<?php
include_once('../../config.php');

$examinado = $_REQUEST['id_examinado'];
$laudo = $_REQUEST['laudo'];
$id_procedimento = $_REQUEST['id_procedimento'];

    $target_dir = PASTAARQUIVOS . '/';
    $target_file = $target_dir . basename($_FILES["arquivo"]["name"]);
    $target_file = str_replace(substr(basename($_FILES["arquivo"]["name"]), 0, strlen(basename($_FILES["arquivo"]["name"])) - 4), $examinado . '-' . $id_procedimento, $target_file);

    $uploadOk = 1;
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["arquivo"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["arquivo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["arquivo"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $arquivos = new arquivosDAO();
    if($uploadOk) {
        $arquivos->inserir("exame", "'arquivos/" . $examinado . "-" . $id_procedimento . "." . $fileType . "'");
        $resultado = new resultadoDAO();
        $resultado->inserir("laudo, id_procedimento, id_arquivo", "'". $laudo. "'," .$id_procedimento . "," . mysqli_insert_id($arquivos->conexao));
    }


    if($uploadOk) {
        echo '<script>alert("Cadastrado com Sucesso.");window.location.replace("http://joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/CadastrarResultado.php");</script>';
    } else {
        echo '<script>alert("Falha ao enviar o arquivo.");window.location.replace("http://joaoemedeiros.com/ufrn/hospitalweb/prototipo/painel/controle/CadastrarResultado.php");</script>';
    }