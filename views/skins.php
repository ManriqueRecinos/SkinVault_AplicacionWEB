<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $champion['name'] ?? 'Campeón no encontrado'; ?> - Aspectos Disponibles</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .champion-header {
            margin-bottom: 30px;
        }
        .default-skin {
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 10px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .skin-card {
            transition: transform 0.2s;
            height: 350px; /* Altura fija para las tarjetas */
            display: flex; /* Para centrar contenido */
            flex-direction: column; /* Para organizar el contenido verticalmente */
            justify-content: space-between; /* Espaciado entre imagen y título */
        }
        .skin-card img {
            height: 200px; /* Altura fija para la imagen */
            object-fit: cover; /* Asegura que la imagen mantenga proporciones */
        }
        .skin-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

<?php
require_once 'menu.php';
?>
    <div class="container text-center mt-5">
        <h2 class="champion-header">ASPECTOS DISPONIBLES DE <?= $champion['name'] ?? 'Campeón no encontrado'; ?></h2>

        <!-- Mostrar skin por defecto -->
        <?php if (!empty($skins)): ?>
            <div class="default-skin mb-4">
                <h3>Skin Predeterminada</h3>
                <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= $championId; ?>_0.jpg" class="img-fluid" alt="Default Skin">
                <p>Nombre: <?= $skins[0]['name']; ?></p>
            </div>
        <?php else: ?>
            <p>No hay aspectos disponibles para <?= $champion['name'] ?? 'este campeón'; ?>.</p>
        <?php endif; ?>

        <!-- Mostrar todas las skins -->
        <div class="row">
            <?php if (!empty($skins)): ?>
                <?php foreach ($skins as $skin): ?>
                    <?php if ($skin['num'] != 0): // Evitar mostrar la skin por defecto ?>
                        <div class="col-md-2 col-sm-4 mb-3">
                            <div class="card skin-card">
                                <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= $championId; ?>_<?= $skin['num']; ?>.jpg" class="card-img-top" alt="<?= $skin['name']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $skin['name']; ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay aspectos disponibles para <?= $champion['name'] ?? 'este campeón'; ?>.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
