<?php
    require_once('conexao.php');
    session_start();

    $id_pessoa = $_SESSION['id_pessoa'];
    $id_cont_traduzir = $_POST['cont_traduzir'];
    $arq_video = $_FILES['vid_traducao'];


    if(isset($_FILES['vid_traducao'])){

        $extensao_video_traducao = strtolower(substr($_FILES['vid_traducao']['name'], -4)); //pega a extensao do arquivo
        $novo_video_traducao = md5(time()).$extensao_video_traducao; //define o nome do arquivo
        $diretorio_video_traducao = "../video/interpretacao/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['vid_traducao']['tmp_name'], $diretorio_video_traducao.$novo_video_traducao); //efetua o upload
        $video_traducao = $novo_video_traducao;

    }

    $sqltraducao = "INSERT INTO video_traducao (`id_pessoa`,`nome_vid_traducao`) VALUES ('$id_pessoa','$video_traducao')";

    if($link->query($sqltraducao) == TRUE){

        $resultado_consulta = $link->query("SELECT id_vid_traducao FROM video_traducao WHERE video_traducao.id_pessoa = '$id_pessoa'");

        $result_vid_traducao = mysqli_fetch_assoc($resultado_consulta);        
        $id_vid_traducao = $result_vid_traducao["id_vid_traducao"];

        if($result_vid_traducao == TRUE){

            $insere_traducao = "UPDATE conteudo SET `id_vid_traducao` = '$id_vid_traducao' WHERE conteudo.id_conteudo = '$id_cont_traduzir'";

            if($link->query($insere_traducao) == TRUE){

                header('location: ../frontend/home_interprete.php');
                
            }
        }
    }
