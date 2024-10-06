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
      // Asegúrate de que los campos en la consulta coinciden con la tabla
      $query = "INSERT INTO usuarios (nombre, contrasenia) VALUES (:username, :password)";
      $stmt = $this->dbConnection->prepare($query);

      // Asignamos los parámetros correctamente
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':password', $password);

      // Ejecutamos la consulta
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

      // Verificamos si la contraseña es correcta
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
}
