<?php

    function navpag(){
        if($_SESSION['nivel_acesso'] == "comum"){
            return '../frontend/home_user.php';
        }elseif ($_SESSION['nivel_acesso']  == "produtor"){
            return '../frontend/home_produtor.php';
        }elseif ($_SESSION['nivel_acesso']  == "interprete"){
            return '../frontend/home_interprete.php';
        }
    }

?>

<nav id="sidebar">
            <div class="sidebar-header d-flex align-items-center justify-content-center">

<!-- LOGO ------------------------------------------------------- -->

                <img class="logo" src="../img/marca.svg" alt="Logo do projeto Jump - Recode Pro 2020/2021">
                <img class="logo-responsive" src="../img/marca-responsive.svg" alt="Logo do projeto Jump responsivo - Recode Pro 2020/2021">

<!-- FIM LOGO --------------------------------------------------- -->
<!-- DADOS USUARIO ---------------------------------------------- -->
                
                <div class="container-user text-center d-flex flex-column align-items-center mt-4">
                    <div class="user my-2">
                        <img src="../img/user/<?php echo $_SESSION['img']; ?>" alt="" class="img-user">
                    </div>
                    <p><?php echo $_SESSION['nome']; ?></p>
                </div>

<!-- FIM DADOS USUARIO ------------------------------------------ -->

            </div>
            <div class="line"></div>

<!-- LINKS SIDEBAR----------------------------------------------- -->

            <ul class="list-unstyled components">
                <li>
                    <a href="<?php echo navpag(); ?>">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                    <a href="./perfil.php">
                        <i class="fas fa-user-cog"></i>
                        <span>Meus dados</span>
                    </a>
                    <a href="#">
                        <i class="fas fa-film"></i>
                        <span>Colaborar</span>
                    </a>
                    <a href="<?php echo '../backend/sair.php'; ?>">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Sair</span>
                    </a>
                </li>
            </ul>

<!-- FIM LINKS SIDEBAR ------------------------------------------- -->

            <div class="line"></div>

<!-- DIREITOS ---------------------------------------------------- -->

            <p class="copy">
                <span class="copycopy">
                    &copycopyright SQUAD8-SP2
                </span>
                <span class="recode">
                    Recode Pro | 2020
                </span>
            </p>

<!-- FIM DIREITOS ----------------------------------------------- -->

        </nav>
