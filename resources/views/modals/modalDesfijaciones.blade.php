<div class="modal fade bd-example-modal-xl" id="modal-desfijacionUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Desfijación</h4>
            </div>
            {!! Form::open(['url' => 'actualizarDesfijacion', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-rol_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>A continuación escriba el texto de la desfijación a publicar en la página</label>
                        {!! Form::textarea('contenidoDesfijacion_upd',null,['class'=>'form-control','id'=>'mod_contenidoDesfijacion','placeholder'=>'Ingrese el contenido la noticia','rows'=>'10', 'cols' => '100','required']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id_desfijacion" id="idDesfijacion_upd">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Actualizar Desfijación</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>
