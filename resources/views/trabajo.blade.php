@extends("layout")

@section('titulo')
- Trabaje con Nosotros
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="ftco-cover-1 overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Trabaje con Nosotros</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="ftco-cover-1" id="franjaSubpaginaTitulo">
        <div class="container-md" id="franjaRutaPagina">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('/') }}" id="rutaPagina">Inicio</a>
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span> Trabaje con Nosotros
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="site-section bg-light" id="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5" data-aos-delay="200">
                    <div class="bg-white p-3 p-md-5">
                        <h4 class="text-black mb-4" id="titleTrabajo">
                            Trabaje con Nosotros
                        </h4>
                        <p id="textTrabajo">
                            Somos una empresa joven, sólida, orgullosamente
                            Colombiana, especializada en el servicio de transporte de vehículos inmovilizados y
                            servicios de parqueaderos que busca satisfacer las necesidades de movilización en la
                            ciudad de Bogotá D.C. con altos estándares de calidad, seguridad y puntualidad,
                            velando por los intereses de nuestros usuarios y demás partes interesadas, a través
                            de la prestación de un servicio de calidad.
                        </p>
                    </div>
                </div>
                <div class="col-md-7">
                    {!! Form::open(['url' => 'trabajoNosotros', 'method' => 'post', 'enctype' => 'multipart/form-data','autocomplete'=>'off','id'=>'form-trabajo']) !!}
                    @csrf
                        <div class="form-group row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                {!! Form::text('nombres',null,['class'=>'form-control','id'=>'nombres','placeholder'=>'Nombres *','required','onkeypress="return check(event);"']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('apellidos',null,['class'=>'form-control','id'=>'apellidos','placeholder'=>'Apellidos *','required','onkeypress="return check(event);"']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                {!! Form::select('tipo_documento',$TipoDocumento,null,['class'=>'form-control','id'=>'tipo_documento','required']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('documentoIdentidad',null,['class'=>'form-control','id'=>'documentoIdentidad','placeholder'=>'Documento de Identidad sin puntos *','required','onkeydown="noPuntoComa(event);"','maxlength="15" oninput="if(this.value.length > this.maxLength)
                                this.value = this.value.slice(0, this.maxLength)";']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                {!! Form::text('direccion',null,['class'=>'form-control','id'=>'direccion','placeholder'=>'Dirección *','required']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::email('correo',null,['class'=>'form-control','id'=>'correo','placeholder'=>'Correo electrónico *','required','pattern'=>'[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                {!! Form::text('telefono',null,['class'=>'form-control','id'=>'telefono','placeholder'=>'Teléfono de contacto *','required']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::text('profesion',null,['class'=>'form-control','id'=>'profesion','placeholder'=>'Profesión *','required','onkeypress'=>'return check(event);']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                <label>Adjunte su hoja de vida en formato pdf, doc o docx *</label>
                            </div>
                            <div class="col-md-6">
                                <input type="file" name="hojaVida" id="hojaVida" accept=".pdf,.pdf-a,.doc,.docx" required class="form-control" size="2048">
                                <div align="right"><small class="text-muted">Tamaño maximo en total permitido (2MB), si se supera este tamaño, su archivo no será cargado.</small><span id="cntDescripHechos" align="right"> </span></div>
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
                                    <input type="checkbox" id="check-trabajo" name="check-trabajo" value="1" required> Autorizo de forma libre, consciente, expresa e informada el tratamiento de mi información personal de acuerdo a las finalidades establecidas en el aviso de privacidad y la política de tratamiento de datos personales, las cuales ustedes puede consultar <a href="documentos/PROTECCION_DATOS.pdf" style="color: #000000 !important;font-weight: 600;" target="_blank">aquí</a>.
                                </p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Enviar Mensaje">
                            </div>
                        </div>
                    {!!  Form::close() !!}
                </div>
            </div>
        </div>
    </section>
    @include("ModalAlertas")
@endsection

@section('scripts')
    <script src="{{asset("js/toastr.min.js")}}"></script>
    <script>
        @if (session("mensaje"))
            $("#trabajoExitoso").modal("show");
            document.getElementById("exitoTrabajo").innerHTML = "{{ session("mensaje") }}";
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

@endsection
