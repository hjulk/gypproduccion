@extends("administracion.layout")

@section('titulo')
Nesfijaciones
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset("adminlte/plugins/summernote/summernote-bs4.css")}}">
@endsection

@section('contenido')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-file-download nav-icon" id="enlace"></i> Desfijación de notificaciones</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                    <li class="breadcrumb-item active">Desfijación de notificaciones</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="principalCard">
                        <h3 class="card-title" id="tituloCard"><strong>Crear Aviso de Desfijación</strong></h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'crearDesfijacion', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-desfijacion']) !!}
                        @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>A continuación escriba el texto de la desfijación a publicar en la página</label>
                                        {!! Form::textarea('contenidoDesfijacion',null,['class'=>'form-control','id'=>'contenidoDesfijacion','placeholder'=>'Ingrese el contenido la desfijación','rows'=>'10', 'cols' => '100','required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success float-left">Crear</button>
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
                        <table id="desfijaciones" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Texto desfijación</th>
                                    <th>Fecha Cargue</th>
                                    <th>Fecha Actualización</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Desfijaciones as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td style="text-align: justify !important;">{!!$value['contenido']!!}</td>
                                        <td>{{$value['fecha_creacion']}}</td>
                                        <td>{{$value['fecha_modificacion']}}</td>
                                        <td><span class="{{$value['label']}}" style="font-size:13px;"><b>{{$value['estado']}}</b></span></td>
                                        <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-desfijacionUpd" onclick="obtener_datos_desfijacion('{{$value['id']}}');"><i class="fas fa-edit"></i></a></td>
                                        <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                        <input type="hidden" value="{{$value['contenido']}}" id="contenido{{$value['id']}}">
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
@include("modals.modalDesfijaciones")
@include("modals.modalAlertas")
@endsection
@section('scripts')
<script src="{{asset("adminlte/plugins/summernote/summernote-bs4.min.js")}}"></script>
<script src="{{asset("adminlte/plugins/summernote/lang/summernote-es-ES.js")}}"></script>
<script>
    @if (session("mensaje"))
        $("#modalExitoso").modal("show");
        document.getElementById("exitoAlert").innerHTML = "{{ session("mensaje") }}";
    @endif

    @if (session("precaucion"))
        $("#modalError").modal("show");
        document.getElementById("errorAlert").innerHTML = "{{ session("precaucion") }}";
    @endif

    @if (count($errors) > 0)
    $("#modalError").modal("show");
        @foreach($errors -> all() as $error)
            document.getElementById("errorAlert").innerHTML = "{{ $error }}";
        @endforeach
    @endif
</script>
<script>
    {{--  $(document).ready(function () {

         CKEDITOR.replace('contenido')
         CKEDITOR.replace('contenido_upd')

     });  --}}

     $(document).ready(function() {
        // Summernote
        $('#contenidoDesfijacion').summernote({
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ]
});
        $('#mod_contenidoDesfijacion').summernote({
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ]
});
    });
</script>
@endsection
