<?php

require_once('conexao.php');
session_start();

if (!isset($_SESSION['nome']) && !isset($_SESSION['id_pessoa'])) {
   header('Location: ./index.php');
   exit;
}

$id_pessoa = $_SESSION['id_pessoa'];
$nome = $_POST['nome'];
$_FILES['imge'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$situacao = $_POST['situacao'];
$grau = $_POST['grau'];
$sexo = $_POST['sexo'];
$dt_nasc = $_POST['dt_nasc'];
$confirmar_senha = $_POST["confirmar_senha"];


// Se não cadastra imagem de perfil, entra imagem avatar.
if($_FILES['imge']["name"] == TRUE){

    $extensao = strtolower(substr($_FILES['imge']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()).$extensao; //define o nome do arquivo
    $diretorio = "../img/user/"; //define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['imge']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
    $img = $novo_nome;

}else{

    $img = 'avatar.png';

}

if($senha === $confirmar_senha) {    
    $senha_cripto = md5($senha);   
    
    $update = "UPDATE `pessoa` SET `nome`= '$nome', `img`='$img', `email`='$email', `senha`='$senha_cripto', `situacao`='$situacao', `grau`='$grau', `sexo`='$sexo', `dt_nasc`='$dt_nasc' WHERE `id_pessoa` = '$id_pessoa'";
    
    if ($link->query($update) == TRUE) {
        
        $_SESSION['alertsucess'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-success alert-dismissible fade show" role="alert">
            Atualização realizada com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        header('location: ../index.php');

    } else {

        $_SESSION['erroexclud'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-danger alert-dismissible fade show" role="alert">
        Erro para atualizar, tente novamente!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        header('location: ../frontend/perfil.php');

    }

} else {
    
    $_SESSION['erroexclud'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-danger alert-dismissible fade show" role="alert">
    Erro para atualizar, tente novamente!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    header('location: ../frontend/perfil.php');

}
    
?>
