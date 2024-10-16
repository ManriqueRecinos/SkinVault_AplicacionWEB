<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinVault - Mis Skins</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        .card {
            cursor: pointer;
            background: rgb(255, 255, 255);
            border-radius: 5px;
            border: 1px solid rgba(0, 0, 255, .2);
            transition: all .2s;
            box-shadow: 12px 12px 2px 1px rgba(0, 0, 255, .2);
        }
        .card:hover {
            box-shadow: -12px 12px 2px -1px rgba(0, 0, 255, .2);
        }
        /* Estilos para el modo oscuro */
        body.dark-mode .card {
            background: #2c2c2c; /* Color gris para el modo oscuro */
            border: 1px solid rgba(255, 255, 255, 0.2); /* Borde más claro en modo oscuro */
            color: #ffffff; /* Color del texto en el card */
        }
                
        /* Estilos para la barra de búsqueda */
        .form {
        --input-bg: #f2f2f2; /* Color de fondo inicial */
        --padding: 1.5em;
        --rotate: 80deg;
        --gap: 2em;
        --icon-change-color: #15A986;
        --height: 40px;
        width: 100%;
        padding-inline-end: 1em;
        background: var(--input-bg);
        position: relative;
        border-radius: 4px;
        color: #333;
        border: none; /* Evitar bordes */
        }

        /* Cambiar fondo a blanco al hacer clic */
        .form input:focus {
        background: #fff; /* Cambia el color de fondo a blanco */
        border: none; /* Sin bordes */
        }

        /* Asegurar que el espacio alrededor de la barra de búsqueda también cambie de color */
        .form:focus-within {
        background: #fff; /* Cambiar todo el contenedor a blanco */
        border: none; /* Sin bordes */
        }

        .form label {
        display: flex;
        align-items: center;
        width: 100%;
        height: var(--height);
        }

        .form input {
        width: 100%;
        padding-inline-start: calc(var(--padding) + var(--gap));
        outline: none;
        background: none;
        border: none; /* Sin bordes */
        }

        .form svg {
        color: #111;
        transition: 0.3s cubic-bezier(.4, 0, .2, 1);
        position: absolute;
        height: 15px;
        }

        .icon {
        position: absolute;
        left: var(--padding);
        transition: 0.3s cubic-bezier(.4, 0, .2, 1);
        display: flex;
        justify-content: center;
        align-items: center;
        }

        .swap-off {
        transform: rotate(-80deg);
        opacity: 0;
        visibility: hidden;
        }

        .close-btn {
        background: none;
        border: none;
        right: calc(var(--padding) - var(--gap));
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #111;
        padding: 0.1em;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        transition: 0.3s;
        opacity: 0;
        transform: scale(0);
        visibility: hidden;
        }

        .form input:focus ~ .close-btn {
        opacity: 1;
        visibility: visible;
        transform: scale(1);
        transition: 0s;
        }

    </style>
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
<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/skinvault/views/redes.php'; ?>

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
                url: '/skinvault/controllers/ChampionController.php?action=deleteSkin',  // URL al controlador
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
