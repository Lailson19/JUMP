<?php

require_once('conexao.php');
session_start();

$video_post = $_SESSION['id_conteudo_post'];

$postagem = $_POST["post"];
$id = $_SESSION["id_pessoa"];

if (strlen($postagem) > 0) {

    $sql = "INSERT INTO comentario (comentario, id_pessoa) VALUES ('$postagem', '$id')";
    if ($link->query($sql) === TRUE) {
        header('location: ../frontend/home_video.php?id='.$video_post);
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
