@extends("servicios.layout")

@section('titulo')
- Beneficios
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="ftco-cover-1 overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Beneficios</h2>
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
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span> Beneficios
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="pageImage">
            <h3 id="titlesubServicios">¿YA CONOCES EL MODELO DE GRÚAS Y PARQUEADEROS EN BOGOTÁ?</h3>
        </div>
    </section>
    <section class="ftco-section" id="why-us-section" id="sectionServiciosSub">
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    <p id="subTitleImage">Monitoreo de los procesos por medio de GPS desde un centro de control.</p>
                </div>
            </div>
            <div class="row" id="imagesBeneficios">
                <div class="col-md-12" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/C0082T01.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/C0082T01.JPG") }}" type="image/jpg"/>
                        <img src="{{asset("images/C0082T01.webp") }}" id="imagenPagina" alt="Beneficios"/>
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
                    <p id="subTitleImage">Grúas nuevas y dotadas con cámaras para registrar en tiempo real el proceso de inmovilización.</p>
                </div>
            </div>
            <div class="row" id="imagesBeneficios">
                <div class="col-md-12" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/C0083T01.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/C0083T01.JPG") }}" type="image/jpg"/>
                        <img src="{{asset("images/C0083T01.webp") }}" id="imagenPagina" alt="Beneficios"/>
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
                    <p id="subTitleImage">4.500 m<sup>2</sup> de espacio cubierto para la protección de las motocicletas de la intemperie.
                    </p>
                </div>
            </div>
            <div class="row" id="imagesBeneficios">
                <div class="col-md-12" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/C0106T01.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/C0106T01.JPG") }}" type="image/jpg"/>
                        <img src="{{asset("images/C0106T01.webp") }}" id="imagenPagina" alt="Beneficios"/>
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
                    <p id="subTitleImage">Más de 46.000 m<sup>2</sup> de parqueadero.</p>
                </div>
            </div>
            <div class="row" id="imagesBeneficios">
                <div class="col-md-12" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/parqueadero.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/parqueadero.jpg") }}" type="image/jpg"/>
                        <img src="{{asset("images/parqueadero.webp") }}" id="imagenPagina" alt="Beneficios"/>
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
                    <p id="subTitleImage">Instalaciones amplias, cómodas y modernas para un óptimo servicio.</p>
                </div>
            </div>
            <div class="row" id="imagesBeneficios">
                <div class="col-md-12" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/C0101T01.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/C0101T01.jpg") }}" type="image/jpg"/>
                        <img src="{{asset("images/C0101T01.webp") }}" id="imagenPagina" alt="Beneficios"/>
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
