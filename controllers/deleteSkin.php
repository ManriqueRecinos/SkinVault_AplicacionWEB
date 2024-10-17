<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/skinvault/models/ChampionModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/skinvault/dbConnection.php'; // Asegúrate de que la conexión a la base de datos esté aquí

// Crear instancia de la clase ChampionModel con la conexión a la base de datos
$model = new ChampionModel($dbConnection);

if (!isset($_POST['skin_number'])) {
    echo json_encode(['status' => 'error', 'message' => 'Número de skin no proporcionado.']);
    exit;
}

$skinNumber = $_POST['skin_number']; // Capturamos el número de skin

// Intentar eliminar la skin y devolver el resultado
if ($model->deleteSkinByNumber($skinNumber)) {
    echo json_encode(['status' => 'success', 'message' => 'Skin eliminada correctamente.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error al eliminar la skin.']);
}
?>
