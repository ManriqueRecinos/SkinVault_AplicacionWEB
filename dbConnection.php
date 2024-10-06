<?php
$host = 'localhost';
$dbname = 'bolsit';
$username = 'root';
$password = '';

try {
    // Crear la conexión a la base de datos usando PDO
    $dbConnection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}
?>
