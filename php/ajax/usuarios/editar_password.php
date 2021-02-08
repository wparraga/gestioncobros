<?php
		
		if (empty($_POST['user_id_mod'])){
			$errors[] = "ID vacío";
		}  elseif (empty($_POST['user_password_new3']) || empty($_POST['user_password_repeat3'])) {
            $errors[] = "Contraseña vacía";
        } elseif ($_POST['user_password_new3'] !== $_POST['user_password_repeat3']) {
            $errors[] = "No coinciden, escriba la misma contraseña en ambos casilleros";
        }  elseif (
			 !empty($_POST['user_id_mod'])
			&& !empty($_POST['user_password_new3'])
            && !empty($_POST['user_password_repeat3'])
            && ($_POST['user_password_new3'] === $_POST['user_password_repeat3'])
        ) {
            require_once ("../../../config/db.php");
			require_once ("../../../config/conexion.php");
			include ("../../../config/swee.php");
			
				$user_id=intval($_POST['user_id_mod']);
				$user_password = $_POST['user_password_new3'];
				
				$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
					
                    $sql = "UPDATE users SET user_password_hash='".$user_password_hash."' WHERE user_id='".$user_id."'";
                    $query = mysqli_query($con,$sql);

                    if ($query) {                       
                        echo'<script>
                                swal({
                                    type: "success",
                                    title: " contraseña ha sido modificada con éxito.",
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
                    } else {
                        echo'<script>
                                swal({
                                    type: "success",
                                    title: " Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.",
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
                    }
                
            
        } else {
            $errors[] = "Un error desconocido ocurrió.";
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