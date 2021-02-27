<?php

require_once('conexao.php');
session_start();

$video_post = $_SESSION['id_conteudo_post'];

$postagem = $_POST["post"];
$id = $_SESSION["id_pessoa"];

if (strlen($postagem) > 0) {

    $sql = "INSERT INTO comentario (comentario, id_pessoa) VALUES ('$postagem', '$id')";

    if ($link->query($sql) === TRUE) {

        $_SESSION['errocoment'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-success alert-dismissible fade show" role="alert">
            Comentário postado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        header('location: ../frontend/home_video.php?id='.$video_post);

    } else {

        $_SESSION['errocoment'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-danger alert-dismissible fade show" role="alert">
            Não foi possível fazer seu comentário, tente novamente!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        header('location: ../frontend/home_video.php?id='.$video_post);

    }

    $link->close();

} else {

    $_SESSION['errocoment'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-warning alert-dismissible fade show" role="alert">
        Algo precisa ser inserido no capo para ser postado!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>';
    header('location: ../frontend/home_video.php?id='.$video_post);

}
