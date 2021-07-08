@extends("servicios.layout")

@section('titulo')
- Monitoreo con Cámaras
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="ftco-cover-1 overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Monitoreo con Cámaras</h2>
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
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span> Monitoreo con Cámaras
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="pageImage">
            <h3 id="titlesubServicios">Una de las novedades que trae este servicio es la tecnología, todas las Grúas estarán dotadas con GPS y tres cámaras que registrarán la operación.</h3>
        </div>
    </section>
    <br>
    {{-- <section class="ftco-section" id="sectionPage">
        <div class="container" id="imagePage">
            <picture>
                <source srcset="{{asset("images/monitoreo_camara.webp") }}" type="image/webp"/>
                <source srcset="{{asset("images/monitoreo_camara.jpg") }}" type="image/jpg"/>
                <img src="{{asset("images/monitoreo_camara.webp") }}" id="imagenPagina" alt="Monitoreo Cámara"/>
            </picture>
            <p>Foto: GyP Bogotá S.A.S - Año: 2021</p>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="imagePage">
            <picture>
                <source srcset="{{asset("images/monitoreo_camara_1.webp") }}" type="image/webp"/>
                <source srcset="{{asset("images/monitoreo_camara_1.jpg") }}" type="image/jpg"/>
                <img src="{{asset("images/monitoreo_camara_1.webp") }}" id="imagenPagina" alt="Monitoreo Cámara"/>
            </picture>
            <p>Foto: GyP Bogotá S.A.S - Año: 2021</p>
        </div>
    </section>
    <br> --}}
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="imagePage">
            <picture>
                <source srcset="{{asset("images/monitoreo_camara_2.webp") }}" type="image/webp"/>
                <source srcset="{{asset("images/monitoreo_camara_2.jpg") }}" type="image/jpg"/>
                <img src="{{asset("images/monitoreo_camara_2.webp") }}" id="imagenPagina" alt="Monitoreo Cámara"/>
            </picture>
            <p>Foto: GyP Bogotá S.A.S - Año: 2021</p>
        </div>
    </section>
    <br>
@endsection

@section('scripts')

@endsection
