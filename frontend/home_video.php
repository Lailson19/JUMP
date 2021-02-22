<?php
error_reporting(0);
session_start();

$id_conteudo = $_GET['id'];
echo $id_conteudo;


if (!isset($_SESSION['id_pessoa'])) {
    header('Location: ../index.html');
    exit;
} else {
    $id = $_SESSION['id_pessoa'];    

    require_once('../backend/conexao.php');

    $postagens = $link->query("SELECT * FROM comentario inner join pessoa on pessoa.id_pessoa = comentario.id_pessoa  ORDER BY id_comentario DESC;"); //comentários

    $conteudos = $link->query("SELECT * FROM conteudo JOIN video_produtor ON conteudo.id_vid_produtor = video_produtor.id_vid_produtor JOIN pessoa ON conteudo.id_pessoa = pessoa.id_pessoa WHERE conteudo.id_conteudo = $id_conteudo");
     
    $traducoes = $link->query("SELECT * FROM pessoa RIGHT JOIN video_traducao ON video_traducao.id_pessoa = pessoa.id_pessoa JOIN conteudo ON conteudo.id_vid_traducao = video_traducao.id_vid_traducao where conteudo.id_conteudo = $id_conteudo");

    $getvideos = $link->query("SELECT * FROM conteudo WHERE id_conteudo = $id_conteudo");
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
    <link rel="stylesheet" href="../css/global-home/home-video.css">
</head>

<body>
    <div class="wrapper">
        

        <!-- SIDEBAR ---------------------------------------------------- -->

        <?php include('./sidebar.php') ?>

        <!-- FIM SIDEBAR ------------------------------------------------ -->
        <!-- CONTEUDO --------------------------------------------------- -->

        <div id="content">

            <!-- BOTÃO PARA ABRIR/FECHAR SIDEBAR ---------------------------- -->

            <nav class="container-fluid">
                <span id="sidebarCollapse">
                    <i class="fas fa-angle-right"></i>
                </span>
            </nav>

            <!-- FIM BOTÃO PARA ABRIR/FECHAR SIDEBAR ----------------------- -->

            <div class="container">

                <div class="container py-3">

                    <!-- VÍDEO ---------------------------------------------- -->
                    <?php foreach ($conteudos as $conteudo)  ?>
                    <?php foreach ($traducoes as $traducao)  ?>
                    <h3 class="titulo mb-4"><?php echo $conteudo['titulo_conteudo'] ?></h3>
                    <div class="row">
                        <div class="capsula-video">
                            <video controls class="meus_videos parado">
                                <source src="../video/principal/<?php echo $conteudo['nome_vid_produtor'];?>" type="video/mp4" />
                            </video>
                            <video id="vd2" class="meus_videos parado">
                                <source src="../video/carinhosamente_libras.mp4" type="video/mp4" />
                            </video>

                        </div>
                    </div>

                    <!-- FIM VÍDEO --------------------------------------------- -->


                    <div class="container">
                        <h4 class="titulo mt-4 mb-1"><?php echo $conteudo['titulo_conteudo'] ?></h4>
                        <h6 class="titulo mb-3"><span class="titulo-info"><?php echo $conteudo['assunto_conteudo'] ?></span></h6>

                        <p class="descricao">
                            <?php echo $conteudo['descricao_conteudo'] ?>
                        </p>

                        <div class="line-escura mt-4 mb-1"></div>

                        <h6 class="titulo mb-1">
                            <span class="titulo-info">
                                Produzido por:
                            </span>
                        </h6>
                        <div class="d-flex justify-content-between justify-content-between">
                            <p><?php echo $conteudo['nome'] ?></p>
                            <!-- AQUI SERÁ O CODE DE AVALIAÇÃO -->
                        </div>

                        <div class="line-escura mb-1"></div>

                        <h6 class="titulo mb-1">
                            <span class="titulo-info">
                                Traduzido por:
                            </span>
                        </h6>
                        <div class="d-flex justify-content-between justify-content-between">
                            <p><?php echo $traducao['nome'] ?></p>
                            <!-- AQUI SERÁ O CODE DE AVALIAÇÃO -->
                        </div>

                        <h4 class="titulo mt-4 mb-1"><i>Comentários</i></h4>

                        <div class="line-escura mt-0 mb-4"></div>

                        <?php foreach ($postagens as $postagem) { ?>

                            <p class="autor-msg">
                                <img class="rounded-circle img_pessoa" src="../img/user/<?php echo $postagem["img"] ?>" alt="<?php echo $postagem['nome'] ?>">
                                <?php echo $postagem['nome'] ?> Postado: <?php echo $postagem['data_comentario'] ?>
                            </p>
                            <p class="msg"><?php echo $postagem["comentario"] ?></p>

                        <?php  } ?>
                     
                        <!--
                            <p class="autor-msg">Sicrano Astolfo - 06:13h - 02/02/2021</p>                            
                            <p class="msg">Lorem ipsum dolor sit amet, consectetur adipisicing elit ipsum dolor sit.</p>
                          -->

                        <form action="../backend/registra_postagens.php" method="post">
                            <div class="base-msg">
                                <input type="text" id="disabledTextInput" class="area-msg form-control form-control-sm" name="post" placeholder="No que você está pensando, <?php echo $_SESSION['nome'] ?>?">
                                <input type="submit" class="btn form-control form-control-sm text-uppercase" value="Comentar">
                            </div>
                        </form>


                    </div>
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