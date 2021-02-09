<?php
	include('../is_logged.php');
	require_once ("../../../config/db.php");
	require_once ("../../../config/conexion.php");
	include ("../../../config/swee.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
		if (isset($_GET['id'])){
		$id_cliente=intval($_GET['id']);
		$query=mysqli_query($con, "select * from prestamos where cli_codigo='".$id_cliente."'");
		$count=mysqli_num_rows($query);
		if ($count==0){
			if ($delete1=mysqli_query($con,"DELETE FROM clientes WHERE cli_codigo='".$id_cliente."'")){
				echo'<script>
						swal({
							type: "success",
							title: " Datos eliminados exitosamente.",
							showConfirmButton: true,
							confirmButtonColor: "#d9534f",
							confirmButtonText: "Aceptar",
							closeOnConfirm: false
							}).then(function(result){
							if (result.value) {
								
							}
						})
					</script>';
		}else {
			echo'<script>
						swal({
							type: "error",
							title: " Algo a salido mal, intente nuevamente.",
							showConfirmButton: true,
							confirmButtonColor: "#d9534f",
							confirmButtonText: "Aceptar",
							closeOnConfirm: false
							}).then(function(result){
							if (result.value) {
							}
						})
					</script>';
			
		}
			
		} else {
			echo'<script>
						swal({
							type: "error",
							title: " No se pudo eliminar éste cliente. Tiene deudas pendientes o Prestamos vinculados.",
							showConfirmButton: true,
							confirmButtonColor: "#d9534f",
							confirmButtonText: "Aceptar",
							closeOnConfirm: false
							}).then(function(result){
							if (result.value) {
							}
						})
					</script>';

		}	
	}
	
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('cli_cedula','cli_nombres');
		 $sTable = "clientes";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by cli_nombres";
		include '../../../views/pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = '../../../clientes.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="success">
					<th>Cédula</th>
					<th>Nombres</th>
					<th>Teléfono</th>
					<th class='text-right'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$cli_codigo=$row['cli_codigo'];
						$cli_cedula=$row['cli_cedula'];
						$cli_nombres=$row['cli_nombres'];
						$cli_telefono=$row['cli_telefono'];
						$cli_dirdomicilio=$row['cli_dirdomicilio'];
						$cli_dirtrabajo=$row['cli_dirtrabajo'];
						$cli_referencia=$row['cli_referencia'];
					?>
					
					<input type="hidden" value="<?php echo $cli_cedula;?>" id="cli_cedula<?php echo $cli_codigo;?>">
					<input type="hidden" value="<?php echo $cli_nombres;?>" id="cli_nombres<?php echo $cli_codigo;?>">
					<input type="hidden" value="<?php echo $cli_telefono;?>" id="cli_telefono<?php echo $cli_codigo;?>">
					<input type="hidden" value="<?php echo $cli_dirdomicilio;?>" id="cli_dirdomicilio<?php echo $cli_codigo;?>">
					<input type="hidden" value="<?php echo $cli_dirtrabajo;?>" id="cli_dirtrabajo<?php echo $cli_codigo;?>">
					<input type="hidden" value="<?php echo $cli_referencia;?>" id="cli_referencia<?php echo $cli_codigo;?>">
					<tr>
					

						<td><?php echo $cli_cedula; ?></td>
						

						<td><a href="#" data-toggle="tooltip" data-placement="top" 
					 title="<i class='glyphicon glyphicon-phone'></i><?php echo $cli_telefono;?><br>
       						<i class='glyphicon glyphicon-envelope'></i><?php echo $cli_dirdomicilio;?><br>
							<i class='glyphicon glyphicon-envelope'></i><?php echo $cli_dirtrabajo;?><br>
							<i class='glyphicon glyphicon-envelope'></i><?php echo $cli_referencia;?>
       						"><?php echo $cli_nombres;?></a></td>

						<td><?php echo $cli_telefono;?></td>
					<td ><span class="pull-right">

					<a href="#" class='btn btn-default' title='Editar cliente' onclick="obtener_datos('<?php echo $cli_codigo;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="#" class='btn btn-default' title='Eliminar cliente' onclick="eliminar('<?php echo $cli_codigo; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>