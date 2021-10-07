<div class="modal fade bd-example-modal-xl" id="modal-notificacionUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Notificación</h4>
            </div>
            {!! Form::open(['url' => 'actualizarNotificacion', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-notificacion_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Nombre Ciudadano</label>
                        {!! Form::text('nombre_ciudadano_upd',null,['class'=>'form-control','id'=>'mod_nombre_ciudadano','placeholder'=>'Nombre Ciudadano','required']) !!}
                    </div>
                    <div class="col-md-3">
                        <label>Placa Vehículo</label>
                        {!! Form::text('placa_upd',null,['class'=>'form-control','id'=>'mod_placa','placeholder'=>'Placa Vehículo','required','maxlength="6" oninput="if(this.value.length > this.maxLength)
                        this.value = this.value.slice(0, this.maxLength)";','onkeypress="return check(event);"']) !!}
                        <div align="right"><small class="text-muted">Escriba la placa sin guion.</small><span id="cntDescripHechos" align="right"> </span></div>
                    </div>
                    <div class="col-md-3">
                        <label>Año de Reporte</label>
                        {!! Form::text('year_notification_upd',null,['class'=>'form-control','id'=>'mod_year_notification','placeholder'=>'Año','onkeypress="return soloNumero(event)"','maxlength="4" oninput="if(this.value.length > this.maxLength)
                        this.value = this.value.slice(0, this.maxLength)";','required']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id_notificacion" id="idNotificacion_upd">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado','required']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Actualizar Notificación</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>
