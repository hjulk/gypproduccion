<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GYPBogota;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;


class PaginaController extends Controller
{
    public function Inicio()
    {
        date_default_timezone_set('America/Bogota');
        $ObtenerVisitas = GYPBogota::GetVisitas();
        foreach ($ObtenerVisitas as $value) {
            $Visitas = (int)$value->CONTADOR;
        }
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        $Organigrama = PaginaController::Organigrama();
        $yearNow = date('Y');
        $ImgInicio = GYPBogota::ImgInicio();
        $Banner                 = GYPBogota::BannerHomeActive(1, 2);
        $BannerMovil            = GYPBogota::BannerHomeActive(1, 1);
        $Carrusel               = GYPBogota::CarouselHomeActive(2);
        $CarruselMovil          = GYPBogota::CarouselHomeActive(1);
        $ContadorCarrusel       = count($Carrusel);
        $ContadorCarruselMovil  = count($CarruselMovil);
        $Tarifas                = GYPBogota::TarifasHomeActive();
        $TarifasSubsanacion     = GYPBogota::TarifasSubHomeActive();        
        $ImageEndYear           = null;
        $EndYear                = GYPBogota::EndYearHomeActive();
        $fecha_actual           = strtotime(date("d-m-Y H:i:00",time()));        
        if($EndYear){
            foreach($EndYear as $value){
                $ano = (int)$value->YEAR;
            }
            $fecha_enero    = strtotime("01-01-$ano 00:00:00");
            if($fecha_actual < $fecha_enero){
                $ImageEndYear = $EndYear;
            }else{
                GypBogota::UpdateEndYearImage();
            }
        }
        $AvisoPrensa = null;
        if($fecha_actual < strtotime("05-10-2023 23:59:59")){
            $AvisoPrensa = true;
        }        
        return view('index', ['Visitas' => $Visitas, 'PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama,'YearNow' => $yearNow,'ImgInicio' => $ImgInicio,
        'Banner' => $Banner, 'BannerMovil' => $BannerMovil, 'Carrusel' => $Carrusel, 'CarruselMovil' => $CarruselMovil, 'ContadorCarrusel' => $ContadorCarrusel,
        'ContadorCarruselMovil' => $ContadorCarruselMovil, 'Tarifas' => $Tarifas, 'ImageEndYear' => $ImageEndYear, 'AvisoPrensa' => $AvisoPrensa,
        'TarifasSubsanacion' => $TarifasSubsanacion]);
    }

    public function Trabajo()
    {
        $ListaDocumento  = GYPBogota::TipoDocumento();
        $TipoDocumento = array();
        $TipoDocumento[''] = 'Tipo de Documento *';
        foreach ($ListaDocumento as $row) {
            $TipoDocumento[$row->ID_DOCUMENTO] = $row->NOMBRE_DOCUMENTO;
        }
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        $Organigrama = PaginaController::Organigrama();
        $ProteccionDatos = PaginaController::ProteccionDatos();
        return view('trabajo', ['TipoDocumento' => $TipoDocumento, 'PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ProteccionDatos' => $ProteccionDatos]);
    }

