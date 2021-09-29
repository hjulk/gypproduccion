@extends("servicios.layout")

@section('titulo')
- Custodia Segura
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="ftco-cover-1 overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Custodia Segura</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="ftco-cover-1" id="franjaSubpaginaTitulo">
        <div class="container-md" id="franjaRutaPagina">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('/') }}" id="rutaPagina">Inicio</a>
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span>
                    <a href="nuestrosServicios" id="subruta"> Servicios</a>
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span> Custodia Segura
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container" id="pageImage">
            <h3 id="titlesubServicios">¿Tu vehículo fue inmovilizado por infringir las normas de tránsito?</h3>
        </div>
    </section>
    <section class="ftco-section" id="why-us-section" id="sectionServiciosSub">
        <div class="container">
            <div class="row" id="pageImage">
                <div class="col-md-12">
                    <p id="subTitleImage">
                        Recuerda que este es custodiado en el <b style="color: #4C531E;">parqueadero autorizado</b> por la Secretaría Distrital de Movilidad en la <b style="color: #4C531E;">transversal 93 # 53 - 35</b>.
                    </p>
                </div>
            </div>
            <div class="row" id="imagesCustodia">
                <div class="col-md-12" id="pageImage">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d867.0439161772443!2d-74.11959638265166!3d4.687794500220376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9b5e1ebb3575%3A0xe602ba81e9271bc9!2sTv.+93+%2353-35%2C+Bogot%C3%A1!5e1!3m2!1ses!2sco!4v1522708850505"
                    style="width: 100% !important;height: 400px !important;"></iframe>
                </div>
            </div>
        </div>
    </section>
    <br>
    @if($ImagenesCustodia)
        @foreach($ImagenesCustodia as $images)
            <section class="ftco-section" id="why-us-section" id="sectionServiciosSub">
                <div class="container">
                    <div class="row" id="pageImage">
                        <div class="col-md-12">
                            {!! $images->TEXTO_IMAGEN !!}
                        </div>
                    </div>
                    <div class="row" id="imagesCustodia">
                        <div class="col-md-12" id="pageImage">
                            @if(strpos($images->UBICACION, '.jpg') !== false)
                                <picture>
                                    <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp"/>
                                    <source srcset="{{ $images->UBICACION }}" type="image/jpg"/>
                                    <img src="{{ $images->UBICACION_WEBP }}" id="imagenPagina" alt="Custodia"/>
                                </picture>
                            @else
                                <picture>
                                    <source srcset="{{ $images->UBICACION_WEBP }}" type="image/webp"/>
                                    <source srcset="{{ $images->UBICACION }}" type="image/png"/>
                                    <img src="{{ $images->UBICACION_WEBP }}" id="imagenPagina" alt="Custodia"/>
                                </picture>
                            @endif
                            <p id="footerImage">{!! $images->PIE_IMAGEN!!}</p>
                        </div>
                    </div>
                </div>
            </section>
            <br>
        @endforeach
    @endif
    <br>
@endsection

@section('scripts')

@endsection
