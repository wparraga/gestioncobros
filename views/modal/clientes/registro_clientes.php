	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo cliente</h4>
		  </div>
		  <div class="modal-body" id="limpia">
		  <form class="form-horizontal" method="post" id="guardar_cliente" name="guardar_cliente">
			<div id="resultados_ajax"></div>

			  <div class="form-group">
				<label for="cedula" class="col-sm-3 control-label">Cédula:</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="cedula" name="cedula" required autocomplete="off" onKeyPress="return soloNumeros(event)"  maxlength="10">
				</div>
			  </div>

			  <div class="form-group">
				<label for="nombres" class="col-sm-3 control-label">Nombres:</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombres" name="nombres" autocomplete="off" required>
				</div>
			  </div>

			  <div class="form-group">
				<label for="telefono" class="col-sm-3 control-label">Teléfono:</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="telefono" name="telefono" required autocomplete="off" onKeyPress="return soloNumeros(event)"  maxlength="10" >
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="direcciondo" class="col-sm-3 control-label">Dirección Domicilio:</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="direcciondo" name="direcciondo" ></textarea>
				</div>
			  </div>

			  <div class="form-group">
				<label for="direcciontr" class="col-sm-3 control-label">Dirección Trabajo:</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="direcciontr" name="direcciontr" ></textarea>
				</div>
			  </div>

			  <div class="form-group">
				<label for="Referencia" class="col-sm-3 control-label">Referencia:</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="Referencia" name="Referencia" ></textarea>
				</div>
			  </div>
			  

		  </div>
		  <div class="modal-footer">
		  	<button class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
			<button type='submit' class="btn btn-success" id="guardar_datos"><span class="glyphicon glyphicon-ok"></span> Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>

	<?php
		}
	?>