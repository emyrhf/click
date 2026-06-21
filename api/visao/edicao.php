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
    <title>edição! | <?=$selecionado["username"]?></title>
    <link rel="stylesheet" href="../public/css/reset.css">
    <link rel="stylesheet" href="../public/css/edicao.css">
    <link rel="stylesheet" href="../public/css/header.css">
    <script src="https://kit.fontawesome.com/4c0a49f720.js" crossorigin="anonymous"></script>
    <script src="../public/js/script.js" defer></script>
</head>
<body>
    <?php
        include("../components/header.php");

        if($selecionado["username"] !== $imgPerfil["username"]){
            header("Location: /click/api/visao");
        }
    ?>

    <main>
    <form action="/click/api/processadores/processar-editar-perfil.php" method="post" enctype="multipart/form-data">
        <section>
            <label for="updateHeader" class="imageUpdate inputLabel">
                <img src="../public/imgs/<?=$selecionado["header"]?>" id="profileHeader">
                <span class="spanLabel center">
                    <i class="fa-solid fa-pen"></i>
                </span>
                <input type="file" accept="image/png, image/gif, image/jpeg" name="updateHeader" id="updateHeader" value="<?=$selecionado["header"]?>" onChange="mudarHeader()">
            </label>
        </section>
        <section>
            <div>
                <label for="updateProfilePic" class="imageUpdate inputLabel" >
                    <img src="../public/imgs/<?=$selecionado["img_perfil"]?>" id="profilePic">
                    <span class="spanLabel right">
                        <i class="fa-solid fa-pen"></i>
                    </span>
                    <input type="file" accept="image/*" name="updateProfilePic" id="updateProfilePic" value="<?=$selecionado["img_perfil"]?>" onChange="mudarProfile()">
                </label>
            </div>
            <div id="formMain">
                    <div class="inputsFlex">
                        <div class="inputContainer">
                            <label for="updateNome">Nome:</label>
                            <input type="text" name="updateNome" id="updateNome" value="<?=$selecionado["nome"]?>">
                        </div>
                        <div class="inputContainer">
                            <label for="updateUsername">Username:</label>
                            <span style="display: flex; align-items: center; gap: .25rem;">
                                @
                                <input type="text" name="updateUsername" id="updateUsername" value="<?=$selecionado["username"]?>">
                            </span>
                            
                        </div>
                    </div>
                    <div class="bio">
                        <label for="updateBio">Biografia:</label>
                        <textarea name="updateBio" id="updateBio"><?=$selecionado["bio"]?></textarea>
                    </div>
                    <input type="text" class="notshow" name="email" value="<?=$selecionado["email"]?>">
                    <input type="text" class="notshow" name="oldProfilePic" value="<?=$selecionado["img_perfil"]?>">
                    <input type="text" class="notshow" name="oldHeader" value="<?=$selecionado["header"]?>">

                    <input type="submit" value="atualizar dados">
                </form>
            </div>
        </section>
    </main>
    <script>
        const updateProfilePic = document.getElementById("updateProfilePic");
        const profilePic = document.getElementById("profilePic"); 
        const updateHeader = document.getElementById("updateHeader");
        const header = document.getElementById("profileHeader");

        function mudarHeader () {
            const [arquivo] = updateHeader.files;

            if (arquivo) {
                header.src = URL.createObjectURL(arquivo);
            }
        }

        function mudarProfile () {
            const [arquivo] = updateProfilePic.files;

            if (arquivo) {
                profilePic.src = URL.createObjectURL(arquivo);
            }
        }
    </script>
</body>
</html>