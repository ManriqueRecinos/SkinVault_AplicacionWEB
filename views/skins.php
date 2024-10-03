<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $champion['name'] ?? 'Campeón no encontrado'; ?> - Aspectos Disponibles</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/carousel.css">
    <link rel="stylesheet" href="../assets/styles.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .champion-header {
            margin-bottom: 30px;
        }

        .default-skin img {
            height: 480px;
            width: auto;
            object-fit: cover;
            border-radius: 10px;
        }

        .skin-card {
            transition: transform 0.3s ease;
            margin: 20px;
            width: 150px;
            flex-shrink: 0;
            text-align: center;
            position: relative;
            filter: grayscale(100%);
            transition: filter 0.3s ease;
        }

        .skin-card img {
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .skin-card:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .add-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #17a2b8;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            font-size: 20px;
            line-height: 20px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            z-index: 1;
        }

        .add-button:hover {
            background-color: #138496;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: black;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }
    </style>
</head>
<body>

<?php require_once 'menu.php'; ?>

<div class="container text-center mt-5">
    <h1 class="champion-header"><b>Selección de aspectos de <?= $champion['name'] ?? 'Campeón no encontrado'; ?></b></h1>

    <!-- Mostrar skin por defecto -->
    <?php if (!empty($skins)): ?>
        <div class="default-skin mb-4">
            <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= $championId; ?>_0.jpg" class="img-fluid" alt="Default Skin">
        </div>
    <?php else: ?>
        <p>No hay aspectos disponibles para <?= $champion['name'] ?? 'este campeón'; ?>.</p>
    <?php endif; ?>


    <!-- Carrusel para mostrar las skins -->
    <?php if (!empty($skins)): ?>
        <div id="skinCarousel" class="carousel slide mb-4" data-ride="carousel" data-interval="5000">
            <div class="carousel-inner">
                <?php 
                $chunkedSkins = array_chunk($skins, 5);
                foreach ($chunkedSkins as $index => $skinGroup): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                        <div class="d-flex justify-content-center flex-wrap">
                            <?php foreach ($skinGroup as $skin): ?>
                                <?php if ($skin['num'] != 0): ?>
                                    <div class="card skin-card" id="skin-<?= $skin['num']; ?>" data-skin-num="<?= $skin['num']; ?>">
                                        <button class="add-button" onclick="toggleAvailability(<?= $skin['num']; ?>, <?= $championId; ?>, '<?= $skin['name']; ?>')">+</button>
                                        <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= $championId; ?>_<?= $skin['num']; ?>.jpg" class="card-img-top" alt="<?= $skin['name']; ?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $skin['name']; ?></h5>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#skinCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#skinCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    <?php else: ?>
        <p>No hay aspectos disponibles para <?= $champion['name'] ?? 'este campeón'; ?>.</p>
    <?php endif; ?>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function toggleAvailability(skinNum, championId, skinName) {
        var skinCard = document.getElementById('skin-' + skinNum);

        if (skinCard.style.filter === 'grayscale(100%)') {
            skinCard.style.filter = 'none'; // Cambia a color original

            // Añadir skin al usuario
            $.ajax({
                url: 'add_skin.php',  // Archivo PHP para gestionar el guardado
                type: 'POST',
                data: {
                    skin_num: skinNum,
                    champion_id: championId,
                    skin_name: skinName,
                    user_id: <?= $_SESSION['user_id']; ?>
                },
                success: function(response) {
                    console.log(response);  // Ver respuesta del servidor
                }
            });
        } else {
            skinCard.style.filter = 'grayscale(100%)'; // Volver a gris si se deselecciona

            // Eliminar skin del usuario
            $.ajax({
                url: 'remove_skin.php',  // Archivo PHP para gestionar la eliminación
                type: 'POST',
                data: {
                    skin_num: skinNum,
                    user_id: <?= $_SESSION['user_id']; ?>
                },
                success: function(response) {
                    console.log(response);  // Ver respuesta del servidor
                }
            });
        }
    }
</script>

</body>
</html>
