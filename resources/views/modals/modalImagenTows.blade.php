<div class="modal fade bd-example-modal-xl" id="modal-towsUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Imagen Grúa</h4>
            </div>
            {!! Form::open(['url' => 'actualizarImagenTows', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-imagen_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_imagenTows" id="idImagenTows_upd">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="exampleInputEmail1">Nombre Imagen</label>
                            {!! Form::text('nombre_imagen_upd',null,['class'=>'form-control','id'=>'mod_nombre_imagen_gruas','placeholder'=>'Nombre Imagen','required']) !!}
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado_gruas','required']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="exampleInputEmail1">Tipo y ubicación imágen</label>
                            {!! Form::select('tipo_grua_upd',$TipoGruaUpd,null,['class'=>'form-control','id'=>'mod_tipo_grua','required']) !!}
                            <div align="left"><small class="text-muted">El numero que se encuentra a cada lado del tipo de la grúa, es la ubicación en la página 1 (izquierda) y 2 (derecha).</small><span id="cntDescripHechos" align="right"> </span></div>
                        </div>
                        <div class="col-md-4">
                            <label>Pie de Imagen</label>
                            {!! Form::text('pie_imagen_upd',$PiePagina,['class'=>'form-control','id'=>'mod_pie_imagen_gruas','placeholder'=>'Pie de Imagen','required']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="checkbox" id="activarImagenGruas_upd" name="activarImagen_upd" onclick="actualizarImagenGruas();"/> Cambiar Imagen
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12" id="imageGruasUpdate">
                            <label>Archivo en formato jpg o png</label>
                            <input type="file" name="imagen_upd" id="mod_imagen_upd" accept=".jpg,.png" class="form-control" size="2048">
                            <div align="right"><small class="text-muted">Tamaño maximo en total permitido (2MB), si se supera este tamaño, su archivo no será cargado. Solo se permite formato jpg y png.</small><span id="cntDescripHechos" align="right"> </span></div>
                            <span id="field2_area1" hidden><input type="file" id="imagen2" name="imagen2" class="form-control"/></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Actualizar Imagen</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>