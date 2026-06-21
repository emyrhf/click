<?php
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
    <title>post!</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/reset.css">
    <script src="https://kit.fontawesome.com/4c0a49f720.js" crossorigin="anonymous"></script>
    <script src="/public/js/script.js" defer></script>
</head>
<body>
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/api/components/Header.php";
    ?>
    <main>
        <?php
            if ($logado) {
                echo
                    '<a id="adicionarPost" href="<?= BASE_URL ?>api/visao/adicionar.php">
                        
                         +
                        
                    </a>';
                };
        ?>

        <section id="firstContainer">
            <?php
                if(isset($_GET['id'])) {
                    $post = $_GET['id'];
                    $comando = "SELECT * FROM posts WHERE url = ?";
                    $username = "SELECT * from perfil WHERE email = ?";
                    $stmt = mysqli_prepare($conn, $comando);
                    $stmti =  mysqli_prepare($conn, $username);
                    
                    mysqli_stmt_bind_param($stmt, "s", $post);  
                    mysqli_stmt_execute($stmt);
                    $postEscolhido = mysqli_stmt_get_result($stmt);
                    $imagem = mysqli_fetch_assoc($postEscolhido);

                    mysqli_stmt_bind_param($stmti, "s", $imagem["email"]);
                    mysqli_stmt_execute($stmti);
                    $username = mysqli_stmt_get_result($stmti);
                    $usuario = mysqli_fetch_assoc($username);

                    if ($postEscolhido) {
                    ?>
                        <div id="postContainer">
                            <div id="fotoPublicada">
                                <figure>
                                    <img src="/public/imgs/<?=$imagem['url']?>">
                                    <figcaption>
                                        <h3><?=$imagem['titulo']?></h3>
                                        <i class="fa-solid fa-thumbtack"></i>
                                    </figcaption>
                                </figure>
                                <?php
                                        if (isset($imgPerfil)) {
                                            
                                        
                                        if ($usuario["email"] === $imgPerfil["email"]) {
                                    ?>
                                    <div class="flexButtons">
                                    <button onClick="location.href = `<?= BASE_URL ?>api/processadores/processar-apagar-post.php?url=<?=$imagem["url"]?>`">deletar post</button>
                                    </div>
                                    <?php } }?>
                            </div>
                            <div id="informacoesPublicadas" onClick="location.href = `<?= BASE_URL ?>api/visao/perfil.php?usuario=<?=$usuario["username"]?>`">
                                <div id="perfilPublicado">
                                    <img src=<?php
                                        echo "/public/imgs/". $usuario["img_perfil"]; 
                                    ?> class="profileImg">
                                    <h3>
                                        <?php   
                                            echo "@".$usuario["username"];
                                        ?>
                                    </h3>
                                </div>
                                <div id="descricao">
                                    <p><?=$imagem['descricao']?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                    } else {
                        echo "Nenhum post encontrado.";
                    }

                    
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                } else {
                    echo "Algo deu errado";
                }
            ?>
        </section>
    </main>
    
</body>
</html>