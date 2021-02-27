<?php

require_once('conexao.php');
session_start();

$id = $_GET['id'];

if ($id === $_SESSION['id_pessoa']) {  
    
    $sql = "DELETE FROM pessoa WHERE id_pessoa = $id";

    if($link->query($sql) === TRUE){

        $_SESSION['alertsucess'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-success alert-dismissible fade show" role="alert">
            Conta exluída com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        header('location: ../index.php');

    } else {

        $_SESSION['erroexclud'] = '<div style="font-size: 0.8em;" class="alert alert-danger alert-dismissible fade show" role="alert">
            Algo não saiu como esperado, tente novamente!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        header('location: ../perfil.php');

    }

} else {

    $_SESSION['erroexclud'] = '<div style="font-size: 0.8em;" class="alert alert-danger alert-dismissible fade show" role="alert">
        Algo não saiu como esperado, tente novamente!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    header('location: ../perfil.php');

}