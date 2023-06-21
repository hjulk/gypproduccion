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
    <link rel="stylesheet" href="{{asset("adminlte/css/login.css")}}">
    <link rel="stylesheet" href="{{asset("css/toastr.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <picture>
                <source srcset="{{asset("images/logo_header.webp") }}" type="image/webp"/>
                <source srcset="{{asset("images/logo_header.png") }}" type="image/png"/>
                <img src="{{asset("images/logo_header.webp") }}" id="logoLogin" alt="Login" class="user-image"/>
            </picture>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                {!! Form::open(['url' => 'acceso', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-login']) !!}
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
                        {!! Form::password('password',['class'=>'form-control','id'=>'password','placeholder'=>'Contraseña','required']) !!}
                        <div class="input-group-append">
                            {{-- <div class="input-group-text"> --}}
                                <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarContrasena()"> <span class="fa fa-eye-slash icon"></span> </button>
                            {{-- </div> --}}
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
                    <a href="#" data-toggle="modal" data-target="#modal-recuperarPass" id="olvidoContrasena">Olvide mi contraseña</a>
                </p>
                <p class="mb-1">
                    <a href="{{ url('/') }}" id="olvidoContrasena">Volver a página principal</a>
                </p>
            </div>
        </div>
    </div>
    @include("modals.modalRecuperarPass")
    <script src="{{asset("adminlte/plugins/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("adminlte/js/adminlte.min.js")}}"></script>
    <script src="{{asset("js/toastr.min.js")}}"></script>
    <script src="{{asset("adminlte/js/login.js")}}"></script>
    <script src="{{asset("adminlte/plugins/jquery-validation/jquery.validate.min.js")}}"></script>
    <script src="{{asset("adminlte/plugins/jquery-validation/additional-methods.min.js")}}"></script>
    <script>
        @if (session("mensaje"))
            $("#loginExitoso").modal("show");
            document.getElementById("exitoAlert").innerHTML = "{{ session("mensaje") }}";
        @endif

        @if (session("precaucion"))
            $("#solicitudError").modal("show");
            document.getElementById("errorAlert").innerHTML = "{{ session("precaucion") }}";
        @endif

        @if (count($errors) > 0)
            $("#solicitudError").modal("show");
            @foreach($errors -> all() as $error)
                document.getElementById("errorAlert").innerHTML = "{{ $error }}";
            @endforeach
        @endif
    </script>
</body>
</html>
