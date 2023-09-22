@extends("administracion.layout")

@section('titulo')
Tarifas Parqueadero
@endsection

@section('contenido')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0 text-dark"><i class="fas fa-parking nav-icon" id="enlace"></i> Servicio de parqueadero de vehículos de servicio público y particular en la ciudad de Bogotá.</h1>
            </div>
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                    <li class="breadcrumb-item active">Tarifas Parqueadero</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" id="principalCard">
                                <h3 class="card-title" id="tituloCard"><strong>Servicio de parqueadero de vehículos de servicio público y particular en la ciudad de Bogotá.</strong></h3>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['url' => 'crearTarifaP', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-notificacion']) !!}
                                @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Tipo Vehículo</label>
                                                {!! Form::select('tipo_vehiculo',$TipoTarifaP,null,['class'=>'form-control','id'=>'tipo_vehiculo','required']) !!}
                                            </div>
                                            <div class="col-md-2">
                                                <label for="exampleInputEmail1">Tarifa día 1</label>
                                                {!! Form::text('valor_tarifa_1',null,['class'=>'form-control CurrencyInput','id'=>'valor_tarifa_1','onkeypress'=>'return numero(event);']) !!}
                                            </div>
                                            <div class="col-md-2">
                                                <label for="exampleInputEmail1">Tarifa día 2</label>
                                                {!! Form::text('valor_tarifa_2',null,['class'=>'form-control CurrencyInput','id'=>'valor_tarifa_2','onkeypress'=>'return numero(event);']) !!}
                                            </div>
                                            <div class="col-md-2">
                                                <label for="exampleInputEmail1">Tarifa día 3</label>
                                                {!! Form::text('valor_tarifa_3',null,['class'=>'form-control CurrencyInput','id'=>'valor_tarifa_3','onkeypress'=>'return numero(event);']) !!}
                                            </div>
                                            <div class="col-md-2">
                                                <label for="exampleInputEmail1">Tarifa día 4 a día 30</label>
                                                {!! Form::text('valor_tarifa_4',null,['class'=>'form-control CurrencyInput','id'=>'valor_tarifa_4','onkeypress'=>'return numero(event);']) !!}
                                            </div>
                                            <div class="col-md-2">
                                                <label for="exampleInputEmail1">Tarifa día 31+</label>
                                                {!! Form::text('valor_tarifa_5',null,['class'=>'form-control CurrencyInput','id'=>'valor_tarifa_5','onkeypress'=>'return numero(event);']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Año Tarifa</label>
                                                    {!! Form::text('year_tarifa',$yearNow,['class'=>'form-control','id'=>'year_tarifa','readonly']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-success float-left">Crear Tarifa de Parqueadero</button>
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
                        <table id="tarifaP" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Año</th>
                                    <th>Tipo de vehículo</th>
                                    <th>Tarifa día 1</th>
                                    <th>Tarifa día 2</th>
                                    <th>Tarifa día 3</th>
                                    <th>Tarifa día 4 a día 30</th>
                                    <th>Tarifa día 31+</th>
                                    <th>Fecha Creación</th>
                                    <th>Estado</th>                                    
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($TarifaP as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td>{{$value['year']}}</td>
                                        <td>{{$value['nombre_tarifa']}}</td>
                                        <td>{{$value['valor_1']}}</td>
                                        <td>{{$value['valor_2']}}</td>
                                        <td>{{$value['valor_3']}}</td>
                                        <td>{{$value['valor_4']}}</td>
                                        <td>{{$value['valor_5']}}</td>
                                        <td>{{$value['fecha_creacion']}}</td>
                                        <td><span class="{{$value['label']}}" style="font-size:13px;"><b>{{$value['estado']}}</b></span></td>
                                        <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-tarifaPUpd" onclick="obtener_datos_tarifaP('{{$value['id']}}');"><i class="fas fa-edit"></i></a></td>
                                        <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                        <input type="hidden" value="{{$value['tarifa']}}" id="tarifaP{{$value['id']}}">
                                        <input type="hidden" value="{{$value['valor_tarifa_1']}}" id="valor_tarifa_1{{$value['id']}}">
                                        <input type="hidden" value="{{$value['valor_tarifa_2']}}" id="valor_tarifa_2{{$value['id']}}">
                                        <input type="hidden" value="{{$value['valor_tarifa_3']}}" id="valor_tarifa_3{{$value['id']}}">
                                        <input type="hidden" value="{{$value['valor_tarifa_4']}}" id="valor_tarifa_4{{$value['id']}}">
                                        <input type="hidden" value="{{$value['valor_tarifa_5']}}" id="valor_tarifa_5{{$value['id']}}">
                                        <input type="hidden" value="{{$value['year']}}" id="yearP{{$value['id']}}">
                                        <input type="hidden" value="{{$value['tipo_tarifa']}}" id="tipo_tarifaP{{$value['id']}}">
                                        <input type="hidden" value="{{$value['estado_tarifap_activo']}}" id="estado_tarifap_activo{{$value['id']}}">
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
@include("modals.modalTarifaP")
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
