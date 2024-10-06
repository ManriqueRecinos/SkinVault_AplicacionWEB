<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/skinvault/dbConnection.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/skinvault/controllers/AuthController.php';

// Pasamos la conexión al constructor del controlador
$authController = new AuthController($dbConnection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
  <link rel="stylesheet" href="/skinvault/css/login.css">
</head>

<body>
  <div class="container">
    <h2 class="text-center mt-5">Registrarse</h2>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form method="POST" action="">
          <div class="form-group">
            <label for="username">Nombre de usuario:</label>
            <input type="text" class="form-control" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" name="password" required>
          </div>
          <div class="form-group">
            <label for="confirm_password">Confirmar contraseña:</label>
            <input type="password" class="form-control" name="confirm_password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Registrarse</button>

          <!-- Enlace a login -->
          <div class="text-center mt-3">
            <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>