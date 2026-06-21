<?php    
    include '../conexao.php';
    include '../modelo/usuario.php';

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
                header("Location: /click/api/visao");
                exit();
            }
        } else {
        header("Location: /click/api/visao/cadastro.php?erro=1");
        exit();
        }
    }

?>