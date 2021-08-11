<header class="site-navbar js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="col-12">
                <a href="{{ url('/') }}">
                    <script src="{{asset("js/logoServicios.js")}}"></script>
                </a>
                <nav class="site-navigation text-right ml-auto " role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                        <li><a href="{{ url('/') }}" class="nav-link">Inicio</a></li>
                        <li class="has-children">
                            <a href="" class="nav-link" id="navLinkMenu">GyP</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="../normatividad" class="nav-link">Normatividad</a></li>
                                <li><a href="../nosotros" class="nav-link">Nosotros</a></li>
                                <li><a href="{{asset("images/gyp/Organigrama.jpg")}}" target="_blank" title="Organigrama" class="nav-link">Organigrama</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="" class="nav-link" id="navLinkMenu">Atención al Ciudadano</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="../contacto" class="nav-link">Contáctenos</a></li>
                                <li><a href="../notificacionAviso" class="nav-link">Notificación por Aviso</a></li>
                                <li class="has-children">
                                    <a href="" class="nav-link">Peticiones, quejas y reclamos</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="https://bogota.gov.co/sdqs/crear-peticion" class="nav-link" target="_blank">Registrar su PQRS</a></li>
                                        <li><a href="https://bogota.gov.co/sdqs/consultar-peticion" class="nav-link" target="_blank">Consulte su PQRS en Bogotá te Escucha</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="" class="nav-link" id="navLinkMenu">Servicios</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="beneficios" class="nav-link">Beneficios</a></li>
                                <li><a href="custodiaSegura" class="nav-link">Custodia Segura</a></li>
                                <li><a href="gruas" class="nav-link">Grúas</a></li>
                                <li><a href="nuestrosServicios" class="nav-link">Nuestros Servicios</a></li>
                                <li><a href="procesoInmovilizacion" class="nav-link">Proceso Inmovilización</a></li>
                                <li><a href="procesoRetiro" class="nav-link">Proceso Retiro</a></li>
                                <li><a href="tarifas" class="nav-link">Tarifas</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="" class="nav-link" id="navLinkMenu">Trámites</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="../consultaLiquidacion" class="nav-link">Consulta Liquidación</a></li>
                                <li><a href="../pagoLinea" class="nav-link">Pago en Línea</a></li>
                                <li><a href="../puntosAtencion" class="nav-link">Puntos de Atención</a></li>
                            </ul>
                        </li>
                        <li><a href="../trabajo" class="nav-link">Trabaje con Nosotros</a></li>
                    </ul>
                </nav>
            </div>
            <div class="toggle-button d-inline-block d-lg-none">
                <a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
            </div>
        </div>
    </div>
</header>
