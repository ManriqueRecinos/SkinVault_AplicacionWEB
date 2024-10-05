<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elige a tu Campeón</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease;
        }
    </style>
</head>
<body>
    <?php require_once 'views/menu.php'; ?>

    <div class="container text-center mt-5">
        <h1>ELIGE A TU <span class="text-primary">CAMPEÓN</span></h1>
        <p>Encuentra a tu campeón ideal y descubre todas sus skins.</p>

        <!-- Buscador -->
        <form method="GET" class="mb-4">
            <input type="text" name="search" class="form-control" placeholder="Buscar campeón..." required>
        </form>

        <div class="row">
            <?php if (!empty($champions)) : ?>
                <?php foreach ($champions as $id => $champion) : ?>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <a href="?action=showSkins&id=<?= $id; ?>" class="text-decoration-none">
                            <div class="card">
                                <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= $champion['id']; ?>_0.jpg" class="card-img-top" alt="<?= $champion['id']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $champion['name']; ?></h5>

                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No se encontraron campeones.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
