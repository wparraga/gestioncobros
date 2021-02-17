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
	if (empty($_POST['mod_abonocuota'])) {
        $errors[] = "Abono de Cuota vacío";	
    } else if ($_POST['mod_abonocuota']>$montocuota){
			$errors[] = "El abono no puede ser mayor que la cuota";	
	} else if (
		!empty($_POST['mod_abonocuota'])
	){
	$abonocuota=doubleval($_POST['mod_abonocuota']);
	//$saldocuota=doubleval($_POST['mod_saldocuota']);
    $date=date("Y-m-d H:i:s");
    $usuario= $_SESSION['user_name'];
    if($abonocuota==$montocuota){
    	$sql1="UPDATE prestamos set pre_montototal=pre_montototal-'".$abonocuota."' WHERE pre_codigo='".$id_prestamo."'";
		$sql2="UPDATE cuotas SET cuo_fechacobro='".$date."',cuo_abonocuota=cuo_abonocuota+'".$abonocuota."',cuo_montocuota=cuo_montocuota-'".$abonocuota."',cuo_estado='PAGADO',cuo_cobrador='".$usuario."' 
		WHERE cuo_codigo='".$id_cuota."'";
		$sql3="INSERT INTO abonos(cuo_codigo,abo_fecha,abo_valor)VALUES('".$id_cuota."','".$date."','".$abonocuota."')";
    }else{
    	$sql1="UPDATE prestamos set pre_montototal=pre_montototal-'".$abonocuota."' WHERE pre_codigo='".$id_prestamo."'";
		$sql2="UPDATE cuotas SET cuo_fechacobro='".$date."',cuo_abonocuota='".$abonocuota."',cuo_montocuota=cuo_montocuota-'".$abonocuota."',cuo_estado='PENDIENTE',cuo_cobrador='".$usuario."' 
		WHERE cuo_codigo='".$id_cuota."'";
		$sql3="INSERT INTO abonos(cuo_codigo,abo_fecha,abo_valor)VALUES('".$id_cuota."','".$date."','".$abonocuota."')";

    }
		$query_update1 = mysqli_query($con,$sql1);
		$query_update2 = mysqli_query($con,$sql2);
		$query_update3 = mysqli_query($con,$sql3);
		if ($query_update1 && $query_update2 && $query_update3){
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
		}else{
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