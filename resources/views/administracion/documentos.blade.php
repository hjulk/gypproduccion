@extends("administracion.layout")

@section('titulo')
Documentos
@endsection

@section('contenido')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-file nav-icon" id="enlace"></i> Documentos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                    <li class="breadcrumb-item active">Documentos</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="principalCard">
                        <h3 class="card-title" id="tituloCard"><strong>Cargar Documento</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4" id="imgCard">
                                <picture>
                                    <source srcset="{{asset("images/documentos.webp") }}" type="image/webp"/>
                                    <source srcset="{{asset("images/documentos.png") }}" type="image/png"/>
                                    <img src="{{asset("images/documentos.webp") }}" id="imgCard" alt="Documentos" class="img-responsive"/>
                                </picture>
                            </div>
                            <div class="col-md-8">
                                {!! Form::open(['url' => 'crearDocumento', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-documento']) !!}
                                @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="exampleInputEmail1">Solo debe haber un documento activo por tipo de documento, excepto los documentos de normatividad.</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="exampleInputEmail1">Nombre Documento</label>
                                                {!! Form::text('nombre_documento',null,['class'=>'form-control','id'=>'nombre_documento','placeholder'=>'Nombre Documento','required']) !!}
                                            </div>
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail1">Tipo Documento</label>
                                                {!! Form::select('tipo_documento',$TipoDocumentos,null,['class'=>'form-control','id'=>'tipo_documento','required']) !!}
                                            </div>
                                            <div class="col-md-5">
                                                <label>Archivo en formato pdf</label>
                                                <input type="file" name="documento" id="documento" accept=".pdf" required class="form-control" size="2048" required>
                                                <div align="right"><small class="text-muted">Tamaño maximo en total permitido (2MB), si se supera este tamaño, su archivo no será cargado.</small><span id="cntDescripHechos" align="right"> </span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-success float-right">Crear Documento</button>
                                    </div>
                                {!!  Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="roles" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre Documento</th>
                                    <th>Estado</th>
                                    <th>Tipo Documento</th>
                                    <th>Descargar</th>
                                    <th>Fecha de Cargue</th>
                                    <th>Fecha Actualización</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Documentos as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td>{{$value['nombre_documento']}}</td>
                                        <td><span class="{{$value['label']}}" style="font-size:13px;"><b>{{$value['estado']}}</b></span></td>
                                        <td>{{$value['nombre_tipo_documento']}}</td>
                                        <td><a href="{{$value['ubicacion']}}" target="_blank"><i class="fas fa-download"></i></a></td>
                                        <td>{{$value['fecha_cargue']}}</td>
                                        <td>{{$value['fecha_modificacion']}}</td>
                                        <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-documentoUpd" onclick="obtener_datos_documento('{{$value['id']}}');"><i class="fas fa-edit"></i></a></td>
                                        <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                        <input type="hidden" value="{{$value['nombre_documento']}}" id="nombre_documento{{$value['id']}}">
                                        <input type="hidden" value="{{$value['tipo_documento']}}" id="tipo_documento{{$value['id']}}">
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
@include("modals.modalDocumento")
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
