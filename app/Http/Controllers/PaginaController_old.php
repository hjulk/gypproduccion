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
    public function Inicio(){
        $ObtenerVisitas         = GYPBogota::GetVisitas();
        foreach($ObtenerVisitas as $value){
            $Visitas = (int)$value->CONTADOR;        }

        return view('index',['Visitas' => $Visitas]);
    }

    public function Trabajo(){
        $ListaDocumento  = GYPBogota::TipoDocumento();
        $TipoDocumento = array();
        $TipoDocumento[''] = 'Tipo de Documento *';
        foreach ($ListaDocumento as $row){
            $TipoDocumento[$row->ID_DOCUMENTO] = $row->NOMBRE_DOCUMENTO;
        }

        return view('trabajo',['TipoDocumento'=>$TipoDocumento]);
    }

    public function MapaSitio(){
        return view('mapaSitio');
    }

    // GYP

    public function Normatividad(){

        return view('gyp.normatividad');
    }

    public function Nosotros(){

        return view('gyp.nosotros');
    }

    // ATENCIÓN AL CIUDADANO

    public function Contacto(){

        return view('atencionCiudadano.contacto');
    }

    public function NotificacionAviso(){
        $ListarNotificaciones = GYPBogota::ListarNotificaciones();
        $Notificaciones = array();
        $cont           = 0;
        foreach($ListarNotificaciones as $value){
            $Notificaciones[$cont]['NOMBRE'] = $value->NOMBRE_CIUDADANO;
            $Notificaciones[$cont]['PLACA'] = $value->PLACA;
            $Notificaciones[$cont]['YEAR'] = $value->YEAR_NOTIFICATION;
            $cont++;
        }
        return view('atencionCiudadano.notificacionAviso',['Notificaciones' => $Notificaciones]);
    }

    // SERVICIOS

    public function Beneficios(){

        return view('servicios.beneficios');
    }

    public function CustodiaSegura(){
        return view('servicios.custodiaSegura');
    }

    public function Gruas(){
        return view('servicios.gruas');
    }

    public function NuestrosServicios(){
        return view('servicios.nuestrosServicios');
    }

    public function ProcesoInmovilizacion(){
        return view('servicios.procesoInmovilizacion');
    }

    public function ProcesoRetiro(){
        return view('servicios.procesoRetiro');
    }

    public function Tarifas(){        
        return view('servicios.tarifas');
    }

    public function MonitoreoCamara(){
        return view('servicios.monitoreoCamaras');
    }

    public function MensajeSms(){
        return view('servicios.mensajeSms');
    }

    // TRAMITES

    public function ConsultaLiquidacion(){
        return view('tramites.consultaLiquidacion');
    }

    public function PagoLinea(){
        return view('tramites.pagoLinea');
    }

    public function PuntosAtencion(){
        return view('tramites.puntosAtencion');
    }

    public function CrearVisita(Request $request){
        $Ip_client = $_SERVER['REMOTE_ADDR'];
        $pagina = $request->pagina;
        GYPBogota::CrearVisita($Ip_client,$pagina);
    }

    public function Contactenos(Request $request){
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
        }else{

            $Nombres = $request->nombres;
            $Apellidos = $request->apellidos;
            $NombreUsuario = $Nombres.' '.$Apellidos;
            $Correo = $request->correo;
            $Mensaje = $request->mensaje;

            $Contacto  = GYPBogota::Contactenos($NombreUsuario, $Correo, $Mensaje);
            if($Contacto){
                $verrors = $NombreUsuario.' su mensaje fue enviado con éxito';
                return Redirect::to('contacto')->with('mensaje', $verrors);
            }else{
                $verrors = 'Hubo un error al enviar su mensaje';
                return Redirect::to('contacto')->with('precaucion', $verrors);
            }
        }
    }

    public function TrabajoNosotros(Request $request){
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
        }else{

            $Nombres = $request->nombres;
            $Apellidos = $request->apellidos;
            $NombreUsuario = $Nombres.' '.$Apellidos;
            $Correo = $request->correo;
            $TipoDocumento = $request->tipo_documento;
            $Documento = $request->documentoIdentidad;
            $Direccion = $request->direccion;
            $Telefono = $request->telefono;
            $Profesion = $request->profesion;
            $HojaVida  = $request->file('hojaVida');
            $destinationPath    = null;
            $filename           = null;
            if ($HojaVida) {
                $file               = $HojaVida;
                $destinationPath    = public_path().'/documentos/HV';
                $extension          = $file->getClientOriginalExtension();
                $name               = $file->getClientOriginalName();
                $nombrearchivo      = pathinfo($name, PATHINFO_FILENAME);
                $nombrearchivo      = PaginaController::eliminar_tildes($nombrearchivo);
                $nombreUsuario      = PaginaController::eliminar_tildes($NombreUsuario);
                $filename           = 'Hoja_Vida_'.$nombreUsuario.'.'.$extension;
                $uploadSuccess      = $file->move($destinationPath, $filename);
                $archivofoto        = file_get_contents($uploadSuccess);
                $NombreFoto         = $filename;
            }

            $Trabajo  = GYPBogota::Trabajo($NombreUsuario, $Correo, $TipoDocumento, $Documento, $Direccion, $Telefono, $Profesion, $NombreFoto);
            if($Trabajo){
                unlink(public_path('/documentos/HV').'/'.$filename);
                $verrors = $NombreUsuario.' su solicitud fue enviada con éxito';
                return Redirect::to('trabajo')->with('mensaje', $verrors);
            }else{
                $verrors = 'Hubo un error al enviar su mensaje';
                return Redirect::to('trabajo')->with('precaucion', $verrors);
            }
        }
    }

    public static function eliminar_tildes($nombrearchivo){

        $cadena = $nombrearchivo;
        $cadena = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä','Ã¡'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A','a'),
            $cadena
        );

        $cadena = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë','Ã©'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E','e'),
            $cadena );

        $cadena = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î','Ã­'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I','i'),
            $cadena );

        $cadena = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô','Ã³'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O','o'),
            $cadena );

        $cadena = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü','Ãº'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U','u'),
            $cadena );

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
            array("'", '‘','a€“'),
            array(' ', ' ','-'),
            $cadena
        );

        return $cadena;
    }
}
