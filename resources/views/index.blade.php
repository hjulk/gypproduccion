@extends('layout')

@section('titulo')
@endsection

@section('styles')
@endsection

@section('barraInformacion')
    <section class="ftco-section" id="sectionPageBanner">
        <div class="container">
            <div class="row align-items-center" id="imagenBannerPrincipal">
                <div class="col-md-12">
                    <a href="https://vus.circulemosdigital.com.co/#login/" target="_blank">
                        @handheld
                            <picture>
                                <source srcset="{{ asset('images/home/banner_home_movil.webp') }}" type="image/webp" />
                                <source srcset="{{ asset('images/home/banner_home_movil.') }}" type="image/png" />
                                <img src="{{ asset('images/home/banner_home_movil.webp') }}" id="imagenPagina" alt="Inicio"
                                    class="bannerHome mx-auto" />
                            </picture>
                        @elsehandheld
                            <picture>
                                <source srcset="{{ asset('images/home/banner_home.webp') }}" type="image/webp" />
                                <source srcset="{{ asset('images/home/banner_home.png') }}" type="image/png" />
                                <img src="{{ asset('images/home/banner_home.webp') }}" id="imagenPagina" alt="Inicio"
                                    class="bannerHome mx-auto" />
                            </picture>
                        @endhandheld
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="imagePageAviso">
            <div id="derechosDeberes" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators" tabindex="0">
                    <li data-target="#derechosDeberes" data-slide-to="0" class="active"></li>
                    <li data-target="#derechosDeberes" data-slide-to="1"></li>
                    <li data-target="#derechosDeberes" data-slide-to="2"></li>
                    <li data-target="#derechosDeberes" data-slide-to="3"></li>
                    <li data-target="#derechosDeberes" data-slide-to="4"></li>
                </ol>
                @handheld
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="videos/home_video.mp4" id="videoHomeLink">
                                <picture>
                                    <source srcset="{{ asset('images/carousel/carousel_movil_1.webp') }}" type="image/webp" />
                                    <source srcset="{{ asset('images/carousel/carousel_movil_1.png') }}" type="image/png" />
                                    <img src="{{ asset('images/carousel/carousel_movil_1.webp') }}" class="d-block w-100"
                                        alt="GYP 2023" id="imgCarruselGyp" />
                                </picture>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="https://vus.circulemosdigital.com.co/#login/" target="_blank">
                                <picture>
                                    <source srcset="{{ asset('images/carousel/carousel_movil_2.webp') }}" type="image/webp" />
                                    <source srcset="{{ asset('images/carousel/carousel_movil_2.png') }}" type="image/png" />
                                    <img src="{{ asset('images/carousel/carousel_movil_2.') }}" class="d-block w-100"
                                        alt="GYP 2023" id="imgCarruselGyp" />
                                </picture>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <picture tabindex="0">
                                <source srcset="{{ asset('images/carousel/carousel_movil_3.webp') }}" type="image/webp" />
                                <source srcset="{{ asset('images/carousel/carousel_movil_3.png') }}" type="image/png" />
                                <img src="{{ asset('images/carousel/carousel_movil_3.webp') }}" class="d-block w-100"
                                    alt="GYP 2023" id="imgCarruselGyp" />
                            </picture>
                        </div>
                        <div class="carousel-item">
                            <picture tabindex="0">
                                <source srcset="{{ asset('images/carousel/carousel_movil_4.webp') }}" type="image/webp" />
                                <source srcset="{{ asset('images/carousel/carousel_movil_4.png') }}" type="image/png" />
                                <img src="{{ asset('images/carousel/carousel_movil_4.webp') }}" class="d-block w-100"
                                    alt="GYP 2023" id="imgCarruselGyp" />
                            </picture>
                        </div>
                        <div class="carousel-item">
                            <picture tabindex="0">
                                <source srcset="{{ asset('images/carousel/carousel_movil_5.webp') }}" type="image/webp" />
                                <source srcset="{{ asset('images/carousel/carousel_movil_5.png') }}" type="image/png" />
                                <img src="{{ asset('images/carousel/carousel_movil_5.webp') }}" class="d-block w-100"
                                    alt="GYP 2023" id="imgCarruselGyp" />
                            </picture>
                        </div>
                    </div>
                @elsehandheld
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="videos/home_video.mp4" id="videoHomeLink">
                                <picture>
                                    <source srcset="{{ asset('images/carousel/carousel_1.webp') }}" type="image/webp" />
                                    <source srcset="{{ asset('images/carousel/carousel_1.png') }}" type="image/png" />
                                    <img src="{{ asset('images/carousel/carousel_1.webp') }}" class="d-block w-100"
                                        alt="GYP 2023" id="imgCarruselGyp" />
                                </picture>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="https://vus.circulemosdigital.com.co/#login/" target="_blank">
                                <picture>
                                    <source srcset="{{ asset('images/carousel/carousel_2.webp') }}" type="image/webp" />
                                    <source srcset="{{ asset('images/carousel/carousel_2.png') }}" type="image/png" />
                                    <img src="{{ asset('images/carousel/carousel_2.webp') }}" class="d-block w-100"
                                        alt="GYP 2023" id="imgCarruselGyp" />
                                </picture>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <picture tabindex="0">
                                <source srcset="{{ asset('images/carousel/carousel_3.webp') }}" type="image/webp" />
                                <source srcset="{{ asset('images/carousel/carousel_3.png') }}" type="image/png" />
                                <img src="{{ asset('images/carousel/carousel_3.webp') }}" class="d-block w-100"
                                    alt="GYP 2023" id="imgCarruselGyp" />
                            </picture>
                        </div>
                        <div class="carousel-item">
                            <picture tabindex="0">
                                <source srcset="{{ asset('images/carousel/carousel_4.webp') }}" type="image/webp" />
                                <source srcset="{{ asset('images/carousel/carousel_4.png') }}" type="image/png" />
                                <img src="{{ asset('images/carousel/carousel_4.webp') }}" class="d-block w-100"
                                    alt="GYP 2023" id="imgCarruselGyp" />
                            </picture>
                        </div>
                        <div class="carousel-item">
                            <picture tabindex="0">
                                <source srcset="{{ asset('images/carousel/carousel_5.webp') }}" type="image/webp" />
                                <source srcset="{{ asset('images/carousel/carousel_5.png') }}" type="image/png" />
                                <img src="{{ asset('images/carousel/carousel_5.webp') }}" class="d-block w-100"
                                    alt="GYP 2023" id="imgCarruselGyp" />
                            </picture>
                        </div>
                    </div>
                @endhandheld
                <a class="carousel-control-prev" href="#derechosDeberes" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" tabindex="0"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#derechosDeberes" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" tabindex="0"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="sectionPageVideo">
        <div class="container">
            <br>
            <div class="row" id="ciudadanoRecuerda">
                <div class="col-md-2" id=imgCiudadanoRecuerda>
                    <picture tabindex="0">
                        <source srcset="{{ asset('images/home/icon_home.webp') }}" type="image/webp" />
                        <source srcset="{{ asset('images/home/icon_home.png') }}" type="image/png" />
                        <img src="{{ asset('images/home/icon_home.webp') }}" id="iconHome" alt="Inicio" />
                    </picture>
                </div>
                <div class="col-md-10">
                    <p id="subtitleBannerVideo" tabindex="0">¡Ciudadano, recuerda!</p>
                    <p id="textBannerVideo" tabindex="0">Los trámites y asesorías correspondientes al retiro del
                        vehículo inmovilizado en patio, son gratuitos,
                        no requieren tramitadores.<br>
                        Si has sido victima de estafa, presenta tu denuncia en <a
                            href="mailto:denuncias@gypbogota.com">denuncias@gypbogota.com</a></p>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-md-12">
                    <h3 id="tituloSubPaginaHome" tabindex="0">Información de interés</h2>
                </div>
            </div>
            <br>
            <div class="grid-container-infoInteres">
                <div>
                    <a href="servicios/gruas">
                        <picture>
                            <source srcset="{{ asset('images/home/informacion_interes_1.webp') }}" type="image/webp" />
                            <source srcset="{{ asset('images/home/informacion_interes_1.png') }}" type="image/png" />
                            <img src="{{ asset('images/home/informacion_interes_1.webp') }}" id="imagenServicios"
                                alt="Grúas" />
                        </picture>
                    </a>
                </div>
                <div>
                    <a href="puntosAtencion">
                        <picture>
                            <source srcset="{{ asset('images/home/informacion_interes_2.webp') }}" type="image/webp" />
                            <source srcset="{{ asset('images/home/informacion_interes_2.png') }}" type="image/png" />
                            <img src="{{ asset('images/home/informacion_interes_2.webp') }}" id="imagenServicios"
                                alt="Puntos Atención" />
                        </picture>
                    </a>
                </div>
                <div>
                    <a href="servicios/procesoRetiro">
                        <picture>
                            <source srcset="{{ asset('images/home/informacion_interes_3.webp') }}" type="image/webp" />
                            <source srcset="{{ asset('images/home/informacion_interes_3.png') }}" type="image/png" />
                            <img src="{{ asset('images/home/informacion_interes_3.webp') }}" id="imagenServicios"
                                alt="Proceso Retiro" />
                        </picture>
                    </a>
                </div>
                <div>
                    <a href="servicios/monitoreoCamaras">
                        <picture>
                            <source srcset="{{ asset('images/home/informacion_interes_4.webp') }}" type="image/webp" />
                            <source srcset="{{ asset('images/home/informacion_interes_4.png') }}" type="image/png" />
                            <img src="{{ asset('images/home/informacion_interes_4.webp') }}" id="imagenServicios"
                                alt="Monitoreo con cámaras" />
                        </picture>
                    </a>
                </div>
                <div>
                    <a href="documentos/Tarifas_Subsanación_2023.pdf" target="_blank">
                        <picture>
                            <source srcset="{{ asset('images/home/informacion_interes_5.webp') }}" type="image/webp" />
                            <source srcset="{{ asset('images/home/informacion_interes_5.png') }}" type="image/png" />
                            <img src="{{ asset('images/home/informacion_interes_5.webp') }}" id="imagenServicios"
                                alt="Tarifas de servicio mecánica" />
                        </picture>
                    </a>
                </div>
                <div>
                    <a href="pagoLinea">
                        <picture>
                            <source srcset="{{ asset('images/home/informacion_interes_6.webp') }}" type="image/webp" />
                            <source srcset="{{ asset('images/home/informacion_interes_6.png') }}" type="image/png" />
                            <img src="{{ asset('images/home/informacion_interes_6.webp') }}" id="imagenServicios"
                                alt="Liquidación de servicios" />
                        </picture>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h3 id="tituloSubPaginaHome" tabindex="0">Nuestras tarifas</h2>
                </div>
            </div>
            <div class="row" id="NuestrosServiciosDescripcion">
                <div class="col-md-4">
                    <a href="servicios/tarifas">
                        <picture>
                            <source srcset="{{ asset('images/home/tarifas.webp') }}" type="image/webp" />
                            <source srcset="{{ asset('images/home/tarifas.png') }}" type="image/png" />
                            <img src="{{ asset('images/home/tarifas.webp') }}" id="imagenServicios"
                                alt="Nuestras Tarifas" />
                        </picture>
                    </a>
                </div>
                <div class="col-md-8">
                    <p id="tarifasText" tabindex="0">
                        De acuerdo con lo establecido en el artículo segundo y subsiguientes de la <b>Resolución 62 de 2018,
                            modificada por la Resolución 172 de 2019</b> expedidas por la Secretaría de Movilidad en
                        concordancia
                        con lo dispuesto por el Gobierno Nacional en lo referente al nuevo <b>Salario Mínimo Legal
                            Mensual</b>,
                        le informamos que a partir del 1 de enero de {{ $YearNow }} se cobrarán los siguientes valores
                        por los servicios
                        de parqueadero y Grúas prestados así:
                        <br>
                        <br>
                        <a href="servicios/tarifas" id="tarifasEnlace">
                            <picture>
                                <source srcset="{{ asset('images/home/boton_tarifas.webp') }}" type="image/webp" />
                                <source srcset="{{ asset('images/home/boton_tarifas.png') }}" type="image/png" />
                                <img src="{{ asset('images/home/boton_tarifas.webp') }}" alt="Nuestras Tarifas"
                                    id="imagenTarifasHome" />
                            </picture>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="imagePage">
            <span id="contadorVisitas">
                {{ $Visitas }}</span><br>
            <p>Visitas a la página</p>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
