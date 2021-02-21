<?php

require_once('conexao.php');

session_start();

$id = $_GET['id'];


if ($id === $_SESSION['id_pessoa']) {  
    
    $sql = "DELETE FROM pessoa WHERE id_pessoa = $id";

    //$result = $link->query("DELETE FROM pessoa WHERE id_pessoa = $id");

    if($link->query($sql) === TRUE){
        session_destroy();

        echo "<script>
        alert('Conta Excluí­da com Sucesso!')
        window.location.href = '../index.html'
        </script>";
    } else {
        echo "<script>
        alert('Não foi Possível Excluir sua Conta!')
        window.location.href = '../index.html'
        </script>";
    }
} else {
    echo "<script>
    alert('Conta Excluída com Sucesso!')
    window.location.href = '../index.html'
    </script>";
}