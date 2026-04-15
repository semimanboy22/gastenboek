<?php
$host   = getenv('DB_HOST') ?: 'localhost';
$user   = getenv('DB_USER') ?: 'klas4s25_605528';
$pass   = getenv('DB_PASSWORD') ?: 'JvPMLwUY';
$dbname = getenv('DB_NAME') ?: 'klas4s25_605528';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $pass
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}