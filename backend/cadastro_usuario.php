<?php

require_once('conexao.php');

$nome = $_POST["nome"];
$img = $_FILES["img"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$confirmar_senha = $_POST["confirmar_senha"];

// Se não cadastra imagem de perfil, entra imagem avatar
if(isset($_FILES['img'])){

    $extensao = strtolower(substr($_FILES['img']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()).$extensao; //define o nome do arquivo
    $diretorio = "../img/user/"; //define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['img']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
    $img = $novo_nome;
    
} else {

    $img = 'avatar.png';

}


if((strlen($nome) > 3) && (strlen($email) > 3) && (strlen($senha) > 3) && ($senha === $confirmar_senha)) {
    $senha_cripto = md5($senha);
    
    $sql = "INSERT INTO pessoa (`nome`,`img`, `email`, `senha`) VALUES ('$nome','$img', '$email','$senha_cripto')";
    
    $link->query($sql);
     
    echo "<script>
    alert('Cadastro efetuado!')
    window.location.href = '../index.php'
    </script>";
}
else if ($senha != $confirmar_senha){

    echo "<script>
    alert('As senhas devem ser iguais, tente novamente!')
    window.location.href = '../index.php'
    </script>";
   
}
else if (strlen($nome) <= 3){

    echo "<script>
    alert('Digite um nome válido para realizar o cadastro!')
    window.location.href = '../index.php'
    </script>";
  
}

else if (strlen($email) <= 3 ){

    echo "<script>
    alert('Digite um e-mail válido para realizar o cadastro!')
    window.location.href = '../index.php'
    </script>";
    
}
else if (strlen($senha) <= 3){

    echo "<script>
    alert('Digite uma senha válida para realizar o cadastro!')
    window.location.href = '../index.php'
    </script>";
    
}

?>