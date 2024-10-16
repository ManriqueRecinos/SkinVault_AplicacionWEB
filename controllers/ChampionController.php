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
        include $_SERVER['DOCUMENT_ROOT'] . '/skinvault/views/client/champions.php';
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

        include $_SERVER['DOCUMENT_ROOT'] . '/skinvault/views/client/skins.php';
    }

    public function showUserSkins($userId)
    {
        $skins = $this->model->getUserSkins($userId);
        include $_SERVER['DOCUMENT_ROOT'] . '/skinvault/views/client/misSkins.php';
    }
    
    public function deleteSkin()
    {
        if (!isset($_POST['skin_number'])) {
            echo json_encode(['status' => 'error', 'message' => 'Número de skin no proporcionado.']);
            return;
        }
    
        $skinNumber = $_POST['skin_number'];  // Capturamos el número de skin
    
        if ($this->model->deleteSkinByNumber($skinNumber)) {
            echo json_encode(['status' => 'success', 'message' => 'Skin eliminada correctamente.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar la skin.']);
        }
    }
    
}
?>
