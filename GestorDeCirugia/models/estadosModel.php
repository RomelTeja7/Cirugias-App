<?php
require_once('../connection/conexionDB.php');
$con = new Conexion();

class EstadosModel
{
    public function consultarCirugiaConCambioFecha()
    {
        global $con;
        $result = null;
        $query = "SELECT * FROM datoscirugias as d
        JOIN estado as e
        ON d.IdEstado = e.IdEstado
        WHERE e.NombreEstado = 'Fecha cambiada'";

        try {
            $stmt = $con->conectar()->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $con->desconectar();

        } catch (PDOException $e) {
            $con->desconectar();
            die("Error: " . $e->getMessage());
        }
        return $result;
    }

    public function consultarCirugiasSuspendidas()
    {
        global $con;
        $result = null;
        $query = "SELECT * FROM datoscirugias as d
        JOIN estado as e
        ON d.IdEstado = e.IdEstado
        WHERE e.NombreEstado = 'Suspendida'";

        try {
            $stmt = $con->conectar()->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $con->desconectar();

        } catch (PDOException $e) {
            $con->desconectar();
            die("Error: " . $e->getMessage());
        }
        return $result;
    }

    public function consultarCirugiasRealizadas()
    {
        global $con;
        $result = null;
        $query = "SELECT * FROM datoscirugias as d
        JOIN estado as e
        ON d.IdEstado = e.IdEstado
        WHERE e.NombreEstado = 'Realizada'";

        try {
            $stmt = $con->conectar()->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $con->desconectar();

        } catch (PDOException $e) {
            $con->desconectar();
            die("Error: " . $e->getMessage());
        }
        return $result;
    }

    public function consultarCirugiasEspera()
    {
        global $con;
        $result = null;
        $query = "SELECT * FROM datoscirugias as d
        JOIN estado as e
        ON d.IdEstado = e.IdEstado
        WHERE e.NombreEstado = 'En espera'";

        try {
            $stmt = $con->conectar()->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $con->desconectar();

        } catch (PDOException $e) {
            $con->desconectar();
            die("Error: " . $e->getMessage());
        }
        return $result;
    }


    public function consultarCirugiasFechaRegistro($fecha)
    {  
        global $con;
        $result = null;
        $query = "SELECT * FROM datoscirugias as d
        JOIN estado as e
        ON d.IdEstado = e.IdEstado
        WHERE d.ProgramacionCX = :n1";

        try {
            $stmt = $con->conectar()->prepare($query);
            $stmt->bindParam(':n1', $fecha, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $con->desconectar();

        } catch (PDOException $e) {
            $con->desconectar();
            die("Error: " . $e->getMessage());
        }
        return $result;
    }


    public function consultarCirugiasFechaCX($fecha)
    {
        global $con;
        $result = null;
        $query = "SELECT * FROM datoscirugias as d
        JOIN estado as e
        ON d.IdEstado = e.IdEstado
        WHERE d.FechaCX = :n1";

        try {
            $stmt = $con->conectar()->prepare($query);
            $stmt->bindParam(':n1', $fecha, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $con->desconectar();

        } catch (PDOException $e) {
            $con->desconectar();
            die("Error: " . $e->getMessage());
        }
        return $result;
    }
}