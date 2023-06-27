<?php
class Conexion
{
  private $user = "root";
  private $pass = "";
  private $pdo = "";

  function conectar()
  {
    try {
      $this->pdo = new PDO(
        'mysql:host=localhost;dbname=cirugiasotorrino;charset=utf8',
        $this->user,
        $this->pass
      );
    } catch (PDOException $e) {
      echo "Error " . $e->getMessage();
    }
    return $this->pdo;
  }

  function desconectar()
  {
    return $this->pdo = null;
  }
}
?>