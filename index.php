<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jump</title>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/index-css.css">

</head>
<body>

<!-- Início - Modal de aviso ao carregar a página -->

<!-- <div class="modal fade" id="modalInicio" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-white" id="TituloModalCentralizado">
                        Login já disponíveis para testes.
                    </h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
                        <span style="font-size: 30px;" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-white">
                    <p>
                        Existem 4 cadastros já disponíveis com 3 níveis de acesso (Produtor de conteúdo, Interprete em LIBRAS e Acesso padrão).
                    </p>
                    <dl>
                        <dt>Produtor de conteúdo:</dt>
                        <dd><em>filipe@123 | andesson@123</em></dd>
                        <dt>Interprete em LIBRAS:</dt>
                        <dd><em>sara@123</em></dd>
                        <dt>Acesso padrão:</dt>
                        <dd><em>lailson@123</em></dd>
                        <dt>Senhas:</dt>
                        <dd><em>123123</em></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div> -->

<!-- Fim - Modal de aviso ao carregar a página -->


    <nav class="navbar navbar-expand-sm d-flex justify-content-between px-5">
        <a class="navbar-brand text-white" href="#">
            <img src="./img/marca.svg" class="img-logo" alt="Projeto: JUMP, SQUAD8/EDUCAÇÃO, Recode Pro 2020-2021">
            <img src="./img/marca-responsive.svg" class="img-logo-respon" alt="Projeto: JUMP, SQUAD8/EDUCAÇÃO, Recode Pro 2020-2021">
        </a>
        <div class="dropdown">
            <button class="btn my-2 my-sm-0 text-white dropdown-toggle border-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Entrar</button>
            <div class="dropdown-menu pt-4" aria-labelledby="dropdownMenuLink">
                <form action="./backend/login_usuario.php" method="post">

                    <?php  
                        if(isset($_SESSION['alert'])){
                            echo $_SESSION['alert'];
                            unset($_SESSION['alert']);
                        }
                    ?>

                    <div class="form-group">
                      <input type="email" class="form-control form-control-sm" id="Email" name="email" aria-describedby="emailHelp" placeholder="Seu email" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-sm" id="senha" name="senha"placeholder="Senha" required>
                    </div>
                    <div class="nav-cadastro px-3">
                        <button type="submit" class="btn btn-sm text-white font-weight-bold">Enviar</button>
                        <button type="button" class="btn btn-sm text-white font-italic" data-toggle="modal" data-target="#ExemploModalCentralizado">Cadastre-se</button>
                    </div>
                </form>
            </div>
        </div>
    </nav>

