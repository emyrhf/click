<?php    
    session_start();
    
    require __DIR__ . "/../config.php";
    require __DIR__ . "/../conexao.php";
    include MODELS_PATH . 'post.php';

    session_start();
    if (!isset($_SESSION["usuario"])) {
        $logado = false;
    } else {
        $logado = true;
    }

    $excluirPost = $_GET['url'];
    if ($excluirPost) {
        $comando = "DELETE FROM posts WHERE url = ?";
        $stmt = mysqli_prepare($conn, $comando);
        mysqli_stmt_bind_param($stmt, "s", $excluirPost);
        mysqli_stmt_execute($stmt);
    }

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("Location: " . BASE_URL . "/visao/index.php");
        exit;
    } else {
        echo "Nenhum post encontrado para excluir.";
    }

    mysqli_close($conn);
?>