<?php

	require_once ("../../../config/db.php");
	require_once ("../../../config/conexion.php");
	include ("../../../config/swee.php");

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$user_id=intval($_GET['id']);
		$query=mysqli_query($con, "select * from users where user_id='".$user_id."'");
		$rw_user=mysqli_fetch_array($query);
		$count=$rw_user['user_id'];
		if ($count==0){
			if ($delete1=mysqli_query($con,"DELETE FROM users WHERE user_id='".$user_id."'")){
					echo'<script>
						swal({
							type: "success",
							title: " Datos eliminados exitosamente.",
							showConfirmButton: true,
							confirmButtonColor: "#5fb45c",
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
							type: "success",
							title: " No se pudo eliminar.",
							showConfirmButton: true,
							confirmButtonColor: "#5fb45c",
							confirmButtonText: "Aceptar",
							closeOnConfirm: false
							}).then(function(result){
							if (result.value) {
								
							}
						})
					</script>';

			
		}
			
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    <strong>Error!</strong> No se puede borrar el usuario administrador.
			</div>
			<?php
		}
			
	}
	if($action == 'ajax'){
		
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('firstname', 'lastname');
		 $sTable = "users";
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
		$sWhere.=" order by user_id desc";
		include '../../../views/pagination.php'; 
		
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; 
		$adjacents  = 4; 
		$offset = ($page - 1) * $per_page;
		
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = '../../../usuarios.php';
		
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		
		if ($numrows>0){
			
			?>
<div class="table-responsive">
    <table class="table">
        <tr class="success">
            <th>ID</th>
            <th>Nombres</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Agregado</th>
            <th>Perfil</th>
            <th>Estado</th>
            <th>Foto</th>
            <th><span class="pull-right">Acciones</span></th>

        </tr>
        <?php
				while ($row=mysqli_fetch_array($query)){
						$user_id=$row['user_id'];
						$fullname=$row['firstname']." ".$row["lastname"];
						$user_name=$row['user_name'];
						$user_email=$row['user_email'];
						$date_added= date('d/m/Y', strtotime($row['date_added']));
						$user_king=$row['user_king'];
						$user_status=$row['user_status'];
						if ($user_status=="Habilitado"){$text_estado="Habilitado";$label_class='label-success';}
						else{$text_estado="Deshabilitado";$label_class='label-danger';}
						$user_picture=$row['user_foto'];
					?>

        <input type="hidden" value="<?php echo $row['firstname'];?>" id="nombres<?php echo $user_id;?>">
        <input type="hidden" value="<?php echo $row['lastname'];?>" id="apellidos<?php echo $user_id;?>">
        <input type="hidden" value="<?php echo $user_name;?>" id="usuario<?php echo $user_id;?>">
        <input type="hidden" value="<?php echo $user_email;?>" id="email<?php echo $user_id;?>">
        <input type="hidden" value="<?php echo $user_king;?>" id="perfil<?php echo $user_id;?>">
        <input type="hidden" value="<?php echo $user_status;?>" id="estado<?php echo $user_id;?>">
        <input type="hidden" value="<?php echo $user_picture;?>" id="foto<?php echo $user_id;?>">

        <tr>
            <td>
                <?php echo $user_id; ?>
            </td>
            <td>
                <?php echo $fullname; ?>
            </td>
            <td>
                <?php echo $user_name; ?>
            </td>
            <td>
                <?php echo $user_email; ?>
            </td>
            <td>
                <?php echo $date_added;?>
            </td>
            <td>
                <?php echo $user_king;?>
            </td>
            <td>
                <span class="label <?php echo $label_class;?>"><?php echo $text_estado; ?></span>
            </td>
            <td>
                <?php echo '<img style="border: 2px solid; color: white; filter: drop-shadow(0 2px 2px rgba(0, 0, 0, 1.7));" src="views/users/'.$row['user_foto'].'" width="35" height="35">';?>
            </td>
            <td><span class="pull-right">
                    <a href="#" class='btn btn-default' title='Editar usuario' onclick="obtener_datos('<?php echo $user_id;?>');"
                        data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="#" class='btn btn-default' title='Cambiar contraseña' onclick="get_user_id('<?php echo $user_id;?>');"
                        data-toggle="modal" data-target="#myModal3"><i class="glyphicon glyphicon-cog"></i></a>
            </td>

        </tr>
        <?php
				}
				?>
        <tr>
            <td colspan=9><span class="pull-right">
                    <?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
        </tr>
    </table>
</div>
<?php
		}
	}
?>