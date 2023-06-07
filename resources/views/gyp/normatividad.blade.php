@extends("layout")

@section('titulo')
- Normatividad
@endsection

@section('styles')

@endsection

@section('barraInformacion')
<div class="overlay" id="franjaSubpagina">
    <div class="container">
        <div class="row align-items-center" id="franjaTituloCabecera">
            <div class="col-lg-6">
                <h2 id="tituloSubPagina">Normatividad</h2>
            </div>
        </div>
    </div>
</div>
<div class="ftco-cover-1" id="franjaSubpaginaTitulo">
    <div class="container-md" id="franjaRutaPagina">
        <div class="row" id="rutaPagina">
            <div class="col-md-12">
                <a href="{{ url('/') }}">Inicio</a>
                <span id="iconoRutaPagina"><b>></b></span> Normatividad
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
    @if($Normatividad)
        @foreach($Normatividad as $value)
            {!! $value['documentos'] !!}
        @endforeach
    @else
        <script src="{{asset("js/normatividad.js")}}"></script>
    @endif
@endsection

@section('scripts')

@endsection
