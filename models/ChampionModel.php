<?php
class ChampionModel
{
  public function getAllChampions()
  {
    $json = file_get_contents('https://ddragon.leagueoflegends.com/cdn/14.19.1/data/es_MX/champion.json');
    if ($json === false) {
      return [];
    }
    $champions = json_decode($json, true)['data'] ?? [];
    return $champions;
  }
  public function getChampionSkins($championId)
  {
    $json = file_get_contents('https://ddragon.leagueoflegends.com/cdn/14.19.1/data/es_MX/champion.json');
    if ($json === false) {
      return [];
    }
    $champions = json_decode($json, true)['data'] ?? [];
    return $champions[$championId]['skins'] ?? []; // Devuelve las skins del campeón
  }
}
