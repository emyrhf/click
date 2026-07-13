<?php
// Servidor de arquivos estáticos

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';

// Remove a query string
$path = parse_url($requestUri, PHP_URL_PATH);

// Remove /public/ do início
$path = preg_replace('^/public/', '', $path);

// Caminho do arquivo (agora está dentro de /api/public)
$file = __DIR__ . '/public' . $path;

// Verificar se arquivo existe e é seguro
if (!file_exists($file) || !is_file($file)) {
    http_response_code(404);
    error_log("Arquivo não encontrado: " . $file);
    echo "404 - Arquivo não encontrado";
    exit;
}

// Verificar se está dentro de public (segurança)
$realFile = realpath($file);
$realPublic = realpath(__DIR__ . '/public');

if ($realFile === false || strpos($realPublic !== null ? $realFile : '', $realPublic !== null ? $realPublic : '') !== 0) {
    http_response_code(403);
    error_log("Acesso negado: " . $file);
    echo "403 - Acesso negado";
    exit;
}

// Determinar mime type
$ext = pathinfo($file, PATHINFO_EXTENSION);
$mimeTypes = [
    'css' => 'text/css; charset=utf-8',
    'js' => 'application/javascript; charset=utf-8',
    'json' => 'application/json',
    'xml' => 'application/xml',
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'png' => 'image/png',
    'gif' => 'image/gif',
    'svg' => 'image/svg+xml',
    'webp' => 'image/webp',
    'woff' => 'font/woff',
    'woff2' => 'font/woff2',
    'ttf' => 'font/ttf',
    'eot' => 'application/vnd.ms-fontobject',
    'ico' => 'image/x-icon',
];

header('Content-Type: ' . ($mimeTypes[$ext] ?? 'application/octet-stream'));
header('Cache-Control: public, max-age=86400');
header('Content-Length: ' . filesize($file));

// Se for texto, ler; se for binário, enviar direto
readfile($file);
?>
