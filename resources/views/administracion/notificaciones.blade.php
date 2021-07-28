@extends("administracion.layout")

@section('titulo')
Notificaciones
@endsection

@section('contenido')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-newspaper nav-icon" id="enlace"></i> Notificaciones por Aviso</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                    <li class="breadcrumb-item active">Notificaciones por Aviso</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="principalCard">
                        <h3 class="card-title" id="tituloCard"><strong>Cargue masiva de notificaciones</strong></h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'cargarNotificacion', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-notificacion']) !!}
                        @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-9">
                                        <label>Archivo de notificaciones en formato txt o csv *</label>
                                        <input type="file" name="notificationfile" id="notificationfile" accept=".txt,.csv" required class="form-control" size="2048">
                                        <div align="right"><small class="text-muted">Tamaño maximo en total permitido (2MB), si se supera este tamaño, su archivo no será cargado.</small><span id="cntDescripHechos" align="right"> </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success float-left">Cargar</button>
                            </div>
                        {!!  Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="principalCard">
                        <h3 class="card-title" id="tituloCard"><strong>Cargue manual de notificación</strong></h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'cargarNotificacionManual', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-notificacion-manual']) !!}
                        @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nombre Ciudadano</label>
                                        {!! Form::text('nombre_ciudadano',null,['class'=>'form-control','id'=>'nombre_ciudadano','placeholder'=>'Nombre Ciudadano','required']) !!}
                                    </div>
                                    <div class="col-md-3">
                                        <label>Placa Vehículo</label>
                                        {!! Form::text('placa',null,['class'=>'form-control','id'=>'placa','placeholder'=>'Placa Vehículo','required','maxlength="6" oninput="if(this.value.length > this.maxLength)
                                        this.value = this.value.slice(0, this.maxLength)";','onkeypress="return check(event);"']) !!}
                                        <div align="right"><small class="text-muted">Escriba la placa sin guión.</small><span id="cntDescripHechos" align="right"> </span></div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Año de Reporte</label>
                                        {!! Form::text('year_notification',null,['class'=>'form-control','id'=>'year_notification','placeholder'=>'Año','onkeypress="return soloNumero(event)"','maxlength="4" oninput="if(this.value.length > this.maxLength)
                                        this.value = this.value.slice(0, this.maxLength)";','required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success float-left">Crear</button>
                            </div>
                        {!!  Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="notificacionesAviso" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre Ciudadano</th>
                                    <th>Placa del Vehículo</th>
                                    <th>Año reporte de la reclamación</th>
                                    <th>Fecha Cargue</th>
                                    <th>Fecha Actualización</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Notificaciones as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td>{{$value['nombre_ciudadano']}}</td>
                                        <td>{{$value['placa']}}</td>
                                        <td>{{$value['year']}}</td>
                                        <td>{{$value['fecha_creacion']}}</td>
                                        <td>{{$value['fecha_modificacion']}}</td>
                                        <td><span class="{{$value['label']}}" style="font-size:13px;"><b>{{$value['estado']}}</b></span></td>
                                        <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-notificacionUpd" onclick="obtener_datos_notificacion('{{$value['id']}}');"><i class="fas fa-edit"></i></a></td>
                                        <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                        <input type="hidden" value="{{$value['nombre_ciudadano']}}" id="nombre_ciudadano{{$value['id']}}">
                                        <input type="hidden" value="{{$value['placa']}}" id="placa{{$value['id']}}">
                                        <input type="hidden" value="{{$value['year']}}" id="year{{$value['id']}}">
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
@include("modals.modalNotificaciones")
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
