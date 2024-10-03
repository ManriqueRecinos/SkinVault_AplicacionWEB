<?php
require_once 'models/ChampionModel.php';

class ChampionController {
    private $model;

    public function __construct() {
        $this->model = new ChampionModel();
    }

    public function showChampions() {
        $champions = $this->model->getAllChampions();
        include 'views/champions.php'; // Vista para mostrar campeones
    }

    public function showSkins($championId) {
        $skins = $this->model->getChampionSkins($championId);
        include 'views/skins.php'; // Vista para mostrar skins del campeón
    }
}

?>
