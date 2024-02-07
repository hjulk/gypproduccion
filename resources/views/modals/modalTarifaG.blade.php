<div class="modal fade bd-example-modal-xl" id="modal-tarifaGUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Tarifa de Servicio de gRÚA</h4>
            </div>
            {!! Form::open(['url' => 'actualizarTarifaG', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-rol_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_tarifaG" id="idTarifaG_upd">
                    <input type="hidden" name="tipo_tarifa_upd" id="mod_tipo_tarifaG">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Tipo Vehículo</label>
                            {!! Form::select('tarifaG_upd',$TipoTarifaGUpd,null,['class'=>'form-control','id'=>'mod_tarifaG','required']) !!}
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Tarifa Grúa</label>
                            {!! Form::text('valor_tarifa_unica_upd',null,['class'=>'form-control CurrencyInput','id'=>'mod_valor_tarifa_unica','onkeypress'=>'return numero(event);']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Año Tarifa</label>
                            {!! Form::text('year_tarifa_upd',$yearNow,['class'=>'form-control','id'=>'mod_yearG']) !!}
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_tarifaG_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado_tarifaG']) !!}
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Actualizar Tarifa</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>