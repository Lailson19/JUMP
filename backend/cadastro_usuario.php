<?php

require_once('conexao.php');

$nome = $_POST["nome"];
$img = $_POST["img"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$confirmar_senha = $_POST["confirmar_senha"];

/*
echo '<br> Nome: '.$nome;
echo '<br> Imagem: '.$img;
echo '<br> Email: '.$email;
echo '<br> Senha: '.$senha;
echo '<br> Confirmação: '.$confirmar_senha;
*/

if((strlen($nome) > 3) && (strlen($email) > 3) && (strlen($senha) > 3) && ($senha === $confirmar_senha)) {
    $senha_cripto = md5($senha);
    
    $sql = "INSERT INTO pessoa (`nome`,`img`, `email`, `senha`) VALUES ('$nome','$img', '$email','$senha_cripto')";
    
    $link->query($sql);
     
    echo "<script>
    alert('Cadastro efetuado!')
    window.location.href = '../index.html'
    </script>";
}
else if ($senha != $confirmar_senha){

    echo "<script>
    alert('As senhas devem ser iguais, tente novamente!')
    window.location.href = '../index.html'
    </script>";
   
}
else if (strlen($nome) <= 3){

    echo "<script>
    alert('Digite um nome válido para realizar o cadastro!')
    window.location.href = '../index.html'
    </script>";
  
}

else if (strlen($email) <= 3 ){

    echo "<script>
    alert('Digite um e-mail válido para realizar o cadastro!')
    window.location.href = '../index.html'
    </script>";
    
}
else if (strlen($senha) <= 3){

    echo "<script>
    alert('Digite uma senha válida para realizar o cadastro!')
    window.location.href = '../index.html'
    </script>";
    
}

?>