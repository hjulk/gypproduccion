<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;

class AdministracionController extends Controller
{
    public function Login(){
        return view('login');
    }

    public function Home(){
        $listadoNotificaciones  = Administracion::getNotificacionesAviso();
        $Notificaciones         = array();
        $contNotificacion       = 0;
        foreach($listadoNotificaciones as $value){
            $Notificaciones[$contNotificacion]['NOMBRE']        = $value->NOMBRE_CIUDADANO;
            $Notificaciones[$contNotificacion]['PLACA']         = $value->PLACA;
            $Notificaciones[$contNotificacion]['YEAR']          = $value->YEAR_NOTIFICATION;
            $Notificaciones[$contNotificacion]['FECHA_CREACION'] = date('d/m/Y', strtotime($value->FECHA_CREACION));
            $contNotificacion++;
        }
        $listadoContactenos = Administracion::getContactenos();
        $Contactenos        = array();
        $contContactenos    = 0;
        foreach($listadoContactenos as $value){
            $Contactenos[$contContactenos]['NOMBRE_CIUDADANO']  = $value->NOMBRE_CIUDADANO;
            $Contactenos[$contContactenos]['CORREO']            = $value->CORREO;
            $Contactenos[$contContactenos]['MENSAJE']           = $value->MENSAJE;
            $Contactenos[$contContactenos]['FECHA_CREACION']    = date('d/m/Y', strtotime($value->FECHA_CREACION));
            $contContactenos++;
        }
        $listadoHojaVida = Administracion::getHojaVida();
        $HojaVida        = array();
        $contHojaVida    = 0;
        foreach($listadoHojaVida as $value){
            $HojaVida[$contHojaVida]['NOMBRE_CIUDADANO']  = $value->NOMBRE_CIUDADANO;
            $documento = (int)$value->ID_DOCUMENTO;
            $idTipoDocumento = Administracion::tipoDocumento($documento);
            if($idTipoDocumento){
                foreach($idTipoDocumento as $row){
                    $HojaVida[$contHojaVida]['TIPO_DOCUMENTO'] = $row->NOMBRE_DOCUMENTO;
                }
            }else{
                $HojaVida[$contHojaVida]['TIPO_DOCUMENTO'] = 'SIN TIPO DOCUMENTO';
            }
            $HojaVida[$contHojaVida]['IDENTIFICACION']    = $value->IDENTIFICACION;
            $HojaVida[$contHojaVida]['CORREO']                  = $value->CORREO;
            $HojaVida[$contHojaVida]['TELEFONO']                = $value->TELEFONO;
            $HojaVida[$contHojaVida]['DOCUMENTO']               = $value->DOCUMENTO;
            $HojaVida[$contHojaVida]['FECHA_CREACION']          = date('d/m/Y', strtotime($value->FECHA_CREACION));
            $contHojaVida++;
        }
        return view('administracion.dashboard',['Notificaciones'=>$Notificaciones,'Contactenos'=>$Contactenos,'HojaVida'=>$HojaVida]);
    }

    public function Dependencias(){
        $ListarDepenencias = Administracion::ListarDepenencias();
        $Dependencias       = array();
        $cont           = 0;
        foreach($ListarDepenencias as $value){
            $Dependencias[$cont]['id']             = (int)$value->ID_DEPENDENCIA;
            $Dependencias[$cont]['nombre_dependencia']         = $value->NOMBRE_DEPENDENCIA;
            $Dependencias[$cont]['estado_activo']  = (int)$value->ESTADO;
            $State  = (int)$value->ESTADO;
            if($State === 1){
                $Dependencias[$cont]['estado']   = 'ACTIVO';
                $Dependencias[$cont]['label']    = 'badge badge-success';
            }else{
                $Dependencias[$cont]['estado']   = 'INACTIVO';
                $Dependencias[$cont]['label']    = 'badge badge-danger';
            }
            $cont++;
        }
        $Estado = array();
        $Estado[''] = 'Seleccione:';
        $Estado[1]  = 'Activo';
        $Estado[2]  = 'Inactivo';
        return view('administracion.dependencias',['Estado'=>$Estado,'Dependencias'=>$Dependencias]);
    }

