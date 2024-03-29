<?php
error_reporting(0);
require_once('../backend/conexao.php');

session_start();

if (!isset($_SESSION['id_pessoa'])) {
    header('Location: ../index.php');
    exit;
} else {
    $id = $_SESSION['id_pessoa'];

    $videohome = $link->query("SELECT * FROM conteudo WHERE conteudo.id_vid_traducao IS NOT NULL");

    $videoproduzi = $link->query("SELECT * FROM conteudo WHERE conteudo.id_pessoa = $id");

    // $videoprodutor = $link->query("SELECT * FROM conteudo JOIN video_produtor ON conteudo.id_vid_produtor = video_produtor.id_vid_produtor JOIN pessoa ON conteudo.id_pessoa = pessoa.id_pessoa WHERE conteudo.id_conteudo = $id_conteudo");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Produtor - JUMP</title>
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
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#perfil" role="tab" aria-controls="profile" aria-selected="false">Produções</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contato" role="tab" aria-controls="contact" aria-selected="false">Produzir</a>
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
                               <?php foreach ($videoproduzi as $produtor) { ?>
                                <div class="col-md-4 p-2">
                                    <a href="./home_video.php?id=<?php echo $produtor['id_conteudo']; ?>">
                                        <div class="card">
                                            <img class="card-img-top" src="../img/capa/<?php echo $produtor['capa_conteudo'] ?>" alt="<?php echo $produtor['assunto_conteudo'] ?>">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $produtor['titulo_conteudo'] ?></h5>
                                                <p class="card-text">
                                                <?php echo $produtor['descricao_conteudo'] ?>
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
                        <div class="container py-4">

                            <h4>Novo conteúdo</h4>
                            <form action="../backend/cadastro_video_produtor.php" method="POST" enctype="multipart/form-data" class="mt-4">
                                <div class="row form-group">
                                    <div class="col-md">

                                        <input type="text" class="form-control form-control-sm" name="titulo_conteudo" placeholder="Digite o título...">

                                    </div>
                                    <div class="col-md">

                                        <input type="text" name="assunto_conteudo" class="form-control form-control-sm" placeholder="Informe o assunto...">

                                    </div>
                                </div>

                                <textarea class="form-control form-control-sm" name="descricao_conteudo" rows="3" placeholder="Insira aqui a descrição do seu conteudo."></textarea>

                                <div class="custom-file mt-3">

                                    <input type="file" name="img_capa" class="custom-file-input form-control form-control-sm" id="customFileLang" lang="pt-br">
                                    <label class="custom-file-label" for="customFileLang">Selecione um arquivo de imagem para sua capa...</label>

                                </div>
                                <div class="custom-file my-3">

                                    <input type="file" name="video_conteudo" class="custom-file-input form-control form-control-sm" id="customFileLang" lang="pt-br">
                                    <label class="custom-file-label" for="customFileLang">Selecione um arquivo de vídeo...</label>

                                </div>
                                <div class="caixa mt-4">
                                    <div class="custom-control custom-checkbox">

                                        <input type="checkbox" name="ciente" class="custom-control-input form-control form-control-sm" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1"><i>Declaro que os dados postados são de minha autoria.</i> </label>

                                    </div>
                                    <div>
                                        <button class="btn" type="button">Voltar</button>
                                        <button class="btn" type="reset">Limpar</button>
                                        <button class="btn" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </form>
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
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

<!-- FIM CONTROLE DO BOTÃO DE ABRIR/FECHAR SIDEBAR ------------------ -->
</body>
</html>