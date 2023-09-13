@extends("administracion.layout")

@section('titulo')
Tipo TArifas
@endsection

@section('contenido')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-truck nav-icon" id="enlace"></i> Tipo Tarifas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                    <li class="breadcrumb-item active">Tipo Tarifas</li>
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
                        <h3 class="card-title" id="tituloCard"><strong>Crear Tipo Tarifas</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12" id="imgCard">
                                <picture>
                                    <source srcset="{{asset("images/tipo_tarifa.webp") }}" type="image/webp"/>
                                    <source srcset="{{asset("images/tipo_tarifa.png") }}" type="image/png"/>
                                    <img src="{{asset("images/tipo_tarifa.webp") }}" id="imgCard" alt="Gruas" class="img-responsive"/>
                                </picture>
                            </div>
                        </div>
                        <br>
                        {!! Form::open(['url' => 'crearTipoTarifa', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-create_rol']) !!}
                        @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="exampleInputEmail1">Nombre Tipo Tarifa</label>
                                        {!! Form::text('nombre_tipo_tarifa',null,['class'=>'form-control','id'=>'nombre_tipo_tarifa','placeholder'=>'Nombre Tipo Tarifa']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success float-right">Crear Tipo Tarifa</button>
                            </div>
                        {!!  Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <table id="tipoTarifa" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tipo Tarifa</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($TipoTarifa as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td>{{$value['nombre_tipo_tarifa']}}</td>
                                        <td><span class="{{$value['label']}}" style="font-size:13px;"><b>{{$value['estado']}}</b></span></td>
                                        <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-tipoTarifaUpd" onclick="obtener_datos_tipoTarifa('{{$value['id']}}');"><i class="fas fa-edit"></i></a></td>
                                        <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                        <input type="hidden" value="{{$value['nombre_tipo_tarifa']}}" id="nombre_tipo_tarifa{{$value['id']}}">
                                        <input type="hidden" value="{{$value['estado_tipo_tarifa_activo']}}" id="estado_tipo_tarifa_activo{{$value['id']}}">
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header" id="principalCard">
                        <h3 class="card-title" id="tituloCard"><strong>Crear Nombre Tarifas</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12" id="imgCard">
                                <picture>
                                    <source srcset="{{asset("images/nombre_tarifa.webp") }}" type="image/webp"/>
                                    <source srcset="{{asset("images/nombre_tarifa.png") }}" type="image/png"/>
                                    <img src="{{asset("images/nombre_tarifa.webp") }}" id="imgCard" alt="Gruas" class="img-responsive"/>
                                </picture>
                            </div>
                        </div>
                        <br>
                        {!! Form::open(['url' => 'crearNombreTarifa', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-create_rol']) !!}
                        @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Nombre Tarifa</label>
                                        {!! Form::text('nombre_tarifa',null,['class'=>'form-control','id'=>'nombre_tarifa','placeholder'=>'Nombre Tarifa']) !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Tipo Tarifa</label>
                                        {!! Form::select('tipo_tarifa',$TipoTarfifaActivo,null,['class'=>'form-control','id'=>'tipo_tarifa']) !!}
                                    </div>
                                </div>                                
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success float-right">Crear Nombre Tarifa</button>
                            </div>
                        {!!  Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <table id="nombreTarifa" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre Tarifa</th>
                                    <th>Tipo Tarifa</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($NombreTarifa as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td>{{$value['nombre_tarifa']}}</td>
                                        <td>{{$value['nombre_tipo_tarifa']}}</td>
                                        <td><span class="{{$value['label']}}" style="font-size:13px;"><b>{{$value['estado']}}</b></span></td>
                                        <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-nombreTarifaUpd" onclick="obtener_datos_nombreTarifa('{{$value['id']}}');"><i class="fas fa-edit"></i></a></td>
                                        <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                        <input type="hidden" value="{{$value['nombre_tarifa']}}" id="nombre_tarifa{{$value['id']}}">
                                        <input type="hidden" value="{{$value['tipo_tarifa']}}" id="tipo_tarifa{{$value['id']}}">
                                        <input type="hidden" value="{{$value['estado_nombre_tarifa_activo']}}" id="estado_nombre_tarifa_activo{{$value['id']}}">
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
@include("modals.modalTipoTarifa")
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
