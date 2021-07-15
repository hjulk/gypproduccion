<nav class="main-header navbar navbar-expand navbar-light border-bottom-0 layout-header-fixed navbar-white">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" id="enlace"></i></a>
        </li>
    </ul>
    <div class="navbar-nav ml-auto">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="index" class="dropdown-toggle" data-toggle="dropdown" id="enlace">
                    <picture>
                        <source srcset="{{asset("images/logo_admin.webp") }}" type="image/webp"/>
                        <source srcset="{{asset("images/logo_admin.png") }}" type="image/png"/>
                        <img src="{{asset("images/logo_admin.webp") }}" id="logoNosotros" alt="User Img" class="user-image"/>
                    </picture>
                    <span class="hidden-xs">{!! Session::get('NombreUsuario') !!}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">
                        <img src="{{asset("images/logo_admin.png")}}" class="brand-image img-circle elevation-3" alt="User Image">
                        <p>{!! Session::get('NombreUsuario') !!}
                            <small>Usuario desde {!! Session::get('FechaCreacion') !!}</small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <div class="pull-right">
                            <a href="logout" class="btn btn-default btn-flat">Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
