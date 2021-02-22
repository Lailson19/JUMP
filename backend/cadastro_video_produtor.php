<?php
require_once('conexao.php');
session_start();

$id_pessoa = $_SESSION['id_pessoa'];

$titulo_conteudo = $_POST['titulo_conteudo'];
$assunto_conteudo = $_POST['assunto_conteudo'];
$descricao_conteudo = $_POST['descricao_conteudo'];
$img_capa = $_FILES['img_capa'];
$video_conteudo = $_FILES['video_conteudo'];
$ciente = $_POST['ciente'];


// echo $titulo_conteudo;
// echo $assunto_conteudo;
// echo $descricao_conteudo;
// print_r($img_capa) ;
// print_r($video_conteudo);
// echo $ciente;


if(isset($_FILES['img_capa'])){

    $extensao_capa = strtolower(substr($_FILES['img_capa']['name'], -4)); //pega a extensao do arquivo
    $novo_nome_capa = md5(time()).$extensao_capa; //define o nome do arquivo
    $diretorio_capa = "../img/capa/"; //define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['img_capa']['tmp_name'], $diretorio_capa.$novo_nome_capa); //efetua o upload
    $img_capa = $novo_nome_capa;
    
}

if(isset($_FILES['video_conteudo'])){

    $extensao_video_conteudo = strtolower(substr($_FILES['video_conteudo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome_video_conteudo = md5(time()).$extensao_video_conteudo; //define o nome do arquivo
    $diretorio_video_conteudo = "../video/principal/"; //define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['video_conteudo']['tmp_name'], $diretorio_video_conteudo.$novo_nome_video_conteudo); //efetua o upload
    $video_conteudo = $novo_nome_video_conteudo;

}

    $sqlprodutor = "INSERT INTO video_produtor (`id_pessoa`,`nome_vid_produtor`) VALUES ('$id_pessoa','$video_conteudo')";

    if($link->query($sqlprodutor) == TRUE){

        $resultado_consulta = $link->query("SELECT id_vid_produtor FROM video_produtor WHERE video_produtor.id_pessoa = '$id_pessoa'");
        
        $result_vid_produtor = mysqli_fetch_assoc($resultado_consulta);        
        $id_vid_produtor = $result_vid_produtor["id_vid_produtor"];

        if($resultado_consulta == TRUE){

            $insere_conteudo = "INSERT INTO conteudo (`id_pessoa`,`id_vid_produtor`, `titulo_conteudo`, `assunto_conteudo`, `capa_conteudo`, `descricao_conteudo`) VALUES ('$id_pessoa', '$id_vid_produtor', '$titulo_conteudo','$assunto_conteudo', '$img_capa', '$descricao_conteudo')";

            if($link->query($insere_conteudo) == TRUE){

                header('location: ../frontend/home_produtor.php');
                
            }
        }
    }