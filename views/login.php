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
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login.css">
</head>

<body>
  <div class="container">
    <h2 class="text-center mt-5">Iniciar Sesión</h2>
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
          <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>

          <!-- Enlace a registro -->
          <div class="text-center mt-3">
            <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
