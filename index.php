<?php
require_once 'controllers/ChampionController.php';

$controller = new ChampionController();

if (isset($_GET['action']) && $_GET['action'] === 'showSkins' && isset($_GET['id'])) {
    $controller->showSkins($_GET['id']); // Llama a la función para mostrar skins
} else {
    $controller->showChampions(); // Llama a la función para mostrar campeones
}
?>
