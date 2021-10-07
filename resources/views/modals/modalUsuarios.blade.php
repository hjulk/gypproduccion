<div class="modal fade bd-example-modal-xl" id="modal-userUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Usuario</h4>
            </div>
            {!! Form::open(['url' => 'actualizarUsuario', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-user_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_user" id="idUser_upd">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Nombre Usuario</label>
                                {!! Form::text('nombre_usuario_upd',null,['class'=>'form-control','id'=>'mod_nombre_usuario','placeholder'=>'Nombre Usuario']) !!}
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Correo Electrónico</label>
                                {!! Form::email('correo_upd',null,['class'=>'form-control','id'=>'mod_correo','placeholder'=>'Correo Electrónico']) !!}
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Usuario</label>
                                {!! Form::text('username_upd',null,['class'=>'form-control','id'=>'mod_username','placeholder'=>'Usuario']) !!}
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Super Administrador</label>
                                {!! Form::select('administrador_upd',$Administrador,null,['class'=>'form-control','id'=>'mod_administrador']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Contraseña</label>
                                {!! Form::input('password','password_upd',null,['class'=>'form-control','id'=>'mod_password','placeholder'=>'Contraseña','type'=>'password']) !!}
                                <div class="form-group-append">
                                    <button id="show_password" class="btn btn-outline-primary" type="button" onclick="mostrarContrasenaUpd()"> <span class="fa fa-eye-slash icon"></span> Mostrar Contraseña</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Rol</label>
                                {!! Form::select('id_rol_upd',$Roles,null,['class'=>'form-control','id'=>'mod_id_rol']) !!}
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Dependencia</label>
                                {!! Form::select('id_dependencia_upd',$Dependencias,null,['class'=>'form-control','id'=>'mod_id_dependencia']) !!}
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputEmail1">Estado</label>
                                {!! Form::select('estado_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Actualizar Usuario</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>
