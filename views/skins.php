<?php
if (isset($_GET['id'])) {
    $championId = $_GET['id'];

    // Obtener los datos de campeones
    $championsJson = file_get_contents('https://ddragon.leagueoflegends.com/cdn/14.19.1/data/es_MX/champion.json');
    $championsData = json_decode($championsJson, true);
    
    // Obtener el campeón específico
    $champion = $championsData['data'][$championId];

    // Verificar si 'skins' existe
    $skins = isset($champion['skins']) ? $champion['skins'] : [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $champion['name']; ?> - Aspectos Disponibles</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h2 class="mb-4">ASPECTOS DISPONIBLES DE <?= $champion['name']; ?></h2>
        <div class="row">
            <?php if (!empty($skins)): ?>
                <?php foreach ($skins as $skin): ?>
                    <div class="col-md-2 col-sm-4">
                        <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= $championId; ?>_<?= $skin['num']; ?>.jpg" class="img-thumbnail" alt="<?= $skin['name']; ?>">
                        <p><?= $skin['name']; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay aspectos disponibles para <?= $champion['name']; ?>.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
