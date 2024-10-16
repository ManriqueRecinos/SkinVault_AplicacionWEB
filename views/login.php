<?php
require_once('../dbConnection.php');
require_once('../controllers/AuthController.php');

// Aquí pasamos la conexión a la base de datos al constructor
$authController = new AuthController($dbConnection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController->login();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/png">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/skinvault/views/css/login.css">
</head>

<body>
    <div class="login-container">
        <h2 class="text-center">Iniciar Sesión</h2>
        <form method="POST" action="">
            <div class="container">
                <input type="text" name="username" class="input" required>
                <label class="label">Nombre de usuario</label>
            </div>

            <div class="container">
                <input type="password" name="password" class="input" id="password" required>
                <label class="label">Contraseña</label>
            </div>

            <!-- Checkbox para mostrar/ocultar la contraseña -->
            <div class="checkbox-container">
                <input type="checkbox" id="showPassword">
                <label for="showPassword" class="cbx"></label>
                <span class="label">Mostrar contraseña</span>
            </div>

            <!-- Checkbox para mantener sesión iniciada -->
            <div class="checkbox-container">
                <input type="checkbox" id="rememberMe" name="remember_me">
                <label for="rememberMe" class="cbx"></label>
                <span class="label">Mantener sesión iniciada</span>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>

            <div class="text-center register-link">
                <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
            </div>
        </form>
    </div>

    <script>
        const showPassword = document.querySelector('#showPassword');
        const password = document.querySelector('#password');

        showPassword.addEventListener('change', function () {
            const type = this.checked ? 'text' : 'password';
            password.type = type;
        });
    </script>
</body>

</html>
