@extends("servicios.layout")

@section('titulo')
- Mensaje de texto de alerta
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="ftco-cover-1 overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Mensaje de texto de alerta</h2>
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
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span> Mensaje de texto de alerta
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="pageImage">
            <h3 id="titlesubServicios">Al ciudadano se le envía un mensaje de texto como señal de alerta informándole que el vehículo ha sido inmovilizado.</h3>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="imagePage">
            <div class="row">
                <div class="col-md-6">
                    <picture>
                        <source srcset="{{asset("images/C0086T01.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/C0086T01.JPG") }}" type="image/jpg"/>
                        <img src="{{asset("images/C0086T01.webp") }}" id="imagenPagina" alt="Mensaje de texto de alerta"/>
                    </picture>
                    <p>Foto: GyP Bogotá S.A.S - Año: 2021</p>
                </div>
                <div class="col-md-6">
                    <picture>
                        <source srcset="{{asset("images/mensaje_1.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/mensaje_1.png") }}" type="image/png"/>
                        <img src="{{asset("images/mensaje_1.webp") }}" id="imagenPagina" alt="Mensaje de texto de alerta"/>
                    </picture>
                    <p>Foto: GyP Bogotá S.A.S - Año: 2021</p>
                </div>
            </div>
        </div>
    </section>

    <br>
@endsection

@section('scripts')

@endsection
