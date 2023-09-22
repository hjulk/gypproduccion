@extends("servicios.layout")

@section('titulo')
- Proceso Inmovilización
@endsection

@section('styles')
<link rel="preload" href="{{asset("css/procesoInmovilizacion.css")}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{asset("css/procesoInmovilizacion.css")}}"></noscript>
@endsection

@section('barraInformacion')
<div class="overlay" id="franjaSubpagina">
    <div class="container">
        <div class="row align-items-center" id="franjaTituloCabecera">
            <div class="col-lg-6">
                <h2 id="tituloSubPagina">Proceso inmovilización</h2>
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
                <span id="iconoRutaPagina"><b>></b></span> Proceso inmovilización
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
                    <h3 id="titlesubServicios" tabindex="0">Conoce el proceso correcto de inmovilización de un vehículo</h3>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="sectionPage">
        <div class="container">
            <div id="pasosInmovilizacion1">
                <div>
                    <picture tabindex="0">
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_1.webp")}}" type="image/webp"/>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_1.png")}}" type="image/png"/>
                        <img src="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_1.webp")}}" id="procesoInmovilizacionImg" alt="Proceso Inmovilizacion" class="img-responsive"/>
                    </picture>
                </div>
                <div class="textPR">
                    <p id="textProcesoInmovilizacion" tabindex="0">
                        La grúa es solicitada por la autoridad de tránsito desde la ubicación donde el ciudadano cometió la infracción de tránsito.
                    </p>
                </div>
            </div>
            <div id="pasosInmovilizacion2" class="reverse">
                <div class="textPR">
                    <p id="textProcesoInmovilizacion" tabindex="0">
                        Al llegar, el operador de grúa registra el estado del vehículo en video y genera un inventario digital del mismo.
                    </p>
                </div>
                <div class="imgPR">
                    <picture tabindex="0">
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_2.webp")}}" type="image/webp"/>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_2.png")}}" type="image/png"/>
                        <img src="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_2.webp")}}" id="procesoInmovilizacionImg" alt="Proceso Inmovilizacion" class="img-responsive"/>
                    </picture>
                </div>
            </div>
            <div id="pasosInmovilizacion1">
                <div>
                    <picture tabindex="0">
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_3.webp")}}" type="image/webp"/>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_3.png")}}" type="image/png"/>
                        <img src="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_3.webp")}}" id="procesoInmovilizacionImg" alt="Proceso Inmovilizacion" class="img-responsive"/>
                    </picture>
                </div>
                <div class="textPR">
                    <p id="textProcesoInmovilizacion" tabindex="0">
                        El vehículo es sellado en las puertas, capó, baúl y tanque de combustible en las motocicletas.
                    </p>
                </div>
            </div>
            <div id="pasosInmovilizacion2" class="reverse">
                <div class="textPR">
                    <p id="textProcesoInmovilizacion" tabindex="0">
                        Se procede a realizar un cargue seguro del vehículo y se traslada al patio donde es ubicado según su topología.
                    </p>
                </div>
                <div class="imgPR">
                    <picture tabindex="0">
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_4.webp")}}" type="image/webp"/>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_4.png")}}" type="image/png"/>
                        <img src="{{asset("images/servicios/proceso_inmovilizacion/proceso_inmovilizacion_4.webp")}}" id="procesoInmovilizacionImg" alt="Proceso Inmovilizacion" class="img-responsive"/>
                    </picture>
                </div>
            </div>
        </div>
    </section>
    <br>
@endsection

@section('scripts')

@endsection
