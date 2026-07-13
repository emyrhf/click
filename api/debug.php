<?php
// Debug - mostrar estrutura de diretórios

echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "<br>";
echo "__DIR__: " . __DIR__ . "<br>";
echo "Diretório pai: " . dirname(__DIR__) . "<br>";
echo "Público esperado em: " . realpath(__DIR__ . '/../public') . "<br>";
echo "Exists: " . (is_dir(__DIR__ . '/../public') ? 'SIM' : 'NÃO') . "<br>";

echo "<hr>";

// Listar arquivos
$dir = __DIR__ . '/../public';
if (is_dir($dir)) {
    echo "Arquivos em $dir:<br>";
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "- $file<br>";
        }
    }
} else {
    echo "Diretório /public não existe em: " . $dir;
}
?>
