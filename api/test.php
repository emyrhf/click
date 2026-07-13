<?php
// Teste simples para diagnóstico

echo "=== DIAGNÓSTICO ===<br><br>";

echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "<br>";
echo "REQUEST_URL: " . ($_SERVER['HTTP_HOST'] ?? 'não definido') . $_SERVER['REQUEST_URI'] . "<br>";
echo "__DIR__: " . __DIR__ . "<br>";
echo "Arquivo atual: " . __FILE__ . "<br>";

echo "<hr>";

// Testar acesso aos diretórios
$paths = [
    'api/public' => __DIR__ . '/public',
    'api/public/css' => __DIR__ . '/public/css',
    'api/public/js' => __DIR__ . '/public/js',
    'api/public/imgs' => __DIR__ . '/public/imgs',
];

foreach ($paths as $label => $path) {
    $exists = is_dir($path);
    echo "$label: " . ($exists ? '✓ EXISTE' : '✗ NÃO EXISTE') . "<br>";
    if ($exists) {
        $files = array_slice(scandir($path), 2, 3);
        echo "  Arquivos: " . implode(', ', $files) . "<br>";
    }
}

echo "<hr>";

// Testar acesso a um CSS específico
$cssFile = __DIR__ . '/public/css/style.css';
echo "CSS file path: $cssFile<br>";
echo "CSS exists: " . (file_exists($cssFile) ? 'SIM' : 'NÃO') . "<br>";
if (file_exists($cssFile)) {
    echo "CSS size: " . filesize($cssFile) . " bytes<br>";
    echo "CSS first 200 chars:<br><pre>";
    echo htmlspecialchars(substr(file_get_contents($cssFile), 0, 200));
    echo "</pre>";
}

echo "<hr>";

// Tentar acessar via URL
echo "Para acessar um CSS, tente:<br>";
echo "- <a href='" . ($_SERVER['REQUEST_SCHEME'] ?? 'https') . "://" . $_SERVER['HTTP_HOST'] . "/public/css/style.css'>Direto /public/css/style.css</a><br>";
echo "- <a href='" . ($_SERVER['REQUEST_SCHEME'] ?? 'https') . "://" . $_SERVER['HTTP_HOST'] . "/api/public/css/style.css'>/api/public/css/style.css</a>";
?>
