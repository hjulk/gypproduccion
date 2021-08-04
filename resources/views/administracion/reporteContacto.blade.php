@extends("administracion.layout")

@section('titulo')
Reporte Contáctenos
@endsection

@section('contenido')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-list-alt nav-icon" id="enlace"></i> Reporte Contáctenos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                    <li class="breadcrumb-item active">Reporte Contáctenos</li>
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
                            <div class="col-md-6">
                                {!! Form::open(['id' => 'consultarContacto','name' => 'consultarContacto','files' => true,'autocomplete' => 'off','method'=>'post','enctype'=>'multipart/form-data']) !!}
                                @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Fecha Inicial</label>
                                                {!! Form::date('fechaInicio',null,['class'=>'form-control','id'=>'fechaInicio','required']) !!}
                                            </div>
                                            <div class="col-md-5">
                                                <label>Fecha Final</label>
                                                {!! Form::date('fechaFin',null,['class'=>'form-control','id'=>'fechaFin','required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        {!! Form::button('Consultar',array('class'=>'btn btn-primary pull-right','id'=>'btnConsultaContacto','tabindex'=>'16')) !!}
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
                        <table id="reporteContacto" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre Ciudadano</th>
                                    <th>Correo Electrónico</th>
                                    <th>Mensaje</th>
                                    <th>Fecha de Envió</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($Documentos as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td>{{$value['nombre_documento']}}</td>
                                        <td><span class="{{$value['label']}}" style="font-size:13px;"><b>{{$value['estado']}}</b></span></td>
                                        <td><a href="{{$value['ubicacion']}}" download><i class="fas fa-download"></i></a></td>
                                        <td>{{$value['fecha_cargue']}}</td>
                                        <td>{{$value['fecha_modificacion']}}</td>
                                        <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-documentoUpd" onclick="obtener_datos_documento('{{$value['id']}}');"><i class="fas fa-edit"></i></a></td>
                                        <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                        <input type="hidden" value="{{$value['nombre_documento']}}" id="nombre_documento{{$value['id']}}">
                                        <input type="hidden" value="{{$value['estado_activo']}}" id="estado_activo{{$value['id']}}">
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
