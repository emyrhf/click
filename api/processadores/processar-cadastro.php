<?php    
    require __DIR__ . '/../config.php';
    include __DIR__ . "/../conexao.php";
    include MODELS_PATH . 'usuario.php';

    if (($_SERVER["REQUEST_METHOD"]=="POST")){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["Senha"];
        $repetirsenha = $_POST["repeatPassword"];
        $username  = uniqid("user-", true);

        if ($senha === $repetirsenha) {
            $usuario = new Usuario($conn);
            if ($usuario->cadastrar($nome,$email,$senha,$username, "profilepicture.webp", "defaultheader.jpg", 0)){
                session_start();
                $_SESSION["usuario"] = $usuario;
                $_SESSION["email"] = $email;
                header("Location: " . BASE_URL . "/visao/index.php");
                exit();
            }
        } else {
        header("Location: " . BASE_URL . "/visao/cadastro?erro=1");
        exit();
        }
    }

?>