<?php
require_once 'controllers/ChampionController.php';

$controller = new ChampionController();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'showChampions':
            $controller->showChampions();
            break;
        case 'showSkins':
            if (isset($_GET['id'])) {
                $controller->showSkins($_GET['id']); // Pasa el ID del campeón
            } else {
                echo "ID de campeón no proporcionado.";
            }
            break;
        default:
            echo "Acción no válida.";
            break;
    }
} else {
    $controller->showChampions(); // Mostrar campeones por defecto
}

?>