    public function Roles(){
        $ListarRoles = Administracion::ListarRoles();
        $Roles       = array();
        $cont           = 0;
        foreach($ListarRoles as $value){
            $Roles[$cont]['id']             = (int)$value->ID_ROL;
            $Roles[$cont]['nombre_rol']         = $value->NOMBRE_ROL;
            $Roles[$cont]['estado_activo']  = (int)$value->ESTADO;
            $State  = (int)$value->ESTADO;
            if($State === 1){
                $Roles[$cont]['estado']   = 'ACTIVO';
                $Roles[$cont]['label']    = 'badge badge-success';
            }else{
                $Roles[$cont]['estado']   = 'INACTIVO';
                $Roles[$cont]['label']    = 'badge badge-danger';
            }
            $cont++;
        }
        $Estado = array();
        $Estado[''] = 'Seleccione:';
        $Estado[1]  = 'Activo';
        $Estado[2]  = 'Inactivo';
        return view('administracion.roles',['Estado'=>$Estado,'Roles'=>$Roles]);
    }

    public function Usuarios(){
        return view('administracion.usuarios');
    }

    public function CrearDependencia(Request $request){
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_dependencia'    =>  'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('dependencias')->withErrors($validator)->withInput();
        }else{
            $Nombre = $request->nombre_dependencia;
            $Usuario = 1;
            $crearDependencia = Administracion::CrearDependencia($Nombre,$Usuario);
            if($crearDependencia){
                $verrors = 'Se creo la depenencia '.$Nombre.' con exito.';
                return Redirect::to('dependencias')->with('mensaje', $verrors);
            }else{
                $verrors = array();
                array_push($verrors, 'Hubo un problema al crear la dependencia');
                return Redirect::to('dependencias')->withErrors(['errors' => $verrors])->withRequest();
            }
        }
    }

    public function ActualizarDependencia(Request $request){
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_dependencia_upd'    =>  'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('dependencias')->withErrors($validator)->withInput();
        }else{
            $IdDependencia = (int)$request->id_d;
            $Nombre = $request->nombre_dependencia_upd;
            $Usuario = 1;
            $EstadoUpd  = (int)$request->estado_upd;
            if($EstadoUpd === 1){
                $Estado = 1;
            }else{
                $Estado = 0;
            }
            $ActualizarDependencia = Administracion::ActualizarDependencia($Nombre,$Usuario,$Estado,$IdDependencia);
            if($ActualizarDependencia){
                $verrors = 'Se actualizo la dependencia '.$Nombre.' con exito.';
                return Redirect::to('dependencias')->with('mensaje', $verrors);
            }else{
                $verrors = array();
                array_push($verrors, 'Hubo un problema al actualizar la dependencia');
                return Redirect::to('dependencias')->withErrors(['errors' => $verrors])->withRequest();
            }
        }
    }

    public function CrearRol(Request $request){
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_rol'    =>  'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('roles')->withErrors($validator)->withInput();
        }else{
            $Nombre = $request->nombre_rol;
            $Usuario = 1;
            $CrearRol = Administracion::CrearRol($Nombre,$Usuario);
            if($CrearRol){
                $verrors = 'Se creo el rol '.$Nombre.' con exito.';
                return Redirect::to('roles')->with('mensaje', $verrors);
            }else{
                $verrors = array();
                array_push($verrors, 'Hubo un problema al crear el rol');
                return Redirect::to('roles')->withErrors(['errors' => $verrors])->withRequest();
            }
        }
    }

    public function ActualizarRol(Request $request){
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_rol_upd'    =>  'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('roles')->withErrors($validator)->withInput();
        }else{
            $IdRol = (int)$request->id_r;
            $Nombre = $request->nombre_rol_upd;
            $Usuario = 1;
            $EstadoUpd  = (int)$request->estado_upd;
            if($EstadoUpd === 1){
                $Estado = 1;
            }else{
                $Estado = 0;
            }
            $ActualizarRol = Administracion::ActualizarRol($Nombre,$Usuario,$Estado,$IdRol);
            if($ActualizarRol){
                $verrors = 'Se actualizo el rol '.$Nombre.' con exito.';
                return Redirect::to('roles')->with('mensaje', $verrors);
            }else{
                $verrors = array();
                array_push($verrors, 'Hubo un problema al actualizar el rol');
                return Redirect::to('roles')->withErrors(['errors' => $verrors])->withRequest();
            }
        }
    }
}
