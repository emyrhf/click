<?php
require __DIR__ . "/../config.php";
require __DIR__ . "/../conexao.php";
session_start();
if (!isset($_SESSION["usuario"])) {
    $logado = false;
} else {
    $logado = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adicionar Post!</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/reset.css">
    <script src="https://kit.fontawesome.com/4c0a49f720.js" crossorigin="anonymous"></script>
    <script src="<?= BASE_URL ?>/public/js/script.js" defer></script>
</head>
<body>
    <?php
        include COMPONENTS_PATH . 'Header.php';
    ?>
    <main>
        <form action="<?= BASE_URL ?>/processadores/processar-enviar-imagem" method="post" enctype="multipart/form-data">
            method="post"
            enctype="multipart/form-data" id="enviarFotos">

                <div id="adicionarArquivo">
                    <img src="#" alt="preview image" id="imagePreview">
                    <label>
                        <input type="file" id="imagemAdicionada" name="imagemAdicionada" accept="image/*" onchange="mudarImagem()" required>
                        Enviar Foto
                    </label>   
                </div>
                <div id="inputs">
                    <div class="inputContainer">
                        <label for="tituloDaImagem">Título:</label>
                        <input type="text" name="tituloDaImagem" id="tituloDaImagem" maxlength="50" required>
                    </div>
                    
                    <div class="inputContainer">
                        <label for="descricaoDaImagem">Descrição:</label>
                        <textarea name="descricaoDaImagem" id="descricaoDaImagem" cols="30" rows="10" maxlength="255" required></textarea>
                    </div>
                    
                    <input type="submit"  name="enviar" value="enviar imagem">
                </div>
        </form>
    </main>
</body>
</html>