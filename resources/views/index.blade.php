@extends("layout")

@section('titulo')

@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="ftco-cover-1 overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 id="tituloInicio"><b>Grúas y Parqueaderos Bogotá S.A.S</b></h1>
                    <p class="mb-5" id="subtituloInicio">Servicio de Grúas y Parqueaderos</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="imagePage">
            <picture>
                <source srcset="{{asset("images/home/PENDON_RETIRAR_DEL_PATIO_ARTE_FINAL.webp") }}" type="image/webp"/>
                <source srcset="{{asset("images/home/PENDON_RETIRAR_DEL_PATIO_ARTE_FINAL.jpg") }}" type="image/jpg"/>
                <img src="{{asset("images/home/PENDON_RETIRAR_DEL_PATIO_ARTE_FINAL.webp") }}" id="imagenPagina" alt="Inicio"/>
            </picture>
            <p>Foto: GyP Bogotá S.A.S - Año: 2021</p>
        </div>
    </section>
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
                            <a href="servicios/gruas"><img src="{{asset("images/tow-truck.png")}}" alt="grúa" id="imagenServicios"></a>
                        </div>
                        <br>
                        <h4 class="mb-3">Grúas</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block__35630">
                        <div class="icon mb-0" id="iconoServicios">
                            <a href="puntosAtencion"><img src="{{asset("images/car.png")}}" alt="punto atención" id="imagenServicios"></a>
                        </div>
                        <br>
                        <h4 class="mb-3">Puntos de atención</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block__35630">
                        <div class="icon mb-0" id="iconoServicios">
                            <a href="servicios/procesoRetiro"><img src="{{asset("images/24-hours.png")}}" alt="retiro" id="imagenServicios"></a>
                        </div>
                        <br>
                        <h4 class="mb-3">Retiro de vehículo 24/7</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="block__35630">
                        <div class="icon mb-0" id="iconoServicios">
                            <a href="servicios/monitoreoCamaras"><img src="{{asset("images/cctv.png")}}" alt="monitoreo" id="imagenServicios"></a>
                        </div>
                        <br>
                        <h4 class="mb-3">Monitoreo con cámaras</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block__35630">
                        <div class="icon mb-0" id="iconoServicios">
                            <a href="servicios/mensajeSms"><img src="{{asset("images/sms.png")}}" alt="sms" id="imagenServicios"></a>
                        </div>
                        <br>
                        <h4 class="mb-3">Mensaje de texto de alerta</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block__35630">
                        <div class="icon mb-0" id="iconoServicios">
                            <a href="pagoLinea"><img src="{{asset("images/BotonPSE.png")}}" alt="pago en línea" id="iconoPago"></a>
                        </div>
                        <br>
                        <h4 class="mb-3">Liquidación pagos en línea</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="block__73694 site-section border-top" id="why-us-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4" id="tarifasIcon">
                    <a href="tarifas"><img src="{{asset("images/tarifas.png")}}" alt="tarifas" class="img-responsive" id="tarifasImg">
                    </a>
                </div>
                <div class="col-md-8">
                    <h4 class="text-primary" id="tarifasTitle">Nuestras Tarifas</h4><br>
                    <p id="tarifasText">
                        De acuerdo con lo establecido en el artículo segundo y subsiguientes de la <b>Resolución 62 de 2018,
                        modificada por la Resolución 172 de 2019</b> expedidas por la Secretaría de Movilidad en concordancia
                        con lo dispuesto por el Gobierno Nacional en lo referente al nuevo <b>Salario Mínimo Legal Mensual</b>,
                        le informamos que a partir del 1 de enero de 2021 se cobrarán los siguientes valores por los servicios
                        de parqueadero y Grúas prestados así:
                        <br>
                        <br>
                        <a href="tarifas" id="tarifasEnlace">Ver tarifas aplicables al
                        servicio de inmovilización de vehículos para el año 2021</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="imagePage">
            <picture>
                <source srcset="{{asset("images/home/PQR_PENDON.webp") }}" type="image/webp"/>
                <source srcset="{{asset("images/home/PQR_PENDON.jpg") }}" type="image/jpg"/>
                <img src="{{asset("images/home/PQR_PENDON.webp") }}" id="imagenPagina" alt="pqrs"/>
            </picture>
            <p>Foto: GyP Bogotá S.A.S - Año: 2021</p>
        </div>
    </section>
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="imagePage">
            <span id="contadorVisitas">
            {{ $Visitas }}</span><br>
            <p>Visitas a la página</p>
        </div>
    </section>
@endsection

@section('scripts')

@endsection

