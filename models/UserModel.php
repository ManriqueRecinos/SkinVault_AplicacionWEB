<?php
class UserModel
{
  private $dbConnection;

  public function __construct($dbConnection)
  {
    $this->dbConnection = $dbConnection;
  }

  public function registerUser($username, $password)
  {
    try {
      $query = "INSERT INTO usuarios (nombre, contrasenia) VALUES (:username, :password)";
      $stmt = $this->dbConnection->prepare($query);

      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':password', $password);

      if ($stmt->execute()) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      echo 'Error al registrar el usuario: ' . $e->getMessage();
      return false;
    }
  }

  public function checkUser($username, $password)
  {
    try {
      $query = "SELECT * FROM usuarios WHERE nombre = :username";
      $stmt = $this->dbConnection->prepare($query);
      $stmt->bindParam(':username', $username);
      $stmt->execute();

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($user && password_verify($password, $user['contrasenia'])) {
        return $user;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      echo 'Error al verificar el usuario: ' . $e->getMessage();
      return false;
    }
  }

  // Nuevo método para guardar el token
  public function saveRememberToken($userId, $token)
  {
    try {
      $query = "UPDATE usuarios SET remember_token = :token WHERE id = :user_id";
      $stmt = $this->dbConnection->prepare($query);
      $stmt->bindParam(':token', $token);
      $stmt->bindParam(':user_id', $userId);
      return $stmt->execute();
    } catch (PDOException $e) {
      echo 'Error al guardar el token: ' . $e->getMessage();
      return false;
    }
  }

  // Nuevo método para recuperar un usuario por el token
  public function getUserByRememberToken($token)
  {
    try {
      $query = "SELECT * FROM usuarios WHERE remember_token = :token";
      $stmt = $this->dbConnection->prepare($query);
      $stmt->bindParam(':token', $token);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo 'Error al obtener el usuario por token: ' . $e->getMessage();
      return false;
    }
  }
}
