<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	$active_prestamos="active";
	$title="Gestion de Cobros";
?>
<html lang="en">
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
		    <div class="pull-right">
				 <a  href="nuevo_prestamo.php" class="btn btn-success"><span class="glyphicon glyphicon-plus" ></span> Nuevo Prestamo</a>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Clientes</h4>
		</div>
		<div class="panel-body">
			<?php
				include("views/modal/prestamos/detalle_cuotas.php");
			?>
			<form class="form-horizontal" role="form" id="">
				<div class="form-group row">
					<label for="q" class="col-md-2 control-label">Cliente</label>
					<div class="col-md-5">
						<input type="text" class="form-control" id="q" placeholder="Nombre del cliente" onkeyup='load(1);'>
					</div>
					<div class="col-md-3">
						<input type="button" name="boto" onclick='load(1);' style="display: none;"><span id="loader"></span>
					</div>	
				</div>
			</form>
			<div id="resultados"></div><!-- Carga los datos ajax -->
			<div class='outer_div'></div><!-- Carga los datos ajax -->		
        </div>
    </div>	 
	</div>
	<hr>
	<?php
	include("views/footer.php");
	?>
	<script type="text/javascript" src="js/prestamos.js"></script>
  </body>
</html>
