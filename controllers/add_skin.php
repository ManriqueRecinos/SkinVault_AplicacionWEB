<?php
session_start();  // Asegúrate de que la sesión esté activa para acceder al ID del usuario
require 'dbConnection.php';  // Incluye la conexión a la base de datos

// Verifica que el usuario esté autenticado
if (!isset($_SESSION['user_id'])) {
    die("Necesitas iniciar sesión para agregar skins.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura los datos enviados desde el formulario
    $user_id = $_SESSION['user_id'];
    $champion_id = $_POST['champion_id'];
    $skin_id = $_POST['skin_id'];
    $skin_name = $_POST['skin_name'];
    $skin_image_url = $_POST['skin_image_url'];

    // Inserta los datos en la tabla usuarios_skins
    $stmt = $db->prepare("INSERT INTO usuarios_skins (user_id, champion_id, skin_id, skin_name, skin_image_url) VALUES (:user_id, :champion_id, :skin_id, :skin_name, :skin_image_url)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':champion_id', $champion_id);
    $stmt->bindParam(':skin_id', $skin_id);
    $stmt->bindParam(':skin_name', $skin_name);
    $stmt->bindParam(':skin_image_url', $skin_image_url);

    if ($stmt->execute()) {
        echo "Skin agregada con éxito.";
        header("Location: skins.php?champion_id=$champion_id");
    } else {
        echo "Error al agregar la skin.";
    }
}
?>
