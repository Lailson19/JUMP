<?php

require_once('conexao.php');
session_start();

$id = $_GET['id_conteudo'];
$dataPost = $_GET['dtpost'];
$id_pessoa_post = $_GET['id_pessoa_post'];

if ($id_pessoa_post == $_SESSION['id_pessoa']) {

    $coments = $link->query("SELECT * FROM comentario WHERE data_comentario = '$dataPost'");

    if($coments == TRUE){

        foreach ($coments as $row);
        $id_comentario = $row['id_comentario'];        
        $sql = "DELETE FROM comentario WHERE id_comentario = '$id_comentario'";

        if($link->query($sql) === TRUE){

            $_SESSION['sucesscoment'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-success alert-dismissible fade show" role="alert">
                Comentário removido com sucesso!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            header('location: ../frontend/home_video.php?id='.$id);

        }else{

            $_SESSION['errocoment'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-danger alert-dismissible fade show" role="alert">
                Não foi possível remover seu comentário, tente novamente!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            header('location: ../frontend/home_video.php?id='.$id);

        }

    }else{

        $_SESSION['errocoment'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-danger alert-dismissible fade show" role="alert">
            Não foi possível remover seu comentário, tente novamente!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        header('location: ../frontend/home_video.php?id='.$id);
    }

} else {

    $_SESSION['errocoment'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-danger alert-dismissible fade show" role="alert">
        Não foi possível remover seu comentário!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    header('location: ../frontend/home_video.php?id='.$id);
}