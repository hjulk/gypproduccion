@extends("layout")

@section('titulo')
- Nosotros
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="ftco-cover-1 overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Nosotros</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="ftco-cover-1" id="franjaSubpaginaTitulo">
        <div class="container-md" id="franjaRutaPagina">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('/') }}" id="rutaPagina">Inicio</a>
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span> Nosotros
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="ftco-section" style="padding: 2em 0 2em 0 !important;">
        <div class="container" id="pageImage">
            <picture>
                <source srcset="{{asset("images/Nosotros.webp") }}" type="image/webp"/>
                <source srcset="{{asset("images/Nosotros.png") }}" type="image/png"/>
                <img src="{{asset("images/Nosotros.webp") }}" id="logoNosotros" alt="Nosotros" class="nosotros-logo"/>
            </picture>
        </div>
    </section>
    <section class="site-section" id="faq-section">
        <div class="container">
            <div class="row mb-5">
                <div class="block-heading-1 col-12 text-center">
                    <h3 id="titleNosotros">Quiénes Somos</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <p id="textNosotros">Somos una empresa especializada en el servicio de transporte de vehículos inmovilizados, servicios de parqueaderos y custodia que busca satisfacer las necesidades de movilización en la ciudad de Bogotá D.C., con altos estándares de calidad, seguridad y puntualidad, velando por los intereses de nuestros usuarios y demás partes interesadas, a través de la prestación de un servicio de calidad.<br>
                        Poseemos una eficiente flota de grúas para toda clase de vehículos inmovilizados. Contamos con la experiencia de un equipo de trabajo idóneo comprometido y capacitado constantemente para brindar un excelente servicio y lograr la satisfacción de nuestros clientes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="block-heading-1 col-12 text-center">
                    <h3 id="titleNosotros">Misión</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <p id="textNosotros">Somos una empresa dedicada a la inmovilización, traslado y custodia de vehículos en la ciudad de Bogotá D.C, atendiendo entidades públicas y colocando a disposición un moderno parque automotor y personal idóneo brindando un excelente servicio, buscando siempre la mejora continua en todos los procesos de la organización.</p>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="block-heading-1 col-12 text-center">
                    <h3 id="titleNosotros">Visión</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <p id="textNosotros">En el año 2024 seremos reconocidos como empresa líder de la prestación de servicio de inmovilización, traslado y custodia de vehículos en la ciudad de Bogotá, promoviendo el desarrollo empresarial, ofreciendo: calidad y eficiencia en el servicio a nuestros clientes, comprometidos con el medio ambiente y brindándoles seguridad a los miembros de nuestra organización.</p>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="block-heading-1 col-12 text-center">
                    <h3 id="titleNosotros">Principios</h3>
                </div>
            </div>
            <div class="row" id="pageImage">
                <div class="col-md-3">
                    <img src="images/servicio-al-cliente.png" alt="">
                    <p id="principios"><b>Servicio al cliente</b></p>
                </div>
                <div class="col-md-3">
                    <img src="images/trabajo-equipo.png" alt="">
                    <p id="principios"><b>Trabajo en equipo</b></p>
                </div>
                <div class="col-md-3">
                    <img src="images/seguridad.png" alt="">
                    <p id="principios"><b>Seguridad</b></p>
                </div>
                <div class="col-md-3">
                    <img src="images/responsabilidad.png" alt="">
                    <p id="principios"><b>Responsabilidad</b></p>
                </div>
            </div>
            <br>
            <div class="row" id="pageImage">
                <div class="col-md-3">
                    <img src="images/puntualidad.png" alt="">
                    <p id="principios"><b>Puntualidad</b></p>
                </div>
                <div class="col-md-3">
                    <img src="images/mejoramiento.png" alt="">
                    <p id="principios"><b>Mejoramiento Continuo</b></p>
                </div>
                <div class="col-md-3">
                    <img src="images/calidad-servicio.png" alt="">
                    <p id="principios"><b>Calidad de Servicio</b></p>
                </div>
            </div>
          <br>
          <br>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="imageNosotros">
        <div class="container" id="pageImage">
            <div class="row">
                <div class="col-md-6" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/parqueadero.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/parqueadero.jpg") }}" type="image/jpg"/>
                        <img src="{{asset("images/parqueadero.webp") }}" id="imagenPagina" alt="Nosotros"/>
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2021</p>
                </div>
                <div class="col-md-6" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/gruas.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/gruas.JPG") }}" type="image/jpg"/>
                        <img src="{{asset("images/gruas.webp") }}" id="imagenPagina" alt="Nosotros"/>
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2021</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/C0106T01.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/C0106T01.JPG") }}" type="image/jpg"/>
                        <img src="{{asset("images/C0106T01.webp") }}" id="imagenPagina" alt="Nosotros"/>
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2021</p>
                </div>
                <div class="col-md-6" id="pageImage">
                    <picture>
                        <source srcset="{{asset("images/C0080T01.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/C0080T01.JPG") }}" type="image/jpg"/>
                        <img src="{{asset("images/C0080T01.webp") }}" id="imagenPagina" alt="Nosotros"/>
                    </picture>
                    <p id="footerImage">Foto: GyP Bogotá S.A.S - Año: 2021</p>
                </div>
            </div>
        </div>
    </section>
    <br><br>
@endsection

@section('scripts')

@endsection