    public function MapaSitio()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        $Organigrama = PaginaController::OrganigramaMS();
        return view('mapaSitio', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama]);
    }

    // GYP

    public function Normatividad()
    {
        $PHP_SELF = null;
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        $Organigrama = PaginaController::Organigrama();
        $ListarNormatividad = GYPBogota::ListarNormatividades();
        if (!isset($_GET['size'])) {
            echo "<script language=\"JavaScript\">
                document.location=\"$PHP_SELF?size=\"+window.innerWidth;
            </script>";
        } else {
            if (isset($_GET['size'])) {
                if ($_GET['size'] >= 1131) {
                    $Normatividad = null;
                    $cont = 0;
                    if ($ListarNormatividad) {
                        foreach ($ListarNormatividad as $value) {
                            $Normatividad[$cont]['documentos'] = '<section class="ftco-section" id="idSectionNormatividad">
                            <div class="container" id="containerNormatividad">
                            <iframe src="' . str_replace('../', '', $value->UBICACION) . '#toolbar=0" type="application/pdf" width="100%" height="600px"></iframe>
                            </div>
                            </section>';
                            $cont++;
                        }
                    }
                    return view('gyp.normatividad', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'Normatividad' => $Normatividad]);
                } else {
                    $NormatividadMobile = null;
                    $contM = 0;
                    if ($ListarNormatividad) {
                        foreach ($ListarNormatividad as &$value) {
                            $NormatividadMobile[$contM]['documentos'] = '
                            <section class="ftco-section" id="idSectionNormatividad">
                                <div class="container" id="containerNormatividad">
                                    <div class="row">
                                        <div class="col-md-3" id="imgNormatividad">
                                            <a href="' . str_replace('../', '', $value->UBICACION) . '" target="_blank">
                                                <img src="images/doc.png" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            <p>' . strtoupper($value->NOMBRE_DOCUMENTO) . '</p>
                                        </div>
                                    </div>
                                </div>
                            </section>';
                            $contM++;
                        }
                    }
                    return view('gyp.normatividad', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'Normatividad' => $NormatividadMobile]);
                }
            }
        }
    }

    public function Nosotros()
    {
        $PoliticaHSEQ   = PaginaController::PoliticaHSEQ();
        $Organigrama    = PaginaController::Organigrama();
        $Nosotros       = GYPBogota::NosotrosPageActive();
        $yearNow = date('Y');
        return view('gyp.nosotros', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama,'YearNow' => $yearNow, 'Nosotros' => $Nosotros]);
    }

    // ATENCIÓN AL CIUDADANO

    public function Contacto()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        $Organigrama = PaginaController::Organigrama();
        $ProteccionDatos = PaginaController::ProteccionDatos();
        return view('atencionCiudadano.contacto', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ProteccionDatos' => $ProteccionDatos]);
    }

    public function NotificacionAviso()
    {
        $ListarNotificaciones = GYPBogota::ListarNotificaciones();
        $Notificaciones = array();
        $cont           = 0;
        foreach ($ListarNotificaciones as $value) {
            $Notificaciones[$cont]['NOMBRE'] = $value->NOMBRE_CIUDADANO;
            $Notificaciones[$cont]['PLACA'] = $value->PLACA;
            $Notificaciones[$cont]['YEAR'] = $value->YEAR_NOTIFICATION;
            $cont++;
        }
        $ListarDesfijacionActiva = GYPBogota::ListarDesfijacionActiva();
        $Desfijacion = array();
        $contD          = 0;
        // $BotonDesfijacion = 0;
        // if ($ListarDesfijacionActiva) {
        //     $BotonDesfijacion = 1;
        //     foreach ($ListarDesfijacionActiva as $value) {
        //         $Desfijacion[$contD]['CONTENIDO'] = $value->CONTENIDO;
        //         $contD++;
        //     }
        // }
        $BotonDesfijacion = null;
        $texto = null;
        if ($ListarDesfijacionActiva) {
            foreach ($ListarDesfijacionActiva as $value) {
                $texto = $value->CONTENIDO;
            }
            $BotonDesfijacion = '<a href="#" class="btn btn-primary" title="Editar" data-toggle="modal" data-target="#modal-desfijacion">Aviso Desfijación</a>
            <div class="modal fade bd-example-modal-xl" id="modal-desfijacion" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title modal-title-primary">CONSTANCIA DESFIJACIÓN
                        <br>NOTIFICACIÓN POR AVISO</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            ' . $texto . '
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>';
        }
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        $Organigrama = PaginaController::Organigrama();
        return view('atencionCiudadano.notificacionAviso', ['Notificaciones' => $Notificaciones, 'Desfijacion' => $Desfijacion, 'BotonDesfijacion' => $BotonDesfijacion, 'PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama]);
    }

    public function PreguntasFrecuentes()
    {
        $PoliticaHSEQ           = PaginaController::PoliticaHSEQ();
        $Organigrama            = PaginaController::Organigrama();
        $PreguntasFrecuentes    = GYPBogota::PreguntasFrecuentes();
        $yearNow = date('Y');
        return view('atencionCiudadano.preguntasFrecuentes',['Organigrama' => $Organigrama, 'PoliticaHSEQ' => $PoliticaHSEQ, 'PreguntasFrecuentes' => $PreguntasFrecuentes]);
    }

    // SERVICIOS

    public function Beneficios()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQSer();
        $Organigrama = PaginaController::OrganigramaSer();
        $ImagenesBeneficios = GYPBogota::ImgServicios(1);
        return view('servicios.beneficios', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImagenesBeneficios' => $ImagenesBeneficios]);
    }

    public function CustodiaSegura()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQSer();
        $Organigrama = PaginaController::OrganigramaSer();
        $ImagenesCustodia = GYPBogota::ImagesCustodia();
        return view('servicios.custodiaSegura', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImagenesCustodia' => $ImagenesCustodia]);
    }

    public function Gruas()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQSer();
        $Organigrama = PaginaController::OrganigramaSer();
        $ExtraPesado = GYPBogota::ImgGruas('EP');
        $Pesado = GYPBogota::ImgGruas('PE');
        $Planchon = GYPBogota::ImgGruas('PL');
        $PlanchonMoto = GYPBogota::ImgGruas('PM');
        $IzajeLateral = GYPBogota::ImgGruas('IL');
        return view('servicios.gruas', [
            'PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ExtraPesado' => $ExtraPesado, 'Pesado' => $Pesado,
            'Planchon' => $Planchon, 'PlanchonMoto' => $PlanchonMoto, 'IzajeLateral' => $IzajeLateral
        ]);
    }

    public function NuestrosServicios()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQSer();
        $Organigrama = PaginaController::OrganigramaSer();
        $ImgNuestrosServicios = GYPBogota::ImgNuestrosServicios();
        return view('servicios.nuestrosServicios', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama,'ImgNuestrosServicios' => $ImgNuestrosServicios]);
    }

    public function ProcesoInmovilizacion()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQSer();
        $Organigrama = PaginaController::OrganigramaSer();
        $ImgProcesoInmovilizacion = GYPBogota::ImgProcesoInmovilizacion();
        return view('servicios.procesoInmovilizacion', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImgProcesoInmovilizacion' => $ImgProcesoInmovilizacion]);
    }

    public function ProcesoRetiro()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQSer();
        $Organigrama = PaginaController::OrganigramaSer();
        $ImgProcesoRetiro = GYPBogota::ImgProcesoRetiro();
        return view('servicios.procesoRetiro', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImgProcesoRetiro' => $ImgProcesoRetiro]);
    }

    public function Tarifas()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQSer();
        $Organigrama = PaginaController::OrganigramaSer();
        $ImgTarifas = GYPBogota::ImgTarifas();
        $year = date('Y');
        $ListNombreTarifaP = GYPBogota::ListNombreTarifa(1, $year);
        $ListNombreTarifaG = GYPBogota::ListNombreTarifa(2, $year);

        $TarifaP = array();
        $cont = 0;
        foreach($ListNombreTarifaP as $value){
            $listadoTipoTarifaP = GYPBogota::ListTipoTarifa(1, $year, $value->ID_TARIFA);
            if($listadoTipoTarifaP){
                foreach($listadoTipoTarifaP as $row);{
                    $TarifaP[$cont]['ID_TARIFA'] = $row->ID_TARIFA;
                    $TarifaP[$cont]['TARIFA'] = $row->TARIFA;
                    $TarifaP[$cont]['VALOR_TARIFA_1'] = '$'.number_format((int)$row->VALOR_TARIFA_1,'0',',','.');
                    $TarifaP[$cont]['VALOR_TARIFA_2'] = '$'.number_format((int)$row->VALOR_TARIFA_2,'0',',','.');
                    $TarifaP[$cont]['VALOR_TARIFA_3'] = '$'.number_format((int)$row->VALOR_TARIFA_3,'0',',','.');
                    $TarifaP[$cont]['VALOR_TARIFA_4'] = '$'.number_format((int)$row->VALOR_TARIFA_4,'0',',','.');
                    $TarifaP[$cont]['VALOR_TARIFA_5'] = '$'.number_format((int)$row->VALOR_TARIFA_5,'0',',','.');
                    $BuscarNombreTarifa = GYPBogota::BuscarNombreTarifa($row->TARIFA);
                    if($BuscarNombreTarifa){
                        foreach($BuscarNombreTarifa as $row){
                            $TarifaP[$cont]['NOMBRE_TARIFA'] = $row->NOMBRE_TARIFA;
                        }
                    }else{
                        $TarifaP[$cont]['NOMBRE_TARIFA'] = 'SIN NOMBRE DE TARIFA';
                    }
                }
            }
            $cont++;
        }
        $TarifaG = array();
        $cont = 0;
        foreach($ListNombreTarifaG as $value){
            $listadoTipoTarifaG = GYPBogota::ListTipoTarifa(2, $year, $value->ID_TARIFA);
            if($listadoTipoTarifaG){
                foreach($listadoTipoTarifaG as $row);{
                    $TarifaG[$cont]['ID_TARIFA'] = $row->ID_TARIFA;
                    $TarifaG[$cont]['TARIFA'] = $row->TARIFA;
                    $TarifaG[$cont]['VALOR_UNICO'] = '$'.number_format((int)$row->VALOR_UNICO,'0',',','.');
                    $BuscarNombreTarifa = GYPBogota::BuscarNombreTarifa($row->TARIFA);
                    if($BuscarNombreTarifa){
                        foreach($BuscarNombreTarifa as $row){
                            $TarifaG[$cont]['NOMBRE_TARIFA'] = $row->NOMBRE_TARIFA;
                        }
                    }else{
                        $TarifaG[$cont]['NOMBRE_TARIFA'] = 'SIN NOMBRE DE TARIFA';
                    }
                }
            }
            $cont++;
        }
        return view('servicios.tarifas', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImgTarifas' => $ImgTarifas,
                    'TarifaG' => $TarifaG, 'TarifaP' => $TarifaP]);
    }

    public function MonitoreoCamara()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQSer();
        $Organigrama = PaginaController::OrganigramaSer();
        $ImgMonitoreo = GYPBogota::ImgServicios(4);
        return view('servicios.monitoreoCamaras', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImgMonitoreo' => $ImgMonitoreo]);
    }

    public function MensajeSms()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQSer();
        $Organigrama = PaginaController::OrganigramaSer();
        $ImgMensajes = GYPBogota::ImgMensajes();
        return view('servicios.mensajeSms', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImgMensajes' => $ImgMensajes]);
    }

    // TRAMITES

    public function ConsultaLiquidacion()
    {
        $PoliticaHSEQ   = PaginaController::PoliticaHSEQ();
        $Organigrama    = PaginaController::Organigrama();
        $ConsultaImg    = GYPBogota::ConsultaImg();
        return view('tramites.consultaLiquidacion', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ConsultaImg' => $ConsultaImg]);
    }

    public function PagoLinea()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        $Organigrama = PaginaController::Organigrama();
        $ImgPagoLinea = GYPBogota::ImgPagoLinea();
        return view('tramites.pagoLinea', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama, 'ImgPagoLinea' => $ImgPagoLinea]);
    }

    public function PuntosAtencion()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        $Organigrama = PaginaController::Organigrama();
        return view('tramites.puntosAtencion', ['PoliticaHSEQ' => $PoliticaHSEQ, 'Organigrama' => $Organigrama]);
    }

    public function CrearVisita(Request $request)
    {
        $Ip_client = $_SERVER['REMOTE_ADDR'];
        $pagina = $request->pagina;
        GYPBogota::CrearVisita($Ip_client, $pagina);
    }

    public function Contactenos(Request $request)
    {

        date_default_timezone_set('America/Bogota');

        $validator = Validator::make($request->all(), [
            'nombres'           =>  'required',
            'apellidos'         =>  'required',
            'correo'            =>  'required|email',
            'mensaje'           =>  'required',
            'check-contacto'    =>  'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('contacto')->withErrors($validator)->withInput();
        } else {

            $Nombres = $request->nombres;
            $Apellidos = $request->apellidos;
            $NombreUsuario = $Nombres . ' ' . $Apellidos;
            $Correo = $request->correo;
            $Mensaje = $request->mensaje;

            $CorreoDestino  = "denuncias@gypbogota.com";
            $subject    = "Mensaje de $NombreUsuario";
            Mail::send(
                'Emails.CorreoContacto',
                ['NombreUsuario' => $NombreUsuario, 'Email' => $Correo, 'Mensaje' => $Mensaje],
                function ($msj) use ($subject, $Correo, $NombreUsuario, $CorreoDestino) {
                    $msj->from($CorreoDestino, "Gruas y Parqueaderos Bogotá S.A.S");
                    $msj->subject($subject);
                    $msj->addCC($Correo);
                    $msj->to($CorreoDestino);
                }
            );

            if (count(Mail::failures()) === 0) {
                $Contacto  = GYPBogota::Contactenos($NombreUsuario, $Correo, $Mensaje);
                if ($Contacto) {
                    $verrors = $NombreUsuario . ' su mensaje fue enviado con éxito';
                    return Redirect::to('contacto')->with('mensaje', $verrors);
                } else {
                    $verrors = 'Hubo un error al enviar su mensaje';
                    return Redirect::to('contacto')->with('precaucion', $verrors);
                }
            } else {
                $verrors = 'Hubo un error al enviar su mensaje';
                return Redirect::to('contacto')->with('precaucion', $verrors);
            }
        }
    }

    public function TrabajoNosotros(Request $request)
    {
        date_default_timezone_set('America/Bogota');

        $validator = Validator::make($request->all(), [
            'nombres'               =>  'required',
            'apellidos'             =>  'required',
            'tipo_documento'        =>  'required',
            'documentoIdentidad'    =>  'required',
            'direccion'             =>  'required',
            'telefono'              =>  'required',
            'profesion'             =>  'required',
            'correo'                =>  'required|email',
            'check-trabajo'        =>  'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('trabajo')->withErrors($validator)->withInput();
        } else {

            $Nombres = $request->nombres;
            $Apellidos = $request->apellidos;
            $NombreUsuario = $Nombres . ' ' . $Apellidos;
            $Correo = $request->correo;
            $TipoDocumento = $request->tipo_documento;
            $NombreTipoDocumento = GYPBogota::TipoDocumentoId($TipoDocumento);
            foreach ($NombreTipoDocumento as $value) {
                $NombreDocumento = $value->NOMBRE_DOCUMENTO;
            }
            $Documento = $request->documentoIdentidad;
            $Direccion = $request->direccion;
            $Telefono = $request->telefono;
            $Profesion = $request->profesion;
            $HojaVida  = $request->file('hojaVida');
            $destinationPath    = null;
            $filename           = null;
            if ($HojaVida) {
                $file               = $HojaVida;
                $destinationPath    = public_path() . '/documentos/HV';
                $extension          = $file->getClientOriginalExtension();
                $name               = $file->getClientOriginalName();
                $nombrearchivo      = pathinfo($name, PATHINFO_FILENAME);
                $nombrearchivo      = PaginaController::eliminar_tildes($nombrearchivo);
                $nombreUsuario      = PaginaController::eliminar_tildes($NombreUsuario);
                $filename           = 'Hoja_Vida_' . $nombreUsuario . '.' . $extension;
                $uploadSuccess      = $file->move($destinationPath, $filename);
                $archivofoto        = file_get_contents($uploadSuccess);
                $NombreFoto         = $filename;
            }
            $CorreoDestino  = "coordinadorgh@gypbogota.com";
            $subject    = "Hoja de vida de $NombreUsuario";
            Mail::send(
                'Emails.CorreoTrabajo',
                ['NombreUsuario' => $NombreUsuario, 'Email' => $Correo, 'TipoDocumento' => $NombreDocumento, 'Identificacion' => $Documento, 'Direccion' => $Direccion, 'Telefono' => $Telefono, 'Profesion' => $Profesion],
                function ($msj) use ($subject, $Correo, $filename, $NombreUsuario, $CorreoDestino) {
                    $msj->from($CorreoDestino, "Gruas y Parqueaderos Bogotá S.A.S");
                    $msj->subject($subject);
                    $msj->addCC($Correo);
                    $msj->to($CorreoDestino);
                    $msj->attach(public_path('/documentos/HV') . '/' . $filename);
                }
            );

            if (count(Mail::failures()) === 0) {
                unlink(public_path('/documentos/HV') . '/' . $filename);
                $Trabajo  = GYPBogota::Trabajo($NombreUsuario, $Correo, $TipoDocumento, $Documento, $Direccion, $Telefono, $Profesion, $NombreFoto);
                if ($Trabajo) {
                    $verrors = $NombreUsuario . ' su solicitud fue enviada con éxito';
                    return Redirect::to('trabajo')->with('mensaje', $verrors);
                } else {
                    $verrors = 'Hubo un error al enviar su hoja de vida';
                    return Redirect::to('trabajo')->with('precaucion', $verrors);
                }
            } else {
                $verrors = 'Hubo un error al enviar su hoja de vida';
                return Redirect::to('trabajo')->with('precaucion', $verrors);
            }
        }
    }

    public static function eliminar_tildes($nombrearchivo)
    {

        $cadena = $nombrearchivo;
        $cadena = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä', 'Ã¡'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', 'a'),
            $cadena
        );

        $cadena = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë', 'Ã©'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E', 'e'),
            $cadena
        );

        $cadena = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î', 'Ã­'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I', 'i'),
            $cadena
        );

        $cadena = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô', 'Ã³'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'o'),
            $cadena
        );

        $cadena = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü', 'Ãº'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U', 'u'),
            $cadena
        );

        $cadena = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $cadena
        );

        $cadena = str_replace(
            array(' ', '-'),
            array('_', '_'),
            $cadena
        );

        $cadena = str_replace(
            array("'", '‘', 'a€“'),
            array(' ', ' ', '-'),
            $cadena
        );

        return $cadena;
    }

    public static function PoliticaHSEQ()
    {
        $ListarDocumento = GYPBogota::DocumentoPoliticaHSEQ();
        $ubicacion = null;
        if ($ListarDocumento) {
            foreach ($ListarDocumento as $value) {
                $documento = str_replace('../', '', $value->UBICACION);
            }
            $ubicacion = '<li><a href="' . $documento . '" target="_blank">Política HSEQ</a></li>';
        } else {
            $ubicacion = '<li><a href="#">Política HSEQ</a></li>';
        }
        return $ubicacion;
    }

    public static function PoliticaHSEQSer()
    {
        $ListarDocumento = GYPBogota::DocumentoPoliticaHSEQ();
        $ubicacion = null;
        if ($ListarDocumento) {
            foreach ($ListarDocumento as $value) {
                $documento = $value->UBICACION;
            }
            $ubicacion = '<li><a href="' . $documento . '" target="_blank">Política HSEQ</a></li>';
        } else {
            $ubicacion = '<li><a href="#">Política HSEQ</a></li>';
        }
        return $ubicacion;
    }

    public static function ProteccionDatos()
    {
        $ListarDocumento = GYPBogota::DocumentoProteccionDatos();
        $ubicacion = null;
        if ($ListarDocumento) {
            foreach ($ListarDocumento as $value) {
                $documento = str_replace('../', '', $value->UBICACION);
            }
            $ubicacion = '<a href="' . $documento . '" id="proteccionDatos" target="_blank">aquí</a>.';
        } else {
            $ubicacion = '<a href="#" id="proteccionDatos">aquí</a>.';
        }
        return $ubicacion;
    }

    public static function Organigrama()
    {
        $ListarOrganigrama = GYPBogota::ImagenOrganigrama();
        $Organigrama = null;
        if ($ListarOrganigrama) {
            foreach ($ListarOrganigrama as $value) {
                $imagen = str_replace('../', '', $value->UBICACION);
            }
            $Organigrama = '<a href="' . $imagen . '" target="_blank" title="Organigrama" class="nav-link">Organigrama</a>';
        } else {
            $Organigrama = '<a href="#" target="_blank" title="Organigrama" class="nav-link">Organigrama</a>';
        }
        return $Organigrama;
    }

    public static function OrganigramaMS()
    {
        $ListarOrganigrama = GYPBogota::ImagenOrganigrama();
        $Organigrama = null;
        if ($ListarOrganigrama) {
            foreach ($ListarOrganigrama as $value) {
                $imagen = str_replace('../', '', $value->UBICACION);
            }
            $Organigrama = '<a href="' . $imagen . '" target="_blank" title="Organigrama" id="linkMapaSitio">Organigrama</a>';
        } else {
            $Organigrama = '<a href="#" target="_blank" title="Organigrama" id="linkMapaSitio">Organigrama</a>';
        }
        return $Organigrama;
    }


    public static function OrganigramaSer()
    {
        $ListarOrganigrama = GYPBogota::ImagenOrganigrama();
        $Organigrama = null;
        if ($ListarOrganigrama) {
            foreach ($ListarOrganigrama as $value) {
                $imagen = $value->UBICACION;
            }
            $Organigrama = '<a href="' . $imagen . '" target="_blank" title="Organigrama" class="nav-link">Organigrama</a>';
        } else {
            $Organigrama = '<a href="#" target="_blank" title="Organigrama" class="nav-link">Organigrama</a>';
        }
        return $Organigrama;
    }
}
