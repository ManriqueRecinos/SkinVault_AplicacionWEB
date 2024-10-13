<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/SkinVault/dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = filter_input(INPUT_POST, 'userId', FILTER_VALIDATE_INT);
    $championId = filter_input(INPUT_POST, 'championId', FILTER_SANITIZE_STRING);
    $skinName = filter_input(INPUT_POST, 'skinName', FILTER_SANITIZE_STRING);
    $skinNumber = filter_input(INPUT_POST, 'skinNumber', FILTER_VALIDATE_INT);
    $chromas = filter_input(INPUT_POST, 'chromas', FILTER_VALIDATE_BOOLEAN);
    $idSkin = filter_input(INPUT_POST, 'idSkin', FILTER_SANITIZE_STRING);

    if ($userId && $championId && $skinName && $skinNumber !== false && $chromas !== null && $idSkin) {
        try {
            $stmt = $dbConnection->prepare("INSERT INTO user_skins (user_id, champion_id, skin_name, skin_number, chromas, skin_id, timestamp) VALUES (:userId, :championId, :skinName, :skinNumber, :chromas, :idSkin, NOW())");
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':championId', $championId, PDO::PARAM_STR);
            $stmt->bindParam(':skinName', $skinName, PDO::PARAM_STR);
            $stmt->bindParam(':skinNumber', $skinNumber, PDO::PARAM_INT);
            $stmt->bindParam(':chromas', $chromas, PDO::PARAM_BOOL);
            $stmt->bindParam(':idSkin', $idSkin, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo '¡Skin guardada correctamente!';
            } else {
                echo 'Error al guardar la skin.';
            }
        } catch (PDOException $e) {
            echo 'Error de base de datos: ' . $e->getMessage();
        }
    } else {
        echo 'Datos inválidos proporcionados.';
    }
}
?>
