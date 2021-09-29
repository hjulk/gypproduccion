@extends("layout")

@section('titulo')
- Pago en Línea
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="ftco-cover-1 overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Pago en Línea</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="ftco-cover-1" id="franjaSubpaginaTitulo">
        <div class="container-md" id="franjaRutaPagina">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('/') }}" id="rutaPagina">Inicio</a>
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span>
                    Tramites
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span> Pago en Línea
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    @if($ImgPagoLinea)
        @foreach($ImgPagoLinea as $images)
            <section class="ftco-section" id="sectionPage">
                <div class="container" id="imagePage">
                    <a href="https://www.movilidadbogota.gov.co/web/content/liquidacion_de_servicios_de_parqueadero_y_gruas" target="_blank">
                        @if(strpos($images->UBICACION, '.jpg') !== false)
                            <picture>
                                <source srcset="{!! str_replace("../", "", $images->UBICACION_WEBP) !!}" type="image/webp"/>
                                <source srcset="{{ $images->UBICACION }}" type="image/jpg"/>
                                <img src="{!! str_replace("../", "", $images->UBICACION_WEBP) !!}" id="imagenPagina" alt="Pago en Línea"/>
                            </picture>
                        @else
                            <picture>
                                <source srcset="{!! str_replace("../", "", $images->UBICACION_WEBP) !!}" type="image/webp"/>
                                <source srcset="{{ $images->UBICACION }}" type="image/png"/>
                                <img src="{!! str_replace("../", "", $images->UBICACION_WEBP) !!}" id="imagenPagina" alt="Pago en Línea"/>
                            </picture>
                        @endif
                    </a>
                    <p id="footerImage">{!! $images->PIE_IMAGEN!!}</p>
                </div>
            </section>
            <br>
        @endforeach
    @endif
@endsection

@section('scripts')

@endsection
