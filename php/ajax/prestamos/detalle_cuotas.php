<?php
    require_once ("../../../config/db.php");
	require_once ("../../../config/conexion.php");
?>
<div class="table-responsive">
    <table class="table">
        <?php   
            $resultado = $_POST['id_prestamo']; 
            $num = $_POST['numero']; 
            $fec = $_POST['fecha'];
            $cli = $_POST['cliente'];
            $total = $_POST['total'];
            $inte = $_POST['interes'];
            $montototal = $_POST['montototal'];
            $montopagado = $_POST['montopagado'];
            echo '<label>Prestamo #:</label> '.$num.'</br>';
            echo '<label>Fecha:</label> '.$fec.'</br>';
            echo '<label>Cliente:</label> '.$cli.'</br>';
            echo '<label>Monto: $</label>'.$total.'</br>';
            echo '<label>Interes:</label> '.$inte.'%</br>';
            echo '<label>Monto Total: $</label> '.$montototal.'</br>';
            echo '<label>Monto Pagado: $</label>'.$montopagado;
        ?>
        <thead>
            <tr class="well">
                <th>#Cuota.</th>
                <th>FechaPago</th>
                <th>Cuota</th>
                <th>Estado</th>
            </tr>
        </thead>
        <?php
        	$sql="select * 
                  from cuotas 
                  where pre_codigo='$resultado'";
        	$query = mysqli_query($con,$sql); 
            while ($fila = mysqli_fetch_row($query)) {
        ?>
        <tbody>
            <tr>
                <td><?php echo $fila[2]; ?></td>
                <td><?php echo $fila[3]; ?></td>
                <td>$<?php echo $fila[5]; ?></td>
                <td><?php echo $fila[6]; ?></td>
            </tr>
        </tbody>

        <?php } ?>
    </table>
</div>
