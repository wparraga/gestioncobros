<?php
if (isset($_GET['term'])){
include("../../../../config/db.php");
include("../../../../config/conexion.php");
$return_arr = array();
/* If connection to database, run sql statement. */
if ($con)
{
	
	$fetch = mysqli_query($con,"SELECT * FROM clientes where cli_nombres like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Retrieve and store in array the results of the query.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$cli_codigo=$row['cli_codigo'];
		$row_array['value'] = $row['cli_nombres'];
		$row_array['cli_codigo']=$cli_codigo;
		$row_array['cli_nombres']=$row['cli_nombres'];
		$row_array['cli_telefono']=$row['cli_telefono'];
		$row_array['cli_direccion1']=$row['cli_dirdomicilio'];
		$row_array['cli_direccion2']=$row['cli_dirtrabajo'];
		array_push($return_arr,$row_array);
    }
	
}

/* Free connection resources. */
mysqli_close($con);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>