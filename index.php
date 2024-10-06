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

$controller = new ChampionController();
$authController = new AuthController($dbConnection);

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
    case 'logout':
      $authController->logout();
      break;
    default:
      echo "Acción no válida.";
      break;
  }
} else {
  $controller->showChampions(); // Mostrar campeones por defecto
}

