<?php

require_once('conexao.php');

session_start();

$postagem = $_POST["post"];
$id = $_SESSION["id_pessoa"];

if (strlen($postagem) > 0) {

    $sql = "INSERT INTO comentario (comentario, id_pessoa) VALUES ('$postagem', '$id')";
    if ($link->query($sql) === TRUE) {
        echo "
        <script>
            alert('Postagem Cadastrada com Sucesso!')
            location.href = '../frontend/home_video.php'
        </script>";
    } else {
        echo "
        <script>
            alert('Não foi Possível Cadastrar a Postagem!')
            location.href = '../frontend/home_video.php'
        </script>";
    }

    $link->close();
} else {

    echo "
        <script>
            alert('Digite Algo para Postar!')
            location.href = '../frontend/home.php'
        </script>";
}
