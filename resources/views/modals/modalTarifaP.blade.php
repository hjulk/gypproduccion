<div class="modal fade bd-example-modal-xl" id="modal-tarifaPUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Tarifa de Servicio de Parqueadero</h4>
            </div>
            {!! Form::open(['url' => 'actualizarTarifaP', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-rol_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_tarifaP" id="idTarifaP_upd">
                    <input type="hidden" name="tipo_tarifa_upd" id="mod_tipo_tarifaP">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Tipo Vehículo</label>
                            {!! Form::select('tarifaP_upd',$TipoTarifaPUpd,null,['class'=>'form-control','id'=>'mod_tarifaP','required']) !!}
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_tarifaP_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado_tarifaP']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Año Tarifa</label>
                            {!! Form::text('year_tarifa_upd',$yearNow,['class'=>'form-control','id'=>'mod_yearP']) !!}
                        </div>
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Tarifa día 1</label>
                            {!! Form::text('valor_tarifa_1_upd',null,['class'=>'form-control CurrencyInput','id'=>'mod_valor_tarifa_1','onkeypress'=>'return numero(event);']) !!}
                        </div>                        
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Tarifa día 2</label>
                            {!! Form::text('valor_tarifa_2_upd',null,['class'=>'form-control CurrencyInput','id'=>'mod_valor_tarifa_2','onkeypress'=>'return numero(event);']) !!}
                        </div>
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Tarifa día 3</label>
                            {!! Form::text('valor_tarifa_3_upd',null,['class'=>'form-control CurrencyInput','id'=>'mod_valor_tarifa_3','onkeypress'=>'return numero(event);']) !!}
                        </div>
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Tarifa día 4 a día 30</label>
                            {!! Form::text('valor_tarifa_4_upd',null,['class'=>'form-control CurrencyInput','id'=>'mod_valor_tarifa_4','onkeypress'=>'return numero(event);']) !!}
                        </div>
                        <div class="col-md-2">
                            <label for="exampleInputEmail1">Tarifa día 31+</label>
                            {!! Form::text('valor_tarifa_5_upd',null,['class'=>'form-control CurrencyInput','id'=>'mod_valor_tarifa_5','onkeypress'=>'return numero(event);']) !!}
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