<div class="modal fade bd-example-modal-xl" id="modal-paginaUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Página</h4>
            </div>
            {!! Form::open(['url' => 'actualizarPagina', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-rol_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_pagina" id="idPagina_upd">
                    <div class="row">
                        <div class="col-md-9">
                            <label for="exampleInputEmail1">Nombre Página</label>
                            {!! Form::text('nombre_pagina_upd',null,['class'=>'form-control','id'=>'mod_nombre_pagina','placeholder'=>'Nombre Página','required']) !!}
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputEmail1">Estado</label>
                            {!! Form::select('estado_pupd',$Estado,null,['class'=>'form-control','id'=>'mod_estado_p']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Actualizar Página</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-xl" id="modal-subpaginaUpd" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modal-title-primary">Actualizar Subpágina</h4>
            </div>
            {!! Form::open(['url' => 'actualizarSubpagina', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-rol_upd']) !!}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_subpagina" id="idSubpagina_upd">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Nombre Subpágina</label>
                            {!! Form::text('nombre_subpagina_upd',null,['class'=>'form-control','id'=>'mod_nombre_subpagina','placeholder'=>'Nombre Subpágina','required']) !!}
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputEmail1">Página</label>
                            {!! Form::select('id_pagina_upd',$ListaPaginas,null,['class'=>'form-control','id'=>'mod_id_pagina']) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
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
                <button type="submit" class="btn btn-success">Actualizar Subpágina</button>
            </div>
            {!!  Form::close() !!}
        </div>
    </div>
</div>
