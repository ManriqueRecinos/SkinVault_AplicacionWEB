<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($champion['name'] ?? 'Campeón no encontrado'); ?> - Aspectos Disponibles</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
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
            width: 140px;
            flex-shrink: 0;
            text-align: center;
            position: relative;
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
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php require_once 'menu.php'; ?>

<div class="container text-center mt-3">
    <p>ID de usuario: <?= htmlspecialchars($_SESSION['user_id']); ?></p>
</div>

<div class="container text-center mt-5">
    <h1 class="champion-header"><b>Selección de aspectos de <?= htmlspecialchars($champion['name'] ?? 'Campeón no encontrado'); ?></b></h1>

    <?php if (!empty($skins)): ?>
        <div class="default-skin mb-4">
            <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= htmlspecialchars($championId); ?>_0.jpg" class="img-fluid" alt="Default Skin">
        </div>
    <?php else: ?>
        <p>No hay aspectos disponibles para <?= htmlspecialchars($champion['name'] ?? 'este campeón'); ?>.</p>
    <?php endif; ?>

    <?php if (!empty($skins)): ?>
        <div id="skinCarousel" class="carousel slide mb-4" data-ride="carousel" data-interval="5000">
            <div class="carousel-inner">
                <?php 
                $chunkedSkins = array_chunk($skins, 5);
                foreach ($chunkedSkins as $index => $skinGroup): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                        <div class="d-flex justify-content-center flex-wrap">
                            <?php foreach ($skinGroup as $skin): ?>
                                <div class="card skin-card" id="skin-<?= htmlspecialchars($skin['num']); ?>">
                                    <form class="skin-form">
                                        <input type="hidden" name="userId" value="<?= htmlspecialchars($_SESSION['user_id']); ?>" readonly>
                                        <input type="hidden" name="championId" value="<?= htmlspecialchars($championId); ?>" readonly>
                                        <input type="hidden" name="skinName" value="<?= htmlspecialchars($skin['name']); ?>" readonly>
                                        <input type="hidden" name="skinNumber" value="<?= htmlspecialchars($skin['num']); ?>" readonly>
                                        <input type="hidden" name="chromas" value="<?= htmlspecialchars(isset($skin['chromas']) ? 'true' : 'false'); ?>" readonly>
                                        <input type="hidden" name="idSkin" value="<?= htmlspecialchars($skin['id']); ?>" readonly>
                                        <button type="button" class="add-button" title="Guardar Skin" data-skin="<?= htmlspecialchars(json_encode($skin)); ?>">+</button>
                                        <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= htmlspecialchars($championId); ?>_<?= htmlspecialchars($skin['num']); ?>.jpg" class="card-img-top" alt="<?= htmlspecialchars($skin['name']); ?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= htmlspecialchars($skin['name']); ?></h5>
                                        </div>
                                    </form>
                                </div>
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
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.add-button').click(function(){
        let skinData = $(this).closest('.skin-card').find('.skin-form').serialize();
        $.ajax({
            url: '/SkinVault/controllers/AddSkin.php',
            type: 'POST',
            data: skinData,
            success: function(response){
                alert(response);
            },
            error: function(){
                alert('Error al guardar la skin.');
            }
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
