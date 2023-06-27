<?php

header('Content-Type: text/html; charset=ISO-8859-1');

require_once 'helpers/helper.class.php';


if ($_GET) {
    $op = $_GET['operacion'];
} else if ($_POST) {
    $op = $_POST['operacion'];
}

switch ($op) {
    case 'registrar':
        registrar();
        break;
    case 'modificar':
        modificar();
        break;
}


function registrar()
{
    date_default_timezone_set('America/El_Salvador');
    $hlp = new Helper();
    $afiliacion = isset($_POST['afiliacion']) ? $hlp->limpiarParametro($_POST['afiliacion']) : false;
    $nombre = isset($_POST['nombre']) ? $hlp->limpiarParametro($_POST['nombre']) : false;
    $telefono = isset($_POST['telefono']) ? $hlp->limpiarParametro($_POST['telefono']) : false;
    $cirugia = isset($_POST['cirugia']) ? $hlp->limpiarParametro($_POST['cirugia']) : false;
    $fecha = isset($_POST['fecha']) ? $hlp->limpiarParametro($_POST['fecha']) : false;
    $cirujano = isset($_POST['cirujano']) ? $hlp->limpiarParametro($_POST['cirujano']) : false;
    $general = isset($_POST['general']) ? $hlp->limpiarParametro($_POST['general']) : false;
    $especialidad = date('Y-m-d');
    $estado = 2;
    $programacion = isset($_POST['programacion']) ? $hlp->limpiarParametro($_POST['programacion']) : false;

    $examenes = $_POST['examenes'];
    $covid = $_POST['covid'];
    $evmi = $_POST['evmi'];
    $nestecia = $_POST['nestecia'];
    $telefono2 = $_POST['telefono2'];
    $datosespecialidad = $_POST['datosespecialidad'];
    $detalles = $_POST['detalles'];



    if (
        !$afiliacion || !$nombre || !$telefono || !$cirugia || !$programacion
        || !$fecha || !$cirujano || !$general
    ) {
        print_r(json_encode([
            "ok" => false,
            "mensaje" => "¡Debe ingresar los datos requeridos!",
        ], JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE));
    } elseif (!$hlp->validarTelefono($telefono)) {
        print_r(json_encode([
            "ok" => false,
            "mensaje" => "¡Debe ingresar el teléfono en el formato solicitado!",
        ], JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE));
    } elseif (!empty($telefono2 && !$hlp->validarTelefono($telefono2))) {

        print_r(json_encode([
            "ok" => false,
            "mensaje" => "¡Debe ingresar el teléfono en el formato solicitado!",
        ], JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE));

    } else {
        include_once '../models/AgregarModel.php';
        $agregarModel = new Agregarotorino();
        $result = $agregarModel->Agregar(
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
        );

        if ($result) {
            print_r(json_encode([
                "ok" => true,
                "mensaje" => "¡Se agrego correctamente!",
            ], JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE));

        } else {
            print_r(json_encode([
                "ok" => false,
                "mensaje" => "¡Error al guardar los datos!",
            ], JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE));
        }
    }
}

function modificar()
{
    $hlp = new Helper();
    $FechaRegistro = isset($_POST['fer']) ? $hlp->limpiarParametro($_POST['fer']) : false;
    $Afiliacion = isset($_POST['afil']) ? $hlp->limpiarParametro($_POST['afil']) : false;
    $Nombre = isset($_POST['nombre']) ? $hlp->limpiarParametro($_POST['nombre']) : false;
    $Telefono = isset($_POST['tel1']) ? $hlp->limpiarParametro($_POST['tel1']) : false;
    $ProgramacionCX = isset($_POST['pcx']) ? $hlp->limpiarParametro($_POST['pcx']) : false;
    $FechaCX = isset($_POST['fcx']) ? $hlp->limpiarParametro($_POST['fcx']) : false;
    $Cirujano = isset($_POST['ciruj']) ? $hlp->limpiarParametro($_POST['ciruj']) : false;
    $CirugiaProgramada = isset($_POST['cpro']) ? $hlp->limpiarParametro($_POST['cpro']) : false;
    $EnviadoGeneral = isset($_POST['eg']) ? $hlp->limpiarParametro($_POST['eg']) : false;
    $estado = isset($_POST['estado']) ? $hlp->limpiarParametro($_POST['estado']) : false;
    $codigo = isset($_POST['codigo']) ? $hlp->limpiarParametro($_POST['codigo']) : false;
    $covid = $_POST['covid'];
    $Detalles = $_POST['detalles'];
    $Telefono2 = $_POST['tel2'];
    $EVMI = $_POST['evmi'];
    $Examenes = $_POST['exam'];
    $EVAnestecia = $_POST['evan'];
    $DatosEspec = $_POST['datesp'];

    if (empty($covid)) {
        $covid = NULL;
    }
    if (empty($Detalles)) {
        $Detalles = NULL;
    }
    if (empty($Telefono2)) {
        $Telefono2 = NULL;
    }
    if (empty($EVMI)) {
        $EVMI = NULL;
    }
    if (empty($Examenes)) {
        $Examenes = NULL;
    }
    if (empty($EVAnestecia)) {
        $EVAnestecia = NULL;
    }
    if (empty($DatosEspec)) {
        $DatosEspec = NULL;
    }

    if (
        !$FechaRegistro || !$Afiliacion || !$Nombre || !$Telefono || !$ProgramacionCX || !$FechaCX || !$Cirujano || !$CirugiaProgramada ||
        !$EnviadoGeneral || !$estado || !$codigo
    ) {
        print_r(json_encode([
            "ok" => false,
            "mensaje" => "¡Debe ingresar todos los datos requeridos!",
        ], JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE));
    }elseif (!$hlp->validarTelefono($Telefono)) {
        print_r(json_encode([
            "ok" => false,
            "mensaje" => "¡Debe ingresar el teléfono en el formato solicitado!",
        ], JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE));
    } elseif (!empty($Telefono2 && !$hlp->validarTelefono($Telefono2))) {

        print_r(json_encode([
            "ok" => false,
            "mensaje" => "¡Debe ingresar el teléfono en el formato solicitado!",
        ], JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE));

    } else {

        include_once '../models/ModificacionModel.php';
        $model = new ModificacionModel();
        $result = $model->Modificar($FechaRegistro, $Afiliacion, $Nombre, $Telefono, $Telefono2, $ProgramacionCX, $FechaCX, $Cirujano, $CirugiaProgramada, $Examenes, $EVMI, $EVAnestecia, $DatosEspec, $covid, $EnviadoGeneral, $estado, $Detalles, $codigo);

        if ($result) {
            print_r(json_encode([
                "ok" => true,
                "mensaje" => "¡Se modifico el registro!",
            ], JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE));

        } else {
            print_r(json_encode([
                "ok" => false,
                "mensaje" => "¡Error al modificar los datos!",
            ], JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE));
        }

    }
}