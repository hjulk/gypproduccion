@extends("layout")

@section('titulo')
- Mapa del Sitio
@endsection

@section('styles')

@endsection

@section('barraInformacion')
    <div class="ftco-cover-1 overlay" id="franjaSubpagina">
        <div class="container">
            <div class="row align-items-center" id="franjaTituloPagina">
                <div class="col-lg-6">
                    <h2 id="tituloSubPagina">Mapa del Sitio</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="ftco-cover-1" id="franjaSubpaginaTitulo">
        <div class="container-md" id="franjaRutaPagina">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('/') }}" id="rutaPagina">Inicio</a>
                    <span class="icon icon-chevron-right" id="iconoRutaPagina"></span> Mapa del Sitio
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contenido')
    <section class="site-section bg-light" id="contact-section">
        <div class="container">

            <div class="row">

              <div class="col-lg-12 ml-auto" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white p-3 p-md-5">
                  <div class="row">
                    <a href="{{ url('/') }}"><h4 class="text-black mb-4" id="tituloMapaSitio">INICIO</h4></a>
                  </div>
                  <div class="row">
                    <h4 class="text-black mb-3" id="tituloMapaSitio">GRÚAS Y PARQUEADEROS BOGOTÁ</h4>
                  </div>
                  <div class="row">
                    <ul>
                      <li style="font-size: medium;"> <a href="nosotros" id="linkMapaSitio">Nosotros</a></li>
                      <li style="font-size: medium;"> @if($Organigrama)
                                    {!! $Organigrama !!}
                                @endif</li>
                      <li style="font-size: medium;"> <a href="normatividad" id="linkMapaSitio">Normatividad</a></li>
                    </ul>
                  </div>
                  <div class="row">
                    <h4 class="text-black mb-3" id="tituloMapaSitio">ATENCIÓN AL CIUDADANO</h4>
                  </div>
                  <div class="row">
                    <ul>
                      <li style="font-size: medium;"> <a href="contacto" id="linkMapaSitio">Contáctenos</a></li>
                      <li style="font-size: medium;"> <a href="notificacionAviso" id="linkMapaSitio">Notificación por Aviso</a></li>
                      <li style="font-size: medium;font-weight: 700;"> Peticiones, quejas y reclamos
                        <ul>
                          <li style="font-size: medium;"><a href="https://bogota.gov.co/sdqs/crear-peticion" id="linkMapaSitio" target="_blank">Registrar su PQRS</a></li>
                          <li style="font-size: medium;"><a href="https://bogota.gov.co/sdqs/consultar-peticion" id="linkMapaSitio" target="_blank">Consulte su PQRS en Bogotá te Escucha</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <div class="row">
                    <h4 class="text-black mb-3" id="tituloMapaSitio">SERVICIOS</h4>
                  </div>
                  <div class="row">
                    <ul>
                      <li style="font-size: medium;"> <a href="servicios/beneficios" id="linkMapaSitio">Beneficios</a></li>
                      <li style="font-size: medium;"> <a href="servicios/custodiaSegura" id="linkMapaSitio">Custodia Segura</a></li>
                      <li style="font-size: medium;"> <a href="servicios/gruas" id="linkMapaSitio">Grúas</a></li>
                      <li style="font-size: medium;"> <a href="servicios/nuestrosServicios" id="linkMapaSitio">Nuestros Servicios</a></li>
                      <li style="font-size: medium;"> <a href="servicios/procesoInmovilizacion" id="linkMapaSitio">Proceso Inmovilización</a></li>
                      <li style="font-size: medium;"> <a href="servicios/procesoRetiro" id="linkMapaSitio">Proceso Retiro</a></li>
                      <li style="font-size: medium;"> <a href="servicios/tarifas" id="linkMapaSitio">Tarifas</a></li>
                    </ul>
                  </div>
                  <div class="row">
                    <h4 class="text-black mb-3" id="tituloMapaSitio">Trámites</h4>
                  </div>
                  <div class="row">
                    <ul>
                      <li style="font-size: medium;"> <a href="consultaLiquidacion" id="linkMapaSitio">Consulta Liquidación</a></li>
                      <li style="font-size: medium;"> <a href="pagoLinea" id="linkMapaSitio">Pago en Línea</a></li>
                      <li style="font-size: medium;"> <a href="puntosAtencion" id="linkMapaSitio">Puntos de Atención</a></li>
                    </ul>
                  </div>
                  <div class="row">
                    <a href="trabajo"><h4 class="text-black mb-4" id="tituloMapaSitio">TRABAJE CON NOSOTROS</h4></a>
                  </div>
                </div>
              </div>
            </div>

          </div>
    </section>
@endsection

@section('scripts')

@endsection
