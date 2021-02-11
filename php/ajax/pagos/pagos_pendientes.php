
<?php
	include('../is_logged.php');
	require_once ("../../../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../../../config/conexion.php");//Contiene funcion que conecta a la base de datos

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

	if($action == 'ajax'){
     $q1 = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q1'], ENT_QUOTES)));
     $q2 = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q2'], ENT_QUOTES)));

		$sTable = "vis_pagospendientes";
		$sWhere = "";
		if ( $_GET['q1'] != "" && $_GET['q2'] != "" )
		{
			$sWhere = "WHERE date(cuo_fechapago) between '$q1' and '$q2'";
		}
		$sWhere.=" order by cuo_fechapago asc";
		include '../../../views/pagination.php';
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5;
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './pagos_pendientes.php';
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		if ($numrows>0){
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="success">
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Cuota</th>
					<th>Cobrador</th>
				</tr>
				<?php
					while ($row=mysqli_fetch_array($query)){
						$cuo_fechacobro=$row['cuo_fechacobro'];
						$cli_nombres=$row['cli_nombres'];
						$cuo_montocuota=$row['cuo_montocuota'];
						$cuo_cobrador=$row['cuo_cobrador'];
				?>
					<tr>
						<td><?php echo $cuo_fechacobro; ?></td>
						<td><?php echo $cli_nombres; ?></td>
						<td>$ <?php echo $cuo_montocuota; ?></td>
						<td><?php echo $cuo_cobrador; ?></td>
				<?php
				}
				?>
				<tr>
					<td colspan=6><span class="pull-right"><?echo paginate($reload, $page, $total_pages, $adjacents);?></span></td>
				</tr>
			  </table>
			  <?php
			  	$query1 = mysqli_query($con, "select sum(cuo_montocuota) from vis_pagospendientes where date(cuo_fechapago) BETWEEN '$q1' AND '$q2'");
			  	while ($row=mysqli_fetch_array($query1)){
			  		$tc=$row[0];}
			  ?>
				<div class="col-sm-2">
				  <label>Total x Recaudar: </label><input type="text" class="form-control" value="<?php echo '$'.$tc;?>" name="tc" maxlength="0" >
				</div>
			</div>
			<?php
		}
	}
?>
