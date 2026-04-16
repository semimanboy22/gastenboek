<?php
$host   = 'localhost';
$user   = 'klas4s25_605528';
$pass   = 'JvPMLwUY';
$dbname = 'klas4s25_605528';

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