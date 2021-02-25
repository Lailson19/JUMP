<?php

require_once('conexao.php');
session_start();

if (!isset($_SESSION['nome']) && !isset($_SESSION['id_pessoa'])) {
   header('Location: ./index.php');
   exit;
}

$id_pessoa = $_SESSION['id_pessoa'];
$nome = $_POST['nome'];
$img = $_FILES['img'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$situacao = $_POST['situacao'];
$grau = $_POST['grau'];
$sexo = $_POST['sexo'];
$dt_nasc = $_POST['dt_nasc'];
$confirmar_senha = $_POST["confirmar_senha"];

// Se não cadastra imagem de perfil, entra imagem avatar
if(isset($_FILES['img'])){

    $extensao = strtolower(substr($_FILES['img']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "../img/user/"; //define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['img']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
    $img = $novo_nome;
    
} else {

    $img = 'avatar.png';

}

if($senha === $confirmar_senha) {    
    $senha_cripto = md5($senha);   
    
    $update = "UPDATE `pessoa` SET `nome`= '$nome', `img`='$img', `email`='$email', `senha`='$senha_cripto', `situacao`='$situacao', `grau`='$grau', `sexo`='$sexo', `dt_nasc`='$dt_nasc' WHERE `id_pessoa` = '$id_pessoa'";
    
    $link->query($update);
    
    if ($link == true) {
        
        echo "<script>
        alert('Atualizado com Sucesso!')
        window.location.href = '../index.php'
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
