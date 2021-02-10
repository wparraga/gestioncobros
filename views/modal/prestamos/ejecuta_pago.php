<?php
		if (isset($con))
		{
	?>
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Ejecutar pago de Cuota</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" id="ejecutarpago_cuota" name="ejecutarpago_cuota">
                    <div id="resultados_ajax3"></div>
                    <input type="hidden" name="mod_id" id="mod_id">

                    <div class="form-group">
                        <label for="mod_fechapago" class="col-sm-3 control-label">Fecha Pago:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mod_fechapago" name="mod_fechapago" disabled="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mod_numero" class="col-sm-3 control-label">Nro. Cuota:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mod_numero" name="mod_numero" disabled="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mod_montocuota" class="col-sm-3 control-label">Valor Cuota:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mod_montocuota" name="mod_montocuota" disabled="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mod_estado" class="col-sm-3 control-label">Estado:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mod_estado" name="mod_estado" disabled="true">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" id="actualizar_datos">Registrar Pago</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
		}
	?>