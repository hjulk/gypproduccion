<aside class="main-sidebar sidebar-light-lightblue elevation-4">
    <a href="home" class="brand-link">
        <picture>
            <source srcset="{{asset("images/logo_admin.webp") }}" type="image/webp"/>
            <source srcset="{{asset("images/logo_admin.png") }}" type="image/png"/>
            <img src="{{asset("images/logo_admin.webp") }}" id="logoNosotros" alt="Nosotros" class="brand-image img-circle elevation-3"/>
        </picture>
        <span class="brand-text font-weight-light"><b>GyP Bogotá</b></span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item" id="asideInicio">
                    <a href="home" class="nav-link">
                        <i class="fas fa-home nav-icon" id="enlace"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                @if((Session::get('Rol') === 2) || (Session::get('Rol') === 1) || (Session::get('Rol') === 4))
                <li class="nav-item" id="asideInicio">
                    <a href="documentos" class="nav-link">
                        <i class="fas fa-file nav-icon" id="enlace"></i>
                        <p>Documentos</p>
                    </a>
                </li>
                <li class="nav-item has-treeview" id="asideInicio">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-image nav-icon" id="enlace"></i>
                        <p>Imágenes<i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" id="asideInicio">
                        <li class="nav-item" id="asideInicio">
                            <a href="imagesHomePage" class="nav-link">
                                <i class="fas fa-file nav-icon" id="enlace"></i>
                                <p>Página Inicio</p>
                            </a>
                        </li>
                        <li class="nav-item" id="asideInicio">
                            <a href="imagesUs" class="nav-link">
                                <i class="fas fa-file nav-icon" id="enlace"></i>
                                <p>Página Nosotros</p>
                            </a>
                        </li>
                        <li class="nav-item" id="asideInicio">
                            <a href="imagesOrganigrama" class="nav-link">
                                <i class="fas fa-file nav-icon" id="enlace"></i>
                                <p>Organigrama</p>
                            </a>
                        </li>
                        <li class="nav-item" id="asideInicio">
                            <a href="imagesSettlementConsultation" class="nav-link">
                                <i class="fas fa-file nav-icon" id="enlace"></i>
                                <p>Consulta Liquidación</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-list-alt nav-icon" id="enlace"></i>
                                <p>Imágenes Servicios<i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item" id="asideInicio">
                                    <a href="imagesBenefits" class="nav-link">
                                        <i class="fas fa-file nav-icon" id="enlace"></i>
                                        <p>Beneficios</p>
                                    </a>
                                </li>
                                <li class="nav-item" id="asideInicio">
                                    <a href="imagesTows" class="nav-link">
                                        <i class="fas fa-file nav-icon" id="enlace"></i>
                                        <p>Grúas</p>
                                    </a>
                                </li>
                                <li class="nav-item" id="asideInicio">
                                    <a href="imagesMonitoringCameras" class="nav-link">
                                        <i class="fas fa-file nav-icon" id="enlace"></i>
                                        <p>Monitoreo Cámaras</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" id="asideInicio">
                    <a href="preguntas" class="nav-link">
                        <i class="fas fa-question nav-icon" id="enlace"></i>
                        <p>Preguntas Frecuentes</p>
                    </a>
                </li>
                @endif
                @if((Session::get('Rol') === 2) || (Session::get('Rol') === 1) || (Session::get('Rol') === 3))
                <li class="nav-item has-treeview" id="asideInicio">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper" id="enlace"></i>
                        <p>Notificaciones Aviso<i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" id="asideInicio">
                        <li class="nav-item" id="asideInicio">
                            <a href="notificaciones" class="nav-link">
                                <i class="fas fa-newspaper nav-icon" id="enlace"></i>
                                <p>Cargue de Notificaciones</p>
                            </a>
                        </li>
                        <li class="nav-item" id="asideInicio">
                            <a href="consultaNotificaciones" class="nav-link">
                                <i class="fas fa-list-alt nav-icon" id="enlace"></i>
                                <p>Reporte de Notificaciones</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview" id="asideInicio">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-download" id="enlace"></i>
                        <p>Desfijaciones<i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" id="asideInicio">
                        <li class="nav-item" id="asideInicio">
                            <a href="desfijaciones" class="nav-link">
                                <i class="fas fa-file-download nav-icon" id="enlace"></i>
                                <p>Crear Desfijación</p>
                            </a>
                        </li>
                        <li class="nav-item" id="asideInicio">
                            <a href="consultaDesfijaciones" class="nav-link">
                                <i class="fas fa-list-alt nav-icon" id="enlace"></i>
                                <p>Reporte de Desfijaciones</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if((Session::get('Rol') === 2) || (Session::get('Rol') === 1))
                <li class="nav-item" id="asideInicio">
                    <a href="reporteContacto" class="nav-link">
                        <i class="fas fa-list-alt nav-icon" id="enlace"></i>
                        <p>Registro Contáctenos</p>
                    </a>
                </li>
                <li class="nav-item" id="asideInicio">
                    <a href="reporteHojaVida" class="nav-link">
                        <i class="fas fa-list-alt nav-icon" id="enlace"></i>
                        <p>Registros Hojas de Vida</p>
                    </a>
                </li>
                <li class="nav-item" id="asideInicio">
                    <a href="reporteVisitas" class="nav-link">
                        <i class="fas fa-laptop-code nav-icon" id="enlace"></i>
                        <p>Visitas de Página</p>
                    </a>
                </li>
                @endif
                @if((Session::get('Rol') === 1))
                <li class="nav-item has-treeview" id="asideInicio">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice-dollar" id="enlace"></i>
                        <p>Tarifas<i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" id="asideInicio">
                        <li class="nav-item" id="asideInicio">
                            <a href="tarifasG" class="nav-link">
                                <i class="fas fa-truck-pickup nav-icon" id="enlace"></i>
                                <p>Tarifas Grúa</p>
                            </a>
                        </li>
                        <li class="nav-item" id="asideInicio">
                            <a href="tarifasP" class="nav-link">
                                <i class="fas fa-parking nav-icon" id="enlace"></i>
                                <p>Tarifas Parqueadero</p>
                            </a>
                        </li>
                    </ul>
                </li>                
                @endif
                @if(Session::get('Rol') === 1)
                <li class="nav-item has-treeview" id="asideInicio">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog" id="enlace"></i>
                        <p>Administración<i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" id="asideInicio">
                        <li class="nav-item" id="asideInicio">
                            <a href="dependencias" class="nav-link">
                                <i class="fas fa-building nav-icon" id="enlace"></i>
                                <p>Dependencias</p>
                            </a>
                        </li>
                        <li class="nav-item" id="asideInicio">
                            <a href="tipoDocumento" class="nav-link">
                                <i class="fas fa-file nav-icon" id="enlace"></i>
                                <p>Nombre Documento</p>
                            </a>
                        </li>
                        <li class="nav-item" id="asideInicio">
                            <a href="paginas" class="nav-link">
                                <i class="fas fa-desktop nav-icon" id="enlace"></i>
                                <p>Listado Páginas</p>
                            </a>
                        </li>
                        <li class="nav-item" id="asideInicio">
                            <a href="roles" class="nav-link">
                                <i class="fas fa-user-secret nav-icon" id="enlace"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item" id="asideInicio">
                            <a href="tipoImagen" class="nav-link">
                                <i class="fas fa-file-image nav-icon" id="enlace"></i>
                                <p>Tipos de Imágenes</p>
                            </a>
                        </li>
                        <li class="nav-item" id="asideInicio">
                            <a href="tipoGrua" class="nav-link">
                                <i class="fas fa-truck nav-icon" id="enlace"></i>
                                <p>Tipos de Grúa</p>
                            </a>
                        </li>
                        <li class="nav-item" id="asideInicio">
                            <a href="tipoTarifa" class="nav-link">
                                <i class="fas fa-comments-dollar nav-icon" id="enlace"></i>
                                <p>Tipos de Tarifa</p>
                            </a>
                        </li>
                        <li class="nav-item" id="asideInicio">
                            <a href="usuarios" class="nav-link">
                                <i class="fas fa-users nav-icon" id="enlace"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
