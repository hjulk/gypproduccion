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
        $ObtenerVisitas         = GYPBogota::GetVisitas();
        foreach ($ObtenerVisitas as $value) {
            $Visitas = (int)$value->CONTADOR;
        }
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('index', ['Visitas' => $Visitas,'PoliticaHSEQ' => $PoliticaHSEQ]);
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
        $ProteccionDatos = PaginaController::ProteccionDatos();
        return view('trabajo', ['TipoDocumento' => $TipoDocumento,'PoliticaHSEQ' => $PoliticaHSEQ, 'ProteccionDatos' => $ProteccionDatos]);
    }

    public function MapaSitio()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('mapaSitio',['PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    // GYP

    public function Normatividad()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('gyp.normatividad',['PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    public function Nosotros()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('gyp.nosotros',['PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    // ATENCIÓN AL CIUDADANO

    public function Contacto()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        $ProteccionDatos = PaginaController::ProteccionDatos();
        return view('atencionCiudadano.contacto',['PoliticaHSEQ' => $PoliticaHSEQ, 'ProteccionDatos' => $ProteccionDatos]);
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
                            '.$texto.'
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
        return view('atencionCiudadano.notificacionAviso', ['Notificaciones' => $Notificaciones, 'Desfijacion' => $Desfijacion, 'BotonDesfijacion' => $BotonDesfijacion,'PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    // SERVICIOS

    public function Beneficios()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('servicios.beneficios',['PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    public function CustodiaSegura()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('servicios.custodiaSegura',['PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    public function Gruas()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('servicios.gruas',['PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    public function NuestrosServicios()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('servicios.nuestrosServicios',['PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    public function ProcesoInmovilizacion()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('servicios.procesoInmovilizacion',['PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    public function ProcesoRetiro()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('servicios.procesoRetiro',['PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    public function Tarifas()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('servicios.tarifas',['PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    public function MonitoreoCamara()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('servicios.monitoreoCamaras',['PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    public function MensajeSms()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('servicios.mensajeSms',['PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    // TRAMITES

    public function ConsultaLiquidacion()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('tramites.consultaLiquidacion',['PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    public function PagoLinea()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('tramites.pagoLinea',['PoliticaHSEQ' => $PoliticaHSEQ]);
    }

    public function PuntosAtencion()
    {
        $PoliticaHSEQ = PaginaController::PoliticaHSEQ();
        return view('tramites.puntosAtencion',['PoliticaHSEQ' => $PoliticaHSEQ]);
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
                    $msj->from($Correo, "Gruas y Parqueaderos Bogotá S.A.S");
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
                    $msj->from($Correo, "Gruas y Parqueaderos Bogotá S.A.S");
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

    public static function PoliticaHSEQ(){
        $ListarDocumento = GYPBogota::DocumentoPoliticaHSEQ();
        $ubicacion = null;
        if($ListarDocumento){
            foreach($ListarDocumento as $value){
                $documento = str_replace('../','',$value->UBICACION);
            }
            $ubicacion = '<li><a href="'.$documento.'" target="_blank">Política HSEQ</a></li>';
        }else{
            $ubicacion = '<li><a href="#" target="_blank">Política HSEQ</a></li>';
        }
        return $ubicacion;
    }

    public static function ProteccionDatos(){
        $ListarDocumento = GYPBogota::DocumentoProteccionDatos();
        $ubicacion = null;
        if($ListarDocumento){
            foreach($ListarDocumento as $value){
                $documento = str_replace('../','',$value->UBICACION);
            }
            $ubicacion = '<a href="'.$documento.'" style="color: #000000 !important;font-weight: 600;" target="_blank">aquí</a>.';
        }else{
            $ubicacion = '<a href="#" style="color: #000000 !important;font-weight: 600;" target="_blank">aquí</a>.';
        }
        return $ubicacion;
    }
}
