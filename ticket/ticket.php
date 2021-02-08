<?php
include "fpdf/fpdf.php";
include "../config/db.php";
include "../config/conexion.php";

$id_tarifario=($_GET['id_tarifario']);

$pdf = new FPDF($orientation = 'P', $unit = 'mm', array(60, 150));
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 9);
$textypos = 5;
$pdf->setY(2);
$pdf->setX(8);
$pdf->Cell(5, $textypos, 'ANT GAD FLAVIO ALFARO');
$pdf->SetFont('Arial', '', 5);
$textypos += 6;
$pdf->setX(0);
$pdf->Cell(2, $textypos, '');
$textypos += 6;
$pdf->setX(0);
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(2, $textypos, '***********************************************************************');

$sql1 = mysqli_query($con, "SELECT
							tra_tarifas.TRA_NUMERO,
							tra_tarifas.TRA_RUCCI,
							tra_tarifas.TRA_PLACA,
							tra_tarifas.TRA_NOMBRES,
							tra_tarifas.TRA_FECHAEMISION
							FROM
							tra_tarifas
							WHERE
							tra_tarifas.TRA_CODIGO = '$id_tarifario'");

while($usuarios = mysqli_fetch_array($sql1)) {							
	$numero = $usuarios['TRA_NUMERO'];
	$cedula = $usuarios['TRA_RUCCI'];
	$placa = $usuarios['TRA_PLACA'];
	$nombres = $usuarios['TRA_NOMBRES'];
	$fecha = $usuarios['TRA_FECHAEMISION'];
$textypos += 6;
$pdf->SetFont('Arial', '', 8);
$pdf->setX(2);
$pdf->Cell(2, $textypos, 'FECHA:');
$pdf->setX(25);
$pdf->Cell(2, $textypos, $fecha);
$textypos += 2;
$textypos += 6;
$pdf->setX(2);
$pdf->Cell(2, $textypos, 'NUMERO:');
$pdf->setX(25);
$pdf->Cell(8, $textypos, $numero);
$textypos += 2;	
$textypos += 6;
$pdf->setX(2);
$pdf->Cell(2, $textypos, 'CEDULA:');
$pdf->setX(25);
$pdf->Cell(2, $textypos, $cedula);
$textypos += 2;
$textypos += 6;
$pdf->setX(2);
$pdf->Cell(2, $textypos, 'PLACA:');
$pdf->setX(25);
$pdf->Cell(2, $textypos, $placa);
$textypos += 2;
$textypos += 6;
$pdf->setX(2);
$pdf->Cell(2, $textypos, 'NOMBRES:');
$textypos += 2;
$textypos += 6;
$pdf->setX(2);
$pdf->Cell(2, $textypos, $nombres);
}

$textypos += 2;
$textypos += 6;
$pdf->setX(0);
$pdf->Cell(2, $textypos, '****************************************************');

$textypos += 6;
$pdf->setX(0);
$pdf->Cell(5, $textypos, 'CANT|DETALLE                    VALOR   TOTAL');


$total = 0;
$off = $textypos += 6;
$off = $textypos += 2;
$pdf->SetFont('Arial', 'B', 6.5);

$sql2 = mysqli_query($con, "SELECT
							tra_detalle.DET_DETALLE,
							tra_detalle.DET_CANTIDAD,
							tra_detalle.DET_VALOR,
							tra_detalle.DET_TOTAL
							FROM
							tra_detalle where TRA_CODIGO = '$id_tarifario'");

while ($rubros = mysqli_fetch_array($sql2)) {
	$detalle = $rubros['DET_DETALLE'];
	$cantidad = $rubros['DET_CANTIDAD'];
	$valor = $rubros['DET_VALOR'];
	$tota = $rubros['DET_TOTAL'];

	$pdf->setX(2);
	$pdf->Cell(5, $off, $cantidad);

	$pdf->setX(5);
	$pdf->Cell(60, $off, "|". (substr($detalle, 0)));

	$pdf->setX(39);
	$pdf->Cell(10, $off, "$" . number_format($valor, 2, ".", ","), 0, 0, "R");

	$pdf->setX(48);
	$pdf->Cell(11, $off, "$" . number_format($tota, 2, ".", ","), 0, 0, "R");
	
	$off += 6;
}


$textypos = $off + 6;

$pdf->setX(20);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(50, $textypos, "TOTAL");

$sql3 = mysqli_query($con, "SELECT
							tra_tarifas.TRA_NUMERO,
							tra_tarifas.TRA_TOTAL
							
							FROM
							tra_tarifas
							WHERE
							tra_tarifas.TRA_CODIGO = '$id_tarifario'");

while($usuarios = mysqli_fetch_array($sql3)) {
	$total = $usuarios['TRA_TOTAL'];
$pdf->setX(54);
$pdf->Cell(5, $textypos, "$ " . number_format($total, 2, ".", ","), 0, 0, "R");
$pdf->setX(0);
}

$pdf->Cell(5, $textypos + 10, '**********************************************'); 


$pdf->output();
