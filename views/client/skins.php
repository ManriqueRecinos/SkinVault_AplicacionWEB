<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/skinvault/models/champName.php';?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/png">
    <title><?= htmlspecialchars($champion['name'] ?? 'Campeón no encontrado'); ?> - Aspectos Disponibles</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" href="/skinvault/views/css/skins.css">
</head>
<body>

<?php require_once 'menu.php'; ?>

<div class="background-image"></div> <!-- Imagen de fondo -->

<div class="slider-container">
    <!-- Mostrar slider de skins solo si hay aspectos -->
    <?php if (!empty($skins)): ?>
        <div id="skinSlider" class="slick-slider">
            <?php foreach ($skins as $skin): ?>
                <?php if ($skin['num'] != 0): // Omitir skin con número 0 (default) ?>
                    <div class="skin-card" id="skin-<?= htmlspecialchars($skin['num']); ?>">
                        <form class="skin-form">
                            <input type="hidden" name="userId" value="<?= htmlspecialchars($_SESSION['user_id']); ?>" readonly>
                            <input type="hidden" name="championId" value="<?= htmlspecialchars($championId); ?>" readonly>
                            <input type="hidden" name="skinName" value="<?= htmlspecialchars($skin['name']); ?>" readonly>
                            <input type="hidden" name="skinNumber" value="<?= htmlspecialchars($skin['num']); ?>" readonly>
                            <input type="hidden" name="chromas" value="<?= htmlspecialchars(isset($skin['chromas']) ? 'true' : 'false'); ?>" readonly>
                            <input type="hidden" name="idSkin" value="<?= htmlspecialchars($skin['id']); ?>" readonly>
                            <button type="button" class="add-button" title="Guardar Skin" data-skin="<?= htmlspecialchars(json_encode($skin)); ?>">
                                <i class="fa-solid fa-square-caret-up"></i> <!-- Icono de flecha hacia arriba -->
                            </button>
                            <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= htmlspecialchars($championId); ?>_<?= htmlspecialchars($skin['num']); ?>.jpg" class="card-img-top" alt="<?= htmlspecialchars($skin['name']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($skin['name']); ?></h5>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
$(document).ready(function(){
    // Establecer la skin por defecto como fondo al cargar la página
    let defaultSkinNumber = 0; // Número de skin por defecto (0)
    $('.background-image').css('background-image', 'url(https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= htmlspecialchars($championId); ?>_' + defaultSkinNumber + '.jpg)');

    // Inicializar Slick Slider sin autoplay
    $('#skinSlider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: true,
        infinite: true,
        autoplay: false,
        centerMode: true, // Activa el modo centrado
        centerPadding: '0px', // Espacio a los lados
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    centerMode: true, // Activa el modo centrado
                    centerPadding: '0px' // Espacio a los lados
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: true, // Activa el modo centrado
                    centerPadding: '0px' // Espacio a los lados
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true, // Activa el modo centrado
                    centerPadding: '0px' // Espacio a los lados
                }
            }
        ]
    });

    // Manejar el evento de clic en el botón de agregar
    $('.add-button').click(function(e){
        e.stopPropagation(); // Prevenir que el clic también active el evento del skin
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

    // Cambiar la imagen principal al hacer clic en una skin
    $('.skin-card').click(function(){
        let skinNum = $(this).find('input[name="skinNumber"]').val(); // Obtener el número de la skin
        $('.background-image').css('background-image', 'url(https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= htmlspecialchars($championId); ?>_' + skinNum + '.jpg)');
    });
});

</script>

</body>
</html>
