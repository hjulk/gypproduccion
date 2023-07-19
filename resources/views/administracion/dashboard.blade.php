@extends("administracion.layout")

@section('titulo')
Dashboard
@endsection

@section('contenido')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dahsboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a id="enlace" href="admin/home">Inicio</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        @if((Session::get('Rol') === 2) || (Session::get('Rol') === 1) || (Session::get('Rol') === 4))
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" id="principalCard">
                                <a href="documentos" id="tituloCard"><h3 class="card-title"><b>Ingresar Menú Documentos <i class="fa fa-arrow-circle-right"></i></b></h3></a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12" id="imgCard">
                                        <img src="{{asset("images/docs_menu.png") }}" alt="">
                                    <br><br>
                                        <p>Administración de los documentos que se encuentran en la página</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" id="principalCard">
                                <a href="imagenes" id="tituloCard"><h3 class="card-title"><b>Ingresar Menú Imágenes <i class="fa fa-arrow-circle-right"></i></b></h3></a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12" id="imgCard">
                                        <img src="{{asset("images/images_menu.png") }}" alt="">
                                    <br><br>
                                        <p>Administración de las imágenes que se encuentran en la página</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" id="principalCard">
                                <a href="preguntas" id="tituloCard"><h3 class="card-title"><b>Ingresar Menú Preguntas Frecuentes <i class="fa fa-arrow-circle-right"></i></b></h3></a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12" id="imgCard">
                                        <img src="{{asset("images/preguntas_frecuentes.png") }}" alt="">
                                    <br><br>
                                        <p>Administración de las preguntas frecuentes que se encuentran en la página</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if((Session::get('Rol') === 2) || (Session::get('Rol') === 1))
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" id="principalCard">
                                <a href="reporteVisitas" id="tituloCard"><h3 class="card-title"><b>Ingresar Menú Visitas Página <i class="fa fa-arrow-circle-right"></i></b></h3></a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12" id="imgCard">
                                        <img src="{{asset("images/web_visit.png") }}" alt="">
                                    <br><br>
                                        <p>Módulo donde se genera el reporte de visitas a la página</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endif
        @if((Session::get('Rol') === 2) || (Session::get('Rol') === 1))
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="principalCard">
                        <a href="reporteContacto" id="tituloCard"><h3 class="card-title"><b>Ingresar Menú Formulario Contáctenos <i class="fa fa-arrow-circle-right"></i></b></h3></a>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title" id="enlace"><b>Ultimos 10 mensajes</b></h3>
                        <br><br>
                        <table id="contactenosDashboard" class="display table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <td>NOMBRE DEL CIUDADANO</td>
                                    <td>CORREO ELECTRÓNICO</td>
                                    <td>MENSAJE</td>
                                    <td>FECHA DE MENSAJE</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if($Contactenos)
                                    @foreach ($Contactenos as $value)
                                        <tr>
                                            <td>{{$value['NOMBRE_CIUDADANO']}}</td>
                                            <td>{{$value['CORREO']}}</td>
                                            <td>{{$value['MENSAJE']}}</td>
                                            <td>{{$value['FECHA_CREACION']}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="principalCard">
                        <a href="reporteHojaVida" id="tituloCard"><h3 class="card-title"><b>Ingresar Menú Formulario Hojas de Vida <i class="fa fa-arrow-circle-right"></i></b></h3></a>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title" id="enlace"><b>Ultimas 10 hojas de vida recibidas</b></h3>
                        <br><br>
                        <table id="hojasVidaDashboard" class="display table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <td>NOMBRE DEL CIUDADANO</td>
                                    <td>TIPO DOCUMENTO</td>
                                    <td>Nro. DOCUMENTO</td>
                                    <td>CORREO</td>
                                    <td>Nro. TELÉFONO</td>
                                    <td>DOCUMENTO</td>
                                    <td>FECHA DE ENVIO</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if($HojaVida)
                                    @foreach ($HojaVida as $value)
                                        <tr>
                                            <td>{{$value['NOMBRE_CIUDADANO']}}</td>
                                            <td>{{$value['TIPO_DOCUMENTO']}}</td>
                                            <td>{{$value['IDENTIFICACION']}}</td>
                                            <td>{{$value['CORREO']}}</td>
                                            <td>{{$value['TELEFONO']}}</td>
                                            <td>{{$value['DOCUMENTO']}}</td>
                                            <td>{{$value['FECHA_CREACION']}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if((Session::get('Rol') === 2) || (Session::get('Rol') === 1) || (Session::get('Rol') === 3))
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="principalCard">
                        <a href="notificaciones" id="tituloCard"><h3 class="card-title"><b>Ingresar a menú de notificaciones por aviso <i class="fa fa-arrow-circle-right"></i></b></h3></a>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title" id="enlace"><b>Ultimas 10 notificaciones</b></h3>
                        <br><br>
                        <table id="notificacionesDashboard" class="display table dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <td>NOMBRE DEL CIUDADANO</td>
                                    <td>PLACA DEL VEHÍCULO</td>
                                    <td>AÑO REPORTE DE LA RECLAMACIÓN</td>
                                    <td>FECHA DE CARGUE</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if($Notificaciones)
                                    @foreach ($Notificaciones as $value)
                                        <tr>
                                            <td>{{$value['NOMBRE']}}</td>
                                            <td>{{$value['PLACA']}}</td>
                                            <td>{{$value['YEAR']}}</td>
                                            <td>{{$value['FECHA_CREACION']}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
