<?php
	include('../is_logged.php');
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['mod_cedula'])) {
           $errors[] = "Cédula vacío";
        }else if (empty($_POST['mod_nombres'])) {
           $errors[] = "Nombres vacío";
		}  else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_cedula']) &&
			!empty($_POST['mod_nombres'])
		){
		require_once ("../../../config/db.php");
		require_once ("../../../config/conexion.php");
		include ("../../../config/swee.php");
		$id_cliente=intval($_POST['mod_id']);
		$nombres=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombres"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["mod_telefono"],ENT_QUOTES)));
		$direcciondo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_direcciondo"],ENT_QUOTES)));
		$direcciontr=mysqli_real_escape_string($con,(strip_tags($_POST["mod_direcciontr"],ENT_QUOTES)));
		$referencia=mysqli_real_escape_string($con,(strip_tags($_POST["mod_Referencia"],ENT_QUOTES)));

		$sql="UPDATE clientes SET cli_nombres='".$nombres."', cli_telefono='".$telefono."', cli_dirdomicilio='".$direcciondo."', cli_dirtrabajo='".$direcciontr."', cli_referencia='".$referencia."' WHERE cli_codigo='".$id_cliente."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
					echo'<script>
						swal({
							type: "success",
							title: " Cliente actualizado exitosamente.",
							showConfirmButton: true,
							confirmButtonColor: "#d9534f",
							confirmButtonText: "Aceptar",
							closeOnConfirm: false
							}).then(function(result){
							if (result.value) {
								location.reload(true);
							}
						})
					</script>';
			} else{
				$errors []= "Algo ha salido mal intente nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
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