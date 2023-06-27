<?php
require_once '../connection/conexionDB.php';

class Agregarotorino
{

    public function Agregar(
        $afiliacion,
        $nombre,
        $telefono,
        $cirugia,
        $especialidad,
        $programacion,
        $fecha,
        $examenes,
        $covid,
        $evmi,
        $nestecia,
        $cirujano,
        $general,
        $estado,
        $telefono2,
        $datosespecialidad,
        $detalles
    ) {
        $registrado = false;
        if (empty($examenes)) {
            $examenes = NULL;
        }
        if (empty($covid)) {
            $covid = NULL;
        }
        if (empty($evmi)) {
            $evmi = NULL;
        }
        if (empty($nestecia)) {
            $nestecia = NULL;
        }
        if (empty($telefono2)) {
            $telefono2 = NULL;
        }
        if (empty($datosespecialidad)) {
            $datosespecialidad = NULL;
        }
        if (empty($detalles)) {
            $detalles = NULL;
        }

        try {
            $conexion = new Conexion();

            $sql = "INSERT INTO datoscirugias VALUES (NULL,:n1,:n2,:n3,:n4,:n5,:n6,:n7,:n8,:n9,:a1,:a2,:a3,:a4,:a5,:a6,:a7,:a8)";

            $stmt = $conexion->conectar()->prepare($sql);
            $stmt->bindParam(':n1', $especialidad, PDO::PARAM_STR);
            $stmt->bindParam(':n2', $afiliacion, PDO::PARAM_STR);
            $stmt->bindParam(':n3', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':n4', $telefono, PDO::PARAM_STR);
            $stmt->bindParam(':n5', $telefono2, PDO::PARAM_STR);
            $stmt->bindParam(':n6', $programacion, PDO::PARAM_STR);
            $stmt->bindParam(':n7', $fecha, PDO::PARAM_STR);
            $stmt->bindParam(':n8', $cirujano, PDO::PARAM_STR);
            $stmt->bindParam(':n9', $cirugia, PDO::PARAM_STR);
            $stmt->bindParam(':a1', $examenes, PDO::PARAM_STR);
            $stmt->bindParam(':a2', $evmi, PDO::PARAM_STR);
            $stmt->bindParam(':a3', $nestecia, PDO::PARAM_STR);
            $stmt->bindParam(':a4', $datosespecialidad, PDO::PARAM_STR);
            $stmt->bindParam(':a5', $covid, PDO::PARAM_STR);
            $stmt->bindParam(':a6', $general, PDO::PARAM_STR);
            $stmt->bindParam(':a7', $detalles, PDO::PARAM_STR);
            $stmt->bindParam(':a8', $estado, PDO::PARAM_STR);
            $registrado = $stmt->execute();
            $conexion->desconectar();

            return $registrado;
        } catch (PDOException $e) {
            $conexion->desconectar();
            return $e->getMessage();

        }
        
    }

}
?>