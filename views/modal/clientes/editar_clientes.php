	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar clientes</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_cliente" name="editar_cliente">
			<div id="resultados_ajax2"></div>

			  <div class="form-group">
				<label for="mod_cedula" class="col-sm-3 control-label">Cédula</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_cedula" name="mod_cedula" readonly="" onKeyPress="return soloNumeros(event)"  maxlength="10">
					<input type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>


			  <div class="form-group">
				<label for="mod_nombres" class="col-sm-3 control-label">Nombres:</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_nombres" name="mod_nombres" autocomplete="off" required>
				</div>
			  </div>

			  <div class="form-group">
				<label for="mod_telefono" class="col-sm-3 control-label">Teléfono:</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_telefono" name="mod_telefono" required autocomplete="off" onKeyPress="return soloNumeros(event)"  maxlength="10" >
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="mod_direcciondo" class="col-sm-3 control-label">Dirección Domicilio:</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="mod_direcciondo" name="mod_direcciondo" ></textarea>
				</div>
			  </div>

			  <div class="form-group">
				<label for="mod_direcciontr" class="col-sm-3 control-label">Dirección Trabajo:</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="mod_direcciontr" name="mod_direcciontr" ></textarea>
				</div>
			  </div>

			  <div class="form-group">
				<label for="mod_Referencia" class="col-sm-3 control-label">Referencia:</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="mod_Referencia" name="mod_Referencia" ></textarea>
				</div>
			  </div>

			 
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
			<button type="submit" class="btn btn-success" id="actualizar_datos"><span class="glyphicon glyphicon-ok"></span> Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>