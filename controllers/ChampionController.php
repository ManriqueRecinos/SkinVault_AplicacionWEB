<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/skinvault/models/ChampionModel.php';

class ChampionController
{
    private $model;

    public function __construct($dbConnection)
    {
        $this->model = new ChampionModel($dbConnection);
    }

    public function showChampions()
    {
        $champions = $this->model->getAllChampions();
        include $_SERVER['DOCUMENT_ROOT'] . '/skinvault/views/champions.php';
    }

    public function showSkins($championId)
    {
        if (empty($championId)) {
            echo "Error: ID del campeón no proporcionado.";
            return;
        }

        $skins = $this->model->getChampionSkins($championId);

        if (empty($skins)) {
            echo "Error: No se encontraron skins para el campeón con ID {$championId}.";
            return;
        }

        include $_SERVER['DOCUMENT_ROOT'] . '/skinvault/views/skins.php';
    }

    public function showUserSkins($userId)
    {
        $skins = $this->model->getUserSkins($userId);
        include $_SERVER['DOCUMENT_ROOT'] . '/skinvault/views/misSkins.php';
    }
}
?>
