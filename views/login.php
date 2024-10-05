<?php
// Conectar a la base de datos
require_once '../dbConnection.php';

try {
    $dbConnection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Ahora incluye el controlador
require_once '../controllers/AuthController.php';

$authController = new AuthController($dbConnection);

// Llama al método de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController->login();
} else {
    // Mostrar formulario de login
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/login.css"> <!-- CSS adicional -->
    </head>
    <body>
        <div class="container-fluid d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="row w-100">
                <div class="col-md-6 left-panel d-flex flex-column justify-content-center align-items-center">
                    <h1 class="logo">TheCubeFactory</h1>
                    <h2>Welcome back</h2>
                    <p>Please enter your details</p>
                </div>
                <div class="col-md-6 right-panel">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember for 30 days</label>
                            <a href="#" class="float-right">Forgot password?</a>
                        </div>
                        <button type="submit" class="btn btn-purple btn-block">Sign in</button>
                        <button type="button" class="btn btn-outline-secondary btn-block">Sign in with Google</button>
                        <p class="text-center">Don't have an account? <a href="register.php">Sign up</a></p>
                    </form>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
}
?>
