<?php    
    session_start();
    
    require $_SERVER['DOCUMENT_ROOT'] . "/conexao.php";
    include '../modelo/post.php';

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
        echo "Post excluído com sucesso!";
        header("location: /click/api/visao/index.php?`");
    } else {
        echo "Nenhum post encontrado para excluir.";
    }

    mysqli_close($conn);
?>