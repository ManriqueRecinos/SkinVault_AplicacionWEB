<?php
require_once('../models/UserModel.php');

class AuthController {
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new UserModel($dbConnection);
    }

    public function register() {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password === $confirm_password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            if ($this->userModel->registerUser($nombre, $email, $hashedPassword)) {
                // Registro exitoso, redirigir o mostrar mensaje
                header('Location: login.php'); // Cambia según tu lógica
            } else {
                // Manejar error en registro
                echo "Error en el registro.";
            }
        } else {
            // Maneja el error de confirmación de contraseña
            echo "Las contraseñas no coinciden.";
        }
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($this->userModel->loginUser($email, $password)) {
            // Login exitoso, redirigir o mostrar mensaje
            header('Location: dashboard.php'); // Cambia según tu lógica
        } else {
            // Manejar error en login
            echo "Correo electrónico o contraseña incorrectos.";
        }
    }
}

