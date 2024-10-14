<?php
require_once('../dbConnection.php');
require_once('../controllers/AuthController.php');

// Pasamos la conexión a la base de datos al constructor
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-image: url('../images/backgroundRegister.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-container {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            margin-bottom: 40px;
            color: #000000;
            font-weight: bold;
            text-align: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            gap: 15px;
            position: relative;
            color: #495057;
            margin-bottom: 30px;
        }

        .container .label {
            font-size: 14px;
            padding-left: 10px;
            position: absolute;
            top: 15px;
            transition: 0.3s;
            pointer-events: none;
        }

        .input {
            width: 100%;
            height: 50px;
            border: none;
            outline: none;
            padding: 10px;
            border-radius: 6px;
            font-size: 16px;
            background-color: transparent;
            box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.3),
            -1px -1px 6px rgba(255, 255, 255, 0.4);
        }

        .input:focus {
            border: 2px solid transparent;
            color: #495057;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3),
            -1px -1px 6px rgba(255, 255, 255, 0.4),
            inset 3px 3px 10px rgba(0, 0, 0, 0.3),
            inset -1px -1px 6px rgba(255, 255, 255, 0.4);
        }

        .container .input:valid ~ .label,
        .container .input:focus ~ .label {
            transition: 0.3s;
            padding-left: 5px;
            transform: translateY(-40px);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 20px;
            font-size: 18px;
            padding: 12px;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .login-link {
            margin-top: 20px;
        }

        .login-link a {
            color: #007bff;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Estilos del checkbox personalizado */
        .checkbox-container {
            display: flex;
            align-items: center;
            margin-top: 20px;
            font-family: Arial, sans-serif;
            color: black;
        }

        .checkbox-container input {
            display: none;
        }

        .checkbox-container .cbx {
            position: relative;
            top: 1px;
            width: 20px;
            height: 20px;
            border: 1px solid #c8ccd4;
            border-radius: 3px;
            vertical-align: middle;
            transition: background 0.1s ease;
            cursor: pointer;
            display: block;
        }

        .checkbox-container .cbx:after {
            content: '';
            position: absolute;
            top: 2px;
            left: 6px;
            width: 7px;
            height: 14px;
            opacity: 0;
            transform: rotate(45deg) scale(0);
            border-right: 2px solid #fff;
            border-bottom: 2px solid #fff;
            transition: all 0.3s ease;
            transition-delay: 0.15s;
        }

        .checkbox-container input:checked + .cbx {
            border-color: transparent;
            background: #6871f1;
            animation: jelly 0.6s ease;
        }

        .checkbox-container input:checked + .cbx:after {
            opacity: 1;
            transform: rotate(45deg) scale(1);
        }

        .checkbox-container .label {
            margin-left: 10px;
            font-weight: 700;
            cursor: pointer;
            font-size: 12px; /* Tamaño de fuente más pequeño para el checkbox */
        }

        @keyframes jelly {
            from {
                transform: scale(1, 1);
            }

            30% {
                transform: scale(1.25, 0.75);
            }

            40% {
                transform: scale(0.75, 1.25);
            }

            50% {
                transform: scale(1.15, 0.85);
            }

            65% {
                transform: scale(0.95, 1.05);
            }

            75% {
                transform: scale(1.05, 0.95);
            }

            to {
                transform: scale(1, 1);
            }
        }
    </style>
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
