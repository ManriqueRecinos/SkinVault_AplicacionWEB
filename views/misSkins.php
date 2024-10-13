<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Skins</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php require_once 'menu.php'; ?>

<div class="container mt-5">
    <h1>Mis Skins</h1>
    <?php if (!empty($skins)): ?>
        <div class="row">
            <?php foreach ($skins as $skin): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= htmlspecialchars($skin['champion_id']); ?>_<?= htmlspecialchars($skin['skin_number']); ?>.jpg" class="card-img-top" alt="<?= htmlspecialchars($skin['skin_name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($skin['skin_name']); ?></h5>
                            <p class="card-text">Chromas: <?= $skin['chromas'] ? 'Sí' : 'No'; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No tienes skins guardadas.</p>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
