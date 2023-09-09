@extends("layout")

@section('titulo')
- Preguntas Frecuentes
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset("DataTables/DataTables/css/jquery.dataTables.min.css")}}">
<link rel="stylesheet" href="{{asset("DataTables/Responsive/css/responsive.dataTables.min.css")}}">
<link rel="preload" href="{{asset("css/preguntasFrecuentes.css")}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{asset("css/preguntasFrecuentes.css")}}"></noscript>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('barraInformacion')
    <div class="overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloCabecera">
                <div class="col-lg-6">
                    <h3 id="tituloSubPagina">Preguntas frecuentes</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="ftco-cover-1" id="franjaSubpaginaTitulo">
        <div class="container-md" id="franjaRutaPagina">
            <div class="row" id="rutaPagina">
                <div class="col-md-12">
                    <a href="{{ url('/') }}">Inicio</a>
                    <span id="iconoRutaPagina"><b>></b></span> Atención al Ciudadano
                    <span id="iconoRutaPagina"><b>></b></span> Preguntas Frecuentes
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')

<section class="site-section bg-light" id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p id="subtitleBannerVideo" tabindex="0">¡Ciudadano!</p>
                <p id="textBannerVideo" tabindex="0">A continuación encontrará un listado de preguntas frecuentes relacionadas con nuestra empresa, para abrir una pregunta por favor haga clic en el icono de <i class="fa fa-plus-circle fa-2x" id="iconoPregunta" aria-hidden="true"></i>, para cerrarla haga clic en el icono de <i class="fa fa-minus-circle fa-2x" id="iconoPregunta" aria-hidden="true"></i>.</p>
                <br>
                <p id="textBannerVideo" tabindex="0">En el siguiente cuadro de búsqueda, escriba una palabra por la cual quiera realizar una busqueda concreta, al escribir esta palabra se mostraran las preguntas que coinciden con la palabra escrita.
                </p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <input type="text" id="buscarPregunta" onkeyup="searchQuestion()" placeholder="Busqueda por palabra clave" title="Palabra clave" class="form-control">
            </div>
        </div>
        <br>
    </div>
</section>
<section>
    <div class="container">
         <div class="row" id="resultadoPregunta">
            <div class="col-md-12">
                <h5>No se encontraron coincidencias en relación a su pregunta</h5>
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="preguntasFrecuentesTable" class="responsive" style="width:100%">
                    <thead></thead>
                    <tbody>
                        @if ($PreguntasFrecuentes)
                            @foreach ( $PreguntasFrecuentes as $value )
                                <tr>
                                    <td id="rowQuestion">
                                        <input type="radio" name="accordionPF" id="cb{!! $value->ID_PREGUNTA !!}"  tabindex="0"/>
                                        <section class="box">
                                            <label class="box-title" for="cb{!! $value->ID_PREGUNTA !!}" tabindex="0">{!! $value->TITULO_PREGUNTA !!}</label>
                                            <label class="box-close" for="acc-close" tabindex="0"></label>
                                            <div class="box-content">{!! $value->CONTENIDO !!}</div>
                                        </section>
                                        <input type="radio" name="accordionPF" id="acc-close" />
                                    </td>
                                </tr>                                
                            @endforeach                            
                        @endif
                    </tbody>
                </table>
            </div>
        </div>        
        <br>
    </div>
</section>
@endsection

@section('scripts')
    <script src="{{asset("DataTables/DataTables/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("DataTables/Responsive/js/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("js/preguntasFrecuentes.js")}}"></script>
@endsection
