@extends("servicios.layout")

@section('titulo')
- Tarifas
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="ftco-cover-1 overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Tarifas</h2>
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
                    <a href="nuestrosServicios" id="subruta"> Servicios</a>
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span> Tarifas
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    @if($ImgTarifas)
        @foreach($ImgTarifas as $images)
            <section class="ftco-section" id="sectionPage">
                <div class="container" id="imagePage">
                    @if(strpos($images->UBICACION, '.jpg') !== false)
                        <picture>
                            <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp"/>
                            <source srcset="{{ $images->UBICACION }}" type="image/jpg"/>
                            <img src="{{ $images->UBICACION_WEBP }}" id="imagenPagina" alt="Tarifas"/>
                        </picture>
                    @else
                        <picture>
                            <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp"/>
                            <source srcset="{{ $images->UBICACION }}" type="image/png"/>
                            <img src="{{ $images->UBICACION_WEBP }}" id="imagenPagina" alt="Tarifas"/>
                        </picture>
                    @endif
                    <p id="footerImage">{!! $images->PIE_IMAGEN!!}</p>
                </div>
            </section>
            <br>
        @endforeach
    @endif
    <br>
@endsection

@section('scripts')

@endsection
