<div class="modal fade bd-example-modal-xl" id="modal-tipoGruaUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Tipo Grúa</h4>
            </div>
            {!! Form::open(['url' => 'actualizarTipoGrua', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-rol_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_tipoGrua" id="idTipoGrua_upd">
                    <div class="row">
                        <div class="col-md-9">
                            <label for="exampleInputEmail1">Nombre Tipo Grúa</label>
                            {!! Form::text('nombre_grua_upd',null,['class'=>'form-control','id'=>'mod_nombre_grua','placeholder'=>'Nombre Grúa','required']) !!}
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Actualizar Grúa</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>
