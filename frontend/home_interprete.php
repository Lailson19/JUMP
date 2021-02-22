<?php
error_reporting(0);
require_once('../backend/conexao.php');

session_start();

if (!isset($_SESSION['id_pessoa'])) {
    header('Location: ../index.html');
    exit;
} else {
    $id = $_SESSION['id_pessoa'];

    $videohome = $link->query("SELECT * FROM conteudo WHERE conteudo.id_vid_traducao IS NOT NULL");

    $videointerprete = $link->query("SELECT * FROM conteudo JOiN video_traducao ON conteudo.id_vid_traducao = video_traducao.id_vid_traducao WHERE video_traducao.id_pessoa = $id");

    $lista = $link->query("SELECT * FROM conteudo JOIN pessoa ON conteudo.id_pessoa = pessoa.id_pessoa WHERE conteudo.id_vid_traducao IS NULL");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Interprete - JUMP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500;600&display=swap" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/global-home/home-user.css">
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

                <!-- NAVEGAÇÃO EM CORTINA --------------------------------------- -->

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#perfil" role="tab" aria-controls="profile" aria-selected="false">Interpretações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contato" role="tab" aria-controls="contact" aria-selected="false">Interpretar</a>
                    </li>
                </ul>

                <!-- FIM NAVEGAÇÃO EM CORTINA --------------------------------------- -->
                <!-- PÁGINAÇÃO EM CORTINA ------------------------------------------- -->

                <div class="tab-content" id="myTabContent">

                    <!-- CORTINA 1 ------------------------------------------------------ -->

                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="container py-5">
                            <div class="row">

                                <!-- CARD - LISTA TOTAL -------------------------------------------------------- -->
                                <?php foreach ($videohome as $video) { ?>
                                    <div class="col-md-4 p-2">
                                        <a href="./home_video.php?id=<?php echo $video['id_conteudo']; ?>">
                                            <div class="card">
                                                <img class="card-img-top" src="../img/capa/<?php echo $video['capa_conteudo'] ?>" alt="<?php echo $video['assunto_conteudo'] ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $video['titulo_conteudo'] ?></h5>
                                                    <p class="card-text">
                                                        <?php echo $video['descricao_conteudo'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>

                                <!--
                                <div class="col-md-4 p-2">
                                    <a href="#">
                                        <div class="card">
                                            <img class="card-img-top" src="../img/campo.jpg" alt="Imagem de capa do card">
                                            <div class="card-body">
                                                <h5 class="card-title">Título</h5>
                                                <p class="card-text">
                                                    Um exemplo de texto rápido para construir o título do card e fazer preencher o conteúdo do card.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                -->
                                <!-- FIM CARD -LISTA TOTAL ----------------------------------------------------- -->

                            </div>
                        </div>
                    </div>

                    <!-- FIM CORTINA 1 ------------------------------------------------ -->
                    <!-- CORTINA 2 ---------------------------------------------------- -->

                    <div class="tab-pane fade" id="perfil" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="container py-5">
                            <div class="row">

                                <!-- CARD - LISTA PRODUZIDOS -------------------------------------------------------- -->
                                <?php foreach ($videointerprete as $interprete) { ?>
                                    <div class="col-md-4 p-2">
                                        <a href="./home_video.php?id=<?php echo $interprete['id_conteudo']; ?>">
                                            <div class="card">
                                                <img class="card-img-top" src="../img/capa/<?php echo $interprete['capa_conteudo'] ?>" alt="<?php echo $interprete['assunto_conteudo'] ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $interprete['titulo_conteudo'] ?></h5>
                                                    <p class="card-text">
                                                        <?php echo $interprete['descricao_conteudo'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>

                                <!-- FIM CARD - LISTA PRODUZIDOS -------------------------------------------------------- -->

                            </div>
                        </div>
                    </div>

                    <!-- FIM CORTINA 2 ---------------------------------------------------------------------- -->
                    <!-- CORTINA 3 -------------------------------------------------------------------------- -->

                    <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="container py-5">
                            <h4 class="pb-2 d-flex justify-content-center">Lista de conteúdo a ser interpretados</h4>
                            <!-- LISTA -------------------------------------------------------------------->
                            <div class="table-responsive">
                                <table id="lista" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Autor</th>
                                            <th scope="col">Título</th>
                                            <th scope="col">Assunto</th>
                                            <th scope="col">Data</th>
                                            <th scope="col">Duração</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($lista as $traduzir) { ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $traduzir['nome'] ?></td>
                                                <td><?php echo $traduzir['titulo_conteudo'] ?></td>
                                                <td><?php echo $traduzir['assunto_conteudo'] ?></td>
                                                <td><?php echo $traduzir['data_conteudo'] ?></td>
                                                <td><?php echo $traduzir['temp_vid_produtor'] ?></td>
                                                <td type="button" class="btn btn-secondary btn-sm"><a href="./home_interprete_video.php?id=<?php echo $traduzir['id_conteudo'];?>">Interpretar</a></td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>

                                </table>
                            </div>


                            <!-- FIM LISTA ---------------------------------------------------------------->

                        </div>
                    </div>

                    <!-- FIM CORTINA 3 ---------------------------------------------------------------------- -->

                </div>

                <!-- FIM PÁGINAÇÃO EM CORTINA ----------------------------------------- -->

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
</body>

</html>