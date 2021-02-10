<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	$title="Gestion de Cobros";
	$active_pagos="active";
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	if (isset($_GET['id_prestamo']))
	{
		$id_prestamo=intval($_GET['id_prestamo']);
		$campos="pre_codigo,pre_numero,pre_fecha,cli_cedula,cli_nombres,cli_telefono,cli_dirdomicilio,cli_dirtrabajo,pre_monto,pre_nrocuotas,pre_interes,pre_montopagar,pre_montototal";
		$sql_prestamo=mysqli_query($con,"select $campos from vis_prestamos where pre_codigo='".$id_prestamo."'");
		$count=mysqli_num_rows($sql_prestamo);
		if ($count==1)
		{
				$row=mysqli_fetch_array($sql_prestamo);
				$id_prestamo=$row['pre_codigo'];
                $pre_numero=$row['pre_numero'];
                $pre_fecha=$row['pre_fecha'];
                $cli_cedula=$row['cli_cedula'];
                $cli_nombres=$row['cli_nombres'];
                $cli_telefono=$row['cli_telefono'];
                $cli_dirdomi=$row['cli_dirdomicilio'];
                $cli_dirtrab=$row['cli_dirtrabajo'];
                $pre_monto=$row['pre_monto'];
                $pre_nrocuotas=$row['pre_nrocuotas'];
                $pre_interes=$row['pre_interes'];
                $pre_montopagar=$row['pre_montopagar'];
                $pre_montototal=$row['pre_montototal'];

				$_SESSION['id_prestamo']=$id_prestamo;
				$_SESSION['pre_numero']=$pre_numero;
		}	

	} 

?>
<html lang="es">
  <head>
    <?php include 'views/head.php';?>
  </head>
  <body>
	<?php include 'views/navbar.php';?>
    <div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i> Registro de Pagos</h4>
		</div>
		<div class="panel-body">
		<?php 
			include('views/modal/prestamos/ejecuta_pago.php');
		?>
			<form class="form-horizontal" role="form" id="datos_prestamos">
					<div class="form-group">

                        <label for="cli_nombres" class="col-md-1 control-label">Cliente:</label>
						<div class="col-md-2">
							<input type="text" class="form-control input-sm" value="<?php echo $cli_nombres;?>" readonly>
						</div>
						<label for="cli_telefono" class="col-md-1 control-label">Teléfono:</label>
						<div class="col-md-2">
							<input type="text" class="form-control input-sm" value="<?php echo $cli_telefono;?>" readonly>
						</div>
						<label for="cli_dirdomi" class="col-md-1 control-label">Domicilio:</label>
						<div class="col-md-2">
							<input type="text" class="form-control input-sm" value="<?php echo $cli_dirdomi;?>" readonly>
						</div>
						<label for="cli_dirtrab" class="col-md-1 control-label">Trabajo:</label>
						<div class="col-md-2">
							<input type="text" class="form-control input-sm" value="<?php echo $cli_dirtrab;?>" readonly>
						</div>
                        <label for="tel2" class="col-md-1 control-label">Fecha_Emisión:</label>
						<div class="col-md-1">
							<input type="datetime" class="form-control input-sm" value="<?php echo $pre_fecha;?>" readonly>
						</div>
						<label for="monto" class="col-md-1 control-label">Monto:</label>
						<div class="col-md-1">
							<input type="text" class="form-control input-sm" value="<?php echo $pre_monto;?>" readonly/>
						</div>
						<label for="nrocuotas" class="col-md-1 control-label">Nro_Cuotas:</label>
						<div class="col-md-1">
							<input type="text" class="form-control input-sm" value="<?php echo $pre_nrocuotas;?>" readonly/>
						</div>
						<label for="interes" class="col-md-1 control-label">Interés%:</label>
						<div class="col-md-1">
							<input type="text" class="form-control input-sm" value="<?php echo $pre_interes;?>" readonly />
						</div>
						<label for="montopagar" class="col-md-1 control-label">Monto_Pagar:</label>
						<div class="col-md-1">
							<input type="text" class="form-control input-sm" value="<?php echo $pre_montopagar;?>" readonly/>
						</div>
						<label for="montopagar" class="col-md-1 control-label">Monto_Pagado:</label>
						<div class="col-md-1">
							<input type="text" class="form-control input-sm" value="<?php echo $pre_montototal;?>" readonly/>
						</div>
			</form>	
			<div class="clearfix">
				
			</div>
			
		<div id="resultados" class='col-md-12' style="margin-top:10px"></div>
			
		</div>
	</div>		
		 
	</div>
	<hr>
	<?php
	include('views/footer.php');
	?>
	<script type="text/javascript" src="js/registrar_pagos.js"></script>
	


  </body>
</html>