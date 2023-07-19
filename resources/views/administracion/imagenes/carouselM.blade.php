@extends("administracion.layout")

@section('titulo')
Imágenes Sección Carrusel Móvil
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset("adminlte/plugins/summernote/summernote-bs4.css")}}">
@endsection
@section('contenido')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-file nav-icon" id="enlace"></i> Imágenes Sección Carrusel Móvil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                    <li class="breadcrumb-item active"><a href="imagenes">Imagenes</a></li>
                    <li class="breadcrumb-item active"><a href="imagesHomePage">Imagenes Página Inicio</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header" id="principalCard">
                        <h3 class="card-title" id="tituloCard"><strong>Cargar Imagen Carrusel Móvil</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open(['url' => 'crearImagenCarouselMovil', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-imagen']) !!}
                                @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="exampleInputEmail1">Nombre Imagen</label>
                                                {!! Form::text('nombre_imagen_carouselMovil',null,['class'=>'form-control','id'=>'nombre_imagen_carouselMovil','placeholder'=>'Nombre Imagen','required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="exampleInputEmail1">Orden Imagen</label>
                                                {!! Form::select('orden',$Orden,null,['class'=>'form-control','id'=>'orden','required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Archivo de Imagen</label>
                                                <input type="file" name="imagen" id="imagen" accept="image/jpg,image/png" required class="form-control" size="2048" required>
                                                <div align="right"><small class="text-muted">Tamaño maximo en total permitido (250kB), si se supera este tamaño, su archivo no será cargado. Solo se permite formato jpg y png.</small><span id="cntDescripHechos" align="right"> </span></div>
                                                <span id="field2_area" hidden><input type="file" id="imagen1" name="imagen1" class="form-control"/></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-success float-right">Crear Imagen</button>
                                    </div>
                                {!!  Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <table id="carouselMovil" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre Imagen</th>
                                    <th>Descargar</th>
                                    <th>Estado</th>
                                    <th>Orden Imagen</th>
                                    <th>Fecha de Cargue</th>
                                    <th>Fecha Actualización</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($CarouselM as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td>{{$value['nombre_imagen']}}</td>
                                        <td style="text-align: center;"><a href="{{$value['ubicacion']}}" target="_blank"><i class="fas fa-download"></i></a></td>
                                        <td><span class="{{$value['label']}}" style="font-size:13px;"><b>{{$value['estado']}}</b></span></td>
                                        <td>{{$value['orden']}}</td>
                                        <td>{{$value['fecha_cargue']}}</td>
                                        <td>{{$value['fecha_modificacion']}}</td>
                                        <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-carouselMovilUpd" onclick="obtener_datos_imagen_carouselMovil('{{$value['id']}}');"><i class="fas fa-edit"></i></a></td>
                                        <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                        <input type="hidden" value="{{$value['nombre_imagen']}}" id="nombre_imagen_carouselMovil{{$value['id']}}">
                                        <input type="hidden" value="{{$value['estado_activo']}}" id="estado_activo{{$value['id']}}">
                                        <input type="hidden" value="{{$value['orden']}}" id="orden{{$value['id']}}">
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
@include("modals.modalImagenCarouselM")
@include("modals.modalAlertas")
@endsection
@section('scripts')
<script>
    @if (session("mensaje"))
        $("#modalExitoso").modal("show");
        document.getElementById("exitoAlert").innerHTML = "{{ session("mensaje") }}";
    @endif

    @if (session("precaucion"))
        $("#modalError").modal("show");
        document.getElementById("errorAlert").innerHTML = "{{ session("precaucion") }}";
    @endif

    @if (count($errors) > 0)
    $("#modalError").modal("show");
        @foreach($errors -> all() as $error)
            document.getElementById("errorAlert").innerHTML = "{{ $error }}";
        @endforeach
    @endif
</script>
@endsection
