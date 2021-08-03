<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administracion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

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

    public function ConsultaNotificacion(Request $request){
        $RolUser = (int)Session::get('Rol');
        if($RolUser === 1){
            $url = 'admin/';
        }else{
            $url = 'user/';
        }
        $validator = Validator::make($request->all(), [
            'fechaInicio'  =>  'required',
            'fechaFin'  =>  'required'
        ]);
        if ($validator->fails()) {
            $verrors = $validator->errors();
            return Response::json(['valido'=>'false','errors'=>$verrors]);
        }else{
            $fechaInicial = $request->fechaInicio;
            $fechaFinal   = $request->fechaFin;
            $ConsultaNotificacion = Administracion::ConsultarNotificaciones($fechaInicial,$fechaFinal);

            if($ConsultaNotificacion){

                $Notificaciones = array();
                $cont = 0;

                foreach($ConsultaNotificacion as $noti){
                    $Notificaciones[$cont]['ID_NOTIFICACION'] = (int)$noti->ID_NOTIFICACION;
                    $Notificaciones[$cont]['NOMBRE_CIUDADANO'] = utf8_decode($noti->NOMBRE_CIUDADANO);
                    $Notificaciones[$cont]['PLACA'] = $noti->PLACA;
                    $Notificaciones[$cont]['YEAR_NOTIFICATION'] = $noti->YEAR_NOTIFICATION;
                    $State  = (int)$noti->ESTADO;
                    if($State === 1){
                        $Notificaciones[$cont]['ESTADO']   = utf8_decode('ACTIVO EN PÁGINA');
                    }else{
                        $Notificaciones[$cont]['ESTADO']   = utf8_decode('INACTIVO EN PÁGINA');
                    }
                    $Notificaciones[$cont]['FECHA_CREACION'] = date('d/m/Y h:i A', strtotime($noti->FECHA_CREACION));
                    if($noti->FECHA_MODIFICACION){
                        $Notificaciones[$cont]['FECHA_MODIFICACION'] = date('d/m/Y h:i A', strtotime($noti->FECHA_MODIFICACION));
                    }else{
                        $Notificaciones[$cont]['FECHA_MODIFICACION'] = utf8_decode('SIN ACTUALIZACIÓN');
                    }
                    $cont++;
                }
                $fileName = 'Notificaciones_Pagina_'.$fechaInicial.'_'.$fechaFinal.'.csv';
                $headers = array(
                    "Content-type"        => "text/csv",
                    "Content-Disposition" => "attachment; filename=$fileName",
                    "Pragma"              => "no-cache",
                    "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                    "Expires"             => "0"
                );

                $columns = array(utf8_decode('ID_NOTIFICACIÓN'),'NOMBRE_CIUDADANO','PLACA',utf8_decode('AÑO_REPORTE_RECLAMACIÓN'),'ESTADO',utf8_decode('FECHA_CREACIÓN'),utf8_decode('FECHA_MODIFICACIÓN'));

                $file = fopen(storage_path('/csv/'.$fileName), 'w');
                fputcsv($file, $columns);

                foreach($Notificaciones as $item) {
                    fputcsv($file, $item);
                }
                fclose($file);

                $prueba = response()->make(Storage::disk('csv')->get($fileName), 200, $headers);

                $file2 = '..\storage\csv\Notificaciones_Pagina_'.$fechaInicial.'_'.$fechaFinal.'.csv';
                $archivo = "csv$file2";

                if($prueba){
                    return Response::json(['valido'=>'true','results'=>$file2]);
                }else{
                    $verrors = array();
                    array_push($verrors, 'No hay datos que mostrar');
                    return Response::json(['valido'=>'false','errors'=>$verrors]);
                }
            }else{
                $verrors = array();
                array_push($verrors, 'No hay datos que mostrar');
                return Response::json(['valido'=>'false','errors'=>$verrors]);
            }
        }
    }

    public function Documentos(){
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
                $ListarDocumentos = Administracion::ListarDocumentos();
                $Documentos       = array();
                $cont           = 0;
                foreach($ListarDocumentos as $value){
                    $Documentos[$cont]['id'] = (int)$value->ID_DOCUMENTO;
                    $Documentos[$cont]['nombre_documento'] = $value->NOMBRE_DOCUMENTO;
                    $Documentos[$cont]['ubicacion'] = $value->UBICACION;
                    $Documentos[$cont]['estado_activo']   = (int)$value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if($State === 1){
                        $Documentos[$cont]['estado']   = 'ACTIVO EN PÁGINA';
                        $Documentos[$cont]['label']    = 'badge badge-success';
                    }else{
                        $Documentos[$cont]['estado']   = 'INACTIVO EN PÁGINA';
                        $Documentos[$cont]['label']    = 'badge badge-danger';
                    }
                    $cont++;
                }
                return view('administracion.documentos',['Documentos' => $Documentos, 'Estado' => $Estado]);
            }
        }
    }
}
