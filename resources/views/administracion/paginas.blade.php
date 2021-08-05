@extends("administracion.layout")

@section('titulo')
Listado Páginas
@endsection

@section('contenido')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-desktop nav-icon" id="enlace"></i> Listado Páginas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                    <li class="breadcrumb-item active">Listado Páginas</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header" id="principalCard">
                        <h3 class="card-title" id="tituloCard"><strong>Crear Página</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12" id="imgCard">
                                <picture>
                                    <source srcset="{{asset("images/pagina.webp") }}" type="image/webp"/>
                                    <source srcset="{{asset("images/pagina.png") }}" type="image/png"/>
                                    <img src="{{asset("images/pagina.webp") }}" id="imgCard" alt="Roles" class="img-responsive"/>
                                </picture>
                            </div>
                        </div>
                        <br>
                        {!! Form::open(['url' => 'crearPagina', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-create_pagina']) !!}
                        @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="exampleInputEmail1">Nombre Página</label>
                                        {!! Form::text('nombre_pagina',null,['class'=>'form-control','id'=>'nombre_pagina','placeholder'=>'Nombre Página','required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success float-right">Crear Página</button>
                            </div>
                        {!!  Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <table id="pagina" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre Página</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Paginas as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td>{{$value['nombre_pagina']}}</td>
                                        <td><span class="{{$value['label']}}" style="font-size:13px;"><b>{{$value['estado']}}</b></span></td>
                                        <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-paginaUpd" onclick="obtener_datos_pagina('{{$value['id']}}');"><i class="fas fa-edit"></i></a></td>
                                        <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                        <input type="hidden" value="{{$value['nombre_pagina']}}" id="nombre_pagina{{$value['id']}}">
                                        <input type="hidden" value="{{$value['estado_activo']}}" id="estado_activo{{$value['id']}}">
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header" id="principalCard">
                        <h3 class="card-title" id="tituloCard"><strong>Crear Subpágina</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12" id="imgCard">
                                <picture>
                                    <source srcset="{{asset("images/subpagina.webp") }}" type="image/webp"/>
                                    <source srcset="{{asset("images/subpagina.png") }}" type="image/png"/>
                                    <img src="{{asset("images/subpagina.webp") }}" id="imgCard" alt="Roles" class="img-responsive"/>
                                </picture>
                            </div>
                        </div>
                        <br>
                        {!! Form::open(['url' => 'crearSubPagina', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-create_subpagina']) !!}
                        @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="exampleInputEmail1">Nombre Subpágina</label>
                                        {!! Form::text('nombre_subpagina',null,['class'=>'form-control','id'=>'nombre_subpagina','placeholder'=>'Nombre Subpágina','required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="exampleInputEmail1">Página</label>
                                        {!! Form::select('id_pagina',$ListaPaginas,null,['class'=>'form-control','id'=>'id_pagina','required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success float-right">Crear Subpágina</button>
                            </div>
                        {!!  Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <table id="subpagina" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Página</th>
                                    <th>Nombre Subpágina</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Subpaginas as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td>{{$value['pagina']}}</td>
                                        <td>{{$value['nombre_subpagina']}}</td>
                                        <td><span class="{{$value['label']}}" style="font-size:13px;"><b>{{$value['estado']}}</b></span></td>
                                        <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-subpaginaUpd" onclick="obtener_datos_subpagina('{{$value['id']}}');"><i class="fas fa-edit"></i></a></td>
                                        <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                        <input type="hidden" value="{{$value['nombre_subpagina']}}" id="nombre_subpagina{{$value['id']}}">
                                        <input type="hidden" value="{{$value['id_pagina']}}" id="id_pagina{{$value['id']}}">
                                        <input type="hidden" value="{{$value['estado_activo']}}" id="estado_activo{{$value['id']}}">
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include("modals.modalPaginas")
@endsection
@section('scripts')
    <script>
        @if (session("mensaje"))
            toastr.success("{{ session("mensaje") }}");
        @endif

        @if (session("precaucion"))
            toastr.warning("{{ session("precaucion") }}");
        @endif

        @if (count($errors) > 0)
            @foreach($errors -> all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
@endsection
