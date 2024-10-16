<?php
if (isset($_GET['id'])) {
    $championId = $_GET['id'];

    // Obtener los datos de campeones
    $championsJson = file_get_contents('https://ddragon.leagueoflegends.com/cdn/14.19.1/data/es_MX/champion.json');
    $championsData = json_decode($championsJson, true);
    
    // Obtener el campeón específico
    $champion = $championsData['data'][$championId];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($champion['name'] ?? 'Campeón no encontrado'); ?> - Aspectos Disponibles</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            position: relative;
            overflow: hidden;
            margin: 0;
            height: 100vh;
        }
        .background-image {
            position: absolute;
            top: 70px; /* Ajusta este valor según la altura de tu menú */
            left: 0;
            width: 100%;
            height: calc(110% - 0px); /* Ajusta la altura restante */
            background-image: url('https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= htmlspecialchars($championId); ?>_0.jpg');
            background-size: cover;
            background-position: center;
            z-index: 1;
        }

        .content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding-bottom: 100px;
        }
        .champion-header {
            color: white; /* Color del texto en modo claro */
            font-size: 2rem; /* Tamaño de la fuente */
        }
        .slider-container {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 2;
            background: rgba(255, 255, 255, 0.4); /* Cambiado a más transparente */
            padding: 10px 0;
        }
        body.dark-mode .slider-container {
            background: rgba(44, 44, 44, 0.8); /* Color de fondo del slider en modo oscuro */
        }
        .skin-card {
            cursor: pointer;
            margin: 10px;
            width: 160px;
            height: 274px;
            background: rgb(255, 255, 255);
            border-radius: 5px;
            border: 1px solid rgba(0, 0, 255, .2);
            transition: all .2s;
            box-shadow: 8px 12px 2px 1px rgba(0, 0, 255, .2);
            position: relative;
        }
        body.dark-mode .skin-card {
            background: #2c2c2c; /* Color del card en modo oscuro */
            border: 1px solid rgba(255, 255, 255, 0.2); /* Borde más claro en modo oscuro */
            color: #ffffff; /* Color del texto en el card en modo oscuro */
        }
        .skin-card img {
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }
        .skin-card:hover {
            transform: scale(1.05);
            box-shadow: -0px 12px 2px -1px rgba(0, 0, 255, .2);
        }
        .add-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #2c2c2c;
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
        body.dark-mode .champion-header {
            color: white; /* Color del texto en modo oscuro */
        }
    </style>
</head>
<body>

<?php require_once 'menu.php'; ?>

<div class="background-image"></div> <!-- Imagen de fondo -->

<div class="container content mt-5">
    <h1 class="champion-header"><b>Selección de aspectos de <?= htmlspecialchars($champion['name'] ?? 'Campeón no encontrado'); ?></b></h1>
</div>

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
