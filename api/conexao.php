<?php
$servername = "mysql-emyrhf.alwaysdata.net";
$username = "emyrhf";
$password = "123clickdb";
$databasename = "emyrhf_click_db";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $databasename = "click";

//criação da conexão
$conn = new mysqli($servername, $username, $password, $databasename);

// verificando a conexão
if (!$conn){
    //die("conexão falhou".mysqli_connect_error());
    echo "não foi possível conectar ao banco de dados";
};
?>