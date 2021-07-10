<aside class="main-sidebar sidebar-light-lightblue elevation-4">
    <a href="home" class="brand-link">
        <picture>
            <source srcset="{{asset("images/Nosotros.webp") }}" type="image/webp"/>
            <source srcset="{{asset("images/Nosotros.png") }}" type="image/png"/>
            <img src="{{asset("images/Nosotros.webp") }}" id="logoNosotros" alt="Nosotros" class="brand-image img-circle elevation-3" style="opacity: .8"/>
        </picture>
        <span class="brand-text font-weight-light">GyP Bogotá</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item" id="asideInicio">
                    <a href="home" class="nav-link">
                        <i class="fas fa-home nav-icon"></i>
                        <p>Inicio</p>
                    </a>
                </li>

                @if((Session::get('Rol') === 2) || (Session::get('Rol') === 1))
                    <li class="nav-item" id="asideBanners">
                        <a href="banners" class="nav-link">
                            <i class="fas fa-images nav-icon"></i>
                            <p>Banners</p>
                        </a>
                    </li>
                    <li class="nav-item" id="asideComunicados">
                        <a href="comunicados" class="nav-link">
                            <i class="fas fa-file nav-icon"></i>
                            <p>Comunicados</p>
                        </a>
                    </li>
                    <li class="nav-item" id="asideDatos">
                        <a href="datos" class="nav-link">
                            <i class="fas fa-table nav-icon"></i>
                            <p>Datos Servisalud</p>
                        </a>
                    </li>
                    <li class="nav-item" id="asideNoticias">
                        <a href="noticias" class="nav-link">
                            <i class="far fa-newspaper nav-icon"></i>
                            <p>Noticias</p>
                        </a>
                    </li>
                @endif
                @if((Session::get('Rol') === 3) || (Session::get('Rol') === 1))
                    <li class="nav-item" id="asideBanners">
                        <a href="reporteCitasE" class="nav-link">
                            <i class="fas fa-list nav-icon"></i>
                            <p>Reporte Citas Especilaidades</p>
                        </a>
                    </li>
                @endif
                @if(Session::get('Rol') === 1)
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Administración<i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="usuarios" class="nav-link">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Usuarios</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="roles" class="nav-link">
                                    <i class="fas fa-user-secret nav-icon"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
