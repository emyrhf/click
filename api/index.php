<?php
require_once __DIR__ . '/config.php';

$url = isset($_GET['url']) ? '/' . $_GET['url'] : '/';

// Remove query strings
$url = strtok($url, '?');

// Roteador simples
if ($url === '/' || $url === '') {
    require __DIR__ . '/visao/index.php';
} elseif (preg_match('~^/visao/(.+?)/?$~', $url, $matches)) {
    $page = $matches[1];
    $file = __DIR__ . '/visao/' . preg_replace('/[^a-zA-Z0-9_-]/', '', $page) . '.php';
    if (file_exists($file)) {
        require $file;
    } else {
        http_response_code(404);
        echo "Página não encontrada";
    }
} elseif (preg_match('~^/processadores/(.+?)/?$~', $url, $matches)) {
    $processor = $matches[1];
    $file = __DIR__ . '/processadores/' . preg_replace('/[^a-zA-Z0-9_-]/', '', $processor) . '.php';
    if (file_exists($file)) {
        require $file;
    } else {
        http_response_code(404);
        echo "Processador não encontrado";
    }
} else {
    // Tenta servir como visão
    $file = __DIR__ . '/visao' . $url . '.php';
    if (file_exists($file)) {
        require $file;
    } else {
        // Fallback para página inicial
        require __DIR__ . '/visao/index.php';
    }
}
?>
