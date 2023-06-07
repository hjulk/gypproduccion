@extends('servicios.layout')

@section('titulo')
    - Grúas
@endsection

@section('styles')
@endsection

@section('barraInformacion')
    <div class="overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloCabecera">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Gruas</h2>
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
                    <span id="iconoRutaPagina"><b>></b></span> Gruas
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
                    <h3 id="titleGruas" tabindex="0">RESOLUCIÓN 5443 DE 2009</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h4 id="subTitleGruas" tabindex="0">Características de un tipo de carrocerías</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p id="resolucionGruas" tabindex="0">
                        En virtud de la resolución 5443 de 2009, se define un vehículo con tipo de
                        carrocería grúa como: "Automotor especialmente diseñado con sistema de enganche para levantar y
                        remolcar otro vehículo". Para el particular esta carrocería está diseñada para llevar cierta
                        cantidad de
                        peso, este puede ser atribuido a uno o varios automotores siempre y cuando no
                        sobrepasen la capacidad del vehículo y sus anclajes cumplan con las normas de
                        seguridad vigentes para evitar accidentes.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-12">
                    <h3 id="tituloSubPaginaHome">Tipos de grúa con los que cuenta el consecionario</h2>
                </div>
            </div>
            <br>
        </div>
    </section>
    <section class="ftco-section" id="sectionGruas">
        <div class="container" id="containerGruas">
            <div class="row">
                <div class="col-md-12" style="align-self: center;">
                    <h4 class="text-primary" id="subTitleGruas" tabindex="0">Gancho extrapesado</h4><br>
                    <p id="contentGruas" tabindex="0">
                        Grúa con gancho con capacidad para transportar vehículos de hasta 16 toneladas.
                    </p>
                </div>
            </div>
            <div class="row">
                @if ($ExtraPesado)
                    @foreach ($ExtraPesado as $images)
                        @if (strpos($images->UBICACION, '.jpg') !== false)
                            <div class="col-md-6" style="align-self: center;">
                                <picture tabindex="0">
                                    <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp" />
                                    <source srcset="{{ $images->UBICACION }}" type="image/jpg" />
                                    <img src="{{ $images->UBICACION_WEBP }}" id="imagesGruas" alt="Gancho Extrapesado" />
                                </picture>
                                <br>
                                <p id="footerImage">{!! $images->PIE_IMAGEN !!}</p>
                            </div>
                        @else
                            <div class="col-md-6" style="align-self: center;">
                                <picture tabindex="0">
                                    <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp" />
                                    <source srcset="{{ $images->UBICACION }}" type="image/png" />
                                    <img src="{{ $images->UBICACION_WEBP }}" id="imagesGruas" alt="Gancho Extrapesado" />
                                </picture>
                                <br>
                                <p id="footerImage">{!! $images->PIE_IMAGEN !!}</p>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <section class="ftco-section" id="sectionGruas">
        <div class="container" id="containerGruas">
            <div class="row">
                <div class="col-md-12" style="align-self: center;">
                    <h4 class="text-primary" id="subTitleGruas" tabindex="0">Gancho pesado</h4><br>
                    <p id="contentGruas" tabindex="0">
                        Grúa con gancho con capacidad para transportar vehículos de hasta 10 toneladas.
                    </p>
                </div>
            </div>
            <div class="row">
                @if ($Pesado)
                    @foreach ($Pesado as $images)
                        @if (strpos($images->UBICACION, '.jpg') !== false)
                            <div class="col-md-6" style="align-self: center;">
                                <picture tabindex="0">
                                    <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp" />
                                    <source srcset="{{ $images->UBICACION }}" type="image/jpg" />
                                    <img src="{{ $images->UBICACION_WEBP }}" id="imagesGruas" alt="Gancho Pesado" />
                                </picture>
                                <br>
                                <p id="footerImage">{!! $images->PIE_IMAGEN !!}</p>
                            </div>
                        @else
                            <div class="col-md-6" style="align-self: center;">
                                <picture tabindex="0">
                                    <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp" />
                                    <source srcset="{{ $images->UBICACION }}" type="image/png" />
                                    <img src="{{ $images->UBICACION_WEBP }}" id="imagesGruas" alt="Gancho Pesado" />
                                </picture>
                                <br>
                                <p id="footerImage">{!! $images->PIE_IMAGEN !!}</p>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <section class="ftco-section" id="sectionGruas">
        <div class="container" id="containerGruas">
            <div class="row">
                <div class="col-md-12" style="align-self: center;">
                    <h4 class="text-primary" id="subTitleGruas" tabindex="0">Grúas de planchón</h4><br>
                    <p id="contentGruas" tabindex="0">
                        Grúas con plataforma de transporte de vehículos livianos, medianos y motocicletas.
                    </p>
                </div>
            </div>
            <div class="row">
                @if ($Planchon)
                    @foreach ($Planchon as $images)
                        @if (strpos($images->UBICACION, '.jpg') !== false)
                            <div class="col-md-6" style="align-self: center;">
                                <picture tabindex="0">
                                    <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp" />
                                    <source srcset="{{ $images->UBICACION }}" type="image/jpg" />
                                    <img src="{{ $images->UBICACION_WEBP }}" id="imagesGruas" alt="Gancho Planchon" />
                                </picture>
                                <br>
                                <p id="footerImage">{!! $images->PIE_IMAGEN !!}</p>
                            </div>
                        @else
                            <div class="col-md-6" style="align-self: center;">
                                <picture tabindex="0">
                                    <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp" />
                                    <source srcset="{{ $images->UBICACION }}" type="image/png" />
                                    <img src="{{ $images->UBICACION_WEBP }}" id="imagesGruas" alt="Gancho Planchon" />
                                </picture>
                                <br>
                                <p id="footerImage">{!! $images->PIE_IMAGEN !!}</p>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <section class="ftco-section" id="sectionGruas">
        <div class="container" id="containerGruas">
            <div class="row">
                <div class="col-md-12" style="align-self: center;">
                    <h4 class="text-primary" id="subTitleGruas" tabindex="0">Grúas de planchón para motocicletas</h4>
                    <br>
                    <p id="contentGruas" tabindex="0">
                        Grúas con plataforma para el transporte de motocicletas.
                    </p>
                </div>
            </div>
            <div class="row">
                @if ($PlanchonMoto)
                    @foreach ($PlanchonMoto as $images)
                        @if (strpos($images->UBICACION, '.jpg') !== false)
                            <div class="col-md-6" style="align-self: center;">
                                <picture tabindex="0">
                                    <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp" />
                                    <source srcset="{{ $images->UBICACION }}" type="image/jpg" />
                                    <img src="{{ $images->UBICACION_WEBP }}" id="imagesGruas"
                                        alt="Gancho Planchon Moto" />
                                </picture>
                                <br>
                                <p id="footerImage">{!! $images->PIE_IMAGEN !!}</p>
                            </div>
                        @else
                            <div class="col-md-6" style="align-self: center;">
                                <picture tabindex="0">
                                    <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp" />
                                    <source srcset="{{ $images->UBICACION }}" type="image/png" />
                                    <img src="{{ $images->UBICACION_WEBP }}" id="imagesGruas"
                                        alt="Gancho Planchon Moto" />
                                </picture>
                                <br>
                                <p id="footerImage">{!! $images->PIE_IMAGEN !!}</p>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <section class="ftco-section" id="sectionGruas">
        <div class="container" id="containerGruas">
            <div class="row">
                <div class="col-md-12" style="align-self: center;">
                    <h4 class="text-primary" id="subTitleGruas" tabindex="0">Grúas de izaje lateral</h4>
                    <br>
                    <p id="contentGruas" tabindex="0">
                        Grúas con dispositivo lateral para izaje de vehículos livianos y medianos.
                    </p>
                </div>
            </div>
            <div class="row">
                @if ($IzajeLateral)
                    @foreach ($IzajeLateral as $images)
                        @if (strpos($images->UBICACION, '.jpg') !== false)
                            <div class="col-md-6" style="align-self: center;">
                                <picture tabindex="0">
                                    <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp" />
                                    <source srcset="{{ $images->UBICACION }}" type="image/jpg" />
                                    <img src="{{ $images->UBICACION_WEBP }}" id="imagesGruas"
                                        alt="Gancho Izaje Lateral" />
                                </picture>
                                <br>
                                <p id="footerImage">{!! $images->PIE_IMAGEN !!}</p>
                            </div>
                        @else
                            <div class="col-md-6" style="align-self: center;">
                                <picture tabindex="0">
                                    <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp" />
                                    <source srcset="{{ $images->UBICACION }}" type="image/png" />
                                    <img src="{{ $images->UBICACION_WEBP }}" id="imagesGruas"
                                        alt="Gancho Izaje Lateral" />
                                </picture>
                                <br>
                                <p id="footerImage">{!! $images->PIE_IMAGEN !!}</p>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <br>
@endsection

@section('scripts')
@endsection
