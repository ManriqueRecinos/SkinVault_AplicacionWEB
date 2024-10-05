<?php
require_once('../controllers/AuthController.php');
require_once '../dbConnection.php'; // Archivo con tu conexión a la base de datos

$authController = new AuthController($dbConnection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController->register();
}
?>

<!-- Formulario de Registro -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css"> <!-- Tu CSS personalizado -->
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Registrarse</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nombre">Nombre de usuario:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirmar contraseña:</label>
                <input type="password" class="form-control" name="confirm_password" required>
            </div>

            <button type="submit" class="btn btn-primary">Registrarse</button>
            <a href="login.php" class="btn btn-link">¿Ya tienes una cuenta? Inicia sesión</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

