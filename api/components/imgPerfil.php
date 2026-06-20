<?php   
    $imgPerfil = "SELECT * from perfil WHERE email = ?";

    $stmt =  mysqli_prepare($conn, $imgPerfil);
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['email']);
    mysqli_stmt_execute($stmt);
    $imgPerfil = mysqli_stmt_get_result($stmt);
    $imgPerfil = mysqli_fetch_assoc($imgPerfil);
?>