<?php

require_once('conexao.php');

//session_start();

//Se não existir um valor do índice 'nome', então encerre a aplicação
//if (!isset($_SESSION['nome']) && !isset($_SESSION['idusuarios'])) {
//    header('Location: ../index.php');
//    exit;
//} 

/*$id_pessoa = $_SESSION['id_pessoa'];
$nome = $_POST['nome'];
$img = $_POST['img'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$situacao = $_POST['situacao'];
$grau = $_POST['grau'];
$sexo = $_POST['sexo'];
$dt_nasc = $_POST['dt_nasc'];
*/

echo '<br> Nome: '.$nome;
echo '<br> Imagem: '.$img;
echo '<br> Email: '.$email;
echo '<br> Senha: '.$senha;
echo '<br> Situação: '.$situacao;
echo '<br> Grau: '.$grau;
echo '<br> Data de Nascimento: '.$dt_nasc;

$select = $link->query("SELECT * FROM pessoa");

//$resultado = mysqli_fetch_assoc($select);

while ($row = mysqli_fetch_assoc($select)) {
    echo $row['nome'];
    echo $row['email'];
    echo $row['senha'];
    echo $row['dt_pessoa'];
}



//printf ($resultado);









