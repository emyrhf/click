<?php
    require __DIR__ . "/../config.php";
    include __DIR__ . "/../conexao.php";
    if (($_SERVER["REQUEST_METHOD"]=="POST")){
        $updateNome = $_POST["updateNome"];
        $updateUsername = $_POST["updateUsername"];
        $updateBio = $_POST["updateBio"];
        $email = $_POST["email"];
        $oldProfilePic = $_POST["oldProfilePic"];
        $oldHeader = $_POST["oldHeader"];

        if (isset($_FILES['updateProfilePic'])) {
            $nome_icon = $_FILES['updateProfilePic']['name'];
            $tamanho_icon = $_FILES['updateProfilePic']['size'];
            $temp_nome_icon = $_FILES['updateProfilePic']['tmp_name'];
            $erro_icon = $_FILES['updateProfilePic']['error'];

            if ($erro_icon === 0) {
                $extencao_icon = pathinfo($nome_icon, PATHINFO_EXTENSION);
                $nome_unico_icon  = uniqid("upload-", true).'.'.$extencao_icon;
                $enviar_icon = '/public/imgs/'.$nome_unico_icon;
                move_uploaded_file($temp_nome_icon, $enviar_icon);
            } else {
                $nome_unico_icon = $oldProfilePic;
            }
        } 

        if (isset($_FILES['updateHeader'])) {
            $nome_header = $_FILES['updateHeader']['name'];
            $tamanho_header = $_FILES['updateHeader']['size'];
            $temp_nome_header = $_FILES['updateHeader']['tmp_name'];
            $erro_header = $_FILES['updateHeader']['error'];

            if ($erro_header === 0) {
                $extencao_header = pathinfo($nome_header, PATHINFO_EXTENSION);
                $nome_unico_header = uniqid("upload-", true).'.'.$extencao_header;
                $enviar_header = '/public/imgs/'.$nome_unico_header;
                move_uploaded_file($temp_nome_header, $enviar_header);
            } else {
                $nome_unico_header = $oldHeader;
            }
        }   

        $stmt =  "UPDATE perfil SET header = '$nome_unico_header', img_perfil = '$nome_unico_icon', nome = '$updateNome', username = '$updateUsername', bio = '$updateBio' WHERE email = '$email'";
        $result = mysqli_query($conn, $stmt) or die(mysqli_error($db));
        

        header("Location: " . BASE_URL . "/visao/perfil.php?usuario=" . $updateUsername);
        
    }
?>