<!-- Modal ------------------------------------------------------------>
    
    <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="TituloModalCentralizado">Cadastre-se</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form_cadastro" method="post" action="./backend/cadastro_usuario.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                <small class="text-white">
                                    Preencha os campos com seus dados.
                                </small>
                            </label>
                            <input type="text" class="form-control form-control-sm mb-2" id="nome" name="nome" required
                            aria-describedby="emailHelp" placeholder="Digite seu nome" />

                            <!-- <input class="form-control form-control-sm mb-2" id="img" name="img" type="url" placeholder="Informe um URL de uma foto sua online" /> -->

                            <input class="form-control mb-2" type="file" name="imge" />

                            <input type="email" class="form-control form-control-sm mb-2" id="email" name="email" required aria-describedby="emailHelp" placeholder="Digite seu e-mail" />

                            <input class="form-control form-control-sm mb-2" id="senha" name="senha" required type="password" placeholder="Crie sua senha" />

                            <input class="form-control form-control-sm mb-2" id="confirmar_senha" name="confirmar_senha" required type="password" placeholder="Confirme sua senha" />                    
                        </div>            
                        <div class="modal-footer">
                            <button type="submit" class="btn text-white shadow-sm">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php 
        if(isset($_SESSION['alertesist'])){
            echo $_SESSION['alertesist'];
            unset($_SESSION['alertesist']);
        }elseif(isset($_SESSION['alertsucess'])){
            echo $_SESSION['alertsucess'];
            unset($_SESSION['alertsucess']);
        }
    ?>

    <main>
        <section class="sessao1 d-flex align-items-center">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="./img/carousel/img1.jpg" alt="Primeiro Slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="./img/carousel/img2.jpg" alt="Segundo Slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="./img/carousel/img3.jpg" alt="Terceiro Slide">
                  </div>
                </div>
            </div>
            <div class="sessao1-box-texto">
                <h1>Jump</h1>
                <p>
                    Transpondo barreiras por um mundo com menos desigualdades
                </p>
            </div>
        </section>
        <section class="sessao2 d-flex justify-content-center ">
            <div class="sessao2-box-texto text-center">
                <h1>O que é Jump?</h1>
                <div class="row my-4">
                    <div class="col-lg-6">
                        <p>
                            A Jump é uma plataforma de vídeos educativos com acessibilidade para surdos. Aqui você poderá acessar diversos conteúdos com interpretação em LIBRAS.
                        </p>
                        <p>
                            E você que é  intérprete de LIBRAS poderá contribuir com seus vídeos interpretando os conteúdos produzidos por ouvintes.
                        </p>
                    </div>

                    <div class="col-lg-6">
                        <video controls class="video-libras">
                            <source src="./video/index/sessao2.mp4" type="video/mp4" />
                        </video>
                    </div>
                </div>
            </div>
        </section>
        <section class="sessao3 d-flex justify-content-center">
            <div class="sessao3-box-texto text-center">
                <h1>Como funciona?</h1>
                <div class="row my-4">
                    <div class="col-lg-6">
                        <video controls class="video-libras">
                            <source src="./video/index/sessao3.mp4" type="video/mp4" />
                        </video>
                    </div>
                    <div class="col-lg-6">
                        <div class="media">
                            <div class="media-body">
                                <p>
                                    Diversos parceiros criadores de conteúdo disponibilizam seus vídeos aqui na JUMP e intérpretes de LIBRAS podem contribuir com suas interpretações. É tudo bem simples.
                                </p>
                                <p>
                                    Quando você fizer seu login verá uma aba chamada QUASE LÁ, nessa aba estarão os vídeos que ainda não têm acessibilidade. Você poderá escolher um vídeo, gravar sua interpretação em LIBRAS e subir o vídeo clicando em SUBMETER. Quando você fizer isso o seu vídeo aparecerá no canto inferior direito do conteúdo falado.<span id="pontos">...</span><span id="mais">
                                    <br><br>
                                    Simples, não é? Além disso o seu perfil também aparecerá quando clicarem para assistir o vídeo e as pessoas poderão ver todas as suas interpretações no seu perfil, assim como os criadores de conteúdo. Não esqueça de colocar as informações sobre você e sobre o seu trabalho. Vamos começar? 
                                </p>
                                <a onclick="leiaMais()" id="btnSaibaMais">Mais...</a>
                                </span>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="sessao4 d-flex justify-content-center">
            <div class="sessao4-box-texto text-center">
                <h1>Por que Jump?</h1>
                <div class="row my-4">
                    <div class="col-lg-6">
                        <span>
                            <p>
                                A JUMP foi inspirada na trajetória de <strong>Anne Jump Cannon</strong>. Você conheçe ela? A Anne foi uma cientista norte-americana surda que criou a primeira classificação de estrelas, o Esquema de Classificação de Harvard. Ela catalogou à mão mais de 300 mil estrelas. Isso ainda no início do século XX.
                            </p>
                            <p>
                                Perdeu grande parte da audição ainda na infância e, movida por sua curiosidade, estudou diversos assuntos como Física, Fotografia, Matemática e foi a primeira mulher a receber o titulo de Doutora em Astronomia da Universidade de  Gronigen.
                            </p>                            
                        </span>
                    </div>
                    <div class="col-lg-6">
                        <video controls class="video-libras">
                            <source src="./video/index/sessao4.mp4" type="video/mp4" />
                        </video>
                    </div>
                </div>
            </div>
        </section>
        <section class="sessao5 d-flex justify-content-center">
            <div class="sessao5-box-texto my-4 text-center">
                <h1>Parceiros</h1>
                <div class="capsula-parc d-flex justify-content-center mt-4">
                    <figure class="figure">
                        <img src="https://avatars2.githubusercontent.com/u/4248081?s=400&u=98a643ad7f90c7950d9311e4b5a762fe77af8ada&v=4" class="figure-img img-fluid rounded" alt="Filipe Deschamps">
                        <figcaption class="figure-caption"><a href="https://www.youtube.com/c/FilipeDeschamps/featured" target="_blanck">Filipe Deschamps</a></figcaption>
                      </figure>
                </div>
            </div>
        </section>
        <section class="sessao6 d-flex justify-content-center">
            <div class="sessao6-box-texto text-center">
                <h1>Squad 8</h1>
                <div id="carouselExampleIndicators" class="carousel slide mt-4" data-ride="carousel">
                    <div class="carousel-inner text-center">
                        <div class="carousel-item active">
                            <img class="d-inline-block imgcarrocel" src="https://avatars0.githubusercontent.com/u/77332623?s=400&v=4" alt="Cássia Dias">
                            <div class="descricao d-inline-block">
                                Cássia Dias - Front-End 
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-inline-block imgcarrocel" src="https://avatars1.githubusercontent.com/u/72608626?s=400&u=18c68566217ffdcfc5c8d869f895b6f466af1345&v=4" alt="Cristiane Pereira">
                            <div class="descricao d-inline-block">
                                Cristiane Pereira - Front-End
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-inline-block imgcarrocel" src="https://avatars2.githubusercontent.com/u/65875860?s=400&u=97846b0ed123c9bb4e4a1ef2e499f24b2503be24&v=4" alt="Douglas Pinheiro">
                            <div class="descricao d-inline-block">
                                Douglas Pinheiro - Back-End
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-inline-block imgcarrocel" src="https://avatars2.githubusercontent.com/u/72992937?s=400&u=6e9ae68a5640d2de4623f11a83ea83f6f3b4e497&v=4" alt="Filipe Astolfi">
                            <div class="descricao d-inline-block">
                                Filipe Astolfi - Lider de projeto
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-inline-block imgcarrocel" src="https://avatars1.githubusercontent.com/u/54060265?s=460&u=de2e42a60757a7a2d8b119e20166fc5c4313b060&v=4" alt="Lailson Andesson">
                            <div class="descricao d-inline-block">
                                Lailson Andesson - Designer
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer d-flex justify-content-center py-2">
            &copy;SQUAD8 | Recode Pro - 2021

        </footer>
    </main>

<!-- Vlibras -------------------------------------------------->

    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
          <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>

    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script> new window.VLibras.Widget('https://vlibras.gov.br/app'); </script>
    <script type="text/javascript" src="./js/script.js"></script>
    <script>
        $(document).ready(function() {
            $('#modalInicio').modal('show');
        })
    </script>

</body>
</html>