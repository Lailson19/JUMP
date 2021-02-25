<?php

require_once('conexao.php');
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

if (strlen($email) > 3 && strlen($senha) > 3)  {
    $senha_cripto = md5($senha);

   $resultado_consulta = $link->query("SELECT * FROM pessoa WHERE email = '$email' AND senha = '$senha_cripto'");

    //$usuarios recebe lista de usuários
    $usuarios = mysqli_fetch_assoc($resultado_consulta);

    $_SESSION['nome'] = $usuarios["nome"];
    $_SESSION['img'] = $usuarios["img"];
    $_SESSION['email'] = $usuarios["email"];
    $_SESSION['id_pessoa'] = $usuarios["id_pessoa"];
    $_SESSION['dt_nasc'] = $usuarios["dt_nasc"];  
    $_SESSION['sexo'] = $usuarios["sexo"];   
    $_SESSION['situacao'] = $usuarios["situacao"];
    $_SESSION['grau'] = $usuarios["grau"];
    $_SESSION['nivel_acesso'] = $usuarios["nivel_acesso"];

}else{

    session_destroy();
    header('location: ../index.php');

    // echo "<script>
    // alert('E-mail ou Senha Inválidos!')
    // location.href = '../index.php'
    // </script>";

}

if ($email == $_SESSION['email']){

    // Direciona o usuário para a página respectiva ao seu nível de acesso
    if($_SESSION['nivel_acesso'] == "comum"){
        header('location: ../frontend/home_user.php');
    }elseif ($_SESSION['nivel_acesso'] == "produtor"){
        header('location: ../frontend/home_produtor.php');
    }elseif ($_SESSION['nivel_acesso'] == "interprete"){
        header('location: ../frontend/home_interprete.php');
    }

} else{

    session_destroy();
    header('location: ../index.php');

}

?>