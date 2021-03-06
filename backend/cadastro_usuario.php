<?php
require_once('conexao.php');
session_start();

$nome = $_POST["nome"];
$_FILES["imge"];
$email = $_POST["email"];
$senha = $_POST["senha"];
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

if((strlen($nome) > 0) && (strlen($email) > 7) && (strlen($senha) >= 6) && ($senha === $confirmar_senha)) {
    $senha_cripto = md5($senha);

    $existente = "SELECT email FROM  pessoa WHERE email = '$email'";
    $result = mysqli_fetch_assoc($existente);

    if($link->query($existente) == TRUE && $result["email"] == $email){

        $_SESSION['alertesist'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-danger alert-dismissible fade show" role="alert">
            O e-mail: '. $email .', já existe!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        header('location: ../index.php');

    }else{

        $sql = "INSERT INTO pessoa (`nome`,`img`, `email`, `senha`) VALUES ('$nome','$img', '$email','$senha_cripto')";        
        if($link->query($sql) == TRUE){

            $_SESSION['alertsucess'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-success alert-dismissible fade show" role="alert">
                Seu cadastro foi realizado com sucesso!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            header('location: ../index.php');

        }else{

            $_SESSION['alertesist'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-danger alert-dismissible fade show" role="alert">
                Erro ao cadastrar, tente novamente!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            header('location: ../index.php');

        }

    }

}else if ($senha != $confirmar_senha){

    $_SESSION['alertesist'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-danger alert-dismissible fade show" role="alert">
        Suas senhas são diferentes!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    header('location: ../index.php');
   
}else if (strlen($nome) < 1){

    $_SESSION['alertesist'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-danger alert-dismissible fade show" role="alert">
        Digite algo no campo "Nome"
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    header('location: ../index.php');
  
}else if (strlen($email) < 7){

    $_SESSION['alertesist'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-danger alert-dismissible fade show" role="alert">
        Seu e-mail é muito curto!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    header('location: ../index.php');
    
}else if (strlen($senha) < 6){

    $_SESSION['alertesist'] = '<div style="font-size: 1em; margin: 0;" class="alert alert-danger alert-dismissible fade show" role="alert">
        Sua senha é muito curta, digite uma senha com no mínimo 6 dígitos!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    header('location: ../index.php');
    
}

?>