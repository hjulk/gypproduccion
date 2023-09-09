@extends("servicios.layout")

@section('titulo')
- Beneficios
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloCabecera">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Beneficios</h2>
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
                    <span id="iconoRutaPagina"><b>></b></span> Beneficios
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="pageImage">
            <h3 id="titlesubServicios" tabindex="0">¿YA CONOCES EL MODELO DE GRÚAS Y PARQUEADEROS EN BOGOTÁ?</h3>
        </div>
    </section>
    <br>
    @if ($ImagenesBeneficios)
        @foreach($ImagenesBeneficios as $imagesB)
            <section>
                <div class="container">
                    <div class="row" id="pageImage">
                        <div class="col-md-12">
                            <h5 tabindex="0">{!! $imagesB->TEXTO_IMAGEN !!}</h5>
                        </div>
                    </div>
                    <div class="row" id="imagesBeneficios">
                        <div class="col-md-12" id="pageImage">
                            @if(strpos($imagesB->UBICACION, '.jpg') !== false)
                                <picture tabindex="0">
                                    <source srcset="{{ asset(str_replace('../', '', $imagesB->UBICACION_WEBP)) }}" type="image/webp"/>
                                    <source srcset="{{ asset(str_replace('../', '/', $imagesB->UBICACION)) }}" type="image/jpg"/>
                                    <img src="{{ asset(str_replace('../', '/', $imagesB->UBICACION_WEBP)) }}" id="imagenServicios" alt="Beneficios"/>
                                </picture>
                            @else
                                <picture tabindex="0">
                                    <source srcset="{{ asset(str_replace('../', '/', $imagesB->UBICACION_WEBP)) }}" type="image/webp"/>
                                    <source srcset="{{ asset(str_replace('../', '/', $imagesB->UBICACION)) }}" type="image/png"/>
                                    <img src="{{ asset(str_replace('../', '/', $imagesB->UBICACION_WEBP)) }}" id="imagenServicios" alt="Beneficios"/>
                                </picture>
                            @endif
                            <p id="footerImage">{!! $imagesB->PIE_IMAGEN !!}</p>
                        </div>
                    </div>
                </div>
            </section>
            <br>
        @endforeach
    @endif
    <br>
@endsection

@section('scripts')

@endsection
