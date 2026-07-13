<?php
require __DIR__ . "/../config.php";
require __DIR__ . "/../conexao.php";
require __DIR__ . "/Autenticacao.php";


if ($_SERVER["REQUEST_METHOD"] =="POST"){
    $email = $_POST["email"];
    $senha = $_POST["Senha"];
    
    $login = new autenticacao($conn);
    $usuario = $login->verificarUsuario($email, $senha);
    if ($usuario){
        session_start();
        $_SESSION["usuario"] = $usuario;
        $_SESSION["email"] = $email;
        header("Location: " . BASE_URL . "/visao/index.php");
        exit;
    }else{
        header("Location: " . BASE_URL . "/visao/login?erro=1");
    }
}
?>