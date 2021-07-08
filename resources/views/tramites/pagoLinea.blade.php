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
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="imagePage">
            <a href="https://www.movilidadbogota.gov.co/web/content/liquidacion_de_servicios_de_parqueadero_y_gruas" target="_blank">
                <picture>
                    <source srcset="{{asset("images/ORDEN-SALIDA-VEHICULO_V2.webp") }}" type="image/webp"/>
                    <source srcset="{{asset("images/ORDEN-SALIDA-VEHICULO_V2.jpg") }}" type="image/jpg"/>
                    <img src="{{asset("images/ORDEN-SALIDA-VEHICULO_V2.webp") }}" id="imagenPagina" alt="Pago en Línea"/>
                </picture>
                <img src="images/ORDEN-SALIDA-VEHICULO_V2.jpg" alt="" id="imagenPagina">
            </a>
            <p>Foto: GyP Bogotá S.A.S - Año: 2021</p>
        </div>
    </section>
    <br>
@endsection

@section('scripts')

@endsection
