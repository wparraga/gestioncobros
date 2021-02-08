
<?php
		if (isset($con))
		{
?>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i>
                    Editar usuario</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" id="editar_usuario" name="editar_usuario">
                    <div id="resultados_ajax2"></div>
                    <div class="form-group">
                        <label for="firstname2" class="col-sm-3 control-label">Nombres</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="firstname2" name="firstname2" placeholder="Nombres"
                                required>
                            <input type="hidden" id="mod_id" name="mod_id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname2" class="col-sm-3 control-label">Apellidos</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lastname2" name="lastname2" placeholder="Apellidos"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_name2" class="col-sm-3 control-label">Usuario</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="user_name2" name="user_name2" placeholder="Usuario"
                                pattern="[a-zA-Z0-9]{2,64}" title="Nombre de usuario ( sólo letras y números, 2-64 caracteres)"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_email2" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="user_email2" name="user_email2" placeholder="Correo electrónico" required>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="user_king2" class="col-sm-3 control-label">Perfil</label>
                    <div class="col-sm-8">
                     <select class="form-control" id="user_king2" name="user_king2" required>
                        <option value=""selected>-- Seleccione perfil --</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="ANT">ANT</option>
                        <option value="Avaluos y Catastro">Avaluos y Catastro</option>
                        <option value="Obras Públicas">Obras Públicas</option>
                        <option value="Planificación">Planificación</option>
                        <option value="Recaudación">Recaudación</option>
                        <option value="Registro de la Propiedad">Registro de la Propiedad</option>
                        <option value="Rentas">Rentas</option>
                        <option value="Secretaría">Secretaría</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="user_status2" class="col-sm-3 control-label">Estado</label>
                    <div class="col-sm-8">
                     <select class="form-control" id="user_status2" name="user_status2" required>
                        <option value=""selected>-- Seleccione Estado --</option>
                        <option value="Habilitado">Habilitado</option>
                        <option value="Deshabilitado">Deshabilitado</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Cargar Imagén</label>
                        <div class="col-sm-8">
                            <input id="file-edit" type="file" name="editarImagen">
                            <p class="help-block">Peso máximo de la imagen 2MB</p>  
                            <img style="border: 3px solid; color: white; filter: drop-shadow(0 4px 4px rgba(0, 0, 0, 1.7));" id="imgEdit" src="views/users/defecto.jpg" class="previsualizar" width="100px">
                        </div>
                   </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" id="actualizar_datos">Actualizar datos</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
		}
	?>