<?php
	include('../is_logged.php');
	$id_prestamo= $_SESSION['id_prestamo'];
	$pre_numero= $_SESSION['pre_numero'];
	require_once ("../../../config/db.php");
	require_once ("../../../config/conexion.php");
?>
<div class="table-responsive">
<table class="table">
<tr>
    <th>#Cuota</th>
    <th>FechaPago</th>
    <th>Cuota</th>
    <th>Estado</th>
	<th></th>
</tr>
<?php
    $fechaActual= date("Y-m-d");
	$sql=mysqli_query($con, "select * from cuotas where pre_codigo='$id_prestamo'");
	while ($row = mysqli_fetch_array($sql)){
		$cuo_codigo=$row['cuo_codigo'];
		$pre_codigo=$row['pre_codigo'];
		$cuo_numero=$row['cuo_numero'];
        $cuo_fechapago=$row['cuo_fechapago'];
        $cuo_fechacobro=$row['cuo_fechacobro'];
        $cuo_montocuota=$row['cuo_montocuota'];
        $cuo_abonocuota=$row['cuo_abonocuota'];
        $cuo_estado=$row['cuo_estado'];
        if ($cuo_estado=='PAGADO'){
            $estilo='display:none';
        }else{ $estilo='';}
        $cuo_formapago=$row['cuo_formapago'];
        if (($fechaActual==$cuo_fechapago))
            {$label_class='label-success';
        }else{$label_class='';}
        if ($cuo_fechapago<$fechaActual){
            $label_class='label-danger';
        }                       
?>
<input type="hidden" value="<?php echo $cuo_fechapago;?>" id="cuo_fechapago<?php echo $cuo_codigo;?>"/>
<input type="hidden" value="<?php echo $cuo_numero;?>" id="cuo_numero<?php echo $cuo_codigo;?>"/>
<input type="hidden" value="<?php echo $cuo_montocuota;?>" id="cuo_montocuota<?php echo $cuo_codigo;?>"/>
<input type="hidden" value="<?php echo $cuo_estado;?>" id="cuo_estado<?php echo $cuo_codigo;?>"/>
<tr class="<?php echo $label_class;?>" style="<?php echo $estilo;?>">
    <td><?php echo $cuo_numero; ?></td>
    <td><?php echo $cuo_fechapago; ?></td>
    <td>$<?php echo $cuo_montocuota; ?></td>
    <td><?php echo $cuo_estado; ?></td>
    <td class='text-center'><button id="botonpagar" type='button' class="btn btn-primary" title='Ejecutar Pago' onclick="obtenerdatoscuota('<?php echo $cuo_codigo;?>');"data-toggle="modal" data-target="#myModal3"><span class="glyphicon glyphicon-plus" ></span> Pagar</button> </td>
</tr>		
<?php
	}	
?>
</table>
</div>
