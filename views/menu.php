<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="">SkinVault</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Campeones</a></li>
            <li class="nav-item"><a class="nav-link" href="">Mis Skins</a></li>
            <li class="nav-item"><a class="nav-link" href="">Asistencia</a></li>
            <li class="nav-item">
                <form method="POST" action="controllers/AuthController.php?action=logout" class="d-inline">
                    <button type="submit" class="btn btn-danger" style="border:none;">Cerrar Sesión</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
