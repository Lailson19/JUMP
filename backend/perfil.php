<?php

require_once('conexao.php');

session_start();

if (!isset($_SESSION['nome']) && !isset($_SESSION['id_pessoa'])) {
   header('Location: ../index.php');
   exit;
}

$idusuario = $_SESSION['id_pessoa'];
$nome = $_POST['nome'];
$img = $_POST['img'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST["confirmar_senha"];
$situacao = $_POST['situacao'];
$grau = $_POST['grau'];
$sexo = $_POST['sexo'];
$dt_nasc = $_POST['dt_nasc'];

echo '<br> Nome: '.$nome;
echo '<br> Imagem: '.$img;
echo '<br> Email: '.$email;
echo '<br> Senha: '.$senha;
echo '<br> Confirmação: '.$confirmar_senha;
echo '<br> Situação: '.$situacao;
echo '<br> Grau: '.$grau;
echo '<br> Data de Nascimento: '.$dt_nasc;
 

if($senha === $confirmar_senha) {
    
    $senha_cripto = md5($senha);    
   
    
    $update = "UPDATE `pessoa` SET `nome`= '$nome', `img`='$img', `email`='$email', `senha`='$senha_cripto', `situacao`='$situacao', `grau`='$grau', `sexo`='$sexo', `dt_nasc`='$dt_nasc' WHERE `id_pessoa` = '$id_pessoa'";
    
    $link->query($update); 
    
}
    
?>
