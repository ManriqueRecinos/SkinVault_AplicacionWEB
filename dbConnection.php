<?php
// Conectar a la base de datos
$host = 'localhost'; // Cambia esto si tu configuración es diferente
$dbname = 'LeagueApp'; // Nombre de tu base de datos
$username = 'root'; // Cambia esto al nombre de usuario correcto
$password = ''; // Cambia esto a la contraseña correcta, si existe

try {
    $dbConnection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

