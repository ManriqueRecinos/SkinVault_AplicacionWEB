<?php
if (isset($_GET['id'])) {
    $championId = $_GET['id'];
    // Obtener los datos de campeones
    $championsJson = file_get_contents('https://ddragon.leagueoflegends.com/cdn/14.19.1/data/es_MX/champion.json');
    $championsData = json_decode($championsJson, true);
    
    // Obtener el campeón específico
    $champion = $championsData['data'][$championId];

}
?>