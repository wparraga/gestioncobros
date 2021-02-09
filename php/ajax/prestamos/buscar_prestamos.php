<?php
	
	require_once ("../../../config/db.php");
    require_once ("../../../config/conexion.php");
    include ("../../../config/swee.php");
    

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    if (isset($_GET['id'])){
        $numero=intval($_GET['id']);
        $del1="delete from tra_detalle where TRA_CODIGO='".$numero."'";
        $del2="delete from tra_tarifas where TRA_CODIGO='".$numero."'";
        if ($delete1=mysqli_query($con,$del1) and $delete2=mysqli_query($con,$del2)){
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
                            title: " No se puedo eliminar los datos.",
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
    }
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
         $sTable = "vis_prestamos";
		 $sWhere = "";
		 $sWhere.="";
		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and  (cli_nombres like '%$q%' or pre_fecha like '%$q%' or pre_numero = '$q')";
			
		}
		
        $sWhere.=" order by pre_numero desc";
        
        include '../../../views/pagination.php'; 
        
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; 
		$adjacents  = 10; 
		$offset = ($page - 1) * $per_page;
		
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
        if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
		$reload = '../../../prestamos.php';
		
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		
		if ($numrows>0){
			echo mysqli_error($con);
			?>
<div class="table-responsive">
    <table class="table">
        <tr class="success">
            <th>#</th>
            <th>Fecha_Emisi&oacute;n</th>
            <th>Cliente</th>
            <th>Monto</th>
            <th>Interés</th>
            <th>Total</th>
            <th class='text-center'>Acciones</th>

        </tr>
        <?php
				while ($row=mysqli_fetch_array($query)){
						$id_prestano=$row['pre_codigo'];
						$pre_numero=$row['pre_numero'];
						$pre_fecha=$row['pre_fecha'];
                        $cli_cedula=$row['cli_cedula'];
                        $cli_nombres=$row['cli_nombres'];
                        $cli_telefono=$row['cli_telefono'];
                        $cli_dirdomicilio=$row['cli_dirdomicilio'];
                        $cli_dirtrabajo=$row['cli_dirtrabajo'];
                        $cli_referencia=$row['cli_referencia'];
                        $pre_monto=$row['pre_monto'];
                        $pre_interes=$row['pre_interes'];
                        $pre_montopagar=$row['pre_montopagar'];
                        $pre_nrocuotas=$row['pre_nrocuotas'];
					?>
        <tr>
            <td>
                <?php echo $pre_numero; ?>
            </td>
            <td>
                <?php echo $pre_fecha; ?>
            </td>
            <td>
                <?php echo $cli_nombres; ?>
            </td>
            <td>
                <?php echo '$'.$pre_monto; ?>
            </td>
            <td>
                <?php echo $pre_interes.'%'; ?>
            </td>
            <td>
                <?php echo '$'.$pre_montopagar; ?>
            </td>
            <td class="text-right">

                <a href="#" class='btn btn-default' title='Ver Cuotas' onclick="procesoVerCuotas('<?php echo $id_prestano;?>','<?php echo $pre_numero;?>','<?php echo $pre_fecha;?>','<?php echo $cli_nombres;?>','<?php echo $pre_monto;?>','<?php echo $pre_interes;?>','<?php echo $pre_montopagar;?>');return false;" data-toggle="modal" data-target="#myModalCuotas"><i class="glyphicon glyphicon-usd"></i></a>
                        
                <!--<a href="editar_tarifario.php?id_tarifario=<?php echo $id_tarifario;?>" class='btn btn-default' title='Editar Tarifario'><i class="glyphicon glyphicon-edit"></i></a>

                <a href="#" class='btn btn-default' title='Eliminar Tarifario' onclick="eliminar('<?php echo $id_tarifario; ?>')"><i class="glyphicon glyphicon-trash"></i></a>-->
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