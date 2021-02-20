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
            location.href = '../home.php'
        </script>";
      } else {
        echo "
        <script>
            alert('Não foi Possível Cadastrar a Postagem!')
            location.href = '../home.php'
        </script>";
      }
      
      $link->close();
     
     
    //$result = $link->query = "INSERT INTO comentario (comentario, id_pessoa) VALUES ('$postagem', '$id')";

    

} else {

    echo "
        <script>
            alert('Digite Algo para Postar!')
            location.href = '../home.php'
        </script>";

}

/*
$video = $_POST['video'];
$postagem = $_POST['post'];
$id = $_SESSION['id'];

if (strlen($postagem) > 0) {
       
    $result = $link->query("INSERT INTO postagens (videoprincipal, titulo, descricao, imagemcard, videolibras, fk_usuario) VALUES ('$videoprincipal', $titulo', '$descricao', '$imagemcard', 'videolibras')");

    if ($result == true) {
        
        echo "
        <script>
            alert('Postagem Cadastrada com Sucesso!')
            location.href = 'home.php'
        </script>";

    }else {

        echo "
        <script>
            alert('Não foi Possível Cadastrar a Postagem!')
            location.href = 'home.php'
        </script>";

    }

}else {

    echo "
        <script>
            alert('Digite Algo para Postar!')
            location.href = 'home.php'
        </script>";

}*/
