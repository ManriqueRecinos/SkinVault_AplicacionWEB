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
        // Obtener datos del campeón específico
        $championJson = file_get_contents("https://ddragon.leagueoflegends.com/cdn/14.19.1/data/en_US/champion/{$championId}.json");
        $championData = json_decode($championJson, true);
    
        // Verificar si se obtuvo correctamente el campeón
        if (isset($championData['data'][$championId])) {
            $champion = $championData['data'][$championId];
            $skins = $champion['skins'];
        } else {
            $champion = null;
            $skins = [];
        }
        
        include 'views/skins.php'; // Vista para mostrar skins
    }
    
}


?>
