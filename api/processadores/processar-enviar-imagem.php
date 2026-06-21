<?php    
    session_start();
    include include $_SERVER['DOCUMENT_ROOT'] . "/api/conexao.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/api/modelo/post.php";

    if (isset($_POST['enviar']) && isset($_FILES['imagemAdicionada'])) {
        $titulo = $_POST["tituloDaImagem"];
        $descricao = $_POST["descricaoDaImagem"];

        $nome_img = $_FILES['imagemAdicionada']['name'];
        $tamanho_img = $_FILES['imagemAdicionada']['size'];
        $temp_nome_img = $_FILES['imagemAdicionada']['tmp_name'];
        $erro_img = $_FILES['imagemAdicionada']['error'];

        if($erro_img === 0) {
            $extencao_img = pathinfo($nome_img, PATHINFO_EXTENSION);

            $nome_unico  = uniqid("upload-", true).'.'.$extencao_img;
            $enviar_para = '/api/public/imgs/'.$nome_unico;
            move_uploaded_file($temp_nome_img, $enviar_para);

            $imagem = new Post($conn);
            $imagem->enviar($nome_unico, $_SESSION['email'], $titulo, $descricao);
            header("Location: /click/api/visao");
        } else {
            header("Location: /click/api/visao/cadastro.php?erro=1");
            exit();
            }
        }

    
?>