<div class="modal fade bd-example-modal-xl" id="modal-tipoImagenInicioUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Tipo Imágen de Inicio</h4>
            </div>
            {!! Form::open(['url' => 'actualizarTipoImagenInicio', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-rol_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_tipoImagenInicio" id="idTipoImagenInicio_upd">
                    <div class="row">
                        <div class="col-md-9">
                            <label for="exampleInputEmail1">Nombre Tipo Imágen</label>
                            {!! Form::text('nombre_inicio_upd',null,['class'=>'form-control','id'=>'mod_nombre_inicio','placeholder'=>'Nombre Grúa','required']) !!}
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_inicio_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado_inicio']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Actualizar Tipo de Imágen</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-xl" id="modal-tipoImagenServicioUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Tipo Imágen de servicio</h4>
            </div>
            {!! Form::open(['url' => 'actualizarTipoImagenServicio', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-rol_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_tipoImagenServicio" id="idTipoImagenServicio_upd">
                    <div class="row">
                        <div class="col-md-9">
                            <label for="exampleInputEmail1">Nombre Tipo Imágen</label>
                            {!! Form::text('nombre_servicio_upd',null,['class'=>'form-control','id'=>'mod_nombre_servicio','placeholder'=>'Nombre Imágen','required']) !!}
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_servicio_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado_servicio']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Actualizar Tipo de Imágen</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>
