<?php

$servername = "localhost";
$username = "root";
$password = "@recodepro";
$database = "jump_squad8";


// $servername = "67.205.138.239";
// $username = "dgsdev";
// $password = "@dgsjuh12";
// $database = "jump_squad8";

$link = mysqli_connect($servername, $username, $password, $database);

if(!$link){
    die("A conexão mySQL falhou!".mysqli_connect_error());    
}

/*
sql102.epizy.com
epiz_26883339
@DGSjuh12
epiz_26883339_jump

$servername = "localhost";
$username = "root";
$password = "@recodepro";
$database = "jump";

*/
