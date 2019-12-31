<?php
session_start();
include_once 'db_connect.php';
$btncadastrar = filter_input(INPUT_POST, 'btn-cadastrar', FILTER_SANITIZE_STRING);

if ($btncadastrar) {
    //receber atraves do formulario as informação
    $palestrante = filter_input(INPUT_POST, 'palestrante', FILTER_SANITIZE_STRING);
    $palestrante_arq = $_FILES['arquivo']['palestrante'];

    //inserir na base de dados
    $resul_arq = "INSERT INTO palestras (palestrante, arquivo) VALUE (:palestrante, :arquivo) ";
    $insert_msg = $connect->prepare($resul_arq);
    $insert_msg->bindParam(':palestrante', $palestrante);
    $insert_msg->bindParam(':arquivo', $palestrante_arq);



    if ($insert_msg->execute()) {
        //recuperar o ultimo id
        $ultimo_id = $connect->lastInsertId();

        //aonde o arquivo var ser salvo diretório
        $diretorio = 'Sistema/' . $ultimo_id;

        mkdir($diretorio, 0755);

        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$palestrante_arq);

        $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
        header("location: index.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
        header("location: index.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
    header("location: index.php");
}