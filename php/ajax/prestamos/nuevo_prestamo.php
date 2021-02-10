<?php

include("../../../config/db.php");
include("../../../config/conexion.php");


$id_cliente = intval($_POST['id_cliente']);
$monto = floatval($_POST['monto']);
$nrocuotas = intval($_POST['nrocuotas']);
$interes = floatval($_POST['interes']);
$montopagar = floatval($_POST['montopagar']);

$valor_cuota=0;
$valor_cuota=$montopagar/$nrocuotas;

$sql = mysqli_query($con, "SELECT LAST_INSERT_ID(pre_numero) as last FROM prestamos order by pre_codigo desc limit 0,1 ");
$rw = mysqli_fetch_array($sql);
$numero_prestamo = $rw['last'] + 1;
$fecha=date("Y-m-d");
$insert=mysqli_query($con,"
INSERT INTO prestamos (
cli_codigo,
pre_numero,
pre_fecha,
pre_monto,
pre_nrocuotas,
pre_interes,
pre_montopagar,
pre_montototal) VALUES 
('$id_cliente',
 '$numero_prestamo',
 '$fecha',
 '$monto',
 '$nrocuotas',
 '$interes',
 '$montopagar',
 '$montopagar')");

$query=mysqli_query($con,"select distinct last_insert_id() from prestamos");
while($r=mysqli_fetch_row($query)){
    $id_prestamo=$r[0];
}
$nums = 1;
while ($nums<=$nrocuotas) {
    $sql = mysqli_query($con, "SELECT LAST_INSERT_ID(cuo_numero) as last FROM cuotas where pre_codigo='$id_prestamo' order by cuo_codigo desc limit 0,1 ");
        $rw = mysqli_fetch_array($sql);
        $numero_cuota = $rw['last'] + 1;

        $fecha_actual = date("Y-m-d");
        //sumo 1 día
        $fecha_pago=date("Y-m-d",strtotime($fecha_actual."+ ".$nums." days")); 


  
    $insert=mysqli_query($con,"INSERT INTO cuotas
        (pre_codigo,
         cuo_numero,
         cuo_fechapago,
         cuo_montocuota,
         cuo_estado,
         cuo_formapago) VALUES 
        ('$id_prestamo',
         '$numero_cuota',
         '$fecha_pago',
         '$valor_cuota',
         'PENDIENTE',
         'DIARIA')");
    $nums++;
}
?>