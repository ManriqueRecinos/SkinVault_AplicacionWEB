<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user'])) { // Verifica si 'user' está en la sesión
    header('Location: /skinvault/views/login.php'); // Redirige a la página de inicio de sesión
    exit();
}

require_once $_SERVER["DOCUMENT_ROOT"] . '/skinvault/dbConnection.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/skinvault/controllers/ChampionController.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/skinvault/controllers/AuthController.php';

// Instanciamos los controladores con la conexión a la base de datos
$controller = new ChampionController($dbConnection);
$authController = new AuthController($dbConnection);

// Llamar al método saveSkin si se ha enviado una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['userId'], $_POST['championId'], $_POST['skinName'], $_POST['skinNumber'], $_POST['chromas'], $_POST['idSkin'])) {
        $userId = $_POST['userId'];
        $championId = $_POST['championId'];
        $skinName = $_POST['skinName'];
        $skinNumber = $_POST['skinNumber'];
        $chromas = $_POST['chromas'];
        $idSkin = $_POST['idSkin'];

        // Llamar a la función para guardar skin
        $controller->saveUserSkin($userId, $championId, $skinName, $skinNumber, $chromas, $idSkin);
    } else {
        echo "Datos insuficientes para guardar el skin.";
    }
}

// Manejar acciones GET
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'showChampions':
            $controller->showChampions(); // Mostrar la lista de campeones
            break;
        case 'showSkins':
            if (isset($_GET['id'])) {
                $controller->showSkins($_GET['id']); // Pasa el ID del campeón
            } else {
                echo "ID de campeón no proporcionado.";
            }
            break;
        case 'misSkins':
            if (isset($_SESSION['user_id'])) {
                $controller->showUserSkins($_SESSION['user_id']);
            } else {
                echo "Error: Usuario no autenticado.";
            }
            break;
        case 'logout':
            $authController->logout();
            break;
        default:
            header('Location: /skinvault/views/Err/error.php'); // Redirige a una página de error
            break;
    }
} else {
    $controller->showChampions(); // Mostrar campeones por defecto
}
?>
