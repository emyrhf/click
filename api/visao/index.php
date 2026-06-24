<?php
require __DIR__ . "/../conexao.php";
require __DIR__ . "/../config.php";
session_start();
if (!isset($_SESSION["usuario"])) {
    $logado = false;
} else {
    $logado = true;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>click!</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/reset.css">
    <script src="<?= BASE_URL ?>/public/js/script.js" defer></script>
    <script src="https://kit.fontawesome.com/4c0a49f720.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/api/components/Header.php";
    ?>

    <main>
        <?php
            if ($logado) {
                echo
                    '<a id="adicionarPost" href="<?= BASE_URL ?>/api/visao/adicionar.php">
                        
                         +
                        
                    </a>';
                }
        ?>
        <section class="inner">
            <?php
                $imagens = "SELECT * FROM posts ORDER BY url DESC";
                $res = mysqli_query($conn, $imagens);
                $pasta = "<?= BASE_URL ?>public/imgs/*";
                $imagensProntas = glob($pasta);


                if (mysqli_num_rows($res) > 0) {
                    while ($imagem = mysqli_fetch_assoc($res)) {?>
                        

                        <figure onclick="redirecionar('<?= BASE_URL ?>/api/visaoacao.php?id=<?=$imagem['url']?>')">
                            <img src="<?= BASE_URL ?>/imgs/<?=$imagem['url']?>"> 
                                <figcaption>
                                    <h3><?=$imagem['titulo']?></h3>
                                    <i class="fa-solid fa-thumbtack"></i>
                                </figcaption>
                        </figure>
                        
                    <?php };
                }

               

            ?>

        </section>
    </main>
</body>
</html>
