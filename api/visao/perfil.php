<?php
require __DIR__ . "/../conexao.php";
session_start();
if (!isset($_SESSION["usuario"])) {
    $logado = false;
} else {
    $logado = true;
}

    $selecionado = $_GET["usuario"];
    $stmt =  mysqli_prepare($conn, "SELECT * from perfil WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $selecionado);
    mysqli_stmt_execute($stmt);
    $selecionado = mysqli_stmt_get_result($stmt);
    $selecionado = mysqli_fetch_assoc($selecionado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil! | <?=$selecionado["nome"]?> </title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/reset.css">
    <script src="https://kit.fontawesome.com/4c0a49f720.js" crossorigin="anonymous"></script>
    <script src="<?= BASE_URL ?>/public/js/script.js" defer></script>
</head>
<body>
    <?php
        include COMPONENTS_PATH . 'Header.php';
        if (isset($imgPerfil)) {
            $isUser = $selecionado["username"] === $imgPerfil["username"];
        }
        
        
        if ($logado) {
            echo'
                <a id="adicionarPost" href="<?= BASE_URL ?>/visao/adicionar">
                    + 
                </a>
            ';
        }
        
    ?>

    <main id="perfil">
        <section id="seuPerfil">
            <div id="profileInfos">
                <span style="background-image:url(<?= BASE_URL ?>/public/imgs/<?=$selecionado["header"]?>);"></span>
                
                <img src=
                    <?php
                        echo BASE_URL . "/public/imgs/". $selecionado["img_perfil"]; 
                    ?>
                    id="fotodeperfil"
                >
            </div>
            <div id="usuario">
                <h1><?=$selecionado["nome"]?></h1>
                <h2>@<?=$selecionado["username"]?></h2>
                <p><?=$selecionado["bio"]?></p>
                <?php
                    if (isset($isUser)) {
                        ?>
                            <div class="flexButtons">
                                <a href="<?= BASE_URL ?>/visao/edicao?usuario=<?=$selecionado["username"]\">editar perfil</a>
                                <button>compartilhar perfil</button>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </section>
        <section id="posts">
            <?php
                $posts = mysqli_query($conn, "SELECT * FROM posts WHERE email = '{$selecionado["email"]}'");
            ?>

            <div class="inner">
                <?php
                if (mysqli_num_rows($posts) > 0) {
                    while ($imagem = mysqli_fetch_assoc($posts)) {?>
                        <figure onclick="redirecionar('<?= BASE_URL ?>/visao/publicacao?id=<?=$imagem['url']?>')">
                                <img src="<?= BASE_URL ?>public/imgs/<?=$imagem['url']?>">
                                <figcaption>
                                    <h3><?=$imagem['titulo']?></h3>
                                    <i class="fa-solid fa-thumbtack"></i>
                                </figcaption>
                        </figure>
                        
                    <?php }} else {
                        echo "esse usuario ainda não fez nenhuma postagem";
                    }
                ?>
            </div>
        </section>
    </main>
</body>
</html>