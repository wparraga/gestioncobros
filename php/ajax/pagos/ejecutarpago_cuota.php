<?php
	include('../is_logged.php');
	$id_prestamo= $_SESSION['id_prestamo'];
	
	require_once ("../../../config/db.php");
    require_once ("../../../config/conexion.php");
    include ("../../../config/swee.php");
    $montocuota=0;
    $id_cuota=$_POST['mod_id'];
    $sql="SELECT * FROM cuotas WHERE cuo_codigo='".$id_cuota."'";
	$query = mysqli_query($con, $sql);
	while ($row=mysqli_fetch_array($query)){
		$montocuota=$row['cuo_montocuota'];
	}
    $date=date("Y-m-d H:i:s");
    $usuario= $_SESSION['user_name'];
    $sql1="UPDATE prestamos set pre_montototal=pre_montototal-'".$montocuota."' WHERE pre_codigo='".$id_prestamo."'";
		
	$sql2="UPDATE cuotas SET 
		cuo_fechacobro='".$date."',  
		cuo_estado='PAGADO',
		cuo_cobrador='".$usuario."'
		WHERE cuo_codigo='".$id_cuota."'";
		$query_update1 = mysqli_query($con,$sql1);
		$query_update2 = mysqli_query($con,$sql2);
			if ($query_update1 && $query_update2){
				echo'<script>
						swal({
							type: "success",
							title: " Pago realizado exitosamente.",
							showConfirmButton: true,
							confirmButtonColor: "#5fb45c",
							confirmButtonText: "Aceptar",
							closeOnConfirm: false
							}).then(function(result){
							if (result.value) {
								location.reload(true);
							}
						})
					</script>';
                
			} else{
				$errors []= "algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		

		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>