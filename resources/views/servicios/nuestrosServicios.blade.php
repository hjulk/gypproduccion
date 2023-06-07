@extends("servicios.layout")

@section('titulo')
- Nuestros Servicios
@endsection

@section('styles')

@endsection

@section('barraInformacion')
<div class="overlay" id="franjaSubpagina">
    <div class="container">
        <div class="row align-items-center" id="franjaTituloCabecera">
            <div class="col-lg-6">
                <h2 id="tituloSubPagina">Nuestros servicios</h2>
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
                <span id="iconoRutaPagina"><b>></b></span> Nuestros servicios
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h3 id="tituloSubPaginaHome">Grúas</h2>
                </div>
            </div>
            <br>
            <div class="row" id="NuestrosServiciosDescripcion">
                <div class="col-md-4">
                    <a href="gruas"><img src="{{asset("images/servicios/nuestros_servicios/gruas.png")}}" alt="grúas" id="imagenServicios"></a>
                </div>
                <div class="col-md-8">
                    <p id="textNuestrosServicios">
                        La empresa cuenta con 120 Grúas para atender cualquier solicitud que se presente en la ciudad con el fin de ayudar a mejorar la movilidad.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h3 id="tituloSubPaginaHome">Puntos de atención</h2>
                </div>
            </div>
            <br>
            <div class="row" id="NuestrosServiciosDescripcion">
                <div class="col-md-4">
                    <a href="../puntosAtencion"><img src="{{asset("images/servicios/nuestros_servicios/puntos_atencion.png")}}" alt="Puntos de atención" id="imagenServicios"></a>
                </div>
                <div class="col-md-8">
                    <p id="textNuestrosServicios">
                        El Parqueadero Autorizado #1 se encuentra ubicado en la localidad de Engativá.
                        Próximamente tendremos más parqueaderos para facilitar la movilidad y el desplazamiento del ciudadano.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h3 id="tituloSubPaginaHome">Retiro de vehículo 24/7</h2>
                </div>
            </div>
            <br>
            <div class="row" id="NuestrosServiciosDescripcion">
                <div class="col-md-4">
                    <a href="procesoRetiro"><img src="{{asset("images/servicios/nuestros_servicios/retiro_vehiculo.png")}}" alt="Proceso de retiro" id="imagenServicios"></a>
                </div>
                <div class="col-md-8">
                    <p id="textNuestrosServicios">
                        Si su vehículo es inmovilizado, tendrá la posibilidad de retirarlo en cualquier momento ya que nuestro parqueadero autorizado cuenta con atención las 24 horas del día los 7 días de la semana. Siempre y cuando tenga la autorización de salida dada por Tránsito en el Centro de Servicios de Movilidad.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h3 id="tituloSubPaginaHome">Monitoreo con cámaras</h2>
                </div>
            </div>
            <br>
            <div class="row" id="NuestrosServiciosDescripcion">
                <div class="col-md-4">
                    <a href="monitoreoCamaras"><img src="{{asset("images/servicios/nuestros_servicios/monitoreo_camaras.png")}}" alt="Monitoreo con cámaras" id="imagenServicios"></a>
                </div>
                <div class="col-md-8">
                    <p id="textNuestrosServicios">
                        Una de las novedades que trae este servicio es la tecnología, todas las Grúas estarán dotadas con GPS y tres cámaras que registrarán la operación.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h3 id="tituloSubPaginaHome">Mensaje de texto de alerta</h2>
                </div>
            </div>
            <br>
            <div class="row" id="NuestrosServiciosDescripcion">
                <div class="col-md-4">
                    <a href="mensajeSms"><img src="{{asset("images/servicios/nuestros_servicios/mensaje_texto.png")}}" alt="Mensajes de texto" id="imagenServicios"></a>
                </div>
                <div class="col-md-8">
                    <p id="textNuestrosServicios">
                        Al ciudadano se le envía un mensaje de texto como señal de alerta informándole que el vehículo ha sido inmovilizado.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h3 id="tituloSubPaginaHome">Liquidación de pagos en línea</h2>
                </div>
            </div>
            <br>
            <div class="row" id="NuestrosServiciosDescripcion">
                <div class="col-md-4">
                    <a href="../pagoLinea"><img src="{{asset("images/servicios/nuestros_servicios/pago_linea.png")}}" alt="Pagos en línea" id="imagenServicios"></a>
                </div>
                <div class="col-md-8">
                    <p id="textNuestrosServicios">
                        El ciudadano puede realizar la liquidación y pago en línea las 24 horas.
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection
