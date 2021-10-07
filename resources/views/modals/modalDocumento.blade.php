<div class="modal fade bd-example-modal-xl" id="modal-documentoUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Documento</h4>
            </div>
            {!! Form::open(['url' => 'actualizarDocumento', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-documento_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_documento" id="idDocumento_upd">
                    <input type="hidden" name="tipo_documento_upd" id="mod_tipo_documento">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Nombre Documento</label>
                            {!! Form::text('nombre_documento_upd',null,['class'=>'form-control','id'=>'mod_nombre_documento','placeholder'=>'Nombre Documento','required']) !!}
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Tipo Documento</label>
                            {!! Form::text('nombre_tipo_documento',null,['class'=>'form-control','id'=>'mod_nombre_tipo_documento','readonly','required']) !!}
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado','required']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Archivo en formato pdf</label>
                            <input type="file" name="documento_upd" id="mod_documento_upd" accept=".pdf" class="form-control" size="2048">
                            <div align="right"><small class="text-muted">Tamaño maximo en total permitido (2MB), si se supera este tamaño, su archivo no será cargado.</small><span id="cntDescripHechos" align="right"> </span></div>
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
