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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    
    body {
      background-image: url('../images/backgroundLogin.png');
      background-size: cover;
      background-position: center;
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    h2 {
      margin-bottom: 30px;
      color: #007bff;
      font-weight: bold;
    }

    .form-control {
      border-radius: 20px;
      padding: 10px 20px;
      font-size: 16px;
    }

    .password-container {
      position: relative;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      border-radius: 20px;
      font-size: 18px;
      padding: 10px;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    .form-group label {
      color: #495057;
      font-weight: 500;
    }

    .register-link {
      margin-top: 20px;
    }

    .register-link a {
      color: #007bff;
    }

    .register-link a:hover {
      text-decoration: underline;
    }

    .show-password {
      margin-top: 10px;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h2 class="text-center">Iniciar Sesión</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label for="username">Nombre de usuario:</label>
        <input type="text" class="form-control" name="username" required>
      </div>
      <div class="form-group password-container">
        <label for="password">Contraseña:</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>

      <!-- Checkbox para mostrar/ocultar la contraseña -->
      <div class="form-group form-check show-password">
        <input type="checkbox" class="form-check-input" id="showPassword">
        <label class="form-check-label" for="showPassword">Mostrar contraseña</label>
      </div>

      <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>

      <div class="text-center register-link">
        <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
      </div>
    </form>
  </div>

  <!-- Script para alternar la visibilidad de la contraseña -->
  <script>
    const showPassword = document.querySelector('#showPassword');
    const password = document.querySelector('#password');

    showPassword.addEventListener('change', function() {
      const type = this.checked ? 'text' : 'password';
      password.type = type;
    });
  </script>
</body>

</html>
