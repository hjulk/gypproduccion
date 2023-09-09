@extends("layout")

@section('titulo')
- Nosotros
@endsection

@section('styles')

@endsection

@section('barraInformacion')
<div class="overlay" id="franjaSubpagina">
    <div class="container">
        <div class="row align-items-center" id="franjaTituloCabecera">
            <div class="col-lg-6">
                <h2 id="tituloSubPagina">Nosotros</h2>
            </div>
        </div>
    </div>
</div>
<div class="ftco-cover-1" id="franjaSubpaginaTitulo">
    <div class="container-md" id="franjaRutaPagina">
        <div class="row" id="rutaPagina">
            <div class="col-md-12">
                <a href="{{ url('/') }}">Inicio</a>
                <span id="iconoRutaPagina"><b>></b></span> Nosotros
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    @handheld
                        <picture tabindex="0">
                            <source srcset="images/gyp/nosotros/logo_nosotros_movil.webp" type="image/webp"/>
                            <source srcset="images/gyp/nosotros/logo_nosotros_movil.png" type="image/png"/>
                            <img src="images/gyp/nosotros/logo_nosotros_movil.webp" alt="Inicio" id="imagenPagina" class="bannerPasosRetiro"/>
                        </picture>
                    @elsehandheld
                        <picture tabindex="0">
                            <source srcset="images/gyp/nosotros/logo_nosotros_nuevo.webp" type="image/webp"/>
                            <source srcset="images/gyp/nosotros/logo_nosotros_nuevo.png" type="image/png"/>
                            <img src="images/gyp/nosotros/logo_nosotros_nuevo.webp" alt="Inicio" id="imagenPagina" class="bannerPasosRetiro"/>
                        </picture>
                    @endhandheld
                </div>
            </div>
        </div>
    </section>

    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-md-12">
                    <h3 id="tituloSubPaginaHome" tabindex="0">Quiénes Somos</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <p id="textNosotros" tabindex="0">Somos una empresa especializada en el servicio de transporte de vehículos inmovilizados, servicios de parqueaderos y custodia que busca satisfacer las necesidades de movilización en la ciudad de Bogotá D.C., con altos estándares de calidad, seguridad y puntualidad, velando por los intereses de nuestros usuarios y demás partes interesadas, a través de la prestación de un servicio de calidad.<br>
                        Poseemos una eficiente flota de grúas para toda clase de vehículos inmovilizados. Contamos con la experiencia de un equipo de trabajo idóneo comprometido y capacitado constantemente para brindar un excelente servicio y lograr la satisfacción de nuestros clientes.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-12">
                    <h3 id="tituloSubPaginaHome" tabindex="0">Misión</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <p id="textNosotros" tabindex="0">Somos una empresa dedicada a la inmovilización, traslado y custodia de vehículos en la ciudad de Bogotá D.C, atendiendo entidades públicas y colocando a disposición un moderno parque automotor y personal idóneo brindando un excelente servicio, buscando siempre la mejora continua en todos los procesos de la organización.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-12">
                    <h3 id="tituloSubPaginaHome" tabindex="0">Visión</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <p id="textNosotros" tabindex="0">En el año 2024 seremos reconocidos como empresa líder de la prestación de servicio de inmovilización, traslado y custodia de vehículos en la ciudad de Bogotá, promoviendo el desarrollo empresarial, ofreciendo: calidad y eficiencia en el servicio a nuestros clientes, comprometidos con el medio ambiente y brindándoles seguridad a los miembros de nuestra organización.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-12">
                    <h3 id="tituloSubPaginaHome" tabindex="0">Principios</h2>
                </div>
            </div>
            <br>

            <div class="nosotros-gallery">
                <div>
                    <picture tabindex="0">
                        <source srcset="{{asset("images/gyp/nosotros/servicio_cliente.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/gyp/nosotros/servicio_cliente.png") }}" type="image/png"/>
                        <img src="{{asset("images/gyp/nosotros/servicio_cliente.webp") }}" id="principios" alt="Nosotros" class="nosotros-logo"/>
                    </picture>
                </div>
                <div>
                    <picture tabindex="0">
                        <source srcset="{{asset("images/gyp/nosotros/trabajo_equipo.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/gyp/nosotros/trabajo_equipo.png") }}" type="image/png"/>
                        <img src="{{asset("images/gyp/nosotros/trabajo_equipo.webp") }}" id="principios" alt="Nosotros" class="nosotros-logo"/>
                    </picture>
                </div>
                <div>
                    <picture tabindex="0">
                        <source srcset="{{asset("images/gyp/nosotros/seguridad.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/gyp/nosotros/seguridad.png") }}" type="image/png"/>
                        <img src="{{asset("images/gyp/nosotros/seguridad.webp") }}" id="principios" alt="Nosotros" class="nosotros-logo"/>
                    </picture>
                </div>
                <div>
                    <picture tabindex="0">
                        <source srcset="{{asset("images/gyp/nosotros/responsabilidad.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/gyp/nosotros/responsabilidad.png") }}" type="image/png"/>
                        <img src="{{asset("images/gyp/nosotros/responsabilidad.webp") }}" id="principios" alt="Nosotros" class="nosotros-logo"/>
                    </picture>
                </div>
                <div>
                    <picture tabindex="0">
                        <source srcset="{{asset("images/gyp/nosotros/puntualidad.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/gyp/nosotros/puntualidad.png") }}" type="image/png"/>
                        <img src="{{asset("images/gyp/nosotros/puntualidad.webp") }}" id="principios" alt="Nosotros" class="nosotros-logo"/>
                    </picture>
                </div>
                <div>
                    <picture tabindex="0">
                        <source srcset="{{asset("images/gyp/nosotros/mejoramiento_continuo.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/gyp/nosotros/mejoramiento_continuo.png") }}" type="image/png"/>
                        <img src="{{asset("images/gyp/nosotros/mejoramiento_continuo.webp") }}" id="principios" alt="Nosotros" class="nosotros-logo"/>
                    </picture>
                </div>
                <div>
                    <picture tabindex="0">
                        <source srcset="{{asset("images/gyp/nosotros/calidad_servicio.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/gyp/nosotros/calidad_servicio.png") }}" type="image/png"/>
                        <img src="{{asset("images/gyp/nosotros/calidad_servicio.webp") }}" id="principios" alt="Nosotros" class="nosotros-logo"/>
                    </picture>
                </div>
            </div>
          <br>
        </div>
    </section>
    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="grid-container-infoInteres">
                @if($Nosotros)
                    @foreach($Nosotros as $imagesN)
                        @if(strpos($imagesN->UBICACION, '.jpg') !== false)
                            <picture tabindex="0">
                                <source srcset="{{  asset(str_replace('../', '', $imagesN->UBICACION_WEBP)) }}" type="image/webp"/>
                                <source srcset="{{ asset(str_replace('../', '/', $imagesN->UBICACION)) }}" type="image/jpg"/>
                                <img src="{{ asset(str_replace('../', '/', $imagesN->UBICACION_WEBP)) }}" id="imgNosotros" alt="Nosotros"/>
                                <p id="footerImage">{!! $imagesN->PIE_IMAGEN !!}</p>
                            </picture>
                        @else
                            <picture tabindex="0">
                                <source srcset="{{ asset(str_replace('../', '/', $imagesN->UBICACION_WEBP)) }}" type="image/webp"/>
                                <source srcset="{{ asset(str_replace('../', '/', $imagesN->UBICACION)) }}" type="image/png"/>
                                <img src="{{ asset(str_replace('../', '/', $imagesN->UBICACION_WEBP)) }}" id="imgNosotros" alt="Nosotros"/>
                                <p id="footerImage">{!! $imagesN->PIE_IMAGEN !!}</p>
                            </picture>
                        @endif                        
                    @endforeach
                @endif
                {{-- <div>
                    <picture tabindex="0">
                        <source srcset="{{asset("images/gyp/nosotros/nosotros_foto_1.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/gyp/nosotros/nosotros_foto_1.png") }}" type="image/png"/>
                        <img src="{{asset("images/gyp/nosotros/nosotros_foto_1.webp") }}" id="imgNosotros" alt="Nosotros" class="nosotros-logo"/>
                    </picture>
                </div>
                <div>
                    <picture tabindex="0">
                        <source srcset="{{asset("images/gyp/nosotros/nosotros_foto_2.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/gyp/nosotros/nosotros_foto_2.png") }}" type="image/png"/>
                        <img src="{{asset("images/gyp/nosotros/nosotros_foto_2.webp") }}" id="imgNosotros" alt="Nosotros" class="nosotros-logo"/>
                    </picture>
                </div>
                <div>
                    <picture tabindex="0">
                        <source srcset="{{asset("images/gyp/nosotros/nosotros_foto_3.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/gyp/nosotros/nosotros_foto_3.png") }}" type="image/png"/>
                        <img src="{{asset("images/gyp/nosotros/nosotros_foto_3.webp") }}" id="imgNosotros" alt="Nosotros" class="nosotros-logo"/>
                    </picture>
                </div> --}}
            </div>
        </div>
    </section>
    <br>
@endsection

@section('scripts')

@endsection

