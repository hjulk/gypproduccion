@extends("layout")

@section('titulo')
- Consulta Liquidación
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="ftco-cover-1 overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Consulta Liquidación</h2>
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
                    Tramites
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span> Consulta Liquidación
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
                    <h4 class="text-primary" id="textConsultaLiquidacion">
                        Consulte por placa del vehículo si fue inmovilizado y genere la liquidación para realizar el pago en línea o con código de barras.
                    </h4>
                </div>
                <div class="col-md-6" id="ConsultaLiquidacion">
                    <div class="row">
                        <div class="col-md-12" id="pageImage">
                            <picture>
                                <source srcset="{{asset("images/quotes-v4.webp") }}" type="image/webp"/>
                                <source srcset="{{asset("images/quotes-v4.png") }}" type="image/png"/>
                                <img src="{{asset("images/quotes-v4.webp") }}" id="consultaLiquidacionImg" alt="Cunsulta Liquidación" class="img-responsive"/>
                            </picture>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12" id="pageImage">
                            <a href="https://cmovilgyp.com/wliquidacion/" target="_blank">
                                <picture>
                                    <source srcset="{{asset("images/por_placa.webp") }}" type="image/webp"/>
                                    <source srcset="{{asset("images/por_placa.png") }}" type="image/png"/>
                                    <img src="{{asset("images/por_placa.webp") }}" alt="Cunsulta Liquidación" class="img-responsive"/>
                                </picture>
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12" id="pageImage">
                            <a href="https://cmovilgyp.com/wliquidacion/"target="_blank">
                                <picture>
                                    <source srcset="{{asset("images/397x77.webp") }}" type="image/webp"/>
                                    <source srcset="{{asset("images/397x77.jpg") }}" type="image/jpg"/>
                                    <img src="{{asset("images/397x77.webp") }}" alt="Cunsulta Liquidación" class="img-responsive" id="consultaLiquidacionImg2"/>
                                </picture>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection
