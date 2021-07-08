@extends("servicios.layout")

@section('titulo')
- Proceso Retiro
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="ftco-cover-1 overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Proceso Retiro</h2>
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
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span> Proceso Retiro
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
<section class="ftco-section" id="sectionPage">
    <div class="container" id="imagePage">
        <picture>
            <source srcset="{{asset("images/PASOS_PARA_RETIRAR_EL_VEHICULO.webp") }}" type="image/webp"/>
            <source srcset="{{asset("images/PASOS_PARA_RETIRAR_EL_VEHICULO.jpg") }}" type="image/jpg"/>
            <img src="{{asset("images/PASOS_PARA_RETIRAR_EL_VEHICULO.webp") }}" id="imagenPagina" alt="Proceso Retiro"/>
        </picture>
        <p>Foto: GyP Bogotá S.A.S - Año: 2021</p>
    </div>
    </section>
    <br>
@endsection

@section('scripts')

@endsection
