<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Redirigir a la página de inicio de sesión si no está autenticado
    header('Location: views/login.php');
    exit();
}

// Si el usuario está autenticado, continuar con la lógica de la aplicación
require_once 'controllers/ChampionController.php';

$controller = new ChampionController();

// Verificar si se ha proporcionado una acción en la URL
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'showChampions':
            $controller->showChampions();
            break;
        case 'showSkins':
            if (isset($_GET['id'])) {
                $controller->showSkins($_GET['id']); // Pasa el ID del campeón
            } else {
                echo json_encode(['error' => 'ID de campeón no proporcionado.']);
            }
            break;
        default:
            echo json_encode(['error' => 'Acción no válida.']);
            break;
    }
} else {
    // Acción predeterminada si no se proporciona ninguna acción
    $controller->showChampions(); // Mostrar campeones por defecto
}
?>
