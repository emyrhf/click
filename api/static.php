<?php
// Serve static files if they exist
$file = __DIR__ . '/../public' . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (file_exists($file) && is_file($file)) {
    // Set appropriate headers based on file type
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    
    $mimeTypes = [
        'css' => 'text/css',
        'js' => 'application/javascript',
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
    ];
    
    header('Content-Type: ' . ($mimeTypes[$ext] ?? 'application/octet-stream'));
    header('Cache-Control: public, max-age=86400');
    header('Content-Length: ' . filesize($file));
    
    readfile($file);
    exit;
}

// If not found, return 404
http_response_code(404);
echo "404 - File not found";
?>
