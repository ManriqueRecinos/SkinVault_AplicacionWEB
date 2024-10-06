<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $champion['name'] ?? 'Campeón no encontrado'; ?> - Aspectos Disponibles</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/skinvault/css/skins.css">
</head>

<body>

  <?php
  require_once 'menu.php';
  ?>
  <div class="container text-center mt-5">
    <h1 class="champion-header"><b>Aspectos disponibles de <?= $champion['name'] ?? 'Campeón no encontrado'; ?></b></h1>

    <!-- Mostrar skin por defecto -->
    <?php if (!empty($skins)): ?>
      <div class="default-skin mb-4">
        <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= $championId; ?>_0.jpg" class="img-fluid" alt="Default Skin">
      </div>
    <?php else: ?>
      <p>No hay aspectos disponibles para <?= $champion['name'] ?? 'este campeón'; ?>.</p>
    <?php endif; ?>

    <!-- Mostrar todas las skins -->
    <div class="row">
      <?php if (!empty($skins)): ?>
        <?php foreach ($skins as $skin): ?>
          <?php if ($skin['num'] != 0): // Evitar mostrar la skin por defecto 
          ?>
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