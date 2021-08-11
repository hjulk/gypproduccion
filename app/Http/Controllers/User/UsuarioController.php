<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administracion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class UsuarioController extends Controller
{
    public function Home(){
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 0){
            return Redirect::to('login');
        }else{
            if($RolUser == 1){
                return Redirect::to('admin/home');
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

    public function ProfileUser(){
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 0){
            return Redirect::to('login');
        }else{
            if($RolUser == 1){
                return Redirect::to('admin/home');
            }else{
                $NombreUsuario = Session::get('NombreUsuario');
                $UserName = Session::get('UserName');
                return view('administracion.profileUser',['NombreUsuario'=>$NombreUsuario,'UserName'=>$UserName]);
            }
        }
    }

    public function Notificaciones(){
        date_default_timezone_set('America/Bogota');
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 0){
            return Redirect::to('login');
        }else{
            if($RolUser == 1){
                return Redirect::to('admin/home');
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

    public function ConsultaNotificaciones(){
        return view('administracion.consultaNotificaciones');
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
            if($fechaFinal < $fechaInicial){
                $verrors = array();
                array_push($verrors, 'Fecha Final es menor a Fecha Incial');
                return Response::json(['valido'=>'false','errors'=>$verrors]);
            }else{
                $ConsultaNotificacion = Administracion::ConsultarNotificaciones($fechaInicial,$fechaFinal);
                $resultado = json_decode(json_encode($ConsultaNotificacion), true);
                foreach($resultado as &$value) {
                    if($value['FECHA_MODIFICACION']){
                        $value['FECHA_MODIFICACION']    = date('d/m/Y h:i A', strtotime($value['FECHA_MODIFICACION']));
                    }else{
                        $value['FECHA_MODIFICACION']    = 'SIN FECHA DE MODIFICACIÓN';
                    }
                    $value['FECHA_CREACION']    = date('d/m/Y h:i A', strtotime($value['FECHA_CREACION']));
                    if($value['ESTADO'] == 1){
                        $value['ESTADO']  = 'ACTIVO EN PÁGINA';
                    }else{
                        $value['ESTADO']   = 'INACTIVO EN PÁGINA';
                    }
                }

                $aResultado = json_encode($resultado);
                Session::put('results', $aResultado);
                if($ConsultaNotificacion){
                    if($aResultado){
                        return Response::json(['valido'=>'true','results'=>$aResultado]);
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
    }

    public function Documentos(){
        date_default_timezone_set('America/Bogota');
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 0){
            return Redirect::to('login');
        }else{
            if($RolUser == 1){
                return Redirect::to('admin/home');
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
                    $Documentos[$cont]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if($value->FECHA_MODIFICACION){
                        $Documentos[$cont]['fecha_modificacion'] = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    }else{
                        $Documentos[$cont]['fecha_modificacion'] = 'SIN ACTUALIZACIÓN';
                    }
                    $cont++;
                }
                return view('administracion.documentos',['Documentos' => $Documentos, 'Estado' => $Estado]);
            }
        }
    }

    public function ReporteContacto(){
        return view('administracion.reporteContacto');
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

    public function ConsultaContacto(Request $request){
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
            if($fechaFinal < $fechaInicial){
                $verrors = array();
                array_push($verrors, 'Fecha Final es menor a Fecha Incial');
                return Response::json(['valido'=>'false','errors'=>$verrors]);
            }else{
                $ConsultaContactenos = Administracion::ConsultaContactenos($fechaInicial,$fechaFinal);
                $resultado = json_decode(json_encode($ConsultaContactenos), true);
                foreach($resultado as &$value) {
                    $value['FECHA_CREACION']    = date('d/m/Y h:i A', strtotime($value['FECHA_CREACION']));
                }

                $aResultado = json_encode($resultado);
                Session::put('results', $aResultado);
                if($ConsultaContactenos){
                    if($aResultado){
                        return Response::json(['valido'=>'true','results'=>$aResultado]);
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
    }

    public function ReporteHojaVida(){
        return view('administracion.reporteHojaVida');
    }

    public function ConsultaHojaVida(Request $request){
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
            if($fechaFinal < $fechaInicial){
                $verrors = array();
                array_push($verrors, 'Fecha Final es menor a Fecha Incial');
                return Response::json(['valido'=>'false','errors'=>$verrors]);
            }else{
                $ConsultaHojaVida = Administracion::ConsultaHojaVida($fechaInicial,$fechaFinal);
                $resultado = json_decode(json_encode($ConsultaHojaVida), true);
                foreach($resultado as &$value) {
                    $value['FECHA_CREACION']    = date('d/m/Y h:i A', strtotime($value['FECHA_CREACION']));
                    if($value['ID_DOCUMENTO']){
                        $ConsultarTipoDocumento = Administracion::tipoDocumento((int)$value['ID_DOCUMENTO']);
                        foreach($ConsultarTipoDocumento as $row){
                            $value['ID_DOCUMENTO'] = $row->NOMBRE_DOCUMENTO;
                        }
                    }
                }

                $aResultado = json_encode($resultado);
                Session::put('results', $aResultado);
                if($ConsultaHojaVida){
                    if($aResultado){
                        return Response::json(['valido'=>'true','results'=>$aResultado]);
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
    }

    public function ReporteVisitas(){
        return view('administracion.visitasPagina');
    }

    public function ConsultaVisitas(Request $request){
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
            if($fechaFinal < $fechaInicial){
                $verrors = array();
                array_push($verrors, 'Fecha Final es menor a Fecha Incial');
                return Response::json(['valido'=>'false','errors'=>$verrors]);
            }else{
                $ConsultaVisitas = Administracion::ConsultaVisitas($fechaInicial,$fechaFinal);
                $resultado = json_decode(json_encode($ConsultaVisitas), true);
                foreach($resultado as &$value) {
                    $value['FECHA']    = date('d/m/Y h:i A', strtotime($value['FECHA']));
                    // if($value['PAGINA'] === '/'){
                    //     $value['PAGINA'] = 'inicio';
                    // }else{
                    //     $value['PAGINA'] = str_replace("/",'',$value['PAGINA']);
                    // }
                    if($value['PAGINA'] === '/gypproduccion/'){
                        $value['PAGINA'] = 'inicio';
                    }else{
                        $value['PAGINA'] = str_replace("/gypproduccion/",'',$value['PAGINA']);
                    }
                }

                $aResultado = json_encode($resultado);
                Session::put('results', $aResultado);
                if($ConsultaVisitas){
                    if($aResultado){
                        return Response::json(['valido'=>'true','results'=>$aResultado]);
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
    }

    public function Imagenes(){
        $Estado = array();
        $Estado[''] = 'Seleccione:';
        $Estado[1]  = 'Activa';
        $Estado[2]  = 'Inactiva';
        $ListaPaginas = array();
        $ListaPaginas[''] = 'Seleccione:';
        $ListadoPaginasActivas = Administracion::ListadoPaginasActivas();
        if($ListadoPaginasActivas){
            foreach($ListadoPaginasActivas as $row){
                $ListaPaginas[$row->ID_PAGINA] = $row->NOMBRE_PAGINA;
            }
        }
        $ListadoSubpaginas = array();
        $ListadoSubpaginas[''] = 'Seleccione:';
        $ListadoImagenes = Administracion::ListadoImagenes();
        $cont = 0;
        $Imagenes = array();
        foreach($ListadoImagenes as $value){
            $Imagenes[$cont]['id'] = (int)$value->ID_IMAGEN;
            $Imagenes[$cont]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
            $Imagenes[$cont]['ubicacion'] = $value->UBICACION;
            $Imagenes[$cont]['fecha_cargue']    = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
            if($value->FECHA_MODIFICACION){
                $Imagenes[$cont]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
            }else{
                $Imagenes[$cont]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
            }
            $Imagenes[$cont]['estado_activo']   = (int)$value->ESTADO;
            $State  = (int)$value->ESTADO;
            if($State === 1){
                $Imagenes[$cont]['estado']   = 'ACTIVO EN PÁGINA';
                $Imagenes[$cont]['label']    = 'badge badge-success';
            }else{
                $Imagenes[$cont]['estado']   = 'INACTIVO EN PÁGINA';
                $Imagenes[$cont]['label']    = 'badge badge-danger';
            }
            $Imagenes[$cont]['id_pagina']   = (int)$value->ID_PAGINA;
            $ListarPagina = Administracion::BuscarIdPagina((int)$value->ID_PAGINA);
            if($ListarPagina){
                foreach($ListarPagina as $rowp){
                    $Imagenes[$cont]['nombre_pagina'] = $rowp->NOMBRE_PAGINA;
                }
            }else{
                $Imagenes[$cont]['nombre_pagina'] = 'SIN NOMBRE DE PÁGINA';
            }
            $Imagenes[$cont]['id_subpagina'] = (int)$value->ID_SUBPAGINA;
            if((int)$value->ID_SUBPAGINA === 0){
                $Imagenes[$cont]['nombre_subpagina'] = 'SIN NOMBRE DE SUBPÁGINA';
            }else{
                $ListarSubpagina = Administracion::BuscarSubPageById((int)$value->ID_SUBPAGINA);
                if($ListarSubpagina){
                    foreach($ListarSubpagina as $rows){
                        $Imagenes[$cont]['nombre_subpagina'] = $rows->NOMBRE_SUBPAGINA;
                    }
                }else{
                    $Imagenes[$cont]['nombre_subpagina'] = 'SIN NOMBRE DE SUBPÁGINA';
                }
            }
            $cont++;
        }
        return view('administracion.imagenes',['Estado' => $Estado,'ListaPaginas' => $ListaPaginas,'ListadoSubpaginas' => $ListadoSubpaginas,'Imagenes' => $Imagenes]);
    }

    public function buscarSubpagina(Request $request){
        $idPagina   = (int)$request->id_pagina;
        $Subpaginas = array();
        $BuscarSubpagina = Administracion::BuscarIdSubpagina($idPagina);
        if($BuscarSubpagina){
            foreach ($BuscarSubpagina as $row){
                $Subpaginas[$row->ID_SUBPAGINA] = $row->NOMBRE_SUBPAGINA;
            }
            return Response::json(array('valido'=>'true','Subpaginas'=>$Subpaginas));
        }else{
            return Response::json(array('valido'=>'false','Subpaginas'=>null));
        }

    }
}
