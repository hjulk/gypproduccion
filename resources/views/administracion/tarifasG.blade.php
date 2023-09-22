@extends("administracion.layout")

@section('titulo')
Tarifas Grúa
@endsection
@section('contenido')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-file nav-icon" id="enlace"></i> Servicio de grúas en la ciudad de Bogotá.</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                    <li class="breadcrumb-item active">Tarifas Grúa</li>
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
                        <h3 class="card-title" id="tituloCard"><strong>Servicio de grúas en la ciudad de Bogotá.</strong></h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'crearTarifaG', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-notificacion']) !!}
                        @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Tipo Vehículo</label>
                                        {!! Form::select('tipo_vehiculo',$TipoTarifaG,null,['class'=>'form-control','id'=>'tipo_vehiculo','required']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="exampleInputEmail1">Tarifa Grúa</label>
                                        {!! Form::text('valor_tarifa_unica',null,['class'=>'form-control CurrencyInput','id'=>'valor_tarifa_unica','onkeypress'=>'return numero(event);']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Año Tarifa</label>
                                        {!! Form::text('year_tarifa',$yearNow,['class'=>'form-control','id'=>'year_tarifa','readonly']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success float-left">Crear Tarifa de Grúa</button>
                            </div>
                        {!!  Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <table id="organigrama" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tipo de vehículo</th>
                                    <th>Tarifa Grúa</th>
                                    <th>Año</th>
                                    <th>Estado</th>
                                    <th>Fecha Creación</th>
                                    <th>Fecha Actualización</th>                                    
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($TarifaG as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td>{{$value['nombre_tarifa']}}</td>
                                        <td>{{$value['valor_unico']}}</td>
                                        <td>{{$value['year']}}</td>
                                        <td><span class="{{$value['label']}}" style="font-size:13px;"><b>{{$value['estado']}}</b></span></td>
                                        <td>{{$value['fecha_creacion']}}</td>
                                        <td>{{$value['fecha_modificacion']}}</td>                                        
                                        <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-tarifaGUpd" onclick="obtener_datos_tarifaG('{{$value['id']}}');"><i class="fas fa-edit"></i></a></td>
                                        <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                        <input type="hidden" value="{{$value['tarifa']}}" id="tarifaG{{$value['id']}}">
                                        <input type="hidden" value="{{$value['valor_tarifa_unica']}}" id="valor_tarifa_unica{{$value['id']}}">
                                        <input type="hidden" value="{{$value['year']}}" id="yearG{{$value['id']}}">
                                        <input type="hidden" value="{{$value['tipo_tarifa']}}" id="tipo_tarifaG{{$value['id']}}">
                                        <input type="hidden" value="{{$value['estado_tarifag_activo']}}" id="estado_tarifag_activo{{$value['id']}}">
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
@include("modals.modalTarifaG")
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
