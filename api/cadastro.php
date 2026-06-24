<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="public/css/reset.css">
    <script src="https://kit.fontawesome.com/4c0a49f720.js" crossorigin="anonymous"></script>
    <script src="js/script.js" defer></script>
</head>
<body>
    <header id="header">
        <a href="/" id="logo">click!</a>
        <div>
            <input type="text" name="pesquisa" id="pesquisa">
            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png">
        </div>
    </header>
    <main id="formMain">
        <form method="post" id="formContainer">
            <h3>cadastre-se</h3>
            <div id="infoInputs">
                <div class="inputContainer">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome">
                    
                </div>
                <div class="inputContainer">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                    
                </div>
                <div class="inputContainer">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha">
                    <i class="fa-solid fa-eye" id="senhavisivel"></i>
                </div>
                <div class="inputContainer">
                    <label for="repetirSenha">Repita a senha:</label>
                    <input type="password" name="repetirSenha" id="repetirSenha">
                    <i class="fa-solid fa-eye" id="repetirSenhaVisivel"></i>
                </div>
            </div>

            <input type="submit" value="cadastrar">
        </form>
    </main>
</body>
</html>