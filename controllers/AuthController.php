<?php
// echo $_SERVER['DOCUMENT_ROOT'];

require_once $_SERVER["DOCUMENT_ROOT"] . '/skinvault/models/UserModel.php';

class AuthController
{
    private $userModel;

    public function __construct($dbConnection)
    {
        $this->userModel = new UserModel($dbConnection);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Verificar las credenciales del usuario
            $user = $this->userModel->checkUser($username, $password);

            if ($user) {
                // Si las credenciales son correctas, iniciar sesión
                session_start();
                $_SESSION['user'] = $user['nombre']; // Guardar nombre de usuario en la sesión
                header('Location: ../'); // Redirigir a champions.php
                exit;
            } else {
                // Si las credenciales son incorrectas
                echo "Nombre de usuario o contraseña incorrectos.";
            }
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Hashear la contraseña
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Registrar al usuario en la base de datos
            $result = $this->userModel->registerUser($username, $hashedPassword);

            if ($result) {
                header('Location: ../views/login.php');
                exit;
            } else {
                echo "Error al registrar el usuario.";
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy(); // Cerrar sesión
        header('Location: /skinvault/views/login.php'); // Redirigir al login
        exit();
    }
}

// Manejar las acciones recibidas por GET
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $dbConnection = new PDO('mysql:host=localhost;dbname=bolsit', 'root', '');
    $authController = new AuthController($dbConnection);

    if ($action == 'logout') {
        $authController->logout();
    }
}