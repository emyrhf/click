<?php

// Load environment variables
if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = parse_ini_file(__DIR__ . '/../.env');
    foreach ($dotenv as $key => $value) {
        putenv("$key=$value");
    }
}

$host = $_SERVER['HTTP_HOST'] ?? '';
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";

// BASE_URL configuration
if (
    str_contains($host, 'localhost') ||
    str_contains($host, '127.0.0.1')
) {
    define('BASE_URL', 'http://localhost/click');
} else {
    // For Vercel deployment
    define('BASE_URL', $protocol . '://' . $host);
}

// Define paths for includes
define('ROOT_PATH', __DIR__ . '/');
define('COMPONENTS_PATH', ROOT_PATH . 'components/');
define('MODELS_PATH', ROOT_PATH . 'modelo/');
define('PROCESSORS_PATH', ROOT_PATH . 'processadores/');
define('VIEWS_PATH', ROOT_PATH . 'visao/');

// Helper function to get absolute path
function getIncludePath($file) {
    return ROOT_PATH . $file;
}