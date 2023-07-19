@extends("administracion.layout")

@section('titulo')
Imágenes Pagina de Inicio
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset("adminlte/plugins/summernote/summernote-bs4.css")}}">
@endsection
@section('contenido')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-file nav-icon" id="enlace"></i> Imágenes Página de Inicio</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                    <li class="breadcrumb-item active"><a href="imagenes">Imagenes</a></li>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" id="principalCard">
                                <a href="imagesBanner" id="tituloCard"><h3 class="card-title"><b>Menú Banner <i class="fa fa-arrow-circle-right"></i></b></h3></a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12" id="imgCard">
                                        <a href="imagesBanner"><img src="{{asset("images/seccion_banner.png") }}" alt=""></a>
                                    <br><br>
                                        <p>Banner</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" id="principalCard">
                                <a href="imagesBannerM" id="tituloCard"><h3 class="card-title"><b>Menú Banner Móvil <i class="fa fa-arrow-circle-right"></i></b></h3></a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12" id="imgCard">
                                        <a href="imagesBannerM"><img src="{{asset("images/seccion_banner.png") }}" alt=""></a>
                                    <br><br>
                                        <p>Banner versión móvil</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>             
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" id="principalCard">
                                <a href="imagesCarousel" id="tituloCard"><h3 class="card-title"><b>Menú Carousel <i class="fa fa-arrow-circle-right"></i></b></h3></a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12" id="imgCard">
                                        <a href="imagesCarousel"><img src="{{asset("images/seccion_carrusel.png") }}" alt=""></a>
                                    <br><br>
                                        <p>Carrusel</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" id="principalCard">
                                <a href="imagesCarouselM" id="tituloCard"><h3 class="card-title"><b>Menú Carousel Móvil <i class="fa fa-arrow-circle-right"></i></b></h3></a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12" id="imgCard">
                                        <a href="imagesCarouselM"><img src="{{asset("images/seccion_carrusel.png") }}" alt=""></a>
                                    <br><br>
                                        <p>Carrusel versión móvil</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" id="principalCard">
                                <h3 class="card-title" id="tituloCard"><strong>Cargar Imagen Página Inicio</strong></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Form::open(['url' => 'crearImagenHomePage', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-imagen']) !!}
                                        @csrf
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="exampleInputEmail1">Nombre Imagen</label>
                                                        {!! Form::text('nombre_imagen_homePage',null,['class'=>'form-control','id'=>'nombre_imagen_homePage','placeholder'=>'Nombre Imagen','required']) !!}
                                                    </div>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Tipo Imagen</label>
                                                        {!! Form::select('tipo_imagen',$TipoImagen,null,['class'=>'form-control','id'=>'tipo_imagen','required']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Pie de Imagen</label>
                                                        {!! Form::text('pie_imagen',$PiePagina,['class'=>'form-control','id'=>'pie_imagen','placeholder'=>'Pie de Imagen','required']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Archivo de Imagen</label>
                                                        <input type="file" name="imagen" id="imagen" accept=".jpg,.png" required class="form-control" size="2048" required>
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
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <table id="inicio" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre Imagen</th>
                                    <th>Tipo Imagen</th>
                                    <th>Descargar</th>
                                    <th>Estado</th>
                                    <th>Fecha de Cargue</th>
                                    <th>Fecha Actualización</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Inicio as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td>{{$value['nombre_imagen']}}</td>
                                        <td>{{$value['imagen']}}</td>
                                        <td style="text-align: center;"><a href="{{$value['ubicacion']}}" target="_blank"><i class="fas fa-download"></i></a></td>
                                        <td><span class="{{$value['label']}}" style="font-size:13px;"><b>{{$value['estado']}}</b></span></td>
                                        <td>{{$value['fecha_cargue']}}</td>
                                        <td>{{$value['fecha_modificacion']}}</td>
                                        <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-homePageUpd" onclick="obtener_datos_imagen_homePage('{{$value['id']}}');"><i class="fas fa-edit"></i></a></td>
                                        <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                        <input type="hidden" value="{{$value['nombre_imagen']}}" id="nombre_imagen{{$value['id']}}">
                                        <input type="hidden" value="{{$value['estado_activo']}}" id="estado_activo{{$value['id']}}">
                                        <input type="hidden" value="{{$value['pie_imagen']}}" id="pie_imagen{{$value['id']}}">
                                        <input type="hidden" value="{{$value['tipo_imagen']}}" id="tipo_imagen{{$value['id']}}">
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

@include("modals.modalImagenHomePage")
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
