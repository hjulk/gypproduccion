<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grúas y Parqueaderos Bogotá - Login</title>
    <link type="image/x-icon" rel="icon" href="{{asset("images/favicon.png")}}">
    <link rel="stylesheet" href="{{asset("adminlte/plugins/fontawesome-free/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("adminlte/css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset("adminlte/css/administracion.css")}}">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <picture>
                <source srcset="{{asset("images/Nosotros.webp") }}" type="image/webp"/>
                <source srcset="{{asset("images/Nosotros.png") }}" type="image/png"/>
                <img src="{{asset("images/Nosotros.webp") }}" id="logoLogin" alt="Login" class="user-image"/>
            </picture>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                {!! Form::open(['url' => 'trabajoNosotros', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-create_user']) !!}
                @csrf
                    <div class="input-group mb-3">
                        {!! Form::text('usuario',null,['class'=>'form-control','id'=>'usuario','placeholder'=>'Usuario','required']) !!}
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        {!! Form::password('passwd',['class'=>'form-control','id'=>'passwd','placeholder'=>'Contraseña','required']) !!}
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                    </div>
                {!!  Form::close() !!}
                <br>
                <p class="mb-1">
                    <a href="recuperarContraseña" id="olvidoContrasena">Olvide mi contraseña</a>
                </p>
                <p class="mb-1">
                    <a href="{{ url('/') }}" id="olvidoContrasena">Volver a página principal</a>
                </p>
            </div>
        </div>
    </div>
    <script src="{{asset("adminlte/plugins/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("adminlte/js/adminlte.min.js")}}"></script>
</body>
</html>