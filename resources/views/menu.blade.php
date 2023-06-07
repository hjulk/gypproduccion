<header class="site-navbar js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="col-12">
                <a href="{{ url('/') }}" tabindex="0">
                    <img src="{{ asset('images/logo_header.png') }}" id="logoNavbar" alt="Logo GYP" tabindex="0" />
                </a>
                <nav class="site-navigation text-right ml-auto " role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                        <li id="liMenu"><a href="{{ url('/') }}" class="nav-link" id="linkHome">Inicio</a></li>
                        <li class="has-children" id="liMenu">
                            <a href="" class="nav-link" id="navLinkMenu">Atención al Ciudadano</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="contacto" class="nav-link">Contáctenos</a></li>
                                <li><a href="notificacionAviso" class="nav-link">Notificación por Aviso</a></li>
                                <li class="has-children">
                                    <a href="" class="nav-link">Peticiones, quejas y reclamos</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="https://bogota.gov.co/sdqs/crear-peticion" class="nav-link"
                                                target="_blank">Registrar su PQRS</a></li>
                                        <li><a href="https://bogota.gov.co/sdqs/consultar-peticion" class="nav-link"
                                                target="_blank">Consulte su PQRS en Bogotá te Escucha</a></li>
                                    </ul>
                                </li>
                                <li><a href="preguntasFrecuentes" class="nav-link">Preguntas Frecuentes</a></li>
                            </ul>
                        </li>
                        <li class="has-children" id="liMenu">
                            <a href="" class="nav-link" id="navLinkMenu">GyP</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="normatividad" class="nav-link" tabindex="0">Normatividad</a></li>
                                <li><a href="nosotros" class="nav-link" tabindex="0">Nosotros</a></li>
                                <li><a href="{{ asset('images/gyp/organigrama/Organigrama.pdf') }}" target="_blank"
                                        title="Organigrama" class="nav-link" tabindex="0">Organigrama</a></li>
                            </ul>
                        </li>
                        <li class="has-children" id="liMenu">
                            <a href="" class="nav-link" id="navLinkMenu">Servicios</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="servicios/beneficios" class="nav-link">Beneficios</a></li>
                                <li><a href="servicios/custodiaSegura" class="nav-link">Custodia Segura</a></li>
                                <li><a href="servicios/gruas" class="nav-link">Grúas</a></li>
                                <li><a href="servicios/monitoreoCamaras" class="nav-link">Monitoreo Cámaras</a></li>
                                <li><a href="servicios/procesoInmovilizacion" class="nav-link">Proceso
                                        Inmovilización</a></li>
                                <li><a href="servicios/procesoRetiro" class="nav-link">Proceso Retiro</a></li>
                                <li><a href="servicios/tarifas" class="nav-link">Tarifas</a></li>
                            </ul>
                        </li>
                        <li class="has-children" id="liMenu">
                            <a href="" class="nav-link" id="navLinkMenu">Trámites</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="consultaLiquidacion" class="nav-link">Consulta Inmovilización</a></li>
                                <li><a href="pagoLinea" class="nav-link">Pago en Línea</a></li>
                                <li><a href="puntosAtencion" class="nav-link">Puntos de Atención</a></li>
                            </ul>
                        </li>
                        <li id="liMenu"><a href="trabajo" class="nav-link" id="linkHome">Trabaje con Nosotros</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="toggle-button d-inline-block d-lg-none">
                <a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span
                        class="icon-menu h3"></span></a>
            </div>
        </div>
    </div>
</header>
