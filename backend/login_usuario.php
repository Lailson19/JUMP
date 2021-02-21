<?php

require_once('conexao.php');

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

if (strlen($email) > 3 && strlen($senha) > 3) {
    $senha_cripto = md5($senha);
 
    // Execução da instrução SQL
    /*$resultado_consulta = $conn->query("SELECT * from usuarios where email = '$email' AND senha = '$senha'");*/
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

    //header('location: ../frontend/home_user.php');

}if ($resultado_consulta == true){

    echo "<script>
     location.href = '../frontend/home_user.php'
    </script>"; 

}else {

    echo "<script>
    alert('E-mail ou Senha Inválidos!')
    location.href = '../index.html'
    </script>";
}


?>