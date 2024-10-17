<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinVault - Mis Skins</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/logo.png" type="image/png">
    <link rel="stylesheet" href="/skinvault/views/css/misSkins.css">
</head>
<body>

<?php require_once 'menu.php'; ?>

<div class="container mt-5">
    <h1>Mis Skins</h1>
    
    <!-- Barra de búsqueda con diseño -->
    <form class="form">
        <label for="searchSkin">
            <input required="" autocomplete="off" placeholder="Buscar skin..." id="searchSkin" type="text" class="form-control" onkeyup="filterSkins()">
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

    <div class="row" id="skinContainer">
    <?php if (!empty($skins)): ?>
        <?php foreach ($skins as $skin): ?>
            <div class="col-md-4 mb-4 skin-card" id="skin-card-<?= htmlspecialchars($skin['skin_number']); ?>">
                <div class="card">
                    <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= htmlspecialchars($skin['champion_id']); ?>_<?= htmlspecialchars($skin['skin_number']); ?>.jpg" class="card-img-top" alt="<?= htmlspecialchars($skin['skin_name']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($skin['skin_name']); ?></h5>
                        <!-- Botón de eliminar -->
                        <button class="btn btn-danger delete-button" data-skin-number="<?= htmlspecialchars($skin['skin_number']); ?>">Eliminar</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No tienes skins guardadas.</p>
    <?php endif; ?>
    </div>
</div>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/skinvault/views/client/redes.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Script para el filtrado de skins -->
<script>
    function filterSkins() {
        const searchInput = document.getElementById('searchSkin').value.toLowerCase();
        const skinCards = document.getElementsByClassName('skin-card');

        Array.from(skinCards).forEach(card => {
            const skinName = card.querySelector('.card-title').textContent.toLowerCase();

            if (skinName.includes(searchInput)) {
                card.style.display = 'block';  // Mostrar el card si coincide con la búsqueda
            } else {
                card.style.display = 'none';  // Ocultar el card si no coincide
            }
        });
    }

    $(document).ready(function() {
    $('.delete-button').on('click', function() {
        const skinNumber = $(this).data('skin-number');  // Obtenemos el skin_number desde el botón
        const skinCard = $('#skin-card-' + skinNumber);  // Seleccionamos el card correspondiente

        // Confirmación antes de eliminar la skin
        if (confirm('¿Estás seguro de que quieres eliminar esta skin?')) {
            $.ajax({
                url: '/skinvault/controllers/deleteSkin.php',  // URL al nuevo script PHP
                type: 'POST',
                data: { skin_number: skinNumber },  // Enviamos el número de skin
                success: function(response) {
                    try {
                        const res = JSON.parse(response);  // Parseamos la respuesta del servidor
                        if (res.status === 'success') {
                            alert(res.message);  // Mostramos el mensaje de éxito
                            skinCard.remove();  // Removemos la skin de la vista
                        } else {
                            alert(res.message);  // Mostramos el mensaje de error
                        }
                    } catch (e) {
                        console.error('Error al parsear JSON:', e, response);  // Error de parsing
                        alert('Hubo un error inesperado.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error AJAX:', error);  // Error en la petición AJAX
                    alert('Error al intentar eliminar la skin.');
                }
            });
        }
    });
});

</script>

</body>
</html>
