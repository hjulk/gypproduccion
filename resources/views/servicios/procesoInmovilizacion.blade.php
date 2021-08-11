@extends("servicios.layout")

@section('titulo')
- Proceso Inmovilización
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="ftco-cover-1 overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Proceso Inmovilización</h2>
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
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span> Proceso Inmovilización
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="pageImage">
            <h3 id="titlesubServicios">Conoce el proceso correcto de inmovilización de un vehículo</h3>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="why-us-section" id="sectionServiciosSub">
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    <p id="subTitleImage">
                        <font style="color:#879225;">1.</font> La <font style="color:#879225;">autoridad de tránsito</font> solicita la grúa desde el punto donde el ciudadano ha cometido la infracción a través de la plataforma tecnológica.
                    </p>
                </div>
            </div>
            <div class="row" id="imagesCustodia">
                <div class="col-md-12" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/policia_plataforma.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/policia_plataforma.jpg") }}" type="image/jpg"/>
                        <img src="{{asset("images/servicios/proceso_inmovilizacion/policia_plataforma.webp") }}" id="imagenPagina" alt="Proceso Inmovilización"/>
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2021</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="why-us-section" id="sectionServiciosSub">
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    <p id="subTitleImage">
                        <font style="color:#879225;">2.</font> El sistema asigna el evento a la grúa más cercana demarcando la ruta ideal para ofrecer un servicio <font style="color:#879225;">oportuno y rápido.</font>
                    </p>
                </div>
            </div>
            <div class="row" id="imagesCustodia">
                <div class="col-md-12" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/asignacion_grua.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/asignacion_grua.png") }}" type="image/png"/>
                        <img src="{{asset("images/servicios/proceso_inmovilizacion/asignacion_grua.webp") }}" id="imagenPagina" alt="Proceso Inmovilización"/>
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2021</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="why-us-section" id="sectionServiciosSub">
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    <p id="subTitleImage">
                        <font style="color:#879225;">3.</font> Al llegar al punto de inmovilización, el operador de grúa <font style="color:#879225;">registra en video</font> el estado del vehículo generando un inventario digital.
                    </p>
                </div>
            </div>
            <div class="row" id="imagesCustodia">
                <div class="col-md-12" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/grabar_video.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/grabar_video.png") }}" type="image/png"/>
                        <img src="{{asset("images/servicios/proceso_inmovilizacion/grabar_video.webp") }}" id="imagenPagina" alt="Proceso Inmovilización"/>
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2021</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="why-us-section" id="sectionServiciosSub">
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    <p id="subTitleImage">
                        <font style="color:#879225;">4. Se ubican los sellos</font> en las puertas, capó, baúl y en las motocicletas en la tapa del tanque de combustible.
                    </p>
                </div>
            </div>
            <div class="row" id="imagesCustodia">
                <div class="col-md-12" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/sellos.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/sellos.jpg") }}" type="image/jpg"/>
                        <img src="{{asset("images/servicios/proceso_inmovilizacion/sellos.webp") }}" id="imagenPagina" alt="Proceso Inmovilización"/>
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2021</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="why-us-section" id="sectionServiciosSub">
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    <p id="subTitleImage">
                        <font style="color:#879225;">5.</font> El vehículo se <font style="color:#879225;">asegura correctamente</font> a la grúa y es trasladado al parqueadero autorizado.
                    </p>
                </div>
            </div>
            <div class="row" id="imagesCustodia">
                <div class="col-md-12" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/asegurar_vehiculo.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/asegurar_vehiculo.jpg") }}" type="image/jpg"/>
                        <img src="{{asset("images/servicios/proceso_inmovilizacion/asegurar_vehiculo.webp") }}" id="imagenPagina" alt="Proceso Inmovilización"/>
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2021</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="why-us-section" id="sectionServiciosSub">
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    <p id="subTitleImage">
                        <font style="color:#879225;">6.</font> Cuando el vehículo llega al parqueadero, se realiza un <font style="color:#879225;">nuevo registro</font> en video para verificar el estado en que llegó el automotor.
                    </p>
                </div>
            </div>
            <div class="row" id="imagesCustodia">
                <div class="col-md-12" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/C0076T01.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/C0076T01.JPG") }}" type="image/jpg"/>
                        <img src="{{asset("images/servicios/proceso_inmovilizacion/C0076T01.webp") }}" id="imagenPagina" alt="Proceso Inmovilización"/>
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2021</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="why-us-section" id="sectionServiciosSub">
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    <p id="subTitleImage">
                        <font style="color:#879225;">7.</font> El <font style="color:#879225;">vehículo es ubicado</font> en el parqueadero según su tipología (motocicleta, livianos, mediamos o pesados).
                    </p>
                </div>
            </div>
            <div class="row" id="imagesCustodia">
                <div class="col-md-12" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/IMG_3962.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/servicios/proceso_inmovilizacion/IMG_3962.JPG") }}" type="image/jpg"/>
                        <img src="{{asset("images/servicios/proceso_inmovilizacion/IMG_3962.webp") }}" id="imagenPagina" alt="Proceso Inmovilización"/>
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2021</p>
                </div>
            </div>
        </div>
    </section>
    <br>
@endsection

@section('scripts')

@endsection
