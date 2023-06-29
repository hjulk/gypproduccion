{{-- <div class="modal fade bd-example-modal-xl" id="modal-imagenUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Imagen</h4>
            </div>
            {!! Form::open(['url' => 'actualizarImagen', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-imagen_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_imagen" id="idImagen_upd">
                    <input type="hidden" name="id_pagina_upd" id="mod_id_pagina">
                    <input type="hidden" name="id_subpagina_upd" id="mod_id_subpagina">
                    <input type="hidden" name="id_tipo_grua_upd" id="mod_id_tipo_grua">
                    <input type="hidden" name="id_fin_ano" id="mod_fin_ano">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Nombre Imagen</label>
                            {!! Form::text('nombre_imagen_upd',null,['class'=>'form-control','id'=>'mod_nombre_imagen','placeholder'=>'Nombre Imagen','required']) !!}
                        </div>
                        <div class="col-md-3">
                            <label>Página Principal</label>
                            {!! Form::text('nombre_pagina',null,['class'=>'form-control','id'=>'mod_nombre_pagina','required','readonly']) !!}
                        </div>
                        <div class="col-md-3" id="inputSubpaginaUpd">
                            <label>Subpágina</label>
                            {!! Form::text('nombre_subpagina',null,['class'=>'form-control','id'=>'mod_nombre_subpagina','readonly']) !!}
                        </div>
                        <div class="col-md-3" id="inputGruaUpd">
                            <label>Tipo Grúa</label>
                            {!! Form::text('nombre_grua',null,['class'=>'form-control','id'=>'mod_nombre_grua','readonly']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3" id="activacionTextoUpd">
                            <input type="checkbox" id="activarTextoUpd" name="activarTextoUpd" onclick="activarTextoImagenUpd();"/> Agregar texto o descripción
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9" id="campoTextoImagenUpd">
                            <label>A continuación escriba el texto o descripción de la imagen</label>
                            {!! Form::textarea('textoImagenForm_upd',null,['class'=>'form-control','id'=>'mod_textoImagenForm','placeholder'=>'Ingrese el contenido la desfijación','rows'=>'4', 'cols' => '100']) !!}
                        </div>
                        <div class="col-md-3" id="campoOrdenImagenUpd">
                            <label>Orden o lugar de ubicación en la página</label>
                            {!! Form::select('id_ordenPagina_upd',$OrdenImagenes,null,['class'=>'form-control','id'=>'mod_id_ordenPagina']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="checkbox" id="activarImagen_upd" name="activarImagen_upd" onclick="actualizarImagen();"/> Cambiar Imagen
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6" id="imageUpdate">
                            <label>Archivo en formato jpg o png</label>
                            <input type="file" name="imagen_upd" id="mod_imagen_upd" accept="image/jpg,image/png" class="form-control" size="2048">
                            <div align="right"><small class="text-muted">Tamaño maximo en total permitido (2MB), si se supera este tamaño, su archivo no será cargado. Solo se permite formato jpg y png.</small><span id="cntDescripHechos" align="right"> </span></div>
                            <span id="field2_area1" hidden><input type="file" id="imagen2" name="imagen2" class="form-control"/></span>
                        </div>
                        <div class="col-md-3">
                            <label>Pie de Imagen</label>
                            {!! Form::text('pie_imagen_upd',null,['class'=>'form-control','id'=>'mod_pie_imagen','placeholder'=>'Pie de Imagen','required']) !!}
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado','required']) !!}
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
</div> --}}

<div class="modal fade bd-example-modal-xl" id="modal-settlementConsultationUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Imagen</h4>
            </div>
            {!! Form::open(['url' => 'actualizarImagenSettlementConsultation', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-imagen_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_imagenSettlementConsultation" id="idImagenSettlementConsultation_upd">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Nombre Imagen</label>
                            {!! Form::text('nombre_imagen_upd',null,['class'=>'form-control','id'=>'mod_nombre_imagen','placeholder'=>'Nombre Imagen','required']) !!}
                        </div>
                        <div class="col-md-4">
                            <label>Pie de Imagen</label>
                            {!! Form::text('pie_imagen_upd',null,['class'=>'form-control','id'=>'mod_pie_imagen','placeholder'=>'Pie de Imagen','required']) !!}
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado','required']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="checkbox" id="activarImagen_upd" name="activarImagen_upd" onclick="actualizarImagen();"/> Cambiar Imagen
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12" id="imageUpdate">
                            <label>Archivo en formato jpg o png</label>
                            <input type="file" name="imagen_upd" id="mod_imagen_upd" accept="image/jpg,image/png" class="form-control" size="2048">
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
