<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	$active_prestamos="active";	
	$title="Gestion de Cobros";
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	include ("config/swee.php");
?>
<script type="text/javascript">
		function calcularmonto(monto,interes){
		var txtmonto = monto.value;
		var txtinteres = interes.value;
		var montototal = parseFloat(txtmonto)+((parseFloat(txtmonto)*parseFloat(txtinteres))/100);
            montototal=montototal.toFixed(2);

            if (!isNaN(montototal)) {
                document.getElementById('montopagar').value = montototal;}
	}
	

</script>
<html lang="es">
  <head>
    <?php include("views/head.php");?>
  </head>
  <body>
	<?php
	include("views/navbar.php");
	?>  
    <div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i> Prestamos</h4>
		</div>
		<div class="panel-body">
		<?php 
			//include("modal/buscar_productos.php");
			//include("modal/registro_clientes.php");
			//include("modal/registro_productos.php");
		?>
			<form class="form-horizontal" role="form" id="datos_prestamos">
				<div class="form-group row">

				  <label for="nombre_cliente" class="col-md-1 control-label">Cliente:</label>
				  <div class="col-md-2">
					  <input type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Seleccione un cliente" required>
					  <input id="id_cliente" name="id_cliente" type='hidden'>	
				  </div>
				  
				<label for="tel1" class="col-md-1 control-label">Teléfono:</label>
				<div class="col-md-2">
					<input type="text" class="form-control input-sm" id="tel1" placeholder="Teléfono" readonly>
				</div>
				<label for="dir1" class="col-md-1 control-label">Domicilio:</label>
				<div class="col-md-2">
					<input type="text" class="form-control input-sm" id="dir1" placeholder="Dirección Domicilio" readonly>
				</div>
				<label for="dir2" class="col-md-1 control-label">Trabajo:</label>
				<div class="col-md-2">
					<input type="text" class="form-control input-sm" id="dir2" placeholder="Dirección Trabajo" readonly>
				</div>
				 </div>
						<div class="form-group row">
							<!--<label for="empresa" class="col-md-1 control-label">Administrador:</label>
							<div class="col-md-2">
								<select class="form-control input-sm" id="id_vendedor" disabled>
									<?php
										$sql_vendedor=mysqli_query($con,"select * from users order by lastname");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["user_id"];
											$nombre_vendedor=$rw["firstname"]." ".$rw["lastname"];
											if ($id_vendedor==$_SESSION['user_id']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>
							</div>-->
							<label for="tel2" class="col-md-1 control-label">Fecha_Emisión:</label>
							<div class="col-md-1">
								<input type="datetime" class="form-control input-sm" id="fecha" value="<?php echo date("Y-m-d");?>" required>
							</div>
							<label for="monto" class="col-md-1 control-label">Monto:</label>
							<div class="col-md-1">
								<input type="text" class="form-control input-sm" id="monto" name="monto" placeholder="Ingrese Monto"  maxlength="8" required="" onkeypress="return soloDecimales(event,this);" onkeyup="calcularmonto(monto,interes);"/>
							</div>
							<label for="nrocuotas" class="col-md-1 control-label">Nro_Cuotas:</label>
							<div class="col-md-1">
								<input type="text" class="form-control input-sm" id="nrocuotas" name="nrocuotas" placeholder="Ingrese Nro. Cuotas"  maxlength="2" required="" onkeypress="return soloNumeros(event,this);"/>
							</div>
							<label for="interes" class="col-md-1 control-label">Interés%:</label>
							<div class="col-md-1">
								<input type="text" class="form-control input-sm" id="interes" name="interes" placeholder="Ingrese Interés"  maxlength="5" required="" onkeypress="return soloDecimales(event,this);" onkeyup="calcularmonto(monto,interes);"/>
							</div>
							<label for="montopagar" class="col-md-1 control-label">Monto_Pagar:</label>
							<div class="col-md-1">
								<input type="text" class="form-control input-sm" id="montopagar" name="montopagar" placeholder="Monto a Pagar"  maxlength="10" required="" onkeypress="return soloDecimales(event,this);" readonly/>
							</div>
							<br>
							<div class="pull-right">
								<a  href="nueva_ventaItems.php?del=<?php echo $id_vendedor;?>" class="btn btn-default"><span class="glyphicon glyphicon-remove" ></span> Cancelar</a>
								 <button type="submit" class="btn btn-default">
								  <span class="glyphicon glyphicon-saved"></span> Guardar</button>
							</div>	
						</div>
			</form>	
			
		<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			
		</div>
	</div>		
		  <div class="row-fluid">
			<div class="col-md-12">
			
			</div>	
		 </div>
	</div>
	<hr>
	<?php
	include("views/footer.php");
	?>
	<!--<script type="text/javascript" src="js/VentanaCentrada.js"></script>-->
	<script type="text/javascript" src="js/nuevo_prestamo.js"></script>
	<link rel="stylesheet" href="views/css/jquery-ui.css">
    <script type="text/javascript" src="js/jquery/jquery-ui.js"></script>
	<script>
		$(function() {
						$("#nombre_cliente").autocomplete({
							source: "php/ajax/clientes/autocomplete/clientes.php",
							minLength: 2,
							select: function(event, ui) {
								event.preventDefault();
								$('#id_cliente').val(ui.item.cli_codigo);
								$('#nombre_cliente').val(ui.item.cli_nombres);
								$('#tel1').val(ui.item.cli_telefono);
								$('#dir1').val(ui.item.cli_direccion1);
								$('#dir2').val(ui.item.cli_direccion2);
																
								
							 }
						});
						 
						
					});
					
	$("#nombre_cliente" ).on( "keydown", function( event ) {
						if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
						{
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#dir1" ).val("");
							$("#dir2" ).val("");
											
						}
						if (event.keyCode==$.ui.keyCode.DELETE){
							$("#nombre_cliente" ).val("");
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#dir1" ).val("");
							$("#dir2" ).val("");
						}
			});	
	</script>

  </body>
</html>