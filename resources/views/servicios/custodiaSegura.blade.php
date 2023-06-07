@extends("servicios.layout")

@section('titulo')
- Custodia Segura
@endsection

@section('styles')

@endsection

@section('barraInformacion')
<div class="overlay" id="franjaSubpagina">
    <div class="container">
        <div class="row align-items-center" id="franjaTituloCabecera">
            <div class="col-lg-6">
                <h2 id="tituloSubPagina">Custodia segura</h2>
            </div>
        </div>
    </div>
</div>
<div class="ftco-cover-1" id="franjaSubpaginaTitulo">
    <div class="container-md" id="franjaRutaPagina">
        <div class="row" id="rutaPagina">
            <div class="col-md-12">
                <a href="{{ url('/') }}">Inicio</a>
                <span id="iconoRutaPagina"><b>></b></span> <a href="nuestrosServicios" id="subruta"> Servicios</a>
                <span id="iconoRutaPagina"><b>></b></span> Custodia segura
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container">
            <h3 id="titlesubServicios" tabindex="0">¿Tu vehículo fue inmovilizado por infringir las normas de tránsito?</h3>
        </div>
    </section>
    <section class="ftco-section" id="why-us-section" id="sectionServiciosSub">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p id="subTitleImage" tabindex="0">
                        Recuerda que este es custodiado en el <b style="color: #bed000;">parqueadero autorizado</b> por la Secretaría Distrital de Movilidad en la <b style="color: #bed000;">transversal 93 # 53 - 35</b>.
                    </p>
                </div>
            </div>
            <div class="row" id="imagesCustodia">
                <div class="col-md-12" id="pageImage" tabindex="0">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d867.0439161772443!2d-74.11959638265166!3d4.687794500220376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9b5e1ebb3575%3A0xe602ba81e9271bc9!2sTv.+93+%2353-35%2C+Bogot%C3%A1!5e1!3m2!1ses!2sco!4v1522708850505"
                    style="width: 100% !important;height: 400px !important;"></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h3 id="tituloSubPaginaHome" tabindex="0">¿Atención!</h2>
                </div>
            </div>
            <div class="row" id="NuestrosServiciosDescripcion">
                <div class="col-md-4">
                    <a href="../puntosAtencion" tabindex="0"><img src="{{asset("images/home/monitoreo_camaras.png")}}" alt="Puntos de atención" id="imagenServicios"></a>
                </div>
                <div class="col-md-8">
                    <p id="textNuestrosServicios" tabindex="0">
                        Nuestros parqueaderos y grúas están equipados con cámaras de seguridad con grabación 24/7 para tranquilidad del ciudadano con nuestra operación..
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

@endsection
