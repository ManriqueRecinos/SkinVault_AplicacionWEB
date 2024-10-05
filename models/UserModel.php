<?php
class UserModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function registerUser($nombre, $email, $hashedPassword) {
        $query = "INSERT INTO usuarios (nombre, email, contraseña) VALUES (:nombre, :email, :contraseña)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contraseña', $hashedPassword);

        return $stmt->execute();
    }

    public function loginUser($email, $password) {
        $query = "SELECT contraseña FROM usuarios WHERE email = :email";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si la contraseña es correcta
        if ($result && password_verify($password, $result['contraseña'])) {
            return true; // Login exitoso
        }
        return false; // Login fallido
    }
}
