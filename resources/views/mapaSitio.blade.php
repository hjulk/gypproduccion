@extends('layout')

@section('titulo')
    - Mapa del Sitio
@endsection

@section('styles')
@endsection

@section('barraInformacion')
    <div class="overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloCabecera">
                <div class="col-lg-6">
                    <h3 id="tituloSubPagina">Mapa del sitio</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="ftco-cover-1" id="franjaSubpaginaTitulo">
        <div class="container-md" id="franjaRutaPagina">
            <div class="row" id="rutaPagina">
                <div class="col-md-12">
                    <a href="{{ url('/') }}">Inicio</a>
                    <span id="iconoRutaPagina"><b>></b></span> Mapa del sitio
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="site-section bg-light" id="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-white p-3 p-md-5">
                        <div class="row">
                            <a href="{{ url('/') }}">
                                <h4 class="text-black mb-4" id="tituloMapaSitio">INICIO</h4>
                            </a>
                        </div>
                        <div class="row">
                            <h4 class="text-black mb-3" id="tituloMapaSitio" tabindex="0">ATENCIÓN AL CIUDADANO</h4>
                        </div>
                        <div class="row">
                            <ul>
                                <li><a href="contacto" id="linkMapaSitio">Contáctenos</a></li>
                                <li><a href="notificacionAviso" id="linkMapaSitio">Notificación por Aviso</a></li>
                                <li style="font-size: medium;font-weight: 700;" tabindex="0"> Peticiones, quejas y
                                    reclamos
                                    <ul>
                                        <li><a href="https://bogota.gov.co/sdqs/crear-peticion" id="linkMapaSitio"
                                                target="_blank">Registrar su PQRS</a></li>
                                        <li><a href="https://bogota.gov.co/sdqs/consultar-peticion" id="linkMapaSitio"
                                                target="_blank">Consulte su PQRS en Bogotá te Escucha</a></li>
                                    </ul>
                                </li>
                                <li> <a href="preguntasFrecuentes" id="linkMapaSitio">Preguntas Frecuentes</a></li>
                            </ul>
                        </div>
                        <div class="row">
                            <h4 class="text-black mb-3" id="tituloMapaSitio" tabindex="0">GRÚAS Y PARQUEADEROS BOGOTÁ</h4>
                        </div>
                        <div class="row">
                            <ul>
                                <li> <a href="nosotros" id="linkMapaSitio">Nosotros</a></li>
                                <li>
                                    @if ($Organigrama)
                                        {!! $Organigrama !!}
                                    @endif
                                </li>
                                <li> <a href="normatividad" id="linkMapaSitio">Normatividad</a></li>
                            </ul>
                        </div>
                        <div class="row">
                            <h4 class="text-black mb-3" id="tituloMapaSitio" tabindex="0">SERVICIOS</h4>
                        </div>
                        <div class="row">
                            <ul>
                                <li> <a href="servicios/beneficios" id="linkMapaSitio">Beneficios</a></li>
                                <li> <a href="servicios/custodiaSegura" id="linkMapaSitio">Custodia Segura</a></li>
                                <li> <a href="servicios/gruas" id="linkMapaSitio">Grúas</a></li>
                                <li> <a href="servicios/monitoreoCamaras" id="linkMapaSitio">Monitoreo Cámaras</a></li>
                                <li> <a href="servicios/procesoInmovilizacion" id="linkMapaSitio">Proceso Inmovilización</a>
                                </li>
                                <li> <a href="servicios/procesoRetiro" id="linkMapaSitio">Proceso Retiro</a></li>
                                <li> <a href="servicios/tarifas" id="linkMapaSitio">Tarifas</a></li>
                            </ul>
                        </div>
                        <div class="row">
                            <h4 class="text-black mb-3" id="tituloMapaSitio" tabindex="0">TRÁMITES</h4>
                        </div>
                        <div class="row">
                            <ul>
                                <li> <a href="consultaLiquidacion" id="linkMapaSitio">Consulta Liquidación</a></li>
                                <li> <a href="pagoLinea" id="linkMapaSitio">Pago en Línea</a></li>
                                <li> <a href="puntosAtencion" id="linkMapaSitio">Puntos de Atención</a></li>
                            </ul>
                        </div>
                        <div class="row">
                            <a href="trabajo">
                                <h4 class="text-black mb-4" id="tituloMapaSitio">TRABAJE CON NOSOTROS</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
@endsection
