<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UsuariosController extends Controller
{
    public function actualizarPerfil(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'password'    =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'profileUser')->withErrors($validator)->withInput();
        }else{
            $IdUser        = (int)Session::get('IdUsuario');
            $password = $Password   = hash('sha512', $request->password);
            $NuevaContrasena = Administracion::NuevaContrasena($IdUser,$password);
            if($NuevaContrasena){
                $verrors = 'Se actualizo la contraseña con éxito.';
                return Redirect::to($url.'profileUser')->with('mensaje', $verrors);
            }else{
                $verrors = array();
                array_push($verrors, 'Hubo un problema al actualizar la contraseña.');
                return Redirect::to($url.'profileUser')->withErrors(['errors' => $verrors])->withRequest();
            }
        }
    }

    public function CargarNotificacion(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'notificationfile'    =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'notificaciones')->withErrors($validator)->withInput();
        }else{
            if($request->file('notificationfile')){
                $file           = $request->file('notificationfile');
                $archivo        = fopen($file, "rb");
                $arrayArchivo   = file($file);
                $cont           = 0;
                // Administracion::InactivarNotificaciones();
                foreach ($arrayArchivo as $linea_num => $linea){
                    $datos = explode(",",$linea);
                    $nombre_ciudadano   = utf8_encode(trim($datos[0]));
                    $placa              = utf8_encode(trim($datos[1],' '));
                    $year               = (int)trim($datos[2]);
                    $Estado             = 1;
                    $CargarNotificacion = Administracion::CargarNotificacion($nombre_ciudadano,$placa,$year,$Estado,$IdUser);
                    if($CargarNotificacion){
                        $cont++;
                    }else{
                        $cont--;
                    }
                }
                Administracion::InactivarNotificaciones();
                $verrors = 'Se cargaron '.$cont.' notificaciones con éxito.';
                return Redirect::to($url.'notificaciones')->with('mensaje', $verrors);
            }else{
                $verrors = array();
                array_push($verrors, 'No se reconoce el archivo.');
                return Redirect::to($url.'notificaciones')->withErrors(['errors' => $verrors])->withRequest();
            }
        }
    }

    public function CargarNotificacionManual(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'nombre_ciudadano'  =>  'required',
            'placa'             =>  'required',
            'year_notification' =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'notificaciones')->withErrors($validator)->withInput();
        }else{
            $nombre_ciudadano   = strtoupper($request->nombre_ciudadano);
            $placa              = strtoupper($request->placa);
            $year               = (int)$request->year_notification;
            $Estado             = 1;
            $buscarPlaca = Administracion::ListarNotificacionPlaca($placa);
            if($buscarPlaca){
                foreach($buscarPlaca as $row){
                    $NombreCiudadano = $row->NOMBRE_CIUDADANO;
                }
                $verrors = array();
                array_push($verrors, 'La placa '.$placa.' ya se encuentra registrada y activa para el ciudadano '.$NombreCiudadano);
                return Redirect::to($url.'notificaciones')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $CargarNotificacion = Administracion::CargarNotificacion($nombre_ciudadano,$placa,$year,$Estado,$IdUser);
                if($CargarNotificacion){
                    $verrors = 'Se cargo con éxito la notificación para '.$nombre_ciudadano;
                    return Redirect::to($url.'notificaciones')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear la notificación');
                    return Redirect::to($url.'notificaciones')->withErrors(['errors' => $verrors])->withRequest();
                }
            }
        }
    }

    public function ActualizarNotificacion(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'nombre_ciudadano_upd'  =>  'required',
            'placa_upd'             =>  'required',
            'year_notification_upd' =>  'required',
            'estado_upd' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'notificaciones')->withErrors($validator)->withInput();
        }else{
            $nombre_ciudadano   = strtoupper($request->nombre_ciudadano_upd);
            $placa              = strtoupper($request->placa_upd);
            $year               = (int)$request->year_notification_upd;
            $Estado             = (int)$request->estado_upd;
            $IdNotificacion     = (int)$request->id_notificacion;
            $ActualizarNotificacion = Administracion::ActualizarNotificacion($nombre_ciudadano,$placa,$year,$Estado,$IdUser,$IdNotificacion);
            if($ActualizarNotificacion){
                $verrors = 'Se actualizó con éxito la notificación para '.$nombre_ciudadano;
                return Redirect::to($url.'notificaciones')->with('mensaje', $verrors);
            }else{
                $verrors = array();
                array_push($verrors, 'Hubo un problema al crear la notificación');
                return Redirect::to($url.'notificaciones')->withErrors(['errors' => $verrors])->withRequest();
            }
        }
    }

    public function CrearDocumento(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'nombre_documento'  =>  'required',
            'documento' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'documentos')->withErrors($validator)->withInput();
        }else{
            date_default_timezone_set('America/Bogota');
            $fecha_sistema  = date('Y-m-d');
            $fechaCreacion  = date('Y-m-d', strtotime($fecha_sistema));
            $NombreDocumento = strtoupper($request->nombre_documento);
            $BuscarDocumentoNombre = Administracion::BuscarDocumentoNombre($NombreDocumento);
            if($BuscarDocumentoNombre){
                $verrors = array();
                array_push($verrors, 'Nombre de documento ya se encuentra creado');
                return Redirect::to($url.'documentos')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $file = $request->file('documento');
                $extension          = $file->getClientOriginalExtension();
                $name               = $file->getClientOriginalName();
                $nombrearchivo      = pathinfo($name, PATHINFO_FILENAME);
                $nombrearchivo      = UsuariosController::eliminar_tildes($nombrearchivo);
                $filename           = UsuariosController::eliminar_tildes(strtoupper($request->nombre_documento)).'_'.$fechaCreacion.'.'.$extension;
                $uploadSuccess      = $file->move('documentos', $filename);
                $archivofoto        = file_get_contents($uploadSuccess);
                $NombreFoto         = $filename;
                $Ubicacion          = '../documentos/'.$NombreFoto;
                $CargarDocumento = Administracion::CargarDocumento($NombreDocumento,$Ubicacion,$IdUser);
                if($CargarDocumento){
                    $verrors = 'Se creo con éxito el documento '.strtoupper($request->nombre_documento);
                    return Redirect::to($url.'documentos')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear el documento');
                    return Redirect::to($url.'documentos')->withErrors(['errors' => $verrors])->withRequest();
                }
            }
        }
    }

    public function ActualizarDocumento(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'nombre_documento_upd'  =>  'required',
            'estado_upd' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'documentos')->withErrors($validator)->withInput();
        }else{
            date_default_timezone_set('America/Bogota');
            $fecha_sistema  = date('Y-m-d');
            $fechaCreacion  = date('Y-m-d', strtotime($fecha_sistema));
            $NombreDocumento = UsuariosController::eliminar_tildes(strtoupper($request->nombre_documento_upd));
            $Estado = (int)$request->estado_upd;
            $IdDocumento = (int)$request->id_documento;
            $BuscarDocumentoNombre = Administracion::BuscarDocumentoNombreId($NombreDocumento,$IdDocumento);
            if($BuscarDocumentoNombre){
                $verrors = array();
                array_push($verrors, 'Nombre de documento ya se encuentra creado');
                return Redirect::to($url.'documentos')->withErrors(['errors' => $verrors])->withInput();
            }else{
                if($request->file('documento_upd')){
                    $Buscarubicacion = Administracion::BuscarUbicacion($IdDocumento);
                    foreach($Buscarubicacion as $value){
                        $Documento = str_replace("../documentos/",'',$value->UBICACION);
                    }
                    unlink('documentos'.'/'.$Documento);
                    $file          = $request->file('documento_upd');
                    $extension     = $file->getClientOriginalExtension();
                    $name          = $file->getClientOriginalName();
                    $nombrearchivo = pathinfo($name, PATHINFO_FILENAME);
                    $nombrearchivo = UsuariosController::eliminar_tildes($nombrearchivo);
                    $filename      = $NombreDocumento.'_'.$fechaCreacion.'.'.$extension;
                    $uploadSuccess = $file->move('documentos', $filename);
                    $archivofoto   = file_get_contents($uploadSuccess);
                    $NombreFoto    = $filename;
                    $Ubicacion     = '../documentos/'.$NombreFoto;
                }else{
                    $Ubicacion = null;
                }
                $ActualizarDocumento = Administracion::ActualizarDocumento($IdDocumento,$NombreDocumento,$Ubicacion,$IdUser,$Estado);
                if($ActualizarDocumento){
                    $verrors = 'Se actualizó con éxito el documento '.strtoupper($request->nombre_documento_upd);
                    return Redirect::to($url.'documentos')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar el documento');
                    return Redirect::to($url.'documentos')->withErrors(['errors' => $verrors])->withRequest();
                }
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

    public static function FindUrl(){
        $RolUser = (int)Session::get('Rol');
        if($RolUser === 1){
            $url = 'admin/';
        }else if($RolUser === 0){
            return Redirect::to('login');
        }else{
            $url = 'user/';
        }
        return $url;
    }

}
