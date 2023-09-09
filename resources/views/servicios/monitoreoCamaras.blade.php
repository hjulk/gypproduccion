@extends("servicios.layout")

@section('titulo')
- Monitoreo con Cámaras
@endsection

@section('styles')

@endsection

@section('barraInformacion')
<div class="overlay" id="franjaSubpagina">
    <div class="container">
        <div class="row align-items-center" id="franjaTituloCabecera">
            <div class="col-lg-6">
                <h2 id="tituloSubPagina">Monitoreo con cámaras</h2>
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
                <span id="iconoRutaPagina"><b>></b></span> Monitoreo con cámaras
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
                    <h3 id="titlesubServicios" tabindex="0">Una de las novedades que trae este servicio es la tecnología, todas las Grúas estarán dotadas con GPS y tres cámaras que registrarán la operación.</h3>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section>
        <div class="container">
            <div class="row" id="imagesBeneficios">
                <div class="col-md-12" id="pageImage">
                    @if ($ImgMonitoreo)
                        @foreach ($ImgMonitoreo as $images)
                            @if (strpos($images->UBICACION, '.jpg') !== false)                                
                                <picture tabindex="0">
                                    <source srcset="{{ asset(str_replace('../', '', $images->UBICACION_WEBP)) }}" type="image/webp"/>
                                    <source srcset="{{ asset(str_replace('../', '/', $images->UBICACION)) }}" type="image/jpg"/>
                                    <img src="{{ asset(str_replace('../', '/', $images->UBICACION_WEBP)) }}" id="imagenPagina" alt="Monitoreo con Cámaras"/>
                                </picture>
                                <br>
                                <p id="footerImage">{!! $images->PIE_IMAGEN !!}</p>                                
                            @else
                                <picture tabindex="0">
                                    <source srcset="{{ asset(str_replace('../', '', $images->UBICACION_WEBP)) }}" type="image/webp"/>
                                    <source srcset="{{ asset(str_replace('../', '/', $images->UBICACION)) }}" type="image/png"/>
                                    <img src="{{ asset(str_replace('../', '/', $images->UBICACION_WEBP)) }}" id="imagenPagina" alt="Monitoreo con Cámaras"/>
                                </picture>
                                <br>
                                <p id="footerImage">{!! $images->PIE_IMAGEN !!}</p>                                
                            @endif
                        @endforeach
                    @endif
                    {{-- <picture tabindex="0">
                        <source srcset="{{asset("images/servicios/monitoreo_camaras/monitoreo_camaras.webp") }}" type="image/webp">
                        <source srcset="{{asset("images/servicios/monitoreo_camaras/monitoreo_camaras.png") }}" type="image/png">
                        <img src="{{asset("images/servicios/monitoreo_camaras/monitoreo_camaras.webp") }}" id="imagenPagina" alt="Monitoreo con Cámaras">
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2023</p> --}}
                </div>
            </div>
        </div>
    </section>
    <br>
@endsection

@section('scripts')

@endsection
