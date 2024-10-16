<?php
require_once$_SERVER["DOCUMENT_ROOT"] . '/skinvault/dbConnection.php'; // Verifica que la ruta de conexión esté correcta
require_once('../controllers/AuthController.php'); // Verifica la ruta del controlador

// Asegúrate de que la variable $dbConnection esté definida correctamente
$authController = new AuthController($dbConnection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Llamar al método register() del controlador
    $authController->register();
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/skinvault/views/css/register.css">

</head>

<body>
    <div class="register-container">
        <h2 class="text-center">Registrarse</h2>
        <form method="POST" action="">
            <div class="container">
                <input type="text" name="username" class="input" required>
                <label class="label">Nombre de usuario</label>
            </div>

            <div class="container">
                <input type="password" name="password" class="input" id="password" required>
                <label class="label">Contraseña</label>
            </div>

            <div class="container">
                <input type="password" name="confirm_password" class="input" id="confirm_password" required>
                <label class="label">Confirmar contraseña</label>
            </div>

            <!-- Checkbox personalizado con texto -->
            <div class="checkbox-container">
                <input type="checkbox" id="cbx">
                <label for="cbx" class="cbx"></label>
                <span class="label">Mostrar contraseña</span>
            </div>

            <!-- Botón de Registrarse -->
            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>

            <div class="login-link text-center"> <!-- Centrar el texto -->
                <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></p>
            </div>
        </form>
    </div>

    <script>
        // Mostrar/ocultar contraseña
        const cbx = document.getElementById('cbx');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');

        cbx.addEventListener('change', function () {
            password.type = this.checked ? 'text' : 'password';
            confirmPassword.type = this.checked ? 'text' : 'password';
        });
    </script>
</body>

</html>
