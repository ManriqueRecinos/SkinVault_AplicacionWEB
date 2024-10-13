<?php
class ChampionModel
{
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function getAllChampions()
    {
        $cacheFile = $_SERVER['DOCUMENT_ROOT'] . "/skinvault/cache/champions.json";

        // Verificar si los datos están en caché y son recientes (24 horas)
        if (file_exists($cacheFile) && filemtime($cacheFile) > time() - 86400) {
            $championData = json_decode(file_get_contents($cacheFile), true);
        } else {
            // Obtener datos de la API
            $json = @file_get_contents('https://ddragon.leagueoflegends.com/cdn/14.19.1/data/es_MX/champion.json');
            if ($json === false) {
                return [];
            }

            $championData = json_decode($json, true)['data'] ?? [];

            // Guardar los datos en caché
            file_put_contents($cacheFile, json_encode($championData));
        }

        return $championData;
    }

    public function getChampionSkins($championId)
    {
        $cacheFile = $_SERVER['DOCUMENT_ROOT'] . "/skinvault/cache/{$championId}_skins.json";

        // Verificar si los datos están en caché y son recientes (24 horas)
        if (file_exists($cacheFile) && filemtime($cacheFile) > time() - 86400) {
            $championData = json_decode(file_get_contents($cacheFile), true);
        } else {
            // Obtener datos de la API
            $championJson = @file_get_contents("https://ddragon.leagueoflegends.com/cdn/14.19.1/data/es_MX/champion/{$championId}.json");
            if ($championJson === false) {
                return [];
            }

            $championData = json_decode($championJson, true);

            // Verificar si los datos del campeón fueron obtenidos correctamente
            if (!isset($championData['data'][$championId])) {
                return [];
            }

            // Guardar los datos en caché
            file_put_contents($cacheFile, json_encode($championData));
        }

        // Obtener las skins del campeón
        return $championData['data'][$championId]['skins'] ?? [];
    }
}
?>
    