@extends('layout')

@section('titulo')
    - Pago en Línea
@endsection

@section('styles')
    <link rel="preload" href="{{ asset('css/pagoLinea.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('css/pagoLinea.css') }}">
    </noscript>
@endsection

@section('barraInformacion')
    <div class="overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloCabecera">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Pago en línea</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="ftco-cover-1" id="franjaSubpaginaTitulo">
        <div class="container-md" id="franjaRutaPagina">
            <div class="row" id="rutaPagina">
                <div class="col-md-12">
                    <a href="{{ url('/') }}">Inicio</a>
                    <span id="iconoRutaPagina"><b>></b></span> Trámites
                    <span id="iconoRutaPagina"><b>></b></span> Pago en línea
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <br>
    <section class="ftco-section" id="sectionPage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 id="titlesubServiciosPL" tabindex="0">Ciudadano.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 id="titlesubServicios" tabindex="0">Para facilitar el trámite de tu vehículo inmovilizado,
                        recuerda que
                        puedes pagar en línea.</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="contentPagoLinea">
            <div id="grid-container-pagoLinea">
                <div>
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/tramites/pago_linea/pago_linea_1.webp') }}" type="image/webp" />
                        <source srcset="{{ asset('images/tramites/pago_linea/pago_linea_1.png') }}" type="image/png" />
                        <img src="{{ asset('images/tramites/pago_linea/pago_linea_1.webp') }}" id="consultaLiquidacionImg"
                            alt="Cunsulta Liquidación" class="img-responsive" />
                    </picture>
                </div>
                <div class="textPR">
                    <p id="textPagoLinea" tabindex="0">
                        <span class="movilidad">1</span> Dirígete a la página <a href="https://www.movilidadbogota.gov.co"
                            target="_blank">www.movilidadbogota.gov.co</a> y haz click en liquidación de servicios de
                        parqueaderos y grúas
                    </p>
                </div>
            </div>
            <div id="grid-container-pagoLinea">
                <div>
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/tramites/pago_linea/pago_linea_2.webp') }}" type="image/webp" />
                        <source srcset="{{ asset('images/tramites/pago_linea/pago_linea_2.png') }}" type="image/png" />
                        <img src="{{ asset('images/tramites/pago_linea/pago_linea_2.webp') }}" id="consultaLiquidacionImg"
                            alt="Cunsulta Liquidación" class="img-responsive" />
                    </picture>
                </div>
                <div class="textPR">
                    <p id="textPagoLinea" tabindex="0">
                        <span class="movilidad">2</span> Ingresa la placa del vehículo.
                    </p>
                </div>
            </div>
            <div id="grid-container-pagoLinea">
                <div>
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/tramites/pago_linea/pago_linea_3.webp') }}" type="image/webp" />
                        <source srcset="{{ asset('images/tramites/pago_linea/pago_linea_3.png') }}" type="image/png" />
                        <img src="{{ asset('images/tramites/pago_linea/pago_linea_3.webp') }}" id="consultaLiquidacionImg"
                            alt="Cunsulta Liquidación" class="img-responsive" />
                    </picture>
                </div>
                <div class="textPR">
                    <p id="textPagoLinea" tabindex="0">
                        <span class="movilidad">3</span> Genera la Liquidación.
                    </p>
                </div>
            </div>
            <div id="grid-container-pagoLinea">
                <div id="botonPSEImg">
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/tramites/pago_linea/BotonPSE.webp') }}" type="image/webp" />
                        <source srcset="{{ asset('images/tramites/pago_linea/BotonPSE.png') }}" type="image/png" />
                        <img src="{{ asset('images/tramites/pago_linea/BotonPSE.webp') }}" id="botonPSE"
                            alt="Cunsulta Liquidación" class="img-responsive" />
                    </picture>
                </div>
                <div class="textPR">
                    <p id="textPagoLinea" tabindex="0">
                        <span class="movilidad">4</span> Realiza el pago en línea fácil y rápido.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <br>
@endsection

@section('scripts')
@endsection
