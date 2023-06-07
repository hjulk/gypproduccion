@extends('layout')

@section('titulo')
    - Contáctenos
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
@endsection

@section('barraInformacion')
    <div class="overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloCabecera">
                <div class="col-lg-6">
                    <h3 id="tituloSubPagina">Contáctenos</h2>
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
                    <span id="iconoRutaPagina"><b>></b></span> Contáctenos
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="site-section bg-light" id="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5" data-aos-delay="100">
                    {!! Form::open([
                        'url' => 'contactenos',
                        'method' => 'post',
                        'enctype' => 'multipart/form-data',
                        'autocomplete' => 'off',
                        'id' => 'form-contacto',
                    ]) !!}
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 mb-4 mb-lg-0">
                            {!! Form::text('nombres', null, [
                                'class' => 'form-control',
                                'id' => 'nombres',
                                'placeholder' => 'Nombres *',
                                'required',
                                'onkeypress="return check(event);"',
                            ]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('apellidos', null, [
                                'class' => 'form-control',
                                'id' => 'apellidos',
                                'placeholder' => 'Apellidos *',
                                'required',
                                'onkeypress="return check(event);"',
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            {!! Form::email('correo', null, [
                                'class' => 'form-control',
                                'id' => 'correo',
                                'placeholder' => 'Correo electrónico *',
                                'required',
                                'pattern' => '[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}',
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            {!! Form::textarea('mensaje', null, [
                                'class' => 'form-control',
                                'id' => 'mensaje',
                                'placeholder' => 'Escriba su mensaje....',
                                'rows' => '6',
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <p id="avisoFormulario">Todos los campos marcados con (*), son obligatorios.</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <p id="texto-contactenos">
                                <input type="checkbox" id="check-contacto" name="check-contacto" value="1" required>
                                Autorizo de forma libre, consciente, expresa e informada el tratamiento de mi información
                                personal de acuerdo a las finalidades establecidas en el aviso de privacidad y la política
                                de tratamiento de datos personales, las cuales ustedes puede consultar @if ($ProteccionDatos)
                                    {!! $ProteccionDatos !!}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 mr-auto">
                            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5"
                                value="Enviar Mensaje">
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-white p-3 p-md-5">
                        <h4 class="text-black mb-4" id="titleContact" tabindex="0">Información de contacto
                        </h4>
                        <ul class="list-unstyled footer-link">
                            <li class="d-block mb-3" id="infoContact" tabindex="0">
                                <span class="d-block text-black">Dirección:</span>
                                <span>Transversal 93 # 53-35 Bogotá, Colombia</span>
                            </li>
                            <li class="d-block mb-3" id="infoContact" tabindex="0"><span
                                    class="d-block text-black">Teléfono:</span><a href="tel:+5719279254" class="" tabindex="0" id="phoneContac"><span class="mr-2  icon-phone"></span> +57(1) 9279254</a>
                            </li>
                            <li class="d-block mb-3" id="infoContact" tabindex="0"><span
                                    class="d-block text-black">Correo:</span><span><a href="mailto:denuncias@gypbogota.com"
                                        id="emailContac">denuncias@gypbogota.com</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d867.0439161772443!2d-74.11959638265166!3d4.687794500220376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9b5e1ebb3575%3A0xe602ba81e9271bc9!2sTv.+93+%2353-35%2C+Bogot%C3%A1!5e1!3m2!1ses!2sco!4v1522708850505"
                    style="width: 100% !important;height: 400px !important;"></iframe>
            </div>
        </div>
    </section>
    @include('ModalAlertas')

    {!! htmlScriptTagJsApi([
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch',
    ]) !!}
@endsection

@section('scripts')
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if (session('mensaje'))
            $("#contactoExitoso").modal("show");
            document.getElementById("exitoAlert").innerHTML = "{{ session('mensaje') }}";
        @endif

        @if (session('precaucion'))
            $("#solicitudError").modal("show");
            document.getElementById("errorAlert").innerHTML = "{{ session('precaucion') }}";
        @endif

        @if (count($errors) > 0)
            $("#solicitudError").modal("show");
            @foreach ($errors->all() as $error)
                document.getElementById("errorAlert").innerHTML = "{{ $error }}";
            @endforeach
        @endif

        function callbackThen(response) {
            console.log(response.status);
            response.json().then(function(data) {
                console.log(data);
            });
        }

        function callbackCatch(error) {
            console.error('Error:', error)
        }
    </script>
@endsection
