<?php
// Database connection using PDO
$host = 'localhost';
$db   = 'photo_gallery';
$user = 'root'; // (change if needed)
$pass = '';      // (change if needed)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage()); 
}
?>
