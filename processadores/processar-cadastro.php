<?php    
    include '../conexao.php';
    include '../modelo/usuario.php';

    if (($_SERVER["REQUEST_METHOD"]=="POST")){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["Senha"];
        $repetirsenha = $_POST["repeatPassword"];

        if ($senha === $repetirsenha) {
            $usuario = new Usuario($conn);
            if ($usuario->cadastrar($nome,$email,$senha)){
                session_start();
                $_SESSION["usuario"] = $usuario;
                header("Location: /click/visao");
                exit();
            }
        } else {
        header("Location: /click/visao/cadastro.php?erro=1");
        exit();
        }
    }

?>