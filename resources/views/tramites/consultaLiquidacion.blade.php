@extends("layout")

@section('titulo')
- Consulta Liquidación
@endsection

@section('styles')

@endsection

@section('barraInformacion')
<div class="overlay" id="franjaSubpagina">
    <div class="container">
        <div class="row align-items-center" id="franjaTituloCabecera">
            <div class="col-lg-6">
                <h2 id="tituloSubPagina">Consulta liquidación</h2>
            </div>
        </div>
    </div>
</div>
<div class="ftco-cover-1" id="franjaSubpaginaTitulo">
    <div class="container-md" id="franjaRutaPagina">
        <div class="row" id="rutaPagina">
            <div class="col-md-12">
                <a href="{{ url('/') }}">Inicio</a>
                <span id="iconoRutaPagina"><b>></b></span> Trámites
                <span id="iconoRutaPagina"><b>></b></span> Consulta liquidación
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container">
            <div class="row">
                <div class="col-md-6" id="ConsultaLiquidacion">
                    <div class="row">
                        <div class="col-md-12" id="pageImage">
                            <a href="https://cmovilgyp.com/wliquidacion/" target="_blank">
                                @if($ConsultaImg)
                                    @foreach($ConsultaImg as $imagesCL)
                                        @if(strpos($imagesCL->UBICACION, '.jpg') !== false)
                                            <picture tabindex="0">
                                                <source srcset="{{  asset(str_replace('../', '', $imagesCL->UBICACION_WEBP)) }}" type="image/webp"/>
                                                <source srcset="{{ asset(str_replace('../', '/', $imagesCL->UBICACION)) }}" type="image/jpg"/>
                                                <img src="{{ asset(str_replace('../', '/', $imagesCL->UBICACION_WEBP)) }}" id="consultaLiquidacionImg" alt="Consulta Liquidación" class="img-responsive"/>                                                
                                            </picture>
                                        @else
                                            <picture tabindex="0">
                                                <source srcset="{{ asset(str_replace('../', '/', $imagesCL->UBICACION_WEBP)) }}" type="image/webp"/>
                                                <source srcset="{{ asset(str_replace('../', '/', $imagesCL->UBICACION)) }}" type="image/png"/>
                                                <img src="{{ asset(str_replace('../', '/', $imagesCL->UBICACION_WEBP)) }}" id="consultaLiquidacionImg" alt="Consulta Liquidación" class="img-responsive"/>                                                
                                            </picture>
                                        @endif                        
                                    @endforeach
                                    <p id="footerImage">{!! $imagesCL->PIE_IMAGEN !!}</p>
                                @endif
                                {{-- <picture>
                                    <source srcset="{{asset("images/tramites/consulta_liquidacion/consulta_liquidacion.webp") }}" type="image/webp"/>
                                    <source srcset="{{asset("images/tramites/consulta_liquidacion/consulta_liquidacion.png") }}" type="image/png"/>
                                    <img src="{{asset("images/tramites/consulta_liquidacion/consulta_liquidacion.webp") }}" id="consultaLiquidacionImg" alt="Cunsulta Liquidación" class="img-responsive"/>
                                </picture> --}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" id="ConsultaLiquidacion">
                    <h4 class="text-primary" id="textConsultaLiquidacion" tabindex="0">
                        Consulte por placa del vehículo si fue inmovilizado y genere la liquidación para realizar el pago en línea o con código de barras.
                    </h4>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
