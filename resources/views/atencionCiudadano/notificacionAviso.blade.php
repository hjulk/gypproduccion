@extends('layout')

@section('titulo')
    - Notificación por Aviso
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('DataTables/DataTables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/Responsive/css/responsive.dataTables.min.css') }}">
@endsection

@section('barraInformacion')
    <div class="overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloCabecera">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Notificación por aviso</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="ftco-cover-1" id="franjaSubpaginaTitulo">
        <div class="container-md" id="franjaRutaPagina">
            <div class="row" id="rutaPagina">
                <div class="col-md-12">
                    <a href="{{ url('/') }}">Inicio</a>
                    <span id="iconoRutaPagina"><b>></b></span> Atención al Ciudadano
                    <span id="iconoRutaPagina"><b>></b></span> Notificación por Aviso
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="site-section" id="faq-section">
        <div class="container">
            <div class="row mb-5">
                <div class="block-heading-1 col-12 text-center">
                    <h3 id="tituloNotificacion">Notificación por aviso</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <p id="textnotificacion">
                            De conformidad con el <b>artículo 69 en la Ley 1437 de 2011</b> el cual señala:
                            "Cuando se desconozca la información sobre el destinatario, el aviso, se publicará
                            en la página electrónica y en todo caso en un lugar de acceso al público de la
                            respectiva
                            entidad por el término de cinco (5) días, con la advertencia de que la notificación
                            se considerará surtida al finalizar el día siguiente al retiro del aviso.”
                        </p>
                        <p id="textnotificacion">Una vez surtida la comunicación a los ciudadanos
                            indicados en la presente notificación,
                            a través del correo electrónico registrado en la planilla de peticiones, quejas y
                            reclamos de la Concesión
                            y a través del Sistema Bogotá Te Escucha SDQS, <b>GYP BOGOTÁ S.A.S</b>. solicita a
                            los ciudadanos mencionados,
                            presentarse en las instalaciones del parqueadero autorizado No. 1 (Transversal 93
                            No. 53 – 51),
                            en el horario de lunes a viernes de 8:00 a.m. a 8:00 p.m. y sábado de 8:00 a.m. a
                            3:00 p.m. en la
                            Coordinación de Atención al Usuario o comunicarse a través del correo electrónico:
                            <a href="mailto:coordinadorpqr@gypbogota.com"
                                id="emailNotificacion">coordinadorpqr@gypbogota.com</a>,
                            con el fin de llevar a cabo la conciliación y dar cierre a las reclamaciones
                            interpuestas.
                        </p>
                        <p>
                            @if ($BotonDesfijacion)
                                {!! $BotonDesfijacion !!}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            @if ($Notificaciones)
                <div class="row">
                    <div class="col-md-12">
                        <table id="notificaciones" class="display table-striped responsive no-wrap">
                            <thead>
                                <td>NOMBRE DEL CIUDADANO</td>
                                <td>PLACA DEL VEH&Iacute;CULO</td>
                                <td>A&Ntilde;O REPORTE DE LA RECLAMACI&Oacute;N</td>
                            </thead>
                            <tbody>
                                @foreach ($Notificaciones as $value)
                                    <tr>
                                        <td>{{ $value['NOMBRE'] }}</td>
                                        <td>{{ $value['PLACA'] }}</td>
                                        <td>{{ $value['YEAR'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('DataTables/DataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('DataTables/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/notificaciones.js') }}"></script>
@endsection
