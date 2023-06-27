<?php 
require_once '../connection/conexionDB.php';

class RegistroController{
    
    public function SelectRegistros()
    {
        try {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
  
            $stmt = $conn->prepare('SELECT * FROM datoscirugias d JOIN estado e ON d.IdEstado = e.IdEstado');
  
            $stmt->execute();
  
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
            $conn = $conexion->desconectar();
  
            return $resultados;
  
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
            return null;
        }
    }

    public function SelectEstado()
    {
        try {
            $conexion = new Conexion();
            $conn = $conexion->conectar();
  
            $stmt = $conn->prepare('SELECT * FROM estado');
  
            $stmt->execute();
  
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
            $conn = $conexion->desconectar();
  
            return $resultados;
  
        } catch (PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
            return null;
        }
    }
}
?>