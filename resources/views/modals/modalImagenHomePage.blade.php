<div class="modal fade bd-example-modal-xl" id="modal-homePageUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Imagen Página Inicio</h4>
            </div>
            {!! Form::open(['url' => 'actualizarImagenHomePage', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-imagen_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_imagenHomePage" id="idImagenHomePage_upd">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Nombre Imagen</label>
                            {!! Form::text('nombre_imagen_upd',null,['class'=>'form-control','id'=>'mod_nombre_imagen_inicio','placeholder'=>'Nombre Imagen','required']) !!}
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Tipo imágen</label>
                            {!! Form::select('tipo_imagen_upd',$TipoImagenUpd,null,['class'=>'form-control','id'=>'mod_tipo_imagen','required']) !!}
                        </div> 
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_upd',$Estado,null,['class'=>'form-control','id'=>'mod_estado_inicio','required']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-8">
                            <label>Pie de Imagen</label>
                            {!! Form::text('pie_imagen_upd',$PiePagina,['class'=>'form-control','id'=>'mod_pie_imagen_inicio','placeholder'=>'Pie de Imagen','required']) !!}
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" id="activarImagenHomePage_upd" name="activarImagen_upd" onclick="actualizarImagenHomePage();"/> Cambiar Imagen
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12" id="imageHomePageUpdate">
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