@extends("servicios.layout")

@section('titulo')
- Nuestros Servicios
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="ftco-cover-1 overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Nuestros Servicios</h2>
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
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span> Nuestros Servicios
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    @if($ImgNuestrosServicios)
        @foreach($ImgNuestrosServicios as $images)
            <section class="ftco-section" id="sectionPage">
                <div class="container" id="imagePage">
                    @if(strpos($images->UBICACION, '.jpg') !== false)
                        <picture>
                            <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp"/>
                            <source srcset="{{ $images->UBICACION }}" type="image/jpg"/>
                            <img src="{{ $images->UBICACION_WEBP }}" id="imagenPagina" alt="Nuestros Servicios"/>
                        </picture>
                    @else
                        <picture>
                            <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp"/>
                            <source srcset="{{ $images->UBICACION }}" type="image/png"/>
                            <img src="{{ $images->UBICACION_WEBP }}" id="imagenPagina" alt="Nuestros Servicios"/>
                        </picture>
                    @endif
                    <p id="footerImage">{!! $images->PIE_IMAGEN!!}</p>
                </div>
            </section>
            <br>
        @endforeach
    @endif
    <section class="site-section" id="services-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <div class="block-heading-1">
                        <h3 id="serviciosIndex"><b>Nuestros Servicios</b></h3>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="block__35630">
                        <div class="icon mb-0" id="iconoServicios">
                            <a href="gruas"><img src="{{asset("images/tow-truck.png")}}" alt="grúa" id="imagenServicios"></a>
                        </div>
                        <br>
                        <h4 class="mb-3">Grúas</h4>
                        <p id="textNuestrosServicios">
                            La empresa cuenta con 120 Grúas para atender cualquier solicitud que se presente en la ciudad con el fin de ayudar a mejorar la movilidad.
                        </p>
                        <br><br><br><br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block__35630">
                        <div class="icon mb-0" id="iconoServicios">
                            <a href="../puntosAtencion"><img src="{{asset("images/car.png")}}" alt="punto atención" id="imagenServicios"></a>
                        </div>
                        <br>
                        <h4 class="mb-3">Puntos de atención</h4>
                        <p id="textNuestrosServicios">
                            El Parqueadero Autorizado #1 se encuentra ubicado en la localidad de Engativá.
                            Próximamente tendremos más parqueaderos para facilitar la movilidad y el desplazamiento del ciudadano.
                        </p>
                        <br><br><br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block__35630">
                        <div class="icon mb-0" id="iconoServicios">
                            <a href="procesoRetiro"><img src="{{asset("images/24-hours.png")}}" alt="retiro" id="imagenServicios"></a>
                        </div>
                        <br>
                        <h4 class="mb-3">Retiro de vehículo 24/7</h4>
                        <p id="textNuestrosServicios">
                            Si su vehículo es inmovilizado, tendrá la posibilidad de retirarlo en cualquier momento ya que nuestro parqueadero autorizado cuenta con atención las 24 horas del día los 7 días de la semana. Siempre y cuando tenga la autorización de salida dada por Tránsito en el Centro de Servicios de Movilidad.
                        </p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="block__35630">
                        <div class="icon mb-0" id="iconoServicios">
                            <a href="monitoreoCamaras"><img src="{{asset("images/cctv.png")}}" alt="monitoreo" id="imagenServicios"></a>
                        </div>
                        <br>
                        <h4 class="mb-3">Monitoreo con cámaras</h4>
                        <p id="textNuestrosServicios">
                            Una de las novedades que trae este servicio es la tecnología, todas las Grúas estarán dotadas con GPS y tres cámaras que registrarán la operación.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block__35630">
                        <div class="icon mb-0" id="iconoServicios">
                            <a href="mensajeSms"><img src="{{asset("images/sms.png")}}" alt="sms" id="imagenServicios"></a>
                        </div>
                        <br>
                        <h4 class="mb-3">Mensaje de texto de alerta</h4>
                        <p id="textNuestrosServicios">
                            Al ciudadano se le envía un mensaje de texto como señal de alerta informándole que el vehículo ha sido inmovilizado.
                        </p>
                        <br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block__35630">
                        <div class="icon mb-0" id="iconoServicios">
                            <a href="../pagoLinea"><img src="{{asset("images/BotonPSE.png")}}" alt="pago en línea" id="iconoPago"></a>
                        </div>
                        <br>
                        <h4 class="mb-3">Liquidación pagos en línea</h4>
                        <p id="textNuestrosServicios">
                            El ciudadano puede realizar la liquidación y pago en línea las 24 horas.
                        </p>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
@endsection

@section('scripts')

@endsection
