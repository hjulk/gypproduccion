@extends("administracion.layout")

@section('titulo')
Preguntas Frecuentes
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset("adminlte/plugins/summernote/summernote-bs4.css")}}">
@endsection

@section('contenido')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fas fa-question nav-icon" id="enlace"></i> Preguntas Frecuentes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                    <li class="breadcrumb-item active">Preguntas Frecuentes</li>
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
                        <h3 class="card-title" id="tituloCard"><strong>Crear Pregunta Frecuente</strong></h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'crearPregunta', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-desfijaciones']) !!}
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Título pregunta</label>
                                    {!! Form::text('titulo_pregunta',null,['class'=>'form-control','id'=>'titulo_pregunta','placeholder'=>'Pregunta frecuente','required']) !!}
                                </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>A continuación escriba el texto de la pregunta frecuente a publicar en la página</label>
                                        {!! Form::textarea('contenidoPregunta',null,['class'=>'form-control','id'=>'contenidoPregunta','placeholder'=>'Ingrese el contenido la pregunta frecuente','rows'=>'10', 'cols' => '100','required']) !!}
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
                        <table id="preguntaFrecuente" class="display table dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Titulo pregunta frecuente</th>
                                    <th>Fecha Cargue</th>
                                    <th>Fecha Actualización</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Preguntas as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td style="text-align: justify !important;">{!!$value['titulo_pregunta']!!}</td>
                                        <td>{{$value['fecha_creacion']}}</td>
                                        <td>{{$value['fecha_modificacion']}}</td>
                                        <td><span class="{{$value['label']}}" style="font-size:13px;"><b>{{$value['estado']}}</b></span></td>
                                        <td><a href="#" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#modal-preguntaUpd" onclick="obtener_datos_pregunta('{{$value['id']}}');"><i class="fas fa-edit"></i></a></td>
                                        <input type="hidden" value="{{$value['id']}}" id="id{{$value['id']}}">
                                        <input type="hidden" value="{{$value['contenido']}}" id="contenido{{$value['id']}}">
                                        <input type="hidden" value="{{$value['titulo_pregunta']}}" id="titulo_pregunta{{$value['id']}}">
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
@include("modals.modalPreguntas")
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

    $(document).ready(function() {
        // Summernote
        $('#contenidoPregunta').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link']]
            ],
	        lang: "es-ES"
        });
        $('#mod_contenidoPregunta').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link']]
            ],
	        lang: "es-ES"
        });
        $('#form-desfijaciones_upd').on('submit', function(e) {
            if($('#mod_contenidoPregunta').summernote('isEmpty')) {
                alert('Contenido de texto de pregunta frecuente es obligatorio');
                e.preventDefault();
            }
        });
        $('#form-desfijaciones').on('submit', function(e) {
            if($('#contenidoPregunta').summernote('isEmpty')) {
                alert('Contenido de texto de pregunta frecuente es obligatorio');
                e.preventDefault();
            }
        });
    });
</script>
@endsection
