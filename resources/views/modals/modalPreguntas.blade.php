<div class="modal fade bd-example-modal-xl" id="modal-preguntaUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Pregunta Frecuente</h4>
            </div>
            {!! Form::open(['url' => 'actualizarPregunta', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-preguntas_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_pregunta" id="idPregunta_upd">
                    <div class="row">
                        <div class="col-md-9">
                            <label>Título pregunta</label>
                            {!! Form::text('titulo_pregunta_upd',null,['class'=>'form-control','id'=>'mod_titulo_pregunta','placeholder'=>'Pregunta frecuente','required']) !!}
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado', 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>A continuación escriba el texto de la pregunta frecuente a publicar en la página</label>
                        {!! Form::textarea('contenidoPregunta_upd',null,['class'=>'form-control','id'=>'mod_contenidoPregunta','placeholder'=>'Ingrese el contenido la pregunta','rows'=>'10', 'cols' => '100','required']) !!}
                    </div>
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Actualizar Pregunta</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>
