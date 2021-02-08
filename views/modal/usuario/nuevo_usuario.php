<div class="modal fade" id="nuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class='glyphicon glyphicon-edit'></i>
                    Agregar nuevo usuario</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" id="guardar_usuario" name="guardar_usuario">
                    <div id="resultados_ajax"></div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">Nombres</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nombres"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-sm-3 control-label">Apellidos</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_name" class="col-sm-3 control-label">Usuario</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Usuario"
                                pattern="[a-zA-Z0-9]{2,64}" title="Nombre de usuario ( sólo letras y números, 2-64 caracteres)"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Correo electrónico"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="perfil" class="col-sm-3 control-label">Perfil</label>
                    <div class="col-sm-8">
                     <select class="form-control" id="perfil" name="perfil" required>
                        <option value=""selected>-- Seleccione perfil --</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="ANT">ANT</option>
                        <option value="Avaluos y Catastro">Avaluos y Catastro</option>
                        <option value="Obras Públicas">Obras Públicas</option>
                        <option value="Patio de Máquinas">Patio de Máquinas</option>
                        <option value="Planificación">Planificación</option>
                        <option value="Recaudación">Recaudación</option>
                        <option value="Registro de la Propiedad">Registro de la Propiedad</option>
                        <option value="Rentas">Rentas</option>
                        <option value="Secretaría">Secretaría</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="estado" class="col-sm-3 control-label">Estado</label>
                    <div class="col-sm-8">
                     <select class="form-control" id="estado" name="estado" required>
                        <option value=""selected>-- Seleccione Estado --</option>
                        <option value="Habilitado">Habilitado</option>
                        <option value="Deshabilitado">Deshabilitado</option>
                      </select>
                    </div>
                  </div>
                    <div class="form-group">
                        <label for="user_password_new" class="col-sm-3 control-label">Contraseña</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="user_password_new" name="user_password_new"
                                placeholder="Contraseña" pattern=".{6,}" title="Contraseña ( min . 6 caracteres)"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_password_repeat" class="col-sm-3 control-label">Repite
                            contraseña</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="user_password_repeat" name="user_password_repeat"
                                placeholder="Repite contraseña" pattern=".{6,}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Cargar Imagén</label>
                        <div class="col-sm-8">
                            <input id="file-input" type="file" name="nuevaImagen">
                            <p class="help-block">Peso máximo de la imagen 2MB</p>   
                            <img style="border: 3px solid; color: white; filter: drop-shadow(0 4px 4px rgba(0, 0, 0, 1.7));" id="imgSalida" src="views/users/defecto.jpg" width="100px">
                        </div>
                    </div>

                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" id="guardar_datos">Guardar datos</button>
            </div>
            </form>
        </div>
    </div>
</div>