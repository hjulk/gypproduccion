<div class="modal fade bd-example-modal-xl" id="modal-imagenUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Imagen</h4>
            </div>
            {!! Form::open(['url' => 'actualizarImagen', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-imagen_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_imagen" id="idImagen_upd">
                    <div class="row">
                        <div class="col-md-9">
                            <label for="exampleInputEmail1">Nombre Imagen</label>
                            {!! Form::text('nombre_imagen_upd',null,['class'=>'form-control','id'=>'mod_nombre_imagen','placeholder'=>'Nombre Imagen','required']) !!}
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Página Principal</label>
                            {!! Form::select('id_pagina_upd',$ListaPaginas,null,['class'=>'form-control','id'=>'mod_id_pagina','required','onchange'=>'subpaginaFuncionUpd();']) !!}
                        </div>
                        <div class="col-md-6" id="mod_inputSubpagina">
                            <label>Subpágina</label>
                            {!! Form::select('id_subpagina_upd',$ListadoSubpaginas,null,['class'=>'form-control','id'=>'mod_id_subpagina']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="checkbox" id="activarImagen" name="activarImagen" onclick="actualizarImagen();"/> Cambiar Imagen
                        </div>
                        <div class="col-md-9" id="imageUpdate">
                            <label>Archivo en formato pdf</label>
                            <input type="file" name="imagen_upd" id="mod_imagen_upd" accept=".jpg,.png" class="form-control" size="2048">
                            <div align="right"><small class="text-muted">Tamaño maximo en total permitido (2MB), si se supera este tamaño, su archivo no será cargado.</small><span id="cntDescripHechos" align="right"> </span></div>
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
