<?php

require_once('conexao.php');
session_start();

if (!isset($_SESSION['nome']) && !isset($_SESSION['id_pessoa'])) {
   header('Location: ./index.html');
   exit;
}

$id_pessoa = $_SESSION['id_pessoa'];
$nome = $_POST['nome'];
$img = $_POST['img'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST["confirmar_senha"];
$situacao = $_POST['situacao'];
$grau = $_POST['grau'];
$sexo = $_POST['sexo'];
$dt_nasc = $_POST['dt_nasc'];

// Se não cadastra imagem de perfil, entra imagem avatar
if(!$img){
    $img = 'avatar.png';
}

// echo '<br> Nome: '.$nome;
// echo '<br> Imagem: '.$img;
// echo '<br> Email: '.$email;
// echo '<br> Senha: '.$senha;
// echo '<br> Confirmação: '.$confirmar_senha;
// echo '<br> Situação: '.$situacao;
// echo '<br> Grau: '.$grau;
// echo '<br> Data de Nascimento: '.$dt_nasc;

if($senha === $confirmar_senha) {    
    $senha_cripto = md5($senha);   
    
    $update = "UPDATE `pessoa` SET `nome`= '$nome', `img`='$img', `email`='$email', `senha`='$senha_cripto', `situacao`='$situacao', `grau`='$grau', `sexo`='$sexo', `dt_nasc`='$dt_nasc' WHERE `id_pessoa` = '$id_pessoa'";
    
    $link->query($update);
    
    if ($link == true) {
        
        echo "<script>
        alert('Atualizado com Sucesso!')
        window.location.href = '../index.html'
        </script>";

    } else {

        echo "<script>
        alert('Não foi possível fazer atualização!')
        window.location.href = './perfil.php'
        </script>";

    }

} else {
    
    echo "<script>
    alert('Sua senhas não coincidem!')
    window.location.href = './perfil.php'
    </script>";

}
    
?>
