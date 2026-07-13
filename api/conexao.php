<?php

// Load config for environment variables
require_once __DIR__ . '/config.php';

// Get database credentials from environment variables
$servername = getenv('DB_HOST') ?: "mysql-emyrhf.alwaysdata.net";
$username = getenv('DB_USER') ?: "emyrhf";
$password = getenv('DB_PASSWORD') ?: "123clickdb";
$databasename = getenv('DB_NAME') ?: "emyrhf_click_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("Erro ao conectar ao banco de dados. Por favor, tente novamente mais tarde.");
}

// Set charset to utf8
$conn->set_charset("utf8");
?>