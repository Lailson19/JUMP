<?php
error_reporting(0);
require_once('../backend/conexao.php');

session_start();

if (!isset($_SESSION['id_pessoa'])) {

    header('Location: ../index.html');
    exit;

} else {

    $id = $_SESSION['id_pessoa']; 
    $id_cont_traduzir = $_GET['id'];

    $conteudos = $link->query("SELECT * FROM conteudo JOIN video_produtor ON conteudo.id_vid_produtor = video_produtor.id_vid_produtor JOIN pessoa ON conteudo.id_pessoa = pessoa.id_pessoa WHERE conteudo.id_conteudo = $id_cont_traduzir");

}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interpretação - JUMP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500;600&display=swap" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/global-home/home-user.css">
    <link rel="stylesheet" href="../css/global-home/home_interprete_video.css">
</head>

<body>
    <div class="wrapper">

        <!-- SIDEBAR ---------------------------------------------------- -->

        <?php include('./sidebar.php') ?>

        </nav>

        <!-- FIM SIDEBAR ------------------------------------------------ -->
        <div id="content">

            <!-- BOTÃO PARA ABRIR/FECHAR SIDEBAR ---------------------------- -->

            <nav class="container-fluid">
                <span id="sidebarCollapse">
                    <i class="fas fa-angle-right"></i>
                </span>
            </nav>

            <!-- FIM BOTÃO PARA ABRIR/FECHAR SIDEBAR ------------------------------- -->

            <div class="container">

                <!-- CONTEUDO DO HOME_INTERPRETE_VIDEO -------------------------------- -->
                
                <div class="container justify-content-center py-4">
                    <h4>Suba Sua interpretação</h4>

                    <!-- Video Interpretado ----------------------------------------------- -->

                    <div class="row">
                        <div class="col-lg-9">                            
                            <?php foreach ($conteudos as $conteudo)  ?>
                            <div class="embed-responsive embed-responsive-16by9 my-2">
                            <video controls class="meus_videos parado">
                                <source src="../video/principal/<?php echo $conteudo['nome_vid_produtor'];?>" type="video/mp4" />
                            </video>
                            </div>
                        </div>

                        <!-- Fim do Video ------------------------------------------------------- -->

                        <!-- Parte de Texto lado do video -------------------------------------- -->

                        <div class="col-lg-3">
                            <h5>Título:</h5>
                            <p><?php echo $conteudo['titulo_conteudo'] ?></p>

                            <h5>Assunto:</h5>
                            <p><?php echo $conteudo['assunto_conteudo'] ?></p>

                            <h5>Autor:</h5>
                            <p><?php echo $conteudo['nome'] ?></p>

                            <h5>Data de Lançamento:</h5>
                            <p><?php echo $conteudo['data_conteudo'] ?></p>

                            <h5>Tempo:</h5>
                            <p><?php echo $conteudo['temp_vid_conteudor'] ?></p>

                            <h5>Descrição:</h5>
                            <p><?php echo $conteudo['descricao_conteudo'] ?></p>

                        </div>
                    </div><br><br>

                    <!-- Fim do Texto de Video --------------------------------------------------------------------------------- -->

                    <!-- Imput para enviar arquivo -------------------------------------------------- -->

                    <p class="p1">Insira seu video de interpretação:</p>

                    <form action="../backend/cadastro_traducao.php" method="POST" enctype="multipart/form-data">
                        <div class="custom-file">
                            <input type="file" name="vid_traducao" class="custom-file-input form-control form-control-sm" id="customFileLang" lang="pt-br">
                            <label class="custom-file-label" for="customFileLang">Selecione um arquivo de vídeo...</label>
                        </div>

                        <input type="hidden" name="cont_traduzir" value="<?php echo $id_cont_traduzir ?>">

                        <!-- Fim do Imput de evio de arquivo --------------------------------------------------------------- -->

                        <!-- Começo de termo de  concientização ------------------------------------------------------------------ -->

                        <div class="caixa mt-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="ciente" class="custom-control-input form-control-sm" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1"><i>Declaro que os dados postados são de minha autoria.</i> </label>
                            </div>

                            <!-- Botões para envio,cancelar e limpar -------------------------------------------------------------- -->

                            <div>
                                <input class="btn" type="button" value="Voltar">
                                <input class="btn" type="reset" value="Limpar">
                                <input class="btn" name="" type="submit" value="Enviar">
                            </div>
                        </div>

                    </form>

                    <!-- Fim dos Botões ------------------------------------------------------------------------------------ -->

                </div>
                <!-- Fim do Conteudo da home_interprete_video ------------------------------------------------------------ -->

                <!-- CONTROLE DO BOTÃO DE ABRIR/FECHAR SIDEBAR ----------------------- -->

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#sidebarCollapse').on('click', function() {
                            $('#sidebar').toggleClass('active');
                        });
                    });
                </script>

                <!-- FIM CONTROLE DO BOTÃO DE ABRIR/FECHAR SIDEBAR ------------------ -->
</body>

</html>