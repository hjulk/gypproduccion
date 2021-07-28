<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administracion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class AdministradorController extends Controller
{
    public function Home(){
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 0){
            return Redirect::to('login');
        }else{
            if($RolUser != 1){
                return Redirect::to('user/home');
            }else{
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
        }
    }

    public function Dependencias(){
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 0){
            return Redirect::to('login');
        }else{
            if($RolUser != 1){
                return Redirect::to('user/home');
            }else{
                $ListarDepenencias = Administracion::ListarDepenencias();
                $Dependencias       = array();
                $cont           = 0;
                foreach($ListarDepenencias as $value){
                    $Dependencias[$cont]['id']             = (int)$value->ID_DEPENDENCIA;
                    $Dependencias[$cont]['nombre_dependencia']  = $value->NOMBRE_DEPENDENCIA;
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
        }
    }

    public function Roles(){
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 0){
            return Redirect::to('login');
        }else{
            if($RolUser != 1){
                return Redirect::to('user/home');
            }else{
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
        }
    }

    public function Usuarios(){
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 0){
            return Redirect::to('login');
        }else{
            if($RolUser != 1){
                return Redirect::to('user/home');
            }else{
                $ListarRolesActivos = Administracion::ListarRolesActivo();
                $Roles = array();
                $Roles[''] = 'Seleccione:';
                foreach ($ListarRolesActivos as $row){
                    $Roles[$row->ID_ROL] = $row->NOMBRE_ROL;
                }
                $ListarDependenciaActivos = Administracion::ListarDepenenciasActivo();
                $Dependencias = array();
                $Dependencias[''] = 'Seleccione:';
                foreach ($ListarDependenciaActivos as $row){
                    $Dependencias[$row->ID_DEPENDENCIA] = $row->NOMBRE_DEPENDENCIA;
                }
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo';
                $Estado[2]  = 'Inactivo';
                $Administrador = array();
                $Administrador[''] = 'Seleccione:';
                $Administrador[1]  = 'Si';
                $Administrador[2]  = 'No';
                $ListarUsuarios = Administracion::ListarUsuarios();
                $Usuarios       = array();
                $cont           = 0;
                foreach($ListarUsuarios as $value){
                    $Usuarios[$cont]['id']              = (int)$value->ID_USUARIO;
                    $Usuarios[$cont]['nombre_usuario']  = $value->NOMBRE_USUARIO;
                    $Usuarios[$cont]['correo']          = $value->CORREO;
                    $Usuarios[$cont]['username']        = $value->USERNAME;
                    $Usuarios[$cont]['estado_activo']   = (int)$value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if($State === 1){
                        $Usuarios[$cont]['estado']   = 'ACTIVO';
                        $Usuarios[$cont]['label']    = 'badge badge-success';
                    }else{
                        $Usuarios[$cont]['estado']   = 'INACTIVO';
                        $Usuarios[$cont]['label']    = 'badge badge-danger';
                    }
                    $Usuarios[$cont]['id_rol']          = (int)$value->ID_ROL;
                    $RolesUser = Administracion::ListarRolesId((int)$value->ID_ROL);
                    if($RolesUser){
                        foreach($RolesUser as $rowRol){
                            $Usuarios[$cont]['rol'] = $rowRol->NOMBRE_ROL;
                        }
                    }else{
                        $Usuarios[$cont]['rol']          = 'SIN ROL';
                    }
                    $Usuarios[$cont]['id_dependencia']  = (int)$value->ID_DEPENDENCIA;
                    $DependenciasUser = Administracion::ListarDependenciasId((int)$value->ID_ROL);
                    if($DependenciasUser){
                        foreach($DependenciasUser as $rowDependencia){
                            $Usuarios[$cont]['dependencia'] = $rowDependencia->NOMBRE_DEPENDENCIA;
                        }
                    }else{
                        $Usuarios[$cont]['dependencia'] = 'SIN DEPENDENCIA';
                    }
                    $Usuarios[$cont]['id_administrador']   = (int)$value->ADMINISTRADOR;
                    $cont++;
                }
                return view('administracion.usuarios',['Estado'=>$Estado,'Roles'=>$Roles,'Dependencias'=>$Dependencias,'Usuarios'=>$Usuarios,'Administrador' => $Administrador]);
            }
        }
    }

    public function Notificaciones(){
        date_default_timezone_set('America/Bogota');
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 0){
            return Redirect::to('login');
        }else{
            if($RolUser != 1){
                return Redirect::to('user/home');
            }else{
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $ListarNotificaciones = Administracion::ListarNotificaciones();
                $Notificaciones       = array();
                $cont           = 0;
                foreach($ListarNotificaciones as $value){
                    $Notificaciones[$cont]['id'] = (int)$value->ID_NOTIFICACION;
                    $Notificaciones[$cont]['nombre_ciudadano'] = $value->NOMBRE_CIUDADANO;
                    $Notificaciones[$cont]['placa'] = $value->PLACA;
                    $Notificaciones[$cont]['year'] = $value->YEAR_NOTIFICATION;
                    $Notificaciones[$cont]['estado_activo']   = (int)$value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if($State === 1){
                        $Notificaciones[$cont]['estado']   = 'ACTIVO EN PÁGINA';
                        $Notificaciones[$cont]['label']    = 'badge badge-success';
                    }else{
                        $Notificaciones[$cont]['estado']   = 'INACTIVO EN PÁGINA';
                        $Notificaciones[$cont]['label']    = 'badge badge-danger';
                    }
                    $Notificaciones[$cont]['fecha_creacion'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if($value->FECHA_MODIFICACION){
                        $Notificaciones[$cont]['fecha_modificacion'] = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    }else{
                        $Notificaciones[$cont]['fecha_modificacion'] = 'SIN ACTUALIZACIÓN';
                    }
                    $cont++;
                }
                return view('administracion.notificaciones',['Notificaciones' => $Notificaciones, 'Estado' => $Estado]);
            }
        }
    }
}
