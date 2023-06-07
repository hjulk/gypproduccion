@extends('servicios.layout')

@section('titulo')
    - Proceso Retiro
@endsection

@section('styles')
    <link rel="preload" href="{{ asset('css/procesoRetiro.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('css/procesoRetiro.css') }}">
    </noscript>
@endsection

@section('barraInformacion')
    <div class="overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloCabecera">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Proceso retiro</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="ftco-cover-1" id="franjaSubpaginaTitulo">
        <div class="container-md" id="franjaRutaPagina">
            <div class="row" id="rutaPagina">
                <div class="col-md-12">
                    <a href="{{ url('/') }}">Inicio</a>
                    <span id="iconoRutaPagina"><b>></b></span> <a href="nuestrosServicios" id="subruta"> Servicios</a>
                    <span id="iconoRutaPagina"><b>></b></span> Proceso retiro
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 id="titlesubServicios" tabindex="0">Pasos para retirar tu vehículo inmovilidazo del patio.</h4>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-12">
                    <h3 id="tituloSubPaginaHome" tabindex="0">Modo presencial</h2>
                </div>
            </div>
            <br>
            <div id="pasosPresencial1">
                <div>
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_1.webp') }}"
                            type="image/webp" />
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_1.png') }}"
                            type="image/png" />
                        <img src="{{ asset('images/servicios/proceso_retiro/proceso_retiro_1.webp') }}"
                            id="procesoRetiroImg" alt="Proceso Retiro" class="img-responsive" />
                    </picture>
                </div>
                <div class="textPR">
                    <p id="textProcesoRetiro" tabindex="0">
                        Agenda la cita en la página web <a href="https://www.movilidadbogota.gov.co"
                            target="_blank">www.movilidadbogota.gov.co</a>, o llama a la línea (601) 364-9400 y agenda tu
                        cita presencial.
                    </p>
                </div>
            </div>
            <div id="pasosPresencial2" class="reverse">
                <div class="textPR">
                    <p id="textProcesoRetiro" tabindex="0">
                        Dirígete al lugar indicado en tu cita con los documentos solicitados para el trámite.
                    </p>
                </div>
                <div class="imgPR">
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_2.webp') }}"
                            type="image/webp" />
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_2.png') }}"
                            type="image/png" />
                        <img src="{{ asset('images/servicios/proceso_retiro/proceso_retiro_2.webp') }}"
                            id="procesoRetiroImg" alt="Proceso Retiro" class="img-responsive" />
                    </picture>
                </div>
            </div>
            <div id="pasosPresencial1">
                <div>
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_3.webp') }}"
                            type="image/webp" />
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_3.png') }}"
                            type="image/png" />
                        <img src="{{ asset('images/servicios/proceso_retiro/proceso_retiro_3.webp') }}"
                            id="procesoRetiroImg" alt="Proceso Retiro" class="img-responsive" />
                    </picture>
                </div>
                <div class="textPR">
                    <p id="textProcesoRetiro" tabindex="0">
                        Realiza el pago por concepto de patios y grúas en las entidades bancarias (Banco de Occidente),
                        corresponsales no bancarios o pago electrónico (PSE).
                    </p>
                </div>
            </div>
            <div id="pasosPresencial2" class="reverse">
                <div class="textPR">
                    <p id="textProcesoRetiro" tabindex="0">
                        Dirígete a nuestro parqueadero Transversal 93 # 53 - 35 con la orden de salida y la liquidación.
                    </p>
                </div>
                <div class="imgPR">
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_4.webp') }}"
                            type="image/webp" />
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_4.png') }}"
                            type="image/png" />
                        <img src="{{ asset('images/servicios/proceso_retiro/proceso_retiro_4.webp') }}"
                            id="procesoRetiroImg" alt="Proceso Retiro" class="img-responsive" />
                    </picture>
                </div>
            </div>
            <div id="pasosPresencial1">
                <div>
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_5.webp') }}"
                            type="image/webp" />
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_5.png') }}"
                            type="image/png" />
                        <img src="{{ asset('images/servicios/proceso_retiro/proceso_retiro_5.webp') }}"
                            id="procesoRetiroImg" alt="Proceso Retiro" class="img-responsive" />
                    </picture>
                </div>
                <div class="textPR">
                    <p id="textProcesoRetiroUltimo" tabindex="0">
                        Espera tu turno y retira tu vehículo.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-12">
                    <h3 id="tituloSubPaginaHome" tabindex="0">Modo virtual</h2>
                </div>
            </div>
            <br>
            <div id="pasosVirtual1">
                <div>
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_1.webp') }}"
                            type="image/webp" />
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_1.png') }}"
                            type="image/png" />
                        <img src="{{ asset('images/servicios/proceso_retiro/proceso_retiro_1.webp') }}"
                            id="procesoRetiroImg" alt="Proceso Retiro" class="img-responsive" />
                    </picture>
                </div>
                <div class="textPR">
                    <p id="textProcesoRetiro" tabindex="0">
                        Agenda la cita en la página web <a href="https://www.movilidadbogota.gov.co"
                            target="_blank">www.movilidadbogota.gov.co</a>, da click en el botón AGENDAMIENTO DE CITAS.
                    </p>
                </div>
            </div>
            <div id="pasosVirtual2" class="reverse">
                <div class="textPR">
                    <p id="textProcesoRetiro" tabindex="0">
                        Dirígete a los Centros de Servicio de Movilidad a realizar el trámite de autorización de salida.
                    </p>
                </div>
                <div class="imgPR">
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_2.webp') }}"
                            type="image/webp" />
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_2.png') }}"
                            type="image/png" />
                        <img src="{{ asset('images/servicios/proceso_retiro/proceso_retiro_2.webp') }}"
                            id="procesoRetiroImg" alt="Proceso Retiro" class="img-responsive" />
                    </picture>
                </div>
            </div>
            <div id="pasosVirtual1">
                <div>
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_3.webp') }}"
                            type="image/webp" />
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_3.png') }}"
                            type="image/png" />
                        <img src="{{ asset('images/servicios/proceso_retiro/proceso_retiro_3.webp') }}"
                            id="procesoRetiroImg" alt="Proceso Retiro" class="img-responsive" />
                    </picture>
                </div>
                <div class="textPR">
                    <p id="textProcesoRetiro" tabindex="0">
                        Realiza el pago del servicio de grúas y patios.
                    </p>
                </div>
            </div>
            <div id="pasosVirtual2" class="reverse">
                <div class="textPR">
                    <p id="textProcesoRetiro" tabindex="0">
                        Dirígete a nuestro parqueadero Transversal 93 # 53 - 35 con los documentos solicitados.
                    </p>
                </div>
                <div class="imgPR">
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_4.webp') }}"
                            type="image/webp" />
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_4.png') }}"
                            type="image/png" />
                        <img src="{{ asset('images/servicios/proceso_retiro/proceso_retiro_4.webp') }}"
                            id="procesoRetiroImg" alt="Proceso Retiro" class="img-responsive" />
                    </picture>
                </div>
            </div>
            <div id="pasosVirtual1">
                <div>
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_5.webp') }}"
                            type="image/webp" />
                        <source srcset="{{ asset('images/servicios/proceso_retiro/proceso_retiro_5.png') }}"
                            type="image/png" />
                        <img src="{{ asset('images/servicios/proceso_retiro/proceso_retiro_5.webp') }}"
                            id="procesoRetiroImg" alt="Proceso Retiro" class="img-responsive" />
                    </picture>
                </div>
                <div class="textPR">
                    <p id="textProcesoRetiroUltimo" tabindex="0">
                        Espera tu turno y retira tu vehículo.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <br>
@endsection

@section('scripts')
@endsection
