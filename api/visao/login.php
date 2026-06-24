<?php
require __DIR__ . "/../conexao.php";
session_start();
if (!isset($_SESSION["usuario"])) {
    $logado = false;
} else {
    $logado = true;
    header("Location: <?= BASE_URL ?>api/visao");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>entrar!</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/reset.css">
    <script src="/js/script.js" defer></script>
</head>
<body>
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/api/components/Header.php";
    ?>
    <main id="formMain">
        <div id="formContainer">
            <h3>Entrar</h3>
            <form method="post" id="formulario" action= "../processadores/processar-login.php">
                <div class="inputContainer">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="inputContainer">
                    <label for="email">Senha:</label>
                    <input type="password" name="Senha" id="Senha">
                </div>
                <button type="submit" id="submit">Entrar</button>
            </form>
        </div>
    </main>
    <footer></footer>
</body>
</html>