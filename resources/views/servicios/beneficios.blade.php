@extends("servicios.layout")

@section('titulo')
- Beneficios
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloCabecera">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Beneficios</h2>
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
                    <span id="iconoRutaPagina"><b>></b></span> Beneficios
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="pageImage">
            <h3 id="titlesubServicios" tabindex="0">¿YA CONOCES EL MODELO DE GRÚAS Y PARQUEADEROS EN BOGOTÁ?</h3>
        </div>
    </section>
    <br>
    <section>
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    <h5 tabindex="0">Monitoreo de los procesos por medio de GPS desde un centro de control.</h5>
                </div>
            </div>
            <div class="row" id="imagesBeneficios">
                <div class="col-md-12" id="pageImage">
                    <picture tabindex="0">
                        <source srcset="{{asset("images/servicios/beneficios/beneficios_1.webp") }}" type="image/webp">
                        <source srcset="{{asset("images/servicios/beneficios/beneficios_1.png") }}" type="image/png">
                        <img src="{{asset("images/servicios/beneficios/beneficios_1.webp") }}" id="imagenPagina" alt="Beneficios">
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2023</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section>
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    <h5 tabindex="0">Grúas nuevas y dotadas con cámaras para registrar en tiempo real el proceso de inmovilización.</h5>
                </div>
            </div>
            <div class="row" id="imagesBeneficios">
                <div class="col-md-12" id="pageImage">
                    <picture tabindex="0">
                        <source srcset="{{asset("images/servicios/beneficios/beneficios_2.webp") }}" type="image/webp">
                        <source srcset="{{asset("images/servicios/beneficios/beneficios_2.png") }}" type="image/png">
                        <img src="{{asset("images/servicios/beneficios/beneficios_2.webp") }}" id="imagenPagina" alt="Beneficios">
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2023</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section>
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    <h5 tabindex="0">Espacio amplio y seguro para las motocicletas.</h5>
                </div>
            </div>
            <div class="row" id="imagesBeneficios">
                <div class="col-md-12" id="pageImage">
                    <picture tabindex="0">
                        <source srcset="{{asset("images/servicios/beneficios/beneficios_3.webp") }}" type="image/webp">
                        <source srcset="{{asset("images/servicios/beneficios/beneficios_3.png") }}" type="image/png">
                        <img src="{{asset("images/servicios/beneficios/beneficios_3.webp") }}" id="imagenPagina" alt="Beneficios">
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2023</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section>
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    <h5 tabindex="0">Más de 46.000 m2 de parqueadero.</h5>
                </div>
            </div>
            <div class="row" id="imagesBeneficios">
                <div class="col-md-12" id="pageImage">
                    <picture tabindex="0">
                        <source srcset="{{asset("images/servicios/beneficios/beneficios_4.webp") }}" type="image/webp">
                        <source srcset="{{asset("images/servicios/beneficios/beneficios_4.png") }}" type="image/png">
                        <img src="{{asset("images/servicios/beneficios/beneficios_4.webp") }}" id="imagenPagina" alt="Beneficios">
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2023</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section>
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    <h5 tabindex="0">Instalaciones amplias, cómodas y modernas para un óptimo servicio.</h5>
                </div>
            </div>

            <div class="row" id="imagesBeneficios">
                <div class="col-md-12" id="pageImage">
                    <picture tabindex="0">
                        <source srcset="{{asset("images/servicios/beneficios/beneficios_5.webp") }}" type="image/webp">
                        <source srcset="{{asset("images/servicios/beneficios/beneficios_5.png") }}" type="image/png">
                        <img src="{{asset("images/servicios/beneficios/beneficios_5.webp") }}" id="imagenPagina" alt="Beneficios">
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2023</p>
                </div>
            </div>
        </div>
    </section>
    <br>
@endsection

@section('scripts')

@endsection
