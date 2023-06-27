<?php

require 'libs/vendor/autoload.php';
require '../models/estadosModel.php';

use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

$tipo = '';
$fecha = '';
$lstregistros = null;


$model = new EstadosModel();

if (isset($_GET['tipo']) && isset($_GET['fecha'])) {

    $tipo = $_GET['tipo'];
    $fecha = $_GET['fecha'];
    $tipo = json_decode($tipo);
    $fecha = json_decode($fecha);
    if ($tipo == 'Fecha de programación') {
        $lstregistros = $model->consultarCirugiasFechaRegistro($fecha);
    } else if ($tipo == 'Fecha de cirugía') {
        $lstregistros = $model->consultarCirugiasFechaCX($fecha);
    }
}


//creaccion de instancia de la clase Spreadsheet
$spreadcheet = new Spreadsheet();
//especificacion del autor y titulo del archivo
$spreadcheet->getProperties()->setCreator("Hospital")->setTitle("REPORTE");


//Activando la hoja de excel
$hojaActiva = $spreadcheet->getActiveSheet();

//creando estilo para los bordes
$styleArray = [
    'borders' => [
        'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,

            'color' => ['argb' => '00000000'],
        ],
    ],
];


//estableciendo zona horaria de el salvador
date_default_timezone_set('America/El_Salvador');

$fechaDoc = date('d-m-Y');
$hora = date('h:i A');

//Combinacion de celdas para el encabezado
$hojaActiva->mergeCells('B1:G1');
$hojaActiva->mergeCells('B2:G2');
$hojaActiva->mergeCells('A1:A2');
$hojaActiva->mergeCells('I1:I2');



//Imprimiendo el logo 
$drawing = new Drawing();
$drawing->setName('logo');
$drawing->setPath('../views/dist/img/logo2.png');
$drawing->setCoordinates('A1');
$drawing->setWidth('80');
$drawing->setHeight('80');
$drawing->setOffsetX(10);
$drawing->setOffsetY(10);
$drawing->setWorksheet($hojaActiva);

//ajustando el alto de la fila
$hojaActiva->getRowDimension('1')->setRowHeight(34);
$hojaActiva->getRowDimension('2')->setRowHeight(34);

//Titulo del encabezado
$styleArrayFontTitle = [
    'font' => [
        'bold' => true,
        'size' => 13,

    ],
];



//aplicacion de estilo al titulo
$hojaActiva->getStyle('B1')->applyFromArray($styleArrayFontTitle);
// $hojaActiva->getStyle('B1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKBLUE);
$hojaActiva->getStyle('B2')->applyFromArray($styleArrayFontTitle);

