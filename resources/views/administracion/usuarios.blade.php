@extends("administracion.layout")

@section('titulo')
Usuarios
@endsection

@section('contenido')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-users nav-icon" id="enlace"></i> Usuarios</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                    <li class="breadcrumb-item active">Usuarios</li>
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
                        {!! Form::open(['url' => 'crearUsuario', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-create_user']) !!}
                        @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1">Nombre Usuario</label>
                                        {!! Form::text('nombre_usuario',null,['class'=>'form-control','id'=>'nombre_usuario','placeholder'=>'Nombre Usuario']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1">Correo Electrónico</label>
                                        {!! Form::email('correo',null,['class'=>'form-control','id'=>'correo','placeholder'=>'Correo Electrónico']) !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1">Usuario</label>
                                        {!! Form::text('username',null,['class'=>'form-control','id'=>'username','placeholder'=>'Usuario']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1">Contraseña</label>
                                        {!! Form::input('password','password',null,['class'=>'form-control','id'=>'password','placeholder'=>'Contraseña','type'=>'password']) !!}
                                        <div class="form-group-append">
                                            <button id="show_password" class="btn btn-outline-primary" type="button" onclick="mostrarContrasena()"> <span class="fa fa-eye-slash icon"></span> Mostrar Contraseña</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1">Rol</label>
                                        {!! Form::select('id_rol',$Roles,null,['class'=>'form-control','id'=>'id_rol']) !!}
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1">Dependencia</label>
                                        {!! Form::select('id_dependencia',$Dependencias,null,['class'=>'form-control','id'=>'id_dependencia']) !!}
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1">Super Administrador</label>
                                        {!! Form::select('administrador',$Administrador,null,['class'=>'form-control','id'=>'administrador']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success float-right">Crear Usuario</button>
                            </div>
                        {!!  Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="usuarios" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre Usuario</th>
                                    <th>Correo Electrónico</th>
                                    <th>Usuario</th>
                                    <th>Rol</th>
                                    <th>Dependencia</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Usuarios as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td>{{$value['nombre_usuario']}}</td>
                                        <td>{{$value['correo']}}</td>
                                        <td>{{$value['username']}}</td>
                                        <td>{{$value['rol']}}</td>
                                        <td>{{$value['dependencia']}}</td>
                                        <td><span class="{{$value['label']}}" style="font-size:13px;"><b>{{$value['estado']}}</b></span></td>
                                        <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-userUpd" onclick="obtener_datos_usuario('{{$value['id']}}');"><i class="fas fa-edit"></i></a></td>
                                        <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                        <input type="hidden" value="{{$value['nombre_usuario']}}" id="nombre_usuario{{$value['id']}}">
                                        <input type="hidden" value="{{$value['correo']}}" id="correo{{$value['id']}}">
                                        <input type="hidden" value="{{$value['username']}}" id="username{{$value['id']}}">
                                        <input type="hidden" value="{{$value['id_rol']}}" id="id_rol{{$value['id']}}">
                                        <input type="hidden" value="{{$value['id_dependencia']}}" id="id_dependencia{{$value['id']}}">
                                        <input type="hidden" value="{{$value['id_administrador']}}" id="id_administrador{{$value['id']}}">
                                        <input type="hidden" value="{{$value['estado_activo']}}" id="estado_activo{{$value['id']}}">
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include("modals.modalUsuarios")
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
