@extends("administracion.layout")

@section('titulo')
Perfil Usuario
@endsection

@section('contenido')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-user nav-icon" id="enlace"></i> Perfil Usuario</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                    <li class="breadcrumb-item active">Perfil Usuario</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <picture>
                            <source srcset="{{asset("images/logo_admin.webp") }}" type="image/webp"/>
                            <source srcset="{{asset("images/logo_admin.png") }}" type="image/png"/>
                            <img src="{{asset("images/logo_admin.webp") }}" id="logoNosotros" alt="User Img" class="profile-user-img img-fluid img-circle"/>
                        </picture>

                        </div>
                        <h3 class="profile-username text-center">{!! Session::get('NombreUsuario') !!}</h3>
                        <p class="text-muted text-center">{!! Session::get('NombreRol') !!}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                            <b>Creado desde</b> <a class="float-right" id="enlace">{!! Session::get('FechaCreacion') !!}</a>
                            </li>
                            <li class="list-group-item">
                            <b>Dependencia</b> <a class="float-right" id="enlace">{!! Session::get('NombreDependencia') !!}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" id="principalCard">
                        <h3 class="card-title" id="tituloCard"><strong>Crear Usuario</strong></h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'actualizarPerfil', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-create_user']) !!}
                        @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1">Nombre Usuario</label>
                                        {!! Form::text('nombre_usuario',$NombreUsuario,['class'=>'form-control','id'=>'nombre_usuario','readonly']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1">Nombre Usuario</label>
                                        {!! Form::text('username',$UserName,['class'=>'form-control','id'=>'username','readonly']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1">Contraseña</label>
                                        {!! Form::input('password','password',null,['class'=>'form-control','id'=>'password','placeholder'=>'Contraseña','type'=>'password']) !!}
                                        <div class="form-group-append">
                                            <button id="show_password" class="btn btn-outline-primary" type="button" onclick="mostrarContrasena()"> <span class="fa fa-eye-slash icon"></span> Mostrar Contraseña</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success float-right">Actualizar Perfil</button>
                            </div>
                        {!!  Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
    <script>
        @if (session("mensaje"))
            toastr.success("{{ session("mensaje") }}");
        @endif

        @if (session("precaucion"))
            toastr.warning("{{ session("precaucion") }}");
        @endif

        @if (count($errors) > 0)
            @foreach($errors -> all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
@endsection
