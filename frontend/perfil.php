<?php

require_once('../backend/conexao.php');
session_start();

if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
    exit;
}else {
 
  $_SESSION['id_pessoa']; 
  $_SESSION['nome']; 
  $_SESSION['img']; 
  $_SESSION['email']; 
  $_SESSION['dt_nasc']; 
  $_SESSION['sexo'];
  $_SESSION['situacao'];
  $_SESSION['grau'];

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - JUMP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500;600&display=swap" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/global-home/home-user.css">
    <link rel="stylesheet" href="../css/global-home/perfil.css">
</head>

<body>
    <div class="wrapper">

        <!-- SIDEBAR ---------------------------------------------------- -->

        <?php include('./sidebar.php') ?>

        <!-- FIM SIDEBAR ------------------------------------------------ -->
        <!-- CONTEUDO --------------------------------------------------- -->

        <div id="content">

            <?php  
                if(isset($_SESSION['erroexclud'])){
                    echo $_SESSION['erroexclud'];
                    unset($_SESSION['erroexclud']);
                }
            ?>

            <!-- BOTÃO PARA ABRIR/FECHAR SIDEBAR ---------------------------- -->

            <nav class="container-fluid">
                <span id="sidebarCollapse">
                    <i class="fas fa-angle-right"></i>
                </span>
            </nav>

            <!-- FIM BOTÃO PARA ABRIR/FECHAR SIDEBAR ----------------------- -->

            <div class="container">
                <main class="base-perfil">
                    <h4>Meus dados</h4>
                    <div class="container-fluid my-4">

                        <form action="../backend/perfil.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nome</label>
                                        <input type="text" value="<?php echo $_SESSION['nome']; ?>" name="nome" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite aqui o seu nome" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputSexo">Sexo</label>
                                        <select id="inputSexo" class="form-control form-control-sm" name="sexo">
                                            <option selected><?php echo $_SESSION['sexo']; ?></option>
                                            <option>Masculino</option>
                                            <option>Feminino</option>
                                            <option>Outros</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Data nasc.</label>
                                        <input type="date" value="<?php echo $_SESSION['dt_nasc']; ?>" name="dt_nasc" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite aqui o seu nome">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputSexo">Você é surdo(a)?</label>
                                        <select id="inputSexo" class="form-control form-control-sm" name="situacao">
                                            <option selected><?php echo $_SESSION['situacao']; ?></option>
                                            <option>Sim</option>
                                            <option>Não</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputSexo">Grau</label>
                                        <select id="inputSexo" class="form-control form-control-sm" name="grau">
                                            <option selected><?php echo $_SESSION['grau']; ?></option>
                                            <option>Nenhum</option>
                                            <option>Leve</option>
                                            <option>Moderado</option>
                                            <option>Severo</option>
                                            <option>Profundo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-file">
                                        <label for="img">Imagem</label>
                                        <input class="form-control" type="file" name="imge" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">E-mail</label>
                                        <input type="email" value="<?php echo $_SESSION['email']; ?>" name="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite aqui seu e-mail" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Senha</label>
                                        <input type="password" name="senha" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite aqui sua senha" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Confirme sua senha</label>
                                        <input type="password" name="confirmar_senha" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite aqui sua senha" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="caixa">
                                        <div class="base-btn">
                                            <button class="btn" type="button" data-toggle="modal" data-target="#exampleModal">Excluir conta</button>

                                            <button class="btn" type="reset">Resetar</button>

                                            <button class="btn" type="submit">Atualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: #1a7a857e;">
        <div class="modal-dialog" role="document" >
            <div class="modal-content" style="background-color: #DFEEF0;">
                <div class="modal-header" style="background-color: #ffa5a5;">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:#950000;">Deseja excluir sua conta?</h5>
                </div>
                <div class="modal-body" style="color: #950000; border-bottom: 1px solid #1A7B86;">
                    Ao excluir sua conta, não será possível recuperar seus dados.
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn" style="background-color:#39aebb5d; color: #1A7B86;" data-dismiss="modal">Não</button>

                    <a class="btn" href="../backend/remover.php?id=<?php echo $_SESSION['id_pessoa']; ?>" style="background-color: #ffa5a5; color:#950000">Sim</a>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- CONTROLE DO BOTÃO DE ABRIR/FECHAR SIDEBAR ----------------------- -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <!-- FIM CONTROLE DO BOTÃO DE ABRIR/FECHAR SIDEBAR ------------------ -->
    <!-- CONTROLE DE SINCRONIA DOS VÍDEOS ---------------------------- -->

    <script src="./js/jquery_video.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(document).ready(function($) {
            $('.parado').on('play', function() {
                $('.parado').each(function() {
                    $(this).removeClass('parado').addClass('rodando');
                    $(this).get(0).play();
                });
            });
            $('.parado').on('pause', function() {
                $('.rodando').each(function() {
                    $(this).removeClass('rodando').addClass('parado');
                    $(this).get(0).pause();
                });
            });
        });
    </script>

    <!-- CONTROLE DE SINCRONIA DOS VÍDEOS ---------------------------- -->

</body>

</html>