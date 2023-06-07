@extends("layout")

@section('titulo')
- Puntos de Atención
@endsection

@section('styles')

@endsection

@section('barraInformacion')
<div class="overlay" id="franjaSubpagina">
    <div class="container">
        <div class="row align-items-center" id="franjaTituloCabecera">
            <div class="col-lg-6">
                <h2 id="tituloSubPagina">Puntos de atención</h2>
            </div>
        </div>
    </div>
</div>
<div class="ftco-cover-1" id="franjaSubpaginaTitulo">
    <div class="container-md" id="franjaRutaPagina">
        <div class="row" id="rutaPagina">
            <div class="col-md-12">
                <a href="{{ url('/') }}">Inicio</a>
                <span id="iconoRutaPagina"><b>></b></span> Trámites
                <span id="iconoRutaPagina"><b>></b></span> Puntos de atención
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
<br>
    <section class="ftco-section" id="sectionPagePA">
        <div class="container">
            <div class="row">
                <div class="col-md-6" id="mapPuntosAtencion">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.8569080185634!2d-74.09988658591!3d4.6196053436433315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9967ab007cb5%3A0x35a7433be6496d7b!2sCl.%2013%20%2337-35%2C%20Bogot%C3%A1!5e0!3m2!1ses!2sco!4v1590034698794!5m2!1ses!2sco"
                    width="350" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    id="mapa" tabindex="0"></iframe>
                </div>
                <div class="col-md-6" id="puntosAtencion">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-primary" id="titlePuntosAtencion" tabindex="0">
                                Centro de Servicios de Movilidad
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="contentPuntosAtencion" tabindex="0">
                                <span class="icon icon-map-marker"></span>  Calle 13 # 37 - 35
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="contentPuntosAtencion" tabindex="0">
                                <span class="icon icon-clock-o"></span> Lunes a Viernes de 07:00 – 19:00<br>
                                Sábados: 08:00 – 12:00
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="contentPuntosAtencion" tabindex="0">
                                <span class="icon icon-files-o"></span> Trámite para salida vehículos y liquidación de parqueadero y grúas
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="sectionPagePA">
        <div class="container">
            <div class="row">
                <div class="col-md-6" id="mapPuntosAtencion">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d497.0685853343029!2d-74.10678212135538!3d4.674240384311278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9b717b5370dd%3A0x67306377ee19d3d2!2sCl.%2055%20%2373-19%2C%20Bogot%C3%A1!5e0!3m2!1ses!2sco!4v1590035489342!5m2!1ses!2sco"
                    width="350" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    id="mapa" tabindex="0"></iframe>
                </div>
                <div class="col-md-6" id="puntosAtencion">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-primary" id="titlePuntosAtencion" tabindex="0">
                                Sede Administrativa
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="contentPuntosAtencion" tabindex="0">
                                <span class="icon icon-map-marker"></span>  Calle 55 # 73 – 19
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="contentPuntosAtencion" tabindex="0">
                                <span class="icon icon-clock-o"></span>  Lunes a Viernes de 08:00 – 17:00
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="contentPuntosAtencion" tabindex="0">
                                <span class="icon icon-files-o"></span>  No atención al público para trámites
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="sectionPagePA">
        <div class="container">
            <div class="row">
                <div class="col-md-6" id="mapPuntosAtencion">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.471769908807!2d-74.12171138590985!3d4.687774643076425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9b5e1ea45143%3A0x34e7b0168327697f!2sTv.%2093%20%2353-35%2C%20Bogot%C3%A1!5e0!3m2!1ses!2sco!4v1590035534142!5m2!1ses!2sco"
                    width="350" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    id="mapa" tabindex="0"></iframe>
                </div>
                <div class="col-md-6" id="puntosAtencion">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-primary" id="titlePuntosAtencion" tabindex="0">
                                Parqueadero Autorizado #1
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="contentPuntosAtencion" tabindex="0">
                                <span class="icon icon-map-marker"></span>  Transversal 93 # 53 - 35
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="contentPuntosAtencion" tabindex="0">
                                <span class="icon icon-clock-o"></span>  Lunes a Domingo 24 Horas
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="contentPuntosAtencion" tabindex="0">
                                <span class="icon icon-files-o"></span>  Custodia y retiro de vehículos
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </section>
    <br>
    <br>
    <section class="ftco-section" id="sectionPagePA">
        <div class="container">
            <div class="row">
                <div class="col-md-6" id="mapPuntosAtencion">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d994.2196073943622!2d-74.08866211382889!3d4.615766399999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9970280c2d97%3A0xbfcf259a1d83d8a2!2sCra.%2028a%20%2317A-20%2C%20Los%20M%C3%A1rtires%2C%20Bogot%C3%A1!5e0!3m2!1ses-419!2sco!4v1681946203391!5m2!1ses-419!2sco" width="350" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    id="mapa" tabindex="0"></iframe>
                </div>
                <div class="col-md-6" id="puntosAtencion">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-primary" id="titlePuntosAtencion" tabindex="0">
                                CENTRO DE SERVICIOS DE MOVILIDAD PALOQUEMADO
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="contentPuntosAtencion" tabindex="0">
                                <span class="icon icon-map-marker"></span>  Carrera 28 A # 17 A - 20
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="contentPuntosAtencion" tabindex="0">
                                <span class="icon icon-clock-o"></span>  Lunes a Viernes de 07:00 - 18:00
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="contentPuntosAtencion" tabindex="0">
                                <span class="icon icon-files-o"></span>  Trámmite para salida de vehículos y liquidación de parqueadero y grúas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </section>
    <br>
@endsection

@section('scripts')

@endsection