$hojaActiva->setCellValue('B1', 'CONSULTORIO DE CIRUGIA');
$hojaActiva->setCellValue('B2', 'PROGRAMACION DE CIRUGIAS ');
$hojaActiva->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('B1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$hojaActiva->getStyle('B2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('B2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);


//colocando auto ajustable el tamaño en cada columna
$hojaActiva->getColumnDimension('A')->setAutoSize(true);
$hojaActiva->getColumnDimension('B')->setAutoSize(true);
$hojaActiva->getColumnDimension('C')->setAutoSize(true);
$hojaActiva->getColumnDimension('D')->setAutoSize(true);
$hojaActiva->getColumnDimension('E')->setAutoSize(true);
$hojaActiva->getColumnDimension('F')->setAutoSize(true);
$hojaActiva->getColumnDimension('G')->setAutoSize(true);
$hojaActiva->getColumnDimension('H')->setAutoSize(true);
$hojaActiva->getColumnDimension('J')->setAutoSize(true);
$hojaActiva->getColumnDimension('K')->setAutoSize(true);
$hojaActiva->getColumnDimension('L')->setAutoSize(true);
$hojaActiva->getColumnDimension('N')->setAutoSize(true);
$hojaActiva->getColumnDimension('O')->setAutoSize(true);
$hojaActiva->getStyle('M'.$hojaActiva->getHighestRow())->getAlignment()->setWrapText(true);
$hojaActiva->getColumnDimension('M')->setWidth(40);
$hojaActiva->getStyle('P'.$hojaActiva->getHighestRow())->getAlignment()->setWrapText(true);
$hojaActiva->getColumnDimension('P')->setWidth(40);
$hojaActiva->getStyle('I'.$hojaActiva->getHighestRow())->getAlignment()->setWrapText(true);
$hojaActiva->getColumnDimension('I')->setWidth(25);


//aplicacion de color a la cabecera
$hojaActiva->getStyle('A4:P4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('8EA9DB');

$styleArrayFont = [
    'font' => [
        'bold' => true,
        'size' => 12,
    ],
];

$hojaActiva->getStyle('A4:P4')->applyFromArray($styleArrayFont);


//aplicacion de borde en cada celda de la cabecera
$hojaActiva->getStyle('A4')->applyFromArray($styleArray);
$hojaActiva->getStyle('B4')->applyFromArray($styleArray);
$hojaActiva->getStyle('C4')->applyFromArray($styleArray);
$hojaActiva->getStyle('D4')->applyFromArray($styleArray);
$hojaActiva->getStyle('E4')->applyFromArray($styleArray);
$hojaActiva->getStyle('F4')->applyFromArray($styleArray);
$hojaActiva->getStyle('G4')->applyFromArray($styleArray);
$hojaActiva->getStyle('H4')->applyFromArray($styleArray);
$hojaActiva->getStyle('I4')->applyFromArray($styleArray);
$hojaActiva->getStyle('J4')->applyFromArray($styleArray);
$hojaActiva->getStyle('K4')->applyFromArray($styleArray);
$hojaActiva->getStyle('L4')->applyFromArray($styleArray);
$hojaActiva->getStyle('M4')->applyFromArray($styleArray);
$hojaActiva->getStyle('N4')->applyFromArray($styleArray);
$hojaActiva->getStyle('O4')->applyFromArray($styleArray);
$hojaActiva->getStyle('P4')->applyFromArray($styleArray);

//colocacion de los titulos a la cabecera de las columnas
$hojaActiva->setCellValue('A4', 'Fecha de registro');
$hojaActiva->setCellValue('B4', 'Programación cirugía');
$hojaActiva->setCellValue('C4', 'Estado');
$hojaActiva->setCellValue('D4', 'Nombre');
$hojaActiva->setCellValue('E4', 'Afiliacion');
$hojaActiva->setCellValue('F4', 'Telefono');
$hojaActiva->setCellValue('G4', 'Fecha de CX');
$hojaActiva->setCellValue('H4', 'Cirujano');
$hojaActiva->setCellValue('I4', 'Cirugía programada');
$hojaActiva->setCellValue('J4', 'Examenes');
$hojaActiva->setCellValue('K4', 'EV M.I');
$hojaActiva->setCellValue('L4', 'EV. Anestesia');
$hojaActiva->setCellValue('M4', 'EV. Otra especialidad');
$hojaActiva->setCellValue('N4', 'Prueva COVID');
$hojaActiva->setCellValue('O4', 'Enviado a H.general');
$hojaActiva->setCellValue('P4', 'Otros detalles');


//centrando el texto de la cabecera
$hojaActiva->getStyle('A4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('B4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('C4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('D4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('E4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('F4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('G4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('H4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('I4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('J4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('K4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('L4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('M4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('N4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('O4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hojaActiva->getStyle('P4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

//contador para imprimir los datos desde la fila 2
$row = 5;



//bucle utilizado para imprimir la informacion obtenida de la consulta
foreach ($lstregistros as $fila) {
    $hojaActiva->setCellValue('A' . $row, $fila['FechaRegistro']);
    $hojaActiva->setCellValue('B' . $row, $fila['ProgramacionCX']);
    $hojaActiva->setCellValue('C' . $row, $fila['NombreEstado']);
    $hojaActiva->setCellValue('D' . $row, $fila['Nombre']);
    $hojaActiva->setCellValue('E' . $row, $fila['Afiliacion']);
    $hojaActiva->setCellValue('F' . $row, $fila['Telefono']."\n".$fila['Telefono2']);
    $hojaActiva->setCellValue('G' . $row, $fila['FechaCX']);
    $hojaActiva->setCellValue('H' . $row, $fila['Cirujano']);
    $hojaActiva->setCellValue('I' . $row, $fila['CirugiaProgramada']);
    $hojaActiva->setCellValue('J' . $row, $fila['Examenes']);
    $hojaActiva->setCellValue('K' . $row, $fila['EVMI']);
    $hojaActiva->setCellValue('L' . $row, $fila['EVAnestecia']);
    $hojaActiva->setCellValue('M' . $row, $fila['DatosEspecialidad']);
    $hojaActiva->setCellValue('N' . $row, $fila['PruebaCovid']);
    $hojaActiva->setCellValue('O' . $row, $fila['EnviadoGeneral']);
    $hojaActiva->setCellValue('P' . $row, $fila['Detalles']);

    //Centrado de texto en la celda
    $hojaActiva->getStyle('A' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('B' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('C' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('E' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('F' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('G' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('D' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('H' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('I' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('J' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('K' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('L' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('M' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('N' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('O' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('P' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $hojaActiva->getStyle('A' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('B' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('C' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('D' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('E' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('F' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('G' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('H' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('J' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('K' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('L' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('M' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('N' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('O' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('I' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $hojaActiva->getStyle('P' . $row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);


    //aplicacion de borde en cada celda
    $hojaActiva->getStyle('A' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('B' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('C' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('D' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('E' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('F' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('G' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('H' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('I' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('J' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('K' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('L' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('M' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('N' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('O' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('P' . $row)->applyFromArray($styleArray);
    $hojaActiva->getStyle('F' . $row)->getAlignment()->setWrapText(true);
    $hojaActiva->getStyle('M' . $row)->getAlignment()->setWrapText(true);
    $hojaActiva->getStyle('P' . $row)->getAlignment()->setWrapText(true);
    $hojaActiva->getStyle('I' . $row)->getAlignment()->setWrapText(true);

    if ($fila['NombreEstado'] == 'Realizada') {
        $hojaActiva->getStyle('C' . $row)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('92D050');
    }else if ($fila['NombreEstado'] == 'Fecha cambiada') {
        $hojaActiva->getStyle('C' . $row)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FF66FF');        
    }else if ($fila['NombreEstado'] == 'Suspendida') {
        $hojaActiva->getStyle('C' . $row)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
    }

    //aumentando en uno el contador para avanzar a la siguiente fila
    $row++;
}

//fecha y hora
$styleArrayFontFH = [
    'font' => [
        'bold' => true,
    ],
];

$hojaActiva->getStyle('I1')->applyFromArray($styleArrayFontFH);

$hojaActiva->getStyle('I1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
//imprimiendo fecha y hora en el encabezado
$hojaActiva->getCell('I1')->setValue("Datos de generación\nFecha: $fechaDoc\nHora: $hora");
$hojaActiva->getStyle('I1')->getAlignment()->setWrapText(true);

$fecha_actual = date('Y-m-d');

//especificacion del contexto de la aplicacion para generar el documento
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="REPORTE_Cirugías_' . $fecha . '.xlsx"');
header('Cache-Control: max-age=0');

//generacion y descarga del documento
$writer = IOFactory::createWriter($spreadcheet, 'Xlsx');
$writer->save('php://output');
exit; //finalizacion del proceso

?>