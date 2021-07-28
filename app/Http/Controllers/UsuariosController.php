<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsuariosController extends Controller
{
    public function actualizarPerfil(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 1){
            $url = 'admin/';
        }else{
            $url = 'user/';
        }
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
        $RolUser    = (int)Session::get('Rol');
        $IdUser     = (int)Session::get('IdUsuario');
        if($RolUser === 1){
            $url = 'admin/';
        }else{
            $url = 'user/';
        }
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
        $RolUser        = (int)Session::get('Rol');
        $IdUser     = (int)Session::get('IdUsuario');
        if($RolUser === 1){
            $url = 'admin/';
        }else{
            $url = 'user/';
        }
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

    public function ActualizarNotificacion(Request $request){
        $RolUser        = (int)Session::get('Rol');
        $IdUser     = (int)Session::get('IdUsuario');
        if($RolUser === 1){
            $url = 'admin/';
        }else{
            $url = 'user/';
        }
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
}
