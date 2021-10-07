<div class="modal fade bd-example-modal-xl" id="modal-tipoDocumentoUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Tipo Documento</h4>
            </div>
            {!! Form::open(['url' => 'actualizarTipoDocumento', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-rol_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_tipoDocumento" id="idTipoDocumento_upd">
                    <div class="row">
                        <div class="col-md-9">
                            <label for="exampleInputEmail1">Nombre Tipo Documento</label>
                            {!! Form::text('nombre_documento_upd',null,['class'=>'form-control','id'=>'mod_nombre_documento','placeholder'=>'Nombre Documento','required']) !!}
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
                <button type="submit" class="btn btn-success">Actualizar Documento</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>
