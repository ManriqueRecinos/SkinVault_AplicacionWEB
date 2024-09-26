<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elige a tu Campeón</title>
    <!-- Import Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">BOLSIT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#">Campeones</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Noticias</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Asistencia</a></li>
            </ul>
        </div>
    </nav>

    <div class="container text-center mt-5">
        <h1>ELIGE A TU <span class="text-primary">CAMPEÓN</span></h1>
        <p>Teniedo en cuenta que hay más de 140 campeones, no tardarás en encontrar tu estilo de juego. Domina a uno o a todos.</p>
    
        <div class="row">
            <!-- Campeón 1 -->
            <div class="col-md-4 col-sm-6">
                <a href="Skins/aatrox.html" class="card mb-4">
                    <img src="Imagenes/Aatrox_base.jpg" class="card-img-top" alt="Aatrox">
                    <div class="card-body">
                        <h5 class="card-title">AATROX</h5>
                    </div>
                </a>
            </div>
            <!-- Campeón 2 -->
            <div class="col-md-4 col-sm-6">
                <a href="ahri.html" class="card mb-4">
                    <img src="Imagenes/Ahri_base.jpg" class="card-img-top" alt="Ahri">
                    <div class="card-body">
                        <h5 class="card-title">AHRI</h5>
                    </div>
                </a>
            </div>
            <!-- Campeón 3 -->
            <div class="col-md-4 col-sm-6">
                <a href="akali.html" class="card mb-4">
                    <img src="Imagenes/Akali_base.jpg" class="card-img-top" alt="Akali">
                    <div class="card-body">
                        <h5 class="card-title">AKALI</h5>
                    </div>
                </a>
            </div>
            <!-- Añadir más campeones siguiendo el mismo formato -->
        </div>
    </div>
    

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

