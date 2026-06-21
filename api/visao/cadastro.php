<?php
require __DIR__ . "/../conexao.php";
session_start();
if (!isset($_SESSION["usuario"])) {
    $logado = false;
} else {
    $logado = true;
    header("<?= BASE_URL ?>api/visao/index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro!</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/reset.css">
    <script src="/public/js/script.js" defer></script>
</head>
<body>
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/api/components/Header.php";
    ?>
    <main id="formMain">
        <div id="formContainer">
            <h3>cadastre-se</h3>
            
            <form method="post" id="formulario" action="../processadores/processar-cadastro.php">
                <div class="inputContainer">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome">
                </div>
                <div class="inputContainer">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="inputContainer">
                    <label for="email">Senha:</label>
                    <input type="password" name="Senha" id="Senha">
                </div>
                <div class="inputContainer">
                    <label for="repeatPassword">Repita a senha:</label>
                    <input type="password" name="repeatPassword" id="repeatPassword">
                </div>
                <button type="submit" id="submit">Criar conta</button>
            </form>

            <?php 
            if(isset($_GET["erro"])){
                //echo "erro! senha e confirmar senha não são iguais";
            ?>
                <label for="erro"></br> senha e confirmar senha não são iguais.</label>
            <?php }
            ?>
        </div>
    </main>

    <?php    
    include 'conexao.php';
    include '../modelo/Usuario.php';
    ?>

    <footer></footer>
</body>
</html>