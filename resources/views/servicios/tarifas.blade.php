@extends("servicios.layout")

@section('titulo')
- Tarifas
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset("DataTables/DataTables/css/jquery.dataTables.min.css")}}">
    <link rel="stylesheet" href="{{asset("DataTables/Responsive/css/responsive.dataTables.min.css")}}">
@endsection

@section('barraInformacion')
<div class="overlay" id="franjaSubpagina">
    <div class="container">
        <div class="row align-items-center" id="franjaTituloCabecera">
            <div class="col-lg-6">
                <h2 id="tituloSubPagina">Tarifas</h2>
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
                <span id="iconoRutaPagina"><b>></b></span> Tarifas
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
    <section class="ftco-section" id="sectionPage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 id="titlesubServicios" tabindex="0">Tarifas del servicio de parqueaderos y grúas.</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPaginaTarifas">
                <div class="col-lg-12">
                    <h3 id="tituloSubPaginaHome"tabindex="0">Servicio de parqueadero de vehículos de servicio público y particular
                        en la ciudad de Bogotá.</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table id="tarifaServicio" class="responsive table-bordered hover">
                        <thead>
                            <td tabindex="0">Tipo de veh&iacute;culo</td>
                            <td tabindex="0">D&iacute;a 1</td>
                            <td tabindex="0">D&iacute;a 2</td>
                            <td tabindex="0">D&iacute;a 3</td>
                            <td tabindex="0">D&iacute;a 4 a d&iacute;a 30</td>
                            <td tabindex="0">D&iacute;a 31+</td>
                        </thead>
                        <tbody>
                            @foreach ($TarifaP as $value)
                                <tr>
                                    <td tabindex="0">{{ $value['NOMBRE_TARIFA'] }}</td>
                                    <td tabindex="0"><b>{{ $value['VALOR_TARIFA_1'] }}</b></td>
                                    <td tabindex="0"><b>{{ $value['VALOR_TARIFA_2'] }}</b></td>
                                    <td tabindex="0"><b>{{ $value['VALOR_TARIFA_3'] }}</b></td>
                                    <td tabindex="0"><b>{{ $value['VALOR_TARIFA_4'] }}</b></td>
                                    <td tabindex="0"><b>{{ $value['VALOR_TARIFA_5'] }}</b></td>
                                </tr>
                            @endforeach
                            {{-- <tr>
                                <td tabindex="0">Motocicletas y similares</td>
                                <td tabindex="0"><b>$36.000</b></td>
                                <td tabindex="0"><b>$49.900</b></td>
                                <td tabindex="0"><b>$78.500</b></td>
                                <td tabindex="0"><b>$11.300</b></td>
                                <td tabindex="0"><b>$800</b></td>
                            </tr>
                            <tr>
                                <td tabindex="0">Veh&iacute;culos livianos y medianos</td>
                                <td tabindex="0"><b>$111.000</b></td>
                                <td tabindex="0"><b>$116.000</b></td>
                                <td tabindex="0"><b>$133.100</b></td>
                                <td tabindex="0"><b>$44.500</b></td>
                                <td tabindex="0"><b>$3.900</b></td>
                            </tr>
                            <tr>
                                <td tabindex="0">Veh&iacute;culos pesados</td>
                                <td tabindex="0"><b>$308.200</b></td>
                                <td tabindex="0"><b>$322.500</b></td>
                                <td tabindex="0"><b>$369.700</b></td>
                                <td tabindex="0"><b>$123.400</b></td>
                                <td tabindex="0"><b>$10.500</b></td>
                            </tr>
                            <tr>
                                <td tabindex="0">Bicicletas</td>
                                <td tabindex="0"><b>$5.800</b></td>
                                <td tabindex="0"><b>$6.200</b></td>
                                <td tabindex="0"><b>$7.000</b></td>
                                <td tabindex="0"><b>$2.400</b></td>
                                <td tabindex="0"><b>$400</b></td>
                            </tr>
                            <tr>
                                <td tabindex="0">Carretilla</td>
                                <td tabindex="0"><b>$12.400</b></td>
                                <td tabindex="0"><b>$12.800</b></td>
                                <td tabindex="0"><b>$14.700</b></td>
                                <td tabindex="0"><b>$5.100</b></td>
                                <td tabindex="0"><b>$400</b></td>
                            </tr>
                            <tr>
                                <td tabindex="0">Patinetas con o sin motor</td>
                                <td tabindex="0"><b>$5.100</b></td>
                                <td tabindex="0"><b>$7.000</b></td>
                                <td tabindex="0"><b>$10.900</b></td>
                                <td tabindex="0"><b>$5.100</b></td>
                                <td tabindex="0"><b>$1.600</b></td>
                            </tr> --}}
                        </tbody>
                    </table>
                    <br>
                    <div class="row" id="textoInformativoTarifa">
                        <div class="col-md-12">
                            <p>* El cobro del servicio de parqueadero se hace por día y es acumulable.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section" id="sectionPage">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-12">
                    <h3 id="tituloSubPaginaHome" tabindex="0">Servicio de grúas en la ciudad de Bogotá.</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table id="tarifaGruas" class="responsive table-bordered hover">
                        <thead>
                            <td tabindex="0">Tipo de veh&iacute;culo</td>
                            <td tabindex="0">Tarifa</td>
                        </thead>
                        <tbody>
                            @foreach ($TarifaG as $value)
                                <tr>
                                    <td tabindex="0">{{ $value['NOMBRE_TARIFA'] }}</td>
                                    <td tabindex="0">{{ $value['VALOR_UNICO'] }}</td>
                                </tr>
                            @endforeach
                            {{-- <tr>
                                <td tabindex="0">Patinetas con o sin motor</td>
                                <td tabindex="0">$46.400</td>
                            </tr>
                            <tr>
                                <td tabindex="0">Motos y similares</td>
                                <td tabindex="0">$162.400</td>
                            </tr>
                            <tr>
                                <td tabindex="0">Veh&iacute;culo liviano</td>
                                <td tabindex="0">$177.900</td>
                            </tr>
                            <tr>
                                <td tabindex="0">Veh&iacute;culo mediano</td>
                                <td tabindex="0">$270.700</td>
                            </tr>
                            <tr>
                                <td tabindex="0">Veh&iacute;culo pesado</td>
                                <td tabindex="0">$398.300</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="ftco-section" id="sectionPage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p id="textTarifas" tabindex="0">De acuerdo con lo establecido en el <b>artículo segundo de la resolución 62 de 2018</b>, modificada por la <b>resolución 172 de 2019,
                        expedida por la Secretaría Distrital de Movilidad y lo decretado por Gobierno Nacional</b> referente al incremento salarial,
                        informamos las tarifas por los servicios de parqueaderos y grúas.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script src="{{asset("DataTables/DataTables/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("DataTables/Responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("js/tarifas.js")}}"></script>
@endsection
