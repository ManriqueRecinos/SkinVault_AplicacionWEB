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
                $_SESSION['user'] = $user['nombre'];
                $_SESSION['user_id'] = $user['id'];

                // Verificar si el usuario seleccionó "Mantener sesión iniciada"
                if (isset($_POST['remember_me'])) {
                    // Crear un token único
                    $token = bin2hex(random_bytes(16));

                    // Establecer una cookie con el token que dura 30 días
                    setcookie('remember_me', $token, time() + (30 * 24 * 60 * 60), '/');

                    // Guardar el token en la base de datos asociado con el usuario
                    $this->userModel->saveRememberToken($user['id'], $token);
                }

                header('Location: ../../'); // Redirigir a champions.php
                exit;
            } else {
                // Si las credenciales son incorrectas
                echo "Nombre de usuario o contraseña incorrectos.";
            }
        }
    }
    
    public function checkRememberMe()
    {
        if (isset($_COOKIE['remember_me'])) {
            $token = $_COOKIE['remember_me'];

            // Verificar si el token existe en la base de datos
            $user = $this->userModel->getUserByRememberToken($token);

            if ($user) {
                // Iniciar sesión automáticamente si el token es válido
                session_start();
                $_SESSION['user'] = $user['nombre'];
                $_SESSION['user_id'] = $user['id'];
                return true;
            }
        }
        return false;
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
                header('Location: ../client/login.php');
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
        header('Location: /skinvault/views/client/login.php'); // Redirigir al login
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