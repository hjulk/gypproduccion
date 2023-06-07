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
        {{-- <div class="row">
            <div class="col-md-4">
                <input type="text" id="buscarPregunta" onkeyup="searchQuestion()" placeholder="Busqueda por palabra clave" title="Palabra clave" class="form-control">
                <input type="text" id="buscarPregunta" name="buscarPregunta" placeholder="Busqueda por palabra clave" title="Pregunta frecuente" class="form-control">
            </div>
        </div> --}}
        {{-- <br> --}}
        <div class="row" id="resultadoPregunta">
            <div class="col-md-12">
                <h5>No se encontraron coincidencias en relación a su pregunta</h5>
            </div>
            <br>
        </div>
        {{-- <div class="row">
            <div class="col-md-12">
                <ul id="listaPreguntasF">
                    <li class="preguntaF">
                        <label for="1pf" id="tituloPregunta">¿A cargo de qué entidad está la administración de los patios y grúas en la ciudad de Bogotá D.C.? <span>&#x2b;</span></label>
                        <input type="radio" name="accordionPF" id="1pf">
                        <div class="contentPF">
                            <p id="accordionText">La administración de los patios y grúas de la ciudad está a cargo de la Secretaría Distrital de Movilidad y del concesionario GYP BOGOTA S.A.S., a quien a través del proceso de Licitación Pública SDM-LP-052-2017 le fue otorgada la concesión para la prestación de los servicios relacionados con el traslado de vehículos al lugar que la Secretaría Distrital de Movilidad establezca y la disposición de los espacios para proveer el parqueo y ejercer la custodia de aquellos vehículos que determine el organismo de tránsito del distrito capital.</p>
                        </div>

                    </li>
                    <li class="preguntaF">
                        <label for="2pf" id="tituloPregunta">¿Con cuántos vehículos tipo grúa cuenta el concesionario GYP para la inmovilización de vehículos en Bogotá D.C.? <span>&#x2b;</span></label>
                        <input type="radio" name="accordionPF" id="2pf">
                        <div class="contentPF">
                            <p id="accordionText">El Concesionario GyP cuenta con 125 vehículos tipo grúa.</p>
                        </div>

                    </li>
                    <li class="preguntaF">
                        <label for="3pf" id="tituloPregunta">¿Qué tipos de grúas tiene el concesionario GYP para la inmovilización de vehículos en Bogotá D.C.? <span>&#x2b;</span></label>
                        <input type="radio" name="accordionPF" id="3pf">
                        <div class="contentPF">
                            <p id="accordionText">El Concesionario GyP cuenta con vehículos tipo grúa de las siguientes características:&nbsp;
                                <br>
                                <ul>
                                    <li><b>GANCHO EXTRAPESADO:</b> Con capacidad para transportar vehículos de hasta 16 toneladas<br>
                                    </li>
                                    <li><b>GANCHO PESADO:</b> Con capacidad para transportar vehículos de hasta 10 toneladas<br>
                                    </li>
                                    <li><b>GRÚAS DE PLANCHÓN:</b> Grúas con plataforma de transporte de vehículos livianos, medianos y motocicletas<br>
                                    </li>
                                    <li><b>GRÚAS DE PLANCHÓN PARA MOTOCICLETAS:</b> Grúas con plataforma para el transporte de motocicletas.<br>
                                    </li>
                                    <li><b>GRÚAS DE IZAJE LATERAL:</b> Grúas con dispositivo lateral para izaje de vehículos livianos y medianos.</li>
                                </ul>
                            </p>
                        </div>

                    </li>
                    <li class="preguntaF">
                        <button class="accordion">
                            ¿Dónde está ubicado el parqueadero autorizado No. 01?
                        </button>
                        <div class="panel">
                            <br>
                            <p id="accordionText">El Parqueadero Autorizado No. 01 se encuentra ubicado en la <b>Transversal 93 No. 53 – 35</b>, en la ciudad de Bogotá D.C. Allí son custodiados los vehículos que son inmovilizados por infracción a las normas de tránsito.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-12">
                <table id="preguntasFrecuentesTable" class="responsive" style="width:100%">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb1"  tabindex="0"/>
                                <section class="box">
                                    <label class="box-title" for="cb1" tabindex="0">¿A cargo de qué entidad está la administración de los patios y grúas en la ciudad de Bogotá D.C.?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content"><p id="accordionText">La administración de los patios y grúas de la ciudad está a cargo de la Secretaría Distrital de Movilidad y del concesionario GYP BOGOTA S.A.S., a quien a través del proceso de Licitación Pública SDM-LP-052-2017 le fue otorgada la concesión para la prestación de los servicios relacionados con el traslado de vehículos al lugar que la Secretaría Distrital de Movilidad establezca y la disposición de los espacios para proveer el parqueo y ejercer la custodia de aquellos vehículos que determine el organismo de tránsito del distrito capital.</p></div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb2" />
                                <section class="box">
                                    <label class="box-title" for="cb2" tabindex="0">¿Con cuántos vehículos tipo grúa cuenta el concesionario GYP para la inmovilización de vehículos en Bogotá D.C.?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content"><p id="accordionText">El Concesionario GyP cuenta con 125 vehículos tipo grúa.</p></div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb3" />
                                <section class="box">
                                    <label class="box-title" for="cb3" tabindex="0">¿Qué tipos de grúas tiene el concesionario GYP para la inmovilización de vehículos en Bogotá D.C.?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <p id="accordionText">
                                            El Concesionario GyP cuenta con vehículos tipo grúa de las siguientes características:&nbsp;
                                            <br>
                                            <ul>
                                                <li><b>GANCHO EXTRAPESADO:</b> Con capacidad para transportar vehículos de hasta 16 toneladas<br>
                                                </li>
                                                <li><b>GANCHO PESADO:</b> Con capacidad para transportar vehículos de hasta 10 toneladas<br>
                                                </li>
                                                <li><b>GRÚAS DE PLANCHÓN:</b> Grúas con plataforma de transporte de vehículos livianos, medianos y motocicletas<br>
                                                </li>
                                                <li><b>GRÚAS DE PLANCHÓN PARA MOTOCICLETAS:</b> Grúas con plataforma para el transporte de motocicletas.<br>
                                                </li>
                                                <li><b>GRÚAS DE IZAJE LATERAL:</b> Grúas con dispositivo lateral para izaje de vehículos livianos y medianos.</li>
                                            </ul>
                                        </p>
                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb4" />
                                <section class="box">
                                    <label class="box-title" for="cb4" tabindex="0">¿Dónde está ubicado el parqueadero autorizado No. 01?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <p id="accordionText">El Parqueadero Autorizado No. 01 se encuentra ubicado en la <b>Transversal 93 No. 53 – 35</b>, en la ciudad de Bogotá D.C. Allí son custodiados los vehículos que son inmovilizados por infracción a las normas de tránsito.
                                        </p>
                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb5" />
                                <section class="box">
                                    <label class="box-title" for="cb5" tabindex="0">¿Cuál es el paso a paso de la inmovilización de un vehículo mal estacionado?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <ol>
                                                <li>La autoridad de tránsito solicita la grúa.</li>
                                                <li>Al llegar la grúa, el personal de la Concesión registra en línea mediante un vídeo, el estado del vehículo objeto de inmovilización.</li>
                                                <li>Se instalan los adhesivos de control en el vehículo.</li>
                                                <li>Se procede a subir el vehículo a la grúa (izaje).</li>
                                                <li>Se asegura el vehículo e inicia el traslado al patio (Parqueadero Autorizado No. 1), donde será custodiado hasta la autorización de salida.</li>
                                            </ol>

                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb6" />
                                <section class="box">
                                    <label class="box-title" for="cb6" tabindex="0">¿Cómo se le informa al propietario que su vehículo fue inmovilizado por mal parqueo o abandono en la vía?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <p id="accordionText">La Concesión GYP envía al propietario registrado en el RUNT, un mensaje de texto informando la inmovilización del vehículo.
                                        </p>
                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb7" />
                                <section class="box">
                                    <label class="box-title" for="cb7" tabindex="0">¿Cómo es el proceso para la recepción del vehículo en las instalaciones del patio (Parqueadero Autorizado No. 01)?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <p id="accordionText">Una vez el vehículo inmovilizado llega al patio <b>(Parqueadero Autorizado No. 01)</b>, se entrega al personal de la concesión que se encuentran este lugar, quienes realizan un video e inventario y lo ubican en el lugar donde permanecerá hasta la reclamación por parte de la persona autorizada.
                                        </p>
                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb8" />
                                <section class="box">
                                    <label class="box-title" for="cb8" tabindex="0">¿Cuál es el horario de atención en el patio (Parqueadero Autorizado No. 01)?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <p id="accordionText">La hora de atención para el retiro de vehículos, retiro de documentos y/u objetos personales, toma de improntas y trasbordo de mercancías, subsanación (mecánica o montallantas de forma particular) <b>es de 24 horas los 7 días a la semana</b>.
                                        </p>
                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb9" />
                                <section class="box">
                                    <label class="box-title" for="cb9" tabindex="0">¿Dónde se puede realizar el trámite de salida del vehículo inmovilizado?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <p id="accordionText">Para realizar el trámite de salida de patios la ciudadanía debe agendar una cita para la atención en <a href="https://www.movilidadbogota.gov.co" target="_blank"><b>www.movilidadbogota.gov.co</b></a> o en el Centro de Contacto de Movilidad (601) 3649400 opción 2.
                                        </p>
                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb10" />
                                <section class="box">
                                    <label class="box-title" for="cb10" tabindex="0">¿Qué normatividad establece los valores de cobro de las tarifas de patios (Parqueadero Autorizado No. 01)?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <p id="accordionText">De acuerdo con la Resolución 172 de 2019, por medio de la cual se modifica la resolución 062 de 2018, se establecen las tarifas para los servicios de grúas y parqueaderos de inmovilización de vehículos.
                                        </p>
                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb11" />
                                <section class="box">
                                    <label class="box-title" for="cb11" tabindex="0">¿Cuántos vehículos puede transportar una grúa?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <p id="accordionText">Los que la capacidad autorizada le permita, tenga en cuenta que en el costado derecho de las grúas dispuesto por la Concesión GYP, se encuentra la capacidad del vehículo, dando cumplimiento a la Resolución 5443 de 2009 y el concepto emitido por el Ministerio de Transporte MT No. 20174110228051.
                                        </p>
                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb12" />
                                <section class="box">
                                    <label class="box-title" for="cb12" tabindex="0">Si no legalice el traspaso, ¿Por qué no me entregan el vehículo si soy el tenedor?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <p id="accordionText">En caso de no contar con el traspaso, el ciudadano en la audiencia de salida de su vehículo deberá presentar las evidencias de la tenencia de este.  La Autoridad de Tránsito será quién determinará otorgar o negar la autorización del retiro de los patios.
                                        </p>
                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb13" />
                                <section class="box">
                                    <label class="box-title" for="cb13" tabindex="0">¿Dónde puedo pagar los servicios de grúa y patio?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <p id="accordionText">Luego de liquidar el servicio por concepto de grúa y parqueadero, puede realizar el pago a través de los siguientes medios:<br>
                                            <ul>
                                                <li><b>Electrónico</b><br>
                                                    A través de Pago Seguro en Línea (PSE) habilitado en la página web de la Secretaría Distrital de Movilidad <a href="https://www.movilidadbogota.gov.co" target="_blank"><b>www.movilidadbogota.gov.co</b></a>
                                                </li>
                                                <li>
                                                    <b>Efectivo</b><br>
                                                    <b>Banco de Occidente.</b> En la red de oficinas del banco, incluyendo el Centro de Servicios de Movilidad Calle 13, en los horarios de atención establecidos (sean o no clientes del Banco de Occidente).
                                                </li>
                                                <li>
                                                    <b>Corresponsales no bancarios</b><br>
                                                    Tarjeta de crédito en los Supermercados Éxito, Surtimax, Súper Inter, Carulla y banco del Centro de Servicios de Movilidad Calle 13.
                                                </li>
                                            </ul>
                                          </p>
                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb14" />
                                <section class="box">
                                    <label class="box-title" for="cb14" tabindex="0">¿En qué casos el vehículo inmovilizado debe salir del patio en grúa?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <p id="accordionText">Por orden de la autoridad de tránsito, cuando la falta que dio origen a la inmovilización no pueda ser subsanada en el patio (Parqueadero Autorizado No. 1) ejemplo: técnico-mecánica vencida; cuando la persona autorizada no cuenta con licencia de conducción; en caso de vehículos inmovilizados por gases, prueba ambiental y fuga de aceite, y para los taxis cuando tienen el tarjetón vencido.
                                        </p>
                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb15" />
                                <section class="box">
                                    <label class="box-title" for="cb15" tabindex="0">Si el vehículo inmovilizado debe salir del patio en grúa ¿Qué documentos debo tener en cuenta en el momento de contratar este servicio con un tercero o particular?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <p id="accordionText">Si el vehículo debe salir del patio en grúa por orden de la Autoridad de Tránsito, tenga en cuenta los siguientes documentos y su vigencia, en el momento de contratar el servicio con un tercero o particular:<br>
                                            <ul>
                                                <li>Seguro Obligatorio de Accidentes de Tránsito – SOAT</li>
                                                <li>Revisión Técnico – mecánica</li>
                                                <li>Póliza de seguro contra daños a terceros</li>
                                                <li>El conductor, deberá presentar la planilla de pagos a la ARL</li>
                                            </ul>
                                        </p>
                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb16" />
                                <section class="box">
                                    <label class="box-title" for="cb16" tabindex="0">¿Qué debo hacer si no estoy de acuerdo con el estado del vehículo, en el momento del retiro del patio (Parqueadero Autorizado No. 01)?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <p id="accordionText">En caso de inconformidades con el estado del vehículo podrá dirigirse a la Oficina de Atención al Usuario del patio (Parqueadero Autorizado No. 01) y realizar la reclamación o queja de manera verbal o escrita.<br><br>
                                            <b>Verbal</b><br>
                                            Uno de los encargados se desplazará hasta el lugar de parqueo o ubicación del vehículo para realizar el video de reclamación.<br>
                                            Se verificará a través del registro fílmico, el estado del vehículo antes del izaje y al ingreso al Patio (Parqueadero Autorizado No. 01) para determinar si la responsabilidad en el daño es atribuible al Concesionario y, proceder a realizar una conciliación económica o envió al taller para el respectivo arreglo.<br><br>
                                            <b>Escrita</b><br>
                                            La Oficina de Atención al Usuario realizará la respectiva investigación y en un término no superior a quince (15) días hábiles emitirá respuesta.  En caso de ser favorable, se solicitará la presentación de dos (2) cotizaciones para realizar el proceso de conciliación.<br>
                                            En caso de no llegar a un acuerdo con la ciudadana o el ciudadano, se procederá a presentar la solicitud de conciliación ante la Personería de Bogotá para que sea un tercero quien resuelva el conflicto.
                                        </p>
                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
                        <tr>
                            <td id="rowQuestion">
                                <input type="radio" name="accordionPF" id="cb17" />
                                <section class="box">
                                    <label class="box-title" for="cb17" tabindex="0">¿Dónde puedo denunciar actos de corrupción e irregularidades relacionadas con la operación de la grúa o del personal del patio, durante el izaje, traslado y custodia del vehículo?</label>
                                    <label class="box-close" for="acc-close" tabindex="0"></label>
                                    <div class="box-content">
                                        <p id="accordionText">A través del correo electrónico <a href="mailto:denuncias@gypbogota.com"><b>denuncias@gypbogota.com</b></a> o del buzón ubicado en el patio (Parqueadero Autorizado No. 01).
                                        </p>
                                    </div>
                                </section>
                                <input type="radio" name="accordionPF" id="acc-close" />
                            </td>
                        </tr>
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
