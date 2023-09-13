<div class="modal fade bd-example-modal-xl" id="modal-tipoTarifaUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Tipo Tarifa</h4>
            </div>
            {!! Form::open(['url' => 'actualizarTipoTarifa', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-rol_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_tipoTarifa" id="idTipoTarifa_upd">
                    <div class="row">
                        <div class="col-md-9">
                            <label for="exampleInputEmail1">Nombre Tipo Tarifa</label>
                            {!! Form::text('nombre_tipo_tarifa_upd',null,['class'=>'form-control','id'=>'mod_nombre_tipo_tarifa','placeholder'=>'Nombre Tarifa','required']) !!}
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_tipo_tarifa_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado_tipo_tarifa']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Actualizar Tipo Tarifa</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-xl" id="modal-nombreTarifaUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Nombre Tarifa</h4>
            </div>
            {!! Form::open(['url' => 'actualizarNombreTarifa', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-rol_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_nombreTarifa" id="idNombreTarifa_upd">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="exampleInputEmail1">Nombre Tarifa</label>
                            {!! Form::text('nombre_tarifa_upd',null,['class'=>'form-control','id'=>'mod_nombre_tarifa','placeholder'=>'Nombre Tarifa','required']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="exampleInputEmail1">Tipo Tarifa</label>
                            {!! Form::select('tipo_tarifa_upd',$TipoTarfifaActivo,null,['class'=>'form-control','id'=>'mod_tipo_tarifa']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_nombre_tarifa_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado_nombre_tarifa']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Actualizar Nombre Tarifa</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>