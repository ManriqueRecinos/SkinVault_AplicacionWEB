<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SkinVault - Elige a tu Campeón</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="images/logo.png" type="image/png">
  <link rel="stylesheet" href="/skinvault/views/css/champions.css">
</head>

<body>
  <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/skinvault/views/client/menu.php'; ?>

  <div class="container text-center mt-5">
    <h1>BUSCA TU <span class="text-primary">CAMPEÓN</span></h1>
    <p>Y administra tus skins.</p>

    <!-- Barra de búsqueda con diseño -->
    <div class="search-container">
      <form class="form">
        <label for="searchChampion">
          <input required="" autocomplete="off" placeholder="Buscar campeón..." id="searchChampion" type="text" class="form-control" onkeyup="filterChampions()">
          <div class="icon">
            <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="swap-on">
              <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linejoin="round" stroke-linecap="round"></path>
            </svg>
            <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="swap-off">
              <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linejoin="round" stroke-linecap="round"></path>
            </svg>
          </div>
          <button type="reset" class="close-btn">
            <svg viewBox="0 0 20 20" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" fill-rule="evenodd"></path>
            </svg>
          </button>
        </label>
      </form>
    </div>

    <div class="row" id="championContainer">
      <?php if (!empty($champions)) : ?>
        <?php foreach ($champions as $id => $champion) : ?>
          <div class="col-md-4 col-sm-6 mb-4 champion-card">
            <a href="/skinvault/?action=showSkins&id=<?= $id; ?>" class="text-decoration-none">
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

  <?php require_once $_SERVER["DOCUMENT_ROOT"] . '/skinvault/views/client/redes.php'; ?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Script para el filtrado de campeones -->
  <script>
    function filterChampions() {
      const searchInput = document.getElementById('searchChampion').value.toLowerCase();
      const championCards = document.getElementsByClassName('champion-card');

      Array.from(championCards).forEach(card => {
        const championName = card.querySelector('.card-title').textContent.toLowerCase();

        if (championName.includes(searchInput)) {
          card.style.display = 'block';  // Mostrar el card si coincide con la búsqueda
        } else {
          card.style.display = 'none';  // Ocultar el card si no coincide
        }
      });
    }
  </script>

</body>

</html>