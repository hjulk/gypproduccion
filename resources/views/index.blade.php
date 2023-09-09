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
                    @handheld
                        @if($BannerMovil)
                            @foreach($BannerMovil as $images)
                                @if($images->ENLACE)
                                    <a href="{{ $images->ENLACE }}" target="_blank">
                                        @if(strpos($images->UBICACION, '.jpg') !== false)
                                            <picture tabindex="0">
                                                <source srcset="{{  asset(str_replace('../', '', $images->UBICACION_WEBP)) }}" type="image/webp"/>
                                                <source srcset="{{ asset(str_replace('../', '/', $images->UBICACION)) }}" type="image/jpg"/>
                                                <img src="{{ asset(str_replace('../', '/', $images->UBICACION_WEBP)) }}" id="imagenPagina" alt="Banner" class="bannerHome mx-auto"/>
                                            </picture>
                                        @else
                                            <picture tabindex="0">
                                                <source srcset="{{ asset(str_replace('../', '/', $images->UBICACION_WEBP)) }}" type="image/webp"/>
                                                <source srcset="{{ asset(str_replace('../', '/', $images->UBICACION)) }}" type="image/png"/>
                                                <img src="{{ asset(str_replace('../', '/', $images->UBICACION_WEBP)) }}" id="imagenPagina" alt="Banner" class="bannerHome mx-auto"/>
                                            </picture>
                                        @endif
                                    </a>
                                @else
                                    @if(strpos($images->UBICACION, '.jpg') !== false)
                                        <picture tabindex="0">
                                            <source srcset="{{  asset(str_replace('../', '', $images->UBICACION_WEBP)) }}" type="image/webp"/>
                                            <source srcset="{{ asset(str_replace('../', '/', $images->UBICACION)) }}" type="image/jpg"/>
                                            <img src="{{ asset(str_replace('../', '/', $images->UBICACION_WEBP)) }}" id="imagenPagina" alt="Banner" class="bannerHome mx-auto"/>
                                        </picture>
                                    @else
                                        <picture tabindex="0">
                                            <source srcset="{{ asset(str_replace('../', '/', $images->UBICACION_WEBP)) }}" type="image/webp"/>
                                            <source srcset="{{ asset(str_replace('../', '/', $images->UBICACION)) }}" type="image/png"/>
                                            <img src="{{ asset(str_replace('../', '/', $images->UBICACION_WEBP)) }}" id="imagenPagina" alt="Banner" class="bannerHome mx-auto"/>
                                        </picture>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @elsehandheld
                        @if($Banner)
                            @foreach($Banner as $imagesB)
                                @if($imagesB->ENLACE)
                                    <a href="{{ $imagesB->ENLACE }}" target="_blank">
                                        @if(strpos($imagesB->UBICACION, '.jpg') !== false)
                                            <picture>
                                                <source srcset="{{  asset(str_replace('../', '', $imagesB->UBICACION_WEBP)) }}" type="image/webp"/>
                                                <source srcset="{{ asset(str_replace('../', '/', $imagesB->UBICACION)) }}" type="image/jpg"/>
                                                <img src="{{ asset(str_replace('../', '/', $imagesB->UBICACION_WEBP)) }}" id="imagenPagina" alt="Banner" class="bannerHome mx-auto"/>
                                            </picture>
                                        @else
                                            <picture>
                                                <source srcset="{{ asset(str_replace('../', '/', $imagesB->UBICACION_WEBP)) }}" type="image/webp"/>
                                                <source srcset="{{ asset(str_replace('../', '/', $imagesB->UBICACION)) }}" type="image/png"/>
                                                <img src="{{ asset(str_replace('../', '/', $imagesB->UBICACION_WEBP)) }}" id="imagenPagina" alt="Banner" class="bannerHome mx-auto"/>
                                            </picture>
                                        @endif
                                    </a>
                                @else
                                    @if(strpos($imagesB->UBICACION, '.jpg') !== false)
                                        <picture>
                                            <source srcset="{{  asset(str_replace('../', '', $imagesB->UBICACION_WEBP)) }}" type="image/webp"/>
                                            <source srcset="{{ asset(str_replace('../', '/', $imagesB->UBICACION)) }}" type="image/jpg"/>
                                            <img src="{{ asset(str_replace('../', '/', $imagesB->UBICACION_WEBP)) }}" id="imagenPagina" alt="Banner" class="bannerHome mx-auto"/>
                                        </picture>
                                    @else
                                        <picture>
                                            <source srcset="{{ asset(str_replace('../', '/', $imagesB->UBICACION_WEBP)) }}" type="image/webp"/>
                                            <source srcset="{{ asset(str_replace('../', '/', $imagesB->UBICACION)) }}" type="image/png"/>
                                            <img src="{{ asset(str_replace('../', '/', $imagesB->UBICACION_WEBP)) }}" id="imagenPagina" alt="Banner" class="bannerHome mx-auto"/>
                                        </picture>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endhandheld
                </div>
            </div>
        </div>
    </section>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="imagePageAviso">
            <div id="carruselPrincipal" class="carousel slide carousel-fade" data-ride="carousel">
                
                @handheld
                    <ol class="carousel-indicators" tabindex="0">
                        @if($ContadorCarruselMovil)
                            @for($ContadorCM = 0; $ContadorCM < $ContadorCarruselMovil;$ContadorCM++)
                                <li data-target="#carruselPrincipal" data-slide-to="{{ $ContadorCM}}" class="@if($ContadorCM === 0) active @endif"></li>
                            @endfor
                        @endif
                    </ol>
                    <div class="carousel-inner">
                        @if($CarruselMovil)
                            @foreach($CarruselMovil as $index => $value)
                                    <div class="carousel-item @if($index === 0) active @endif">
                                        @if($value->ENLACE)
                                            <a href="{{ $value->ENLACE }}" @if(strpos($value->ENLACE, 'videos') !== false) id="videoHomeLink" @else target="_blank" @endif>
                                                @if(strpos($value->UBICACION, '.jpg') !== false)
                                                    <picture>
                                                        <source srcset="{{  asset(str_replace('../', '', $value->UBICACION_WEBP)) }}" type="image/webp"/>
                                                        <source srcset="{{ asset(str_replace('../', '/', $value->UBICACION)) }}" type="image/jpg"/>
                                                        <img src="{{ asset(str_replace('../', '/', $value->UBICACION_WEBP)) }}" id="imgCarruselGyp" alt="GYP 2023" class="d-block w-100"/>
                                                    </picture>
                                                @else
                                                    <picture>
                                                        <source srcset="{{ asset(str_replace('../', '/', $value->UBICACION_WEBP)) }}" type="image/webp"/>
                                                        <source srcset="{{ asset(str_replace('../', '/', $value->UBICACION)) }}" type="image/png"/>
                                                        <img src="{{ asset(str_replace('../', '/', $value->UBICACION_WEBP)) }}" id="imgCarruselGyp" alt="GYP 2023" class="d-block w-100"/>
                                                    </picture>
                                                @endif
                                            </a>
                                        @else
                                            @if(strpos($value->UBICACION, '.jpg') !== false)
                                                <picture>
                                                    <source srcset="{{  asset(str_replace('../', '', $value->UBICACION_WEBP)) }}" type="image/webp"/>
                                                    <source srcset="{{ asset(str_replace('../', '/', $value->UBICACION)) }}" type="image/jpg"/>
                                                    <img src="{{ asset(str_replace('../', '/', $value->UBICACION_WEBP)) }}" id="imgCarruselGyp" alt="GYP 2023" class="d-block w-100"/>
                                                </picture>
                                            @else
                                                <picture>
                                                    <source srcset="{{ asset(str_replace('../', '/', $value->UBICACION_WEBP)) }}" type="image/webp"/>
                                                    <source srcset="{{ asset(str_replace('../', '/', $value->UBICACION)) }}" type="image/png"/>
                                                    <img src="{{ asset(str_replace('../', '/', $value->UBICACION_WEBP)) }}" id="imgCarruselGyp" alt="GYP 2023" class="d-block w-100"/>
                                                </picture>
                                            @endif
                                        @endif
                                    </div>
                            @endforeach                        
                        @endif
                    </div>
                @elsehandheld
                    <ol class="carousel-indicators" tabindex="0">
                        @if($ContadorCarrusel)
                            @for($Contador = 0; $Contador < $ContadorCarrusel;$Contador++)
                                <li data-target="#carruselPrincipal" data-slide-to="{{ $Contador}}" class="@if($Contador === 0) active @endif"></li>
                            @endfor                        
                        @endif
                    </ol>
                    <div class="carousel-inner">                  
                        @if($Carrusel)
                            @foreach($Carrusel as $index => $imagen)
                                    <div class="carousel-item @if($index === 0) active @endif">
                                        @if($imagen->ENLACE)
                                            <a href="{{ $imagen->ENLACE }}" @if(strpos($imagen->ENLACE, 'videos') !== false) id="videoHomeLink" @else target="_blank" @endif>
                                                @if(strpos($imagen->UBICACION, '.jpg') !== false)
                                                    <picture>
                                                        <source srcset="{{  asset(str_replace('../', '', $imagen->UBICACION_WEBP)) }}" type="image/webp"/>
                                                        <source srcset="{{ asset(str_replace('../', '/', $imagen->UBICACION)) }}" type="image/jpg"/>
                                                        <img src="{{ asset(str_replace('../', '/', $imagen->UBICACION_WEBP)) }}" id="imgCarruselGyp" alt="GYP 2023" class="d-block w-100"/>
                                                    </picture>
                                                @else
                                                    <picture>
                                                        <source srcset="{{ asset(str_replace('../', '/', $imagen->UBICACION_WEBP)) }}" type="image/webp"/>
                                                        <source srcset="{{ asset(str_replace('../', '/', $imagen->UBICACION)) }}" type="image/png"/>
                                                        <img src="{{ asset(str_replace('../', '/', $imagen->UBICACION_WEBP)) }}" id="imgCarruselGyp" alt="GYP 2023" class="d-block w-100"/>
                                                    </picture>
                                                @endif
                                            </a>
                                        @else
                                            @if(strpos($imagen->UBICACION, '.jpg') !== false)
                                                <picture>
                                                    <source srcset="{{  asset(str_replace('../', '', $imagen->UBICACION_WEBP)) }}" type="image/webp"/>
                                                    <source srcset="{{ asset(str_replace('../', '/', $imagen->UBICACION)) }}" type="image/jpg"/>
                                                    <img src="{{ asset(str_replace('../', '/', $imagen->UBICACION_WEBP)) }}" id="imgCarruselGyp" alt="GYP 2023" class="d-block w-100"/>
                                                </picture>
                                            @else
                                                <picture>
                                                    <source srcset="{{ asset(str_replace('../', '/', $imagen->UBICACION_WEBP)) }}" type="image/webp"/>
                                                    <source srcset="{{ asset(str_replace('../', '/', $imagen->UBICACION)) }}" type="image/png"/>
                                                    <img src="{{ asset(str_replace('../', '/', $imagen->UBICACION_WEBP)) }}" id="imgCarruselGyp" alt="GYP 2023" class="d-block w-100"/>
                                                </picture>
                                            @endif
                                        @endif
                                    </div>
                            @endforeach                        
                        @endif
                    </div>
                @endhandheld
                <a class="carousel-control-prev" href="#carruselPrincipal" role="button" data-slide="prev"  tabindex="0">
                    <span class="carousel-control-prev-icon" aria-hidden="true" tabindex="0"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carruselPrincipal" role="button" data-slide="next"  tabindex="0">
                    <span class="carousel-control-next-icon" aria-hidden="true" tabindex="0"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <br>
    @if($ImageEndYear)
        <section class="site-section" id="sectionPage">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @foreach($ImageEndYear as $imagesEY)
                            @if(strpos($imagesEY->UBICACION, '.jpg') !== false)
                                <picture tabindex="0">
                                    <source srcset="{{  asset(str_replace('../', '', $imagesEY->UBICACION_WEBP)) }}" type="image/webp"/>
                                    <source srcset="{{ asset(str_replace('../', '/', $imagesEY->UBICACION)) }}" type="image/jpg"/>
                                    <img src="{{ asset(str_replace('../', '/', $imagesEY->UBICACION_WEBP)) }}" id="imagenServicios" alt="Fin de Año"/>
                                    <p id="footerImage">{!! $imagesEY->PIE_IMAGEN !!}</p>
                                </picture>
                            @else
                                <picture tabindex="0">
                                    <source srcset="{{ asset(str_replace('../', '/', $imagesEY->UBICACION_WEBP)) }}" type="image/webp"/>
                                    <source srcset="{{ asset(str_replace('../', '/', $imagesEY->UBICACION)) }}" type="image/png"/>
                                    <img src="{{ asset(str_replace('../', '/', $imagesEY->UBICACION_WEBP)) }}" id="imagenServicios" alt="Fin de Año"/>
                                    <p id="footerImage">{!! $imagesEY->PIE_IMAGEN !!}</p>
                                </picture>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <br>
    @endif
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
    <br>
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
                        @if($Tarifas)
                            @foreach($Tarifas as $imagesT)
                                @if(strpos($imagesT->UBICACION, '.jpg') !== false)
                                    <picture tabindex="0">
                                        <source srcset="{{  asset(str_replace('../', '', $imagesT->UBICACION_WEBP)) }}" type="image/webp"/>
                                        <source srcset="{{ asset(str_replace('../', '/', $imagesT->UBICACION)) }}" type="image/jpg"/>
                                        <img src="{{ asset(str_replace('../', '/', $imagesT->UBICACION_WEBP)) }}" id="imagenServicios" alt="Nuestras Tarifas"/>
                                    </picture>
                                @else
                                    <picture tabindex="0">
                                        <source srcset="{{ asset(str_replace('../', '/', $imagesT->UBICACION_WEBP)) }}" type="image/webp"/>
                                        <source srcset="{{ asset(str_replace('../', '/', $imagesT->UBICACION)) }}" type="image/png"/>
                                        <img src="{{ asset(str_replace('../', '/', $imagesT->UBICACION_WEBP)) }}" id="imagenServicios" alt="Nuestras Tarifas"/>
                                    </picture>
                                @endif
                            @endforeach
                        @endif
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
