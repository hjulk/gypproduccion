@extends("administracion.layout")

@section('titulo')
Reporte Hojas de Vida
@endsection

@section('contenido')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-list-alt nav-icon" id="enlace"></i> Reporte Hojas de Vida</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                    <li class="breadcrumb-item active">Reporte Hojas de Vida</li>
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
                        <h3 class="card-title" id="tituloCard"><strong>Reporte Envios Hojas de Vida</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::open(['id' => 'consultarHojaVida','name' => 'consultarContacto','files' => true,'autocomplete' => 'off','method'=>'post','enctype'=>'multipart/form-data']) !!}
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
                                        {!! Form::button('Consultar',array('class'=>'btn btn-primary pull-right','id'=>'btnConsultaHojaVida','tabindex'=>'16')) !!}
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
                    <div class="card-body" id="panelResultado">
                        <table id="reporteHojaVida" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre Ciudadano</th>
                                    <th>Tipo Documento</th>
                                    <th>Identificación</th>
                                    <th>Dirección</th>
                                    <th>Correo Electrónico</th>
                                    <th>Telefóno</th>
                                    <th>Profesión</th>
                                    <th>Nombre Documento</th>
                                    <th>Fecha de Envió</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
