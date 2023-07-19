<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administracion;
use App\Models\Imagenes;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class UsuarioController extends Controller
{
    public function Home()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else {
                $listadoNotificaciones  = Administracion::getNotificacionesAviso();
                $Notificaciones         = array();
                $contNotificacion       = 0;
                foreach ($listadoNotificaciones as $value) {
                    $Notificaciones[$contNotificacion]['NOMBRE']        = $value->NOMBRE_CIUDADANO;
                    $Notificaciones[$contNotificacion]['PLACA']         = $value->PLACA;
                    $Notificaciones[$contNotificacion]['YEAR']          = $value->YEAR_NOTIFICATION;
                    $Notificaciones[$contNotificacion]['FECHA_CREACION'] = date('d/m/Y', strtotime($value->FECHA_CREACION));
                    $contNotificacion++;
                }
                $listadoContactenos = Administracion::getContactenos();
                $Contactenos        = array();
                $contContactenos    = 0;
                foreach ($listadoContactenos as $value) {
                    $Contactenos[$contContactenos]['NOMBRE_CIUDADANO']  = $value->NOMBRE_CIUDADANO;
                    $Contactenos[$contContactenos]['CORREO']            = $value->CORREO;
                    $Contactenos[$contContactenos]['MENSAJE']           = $value->MENSAJE;
                    $Contactenos[$contContactenos]['FECHA_CREACION']    = date('d/m/Y', strtotime($value->FECHA_CREACION));
                    $contContactenos++;
                }
                $listadoHojaVida = Administracion::getHojaVida();
                $HojaVida        = array();
                $contHojaVida    = 0;
                foreach ($listadoHojaVida as $value) {
                    $HojaVida[$contHojaVida]['NOMBRE_CIUDADANO']  = $value->NOMBRE_CIUDADANO;
                    $documento = (int)$value->ID_DOCUMENTO;
                    $idTipoDocumento = Administracion::tipoDocumento($documento);
                    if ($idTipoDocumento) {
                        foreach ($idTipoDocumento as $row) {
                            $HojaVida[$contHojaVida]['TIPO_DOCUMENTO'] = $row->NOMBRE_DOCUMENTO;
                        }
                    } else {
                        $HojaVida[$contHojaVida]['TIPO_DOCUMENTO'] = 'SIN TIPO DOCUMENTO';
                    }
                    $HojaVida[$contHojaVida]['IDENTIFICACION']    = $value->IDENTIFICACION;
                    $HojaVida[$contHojaVida]['CORREO']                  = $value->CORREO;
                    $HojaVida[$contHojaVida]['TELEFONO']                = $value->TELEFONO;
                    $HojaVida[$contHojaVida]['DOCUMENTO']               = $value->DOCUMENTO;
                    $HojaVida[$contHojaVida]['FECHA_CREACION']          = date('d/m/Y', strtotime($value->FECHA_CREACION));
                    $contHojaVida++;
                }
                return view('administracion.dashboard', ['Notificaciones' => $Notificaciones, 'Contactenos' => $Contactenos, 'HojaVida' => $HojaVida]);
            }
        }
    }

    public function ProfileUser()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else {
                $NombreUsuario = Session::get('NombreUsuario');
                $UserName = Session::get('UserName');
                return view('administracion.profileUser', ['NombreUsuario' => $NombreUsuario, 'UserName' => $UserName]);
            }
        }
    }

    public function Notificaciones()
    {
        date_default_timezone_set('America/Bogota');
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else {
                $Activacion = array();
                $Activacion[''] = 'Seleccione:';
                $Activacion[1]  = 'Sí';
                $Activacion[2]  = 'No';
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $ListarNotificaciones = Administracion::ListarNotificaciones();
                $Notificaciones       = array();
                $cont           = 0;
                foreach ($ListarNotificaciones as $value) {
                    $Notificaciones[$cont]['id'] = (int)$value->ID_NOTIFICACION;
                    $Notificaciones[$cont]['nombre_ciudadano'] = $value->NOMBRE_CIUDADANO;
                    $Notificaciones[$cont]['placa'] = $value->PLACA;
                    $Notificaciones[$cont]['year'] = $value->YEAR_NOTIFICATION;
                    $Notificaciones[$cont]['estado_activo']   = (int)$value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Notificaciones[$cont]['estado']   = 'ACTIVO EN PÁGINA';
                        $Notificaciones[$cont]['label']    = 'badge badge-success';
                    } else {
                        $Notificaciones[$cont]['estado']   = 'INACTIVO EN PÁGINA';
                        $Notificaciones[$cont]['label']    = 'badge badge-danger';
                    }
                    $Notificaciones[$cont]['fecha_creacion'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Notificaciones[$cont]['fecha_modificacion'] = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Notificaciones[$cont]['fecha_modificacion'] = 'SIN ACTUALIZACIÓN';
                    }
                    $cont++;
                }
                return view('administracion.notificaciones', ['Notificaciones' => $Notificaciones, 'Estado' => $Estado, 'Activacion' => $Activacion]);
            }
        }
    }

    public function Desfijaciones()
    {
        date_default_timezone_set('America/Bogota');
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else {
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $ListarDesfijaciones = Administracion::ListarDesfijaciones();
                $Desfijaciones       = array();
                $cont           = 0;
                foreach ($ListarDesfijaciones as $value) {
                    $Desfijaciones[$cont]['id'] = (int)$value->ID_DESFIJACION;
                    $Desfijaciones[$cont]['contenido'] = $value->CONTENIDO;
                    $Desfijaciones[$cont]['estado_activo']   = (int)$value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Desfijaciones[$cont]['estado']   = 'ACTIVO EN PÁGINA';
                        $Desfijaciones[$cont]['label']    = 'badge badge-success';
                    } else {
                        $Desfijaciones[$cont]['estado']   = 'INACTIVO EN PÁGINA';
                        $Desfijaciones[$cont]['label']    = 'badge badge-danger';
                    }
                    $Desfijaciones[$cont]['fecha_creacion'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Desfijaciones[$cont]['fecha_modificacion'] = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Desfijaciones[$cont]['fecha_modificacion'] = 'SIN ACTUALIZACIÓN';
                    }
                    $cont++;
                }
                return view('administracion.desfijaciones', ['Desfijaciones' => $Desfijaciones, 'Estado' => $Estado]);
            }
        }
    }

    public function ConsultaNotificaciones()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser > 3) {
                return Redirect::to('user/home');
            } else {
                return view('administracion.consultaNotificaciones');
            }
        }
    }

    public function ConsultaNotificacion(Request $request)
    {
        $RolUser = (int)Session::get('Rol');
        if ($RolUser === 1) {
            $url = 'admin/';
        } else {
            $url = 'user/';
        }
        $validator = Validator::make($request->all(), [
            'fechaInicio'  =>  'required',
            'fechaFin'  =>  'required'
        ]);
        if ($validator->fails()) {
            $verrors = $validator->errors();
            return Response::json(['valido' => 'false', 'errors' => $verrors]);
        } else {
            $fechaInicial = $request->fechaInicio;
            $fechaFinal   = $request->fechaFin;
            if ($fechaFinal < $fechaInicial) {
                $verrors = array();
                array_push($verrors, 'Fecha Final es menor a Fecha Incial');
                return Response::json(['valido' => 'false', 'errors' => $verrors]);
            } else {
                $ConsultaNotificacion = Administracion::ConsultarNotificaciones($fechaInicial, $fechaFinal);
                $resultado = json_decode(json_encode($ConsultaNotificacion), true);
                foreach ($resultado as &$value) {
                    if ($value['FECHA_MODIFICACION']) {
                        $value['FECHA_MODIFICACION']    = date('d/m/Y h:i A', strtotime($value['FECHA_MODIFICACION']));
                    } else {
                        $value['FECHA_MODIFICACION']    = 'SIN FECHA DE MODIFICACIÓN';
                    }
                    $value['FECHA_CREACION']    = date('d/m/Y h:i A', strtotime($value['FECHA_CREACION']));
                    if ($value['ESTADO'] == 1) {
                        $value['ESTADO']  = 'ACTIVO EN PÁGINA';
                    } else {
                        $value['ESTADO']   = 'INACTIVO EN PÁGINA';
                    }
                }

                $aResultado = json_encode($resultado);
                Session::put('results', $aResultado);
                if ($ConsultaNotificacion) {
                    if ($aResultado) {
                        return Response::json(['valido' => 'true', 'results' => $aResultado]);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'No hay datos que mostrar');
                        return Response::json(['valido' => 'false', 'errors' => $verrors]);
                    }
                } else {
                    $verrors = array();
                    array_push($verrors, 'No hay datos que mostrar');
                    return Response::json(['valido' => 'false', 'errors' => $verrors]);
                }
            }
        }
    }

    public function ConsultaDesfijaciones()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser > 3) {
                return Redirect::to('user/home');
            } else {
                return view('administracion.consultaDesfijaciones');
            }
        }
    }

    public function ConsultaDesfijacion(Request $request)
    {
        $RolUser = (int)Session::get('Rol');
        if ($RolUser === 1) {
            $url = 'admin/';
        } else {
            $url = 'user/';
        }
        $validator = Validator::make($request->all(), [
            'fechaInicio'  =>  'required',
            'fechaFin'  =>  'required'
        ]);
        if ($validator->fails()) {
            $verrors = $validator->errors();
            return Response::json(['valido' => 'false', 'errors' => $verrors]);
        } else {
            $fechaInicial = $request->fechaInicio;
            $fechaFinal   = $request->fechaFin;
            if ($fechaFinal < $fechaInicial) {
                $verrors = array();
                array_push($verrors, 'Fecha Final es menor a Fecha Incial');
                return Response::json(['valido' => 'false', 'errors' => $verrors]);
            } else {
                $ConsultaDesfijacion = Administracion::ConsultarDesfijaciones($fechaInicial, $fechaFinal);
                $resultado = json_decode(json_encode($ConsultaDesfijacion), true);
                foreach ($resultado as &$value) {
                    if ($value['FECHA_MODIFICACION']) {
                        $value['FECHA_MODIFICACION']    = date('d/m/Y h:i A', strtotime($value['FECHA_MODIFICACION']));
                    } else {
                        $value['FECHA_MODIFICACION']    = 'SIN FECHA DE MODIFICACIÓN';
                    }
                    $value['FECHA_CREACION']    = date('d/m/Y h:i A', strtotime($value['FECHA_CREACION']));
                    if ($value['ESTADO'] == 1) {
                        $value['ESTADO']  = 'ACTIVO EN PÁGINA';
                    } else {
                        $value['ESTADO']   = 'INACTIVO EN PÁGINA';
                    }
                }

                $aResultado = json_encode($resultado);
                Session::put('results', $aResultado);
                if ($ConsultaDesfijacion) {
                    if ($aResultado) {
                        return Response::json(['valido' => 'true', 'results' => $aResultado]);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'No hay datos que mostrar');
                        return Response::json(['valido' => 'false', 'errors' => $verrors]);
                    }
                } else {
                    $verrors = array();
                    array_push($verrors, 'No hay datos que mostrar');
                    return Response::json(['valido' => 'false', 'errors' => $verrors]);
                }
            }
        }
    }

    public function Documentos()
    {
        date_default_timezone_set('America/Bogota');
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser === 3) {
                return Redirect::to('user/home');
            } else {
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $ListarDocumentos = Administracion::ListarDocumentos();
                $Documentos       = array();
                $cont           = 0;
                foreach ($ListarDocumentos as $value) {
                    $Documentos[$cont]['id'] = (int)$value->ID_DOCUMENTO;
                    $Documentos[$cont]['nombre_documento'] = $value->NOMBRE_DOCUMENTO;
                    $Documentos[$cont]['ubicacion'] = $value->UBICACION;
                    $Documentos[$cont]['estado_activo']   = (int)$value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Documentos[$cont]['estado']   = 'ACTIVO EN PÁGINA';
                        $Documentos[$cont]['label']    = 'badge badge-success';
                    } else {
                        $Documentos[$cont]['estado']   = 'INACTIVO EN PÁGINA';
                        $Documentos[$cont]['label']    = 'badge badge-danger';
                    }
                    $Documentos[$cont]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Documentos[$cont]['fecha_modificacion'] = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Documentos[$cont]['fecha_modificacion'] = 'SIN ACTUALIZACIÓN';
                    }
                    $Documentos[$cont]['tipo_documento']   = (int)$value->ID_TYPE_DOCUMENT;
                    $IdTipoDocumento = (int)$value->ID_TYPE_DOCUMENT;
                    $ListadoTipoDocumentosActivosById = Administracion::ListadoTipoDocumentosActivosById($IdTipoDocumento);
                    if($ListadoTipoDocumentosActivosById){
                        foreach($ListadoTipoDocumentosActivosById as $rowT){
                            $Documentos[$cont]['nombre_tipo_documento'] = $rowT->NOMBRE_DOCUMENTO;
                        }
                    }else{
                        $Documentos[$cont]['nombre_tipo_documento'] = 'SIN TIPO DE DOCUMENTO';
                    }
                    $cont++;
                }
                $ListadoTipoDocumentosActivos = Administracion::ListadoTipoDocumentosActivos();
                $TipoDocumentos = array();
                $TipoDocumentos[''] = 'Seleccione:';
                foreach ($ListadoTipoDocumentosActivos as $row) {
                    $TipoDocumentos[$row->ID_TYPE_DOCUMENT] = $row->NOMBRE_DOCUMENTO;
                }
                return view('administracion.documentos', ['Documentos' => $Documentos, 'Estado' => $Estado,'TipoDocumentos' => $TipoDocumentos]);
            }
        }
    }

    public function ReporteContacto()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser >= 3) {
                return Redirect::to('user/home');
            } else {
                return view('administracion.reporteContacto');
            }
        }
    }

    public static function FindUrl()
    {
        $RolUser = (int)Session::get('Rol');
        if ($RolUser === 1) {
            $url = 'admin/';
        } else if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            $url = 'user/';
        }
        return $url;
    }

    public function ConsultaContacto(Request $request)
    {
        $RolUser = (int)Session::get('Rol');
        if ($RolUser === 1) {
            $url = 'admin/';
        } else {
            $url = 'user/';
        }
        $validator = Validator::make($request->all(), [
            'fechaInicio'  =>  'required',
            'fechaFin'  =>  'required'
        ]);
        if ($validator->fails()) {
            $verrors = $validator->errors();
            return Response::json(['valido' => 'false', 'errors' => $verrors]);
        } else {
            $fechaInicial = $request->fechaInicio;
            $fechaFinal   = $request->fechaFin;
            if ($fechaFinal < $fechaInicial) {
                $verrors = array();
                array_push($verrors, 'Fecha Final es menor a Fecha Incial');
                return Response::json(['valido' => 'false', 'errors' => $verrors]);
            } else {
                $ConsultaContactenos = Administracion::ConsultaContactenos($fechaInicial, $fechaFinal);
                $resultado = json_decode(json_encode($ConsultaContactenos), true);
                foreach ($resultado as &$value) {
                    $value['FECHA_CREACION']    = date('d/m/Y h:i A', strtotime($value['FECHA_CREACION']));
                }

                $aResultado = json_encode($resultado);
                Session::put('results', $aResultado);
                if ($ConsultaContactenos) {
                    if ($aResultado) {
                        return Response::json(['valido' => 'true', 'results' => $aResultado]);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'No hay datos que mostrar');
                        return Response::json(['valido' => 'false', 'errors' => $verrors]);
                    }
                } else {
                    $verrors = array();
                    array_push($verrors, 'No hay datos que mostrar');
                    return Response::json(['valido' => 'false', 'errors' => $verrors]);
                }
            }
        }
    }

    public function ReporteHojaVida()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser >= 3) {
                return Redirect::to('user/home');
            } else {
                return view('administracion.reporteHojaVida');
            }
        }
    }

    public function ConsultaHojaVida(Request $request)
    {
        $RolUser = (int)Session::get('Rol');
        if ($RolUser === 1) {
            $url = 'admin/';
        } else {
            $url = 'user/';
        }
        $validator = Validator::make($request->all(), [
            'fechaInicio'  =>  'required',
            'fechaFin'  =>  'required'
        ]);
        if ($validator->fails()) {
            $verrors = $validator->errors();
            return Response::json(['valido' => 'false', 'errors' => $verrors]);
        } else {
            $fechaInicial = $request->fechaInicio;
            $fechaFinal   = $request->fechaFin;
            if ($fechaFinal < $fechaInicial) {
                $verrors = array();
                array_push($verrors, 'Fecha Final es menor a Fecha Incial');
                return Response::json(['valido' => 'false', 'errors' => $verrors]);
            } else {
                $ConsultaHojaVida = Administracion::ConsultaHojaVida($fechaInicial, $fechaFinal);
                $resultado = json_decode(json_encode($ConsultaHojaVida), true);
                foreach ($resultado as &$value) {
                    $value['FECHA_CREACION']    = date('d/m/Y h:i A', strtotime($value['FECHA_CREACION']));
                    if ($value['ID_DOCUMENTO']) {
                        $ConsultarTipoDocumento = Administracion::tipoDocumento((int)$value['ID_DOCUMENTO']);
                        foreach ($ConsultarTipoDocumento as $row) {
                            $value['ID_DOCUMENTO'] = $row->NOMBRE_DOCUMENTO;
                        }
                    }
                }

                $aResultado = json_encode($resultado);
                Session::put('results', $aResultado);
                if ($ConsultaHojaVida) {
                    if ($aResultado) {
                        return Response::json(['valido' => 'true', 'results' => $aResultado]);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'No hay datos que mostrar');
                        return Response::json(['valido' => 'false', 'errors' => $verrors]);
                    }
                } else {
                    $verrors = array();
                    array_push($verrors, 'No hay datos que mostrar');
                    return Response::json(['valido' => 'false', 'errors' => $verrors]);
                }
            }
        }
    }

    public function ReporteVisitas()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser >= 3) {
                return Redirect::to('user/home');
            } else {
                return view('administracion.visitasPagina');
            }
        }
    }

    public function ConsultaVisitas(Request $request)
    {
        $RolUser = (int)Session::get('Rol');
        if ($RolUser === 1) {
            $url = 'admin/';
        } else {
            $url = 'user/';
        }
        $validator = Validator::make($request->all(), [
            'fechaInicio'  =>  'required',
            'fechaFin'  =>  'required'
        ]);
        if ($validator->fails()) {
            $verrors = $validator->errors();
            return Response::json(['valido' => 'false', 'errors' => $verrors]);
        } else {
            $fechaInicial = $request->fechaInicio;
            $fechaFinal   = $request->fechaFin;
            if ($fechaFinal < $fechaInicial) {
                $verrors = array();
                array_push($verrors, 'Fecha Final es menor a Fecha Incial');
                return Response::json(['valido' => 'false', 'errors' => $verrors]);
            } else {
                $ConsultaVisitas = Administracion::ConsultaVisitas($fechaInicial, $fechaFinal);
                $resultado = json_decode(json_encode($ConsultaVisitas), true);
                foreach ($resultado as &$value) {
                    $value['FECHA']    = date('d/m/Y h:i A', strtotime($value['FECHA']));
                    if($value['PAGINA'] === '/'){
                        $value['PAGINA'] = 'inicio';
                    }else{
                        $value['PAGINA'] = substr($value['PAGINA'],1);
                    }
                    // if ($value['PAGINA'] === '/gypproduccion/') {
                    //     $value['PAGINA'] = 'inicio';
                    // } else {
                    //     $value['PAGINA'] = str_replace("/gypproduccion/", '', $value['PAGINA']);
                    // }
                }

                $aResultado = json_encode($resultado);
                Session::put('results', $aResultado);
                if ($ConsultaVisitas) {
                    if ($aResultado) {
                        return Response::json(['valido' => 'true', 'results' => $aResultado]);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'No hay datos que mostrar');
                        return Response::json(['valido' => 'false', 'errors' => $verrors]);
                    }
                } else {
                    $verrors = array();
                    array_push($verrors, 'No hay datos que mostrar');
                    return Response::json(['valido' => 'false', 'errors' => $verrors]);
                }
            }
        }
    }

    public function Imagenes()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser === 3) {
                return Redirect::to('user/home');
            } else {
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activa';
                $Estado[2]  = 'Inactiva';
                $ListaPaginas = array();
                $ListaPaginas[''] = 'Seleccione:';
                $ListadoPaginasActivas = Administracion::ListadoPaginasActivas();
                if ($ListadoPaginasActivas) {
                    foreach ($ListadoPaginasActivas as $row) {
                        $ListaPaginas[$row->ID_PAGINA] = $row->NOMBRE_PAGINA;
                    }
                }
                $ListadoSubpaginas = array();
                $ListadoSubpaginas[''] = 'Seleccione:';
                $ListadoImagenes = Administracion::ListadoImagenes();
                $cont = 0;
                $Imagenes = array();
                foreach ($ListadoImagenes as $value) {
                    $Imagenes[$cont]['id'] = (int)$value->ID_IMAGEN;
                    $Imagenes[$cont]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $Imagenes[$cont]['ubicacion'] = '../'.$value->UBICACION;
                    $Imagenes[$cont]['fecha_cargue']    = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Imagenes[$cont]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Imagenes[$cont]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $Imagenes[$cont]['estado_activo']   = (int)$value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Imagenes[$cont]['estado']   = 'ACTIVO EN PÁGINA';
                        $Imagenes[$cont]['label']    = 'badge badge-success';
                    } else {
                        $Imagenes[$cont]['estado']   = 'INACTIVO EN PÁGINA';
                        $Imagenes[$cont]['label']    = 'badge badge-danger';
                    }
                    $Imagenes[$cont]['id_pagina']   = (int)$value->ID_PAGINA;
                    $ListarPagina = Administracion::BuscarIdPagina((int)$value->ID_PAGINA);
                    if ($ListarPagina) {
                        foreach ($ListarPagina as $rowp) {
                            $Imagenes[$cont]['nombre_pagina'] = $rowp->NOMBRE_PAGINA;
                        }
                    } else {
                        $Imagenes[$cont]['nombre_pagina'] = 'SIN NOMBRE DE PÁGINA';
                    }
                    $Imagenes[$cont]['id_subpagina'] = (int)$value->ID_SUBPAGINA;
                    if ((int)$value->ID_SUBPAGINA === 0) {
                        $Imagenes[$cont]['nombre_subpagina'] = 'SIN NOMBRE DE SUBPÁGINA';
                    } else {
                        $ListarSubpagina = Administracion::BuscarSubPageById((int)$value->ID_SUBPAGINA);
                        if ($ListarSubpagina) {
                            foreach ($ListarSubpagina as $rows) {
                                $Imagenes[$cont]['nombre_subpagina'] = $rows->NOMBRE_SUBPAGINA;
                            }
                        } else {
                            $Imagenes[$cont]['nombre_subpagina'] = 'SIN NOMBRE DE SUBPÁGINA';
                        }
                    }
                    if ((int)$value->ID_GRUA === 0) {
                        $Imagenes[$cont]['nombre_grua'] = 'SIN NOMBRE DE GRÚA';
                    } else {
                        $ListarGruaById = Administracion::ListarGruaById((int)$value->ID_GRUA);
                        if ($ListarGruaById) {
                            foreach ($ListarGruaById as $rows) {
                                $Imagenes[$cont]['nombre_grua'] = $rows->NOMBRE_GRUA;
                            }
                        } else {
                            $Imagenes[$cont]['nombre_grua'] = 'SIN NOMBRE DE GRÚA';
                        }
                    }
                    $Imagenes[$cont]['textoImagenForm'] = $value->TEXTO_IMAGEN;
                    $Imagenes[$cont]['id_ordenPagina'] = (int)$value->ORDEN_IMAGEN;
                    $Imagenes[$cont]['pie_imagen'] = $value->PIE_IMAGEN;
                    $Imagenes[$cont]['id_grua'] = (int)$value->ID_GRUA;
                    $cont++;
                }
                $OrdenImagenes = array();
                $OrdenImagenes[''] = 'Seleccione:';
                $ListadoOrdenImagenes = Administracion::ListarOrdenImagenes();
                if ($ListadoOrdenImagenes) {
                    foreach ($ListadoOrdenImagenes as $rowO) {
                        $OrdenImagenes[$rowO->ID_ORDEN] = $rowO->NOMBRE;
                    }
                }
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $TipoGruas = array();
                $TipoGruas[''] = 'Seleccione:';
                $ListadoGruas = Administracion::ListadoTipoGruasActivos();
                if ($ListadoGruas) {
                    foreach ($ListadoGruas as $rowO) {
                        $TipoGruas[$rowO->ID_GRUA] = $rowO->NOMBRE_GRUA;
                    }
                }
                return view('administracion.imagenes', ['Estado' => $Estado, 'ListaPaginas' => $ListaPaginas,
                'ListadoSubpaginas' => $ListadoSubpaginas, 'Imagenes' => $Imagenes, 'OrdenImagenes' => $OrdenImagenes,
                'PiePagina' => $PiePagina,'TipoGruas' => $TipoGruas]);
            }
        }
    }

    public function buscarSubpagina(Request $request)
    {
        $idPagina   = (int)$request->id_pagina;
        $Subpaginas = array();
        $BuscarSubpagina = Administracion::BuscarIdSubpagina($idPagina);
        if ($BuscarSubpagina) {
            foreach ($BuscarSubpagina as $row) {
                $Subpaginas[$row->ID_SUBPAGINA] = $row->NOMBRE_SUBPAGINA;
            }
            return Response::json(array('valido' => 'true', 'Subpaginas' => $Subpaginas));
        } else {
            return Response::json(array('valido' => 'false', 'Subpaginas' => null));
        }
    }

    public function ImagesHomePage(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser === 3) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $listadoInicio  = Imagenes::Inicio();
                $Inicio         = array();
                $contInicio     = 0;
                foreach ($listadoInicio as $value) {
                    $Inicio[$contInicio]['id']            = $value->ID_IMAGEN;
                    $Inicio[$contInicio]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $Inicio[$contInicio]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Inicio[$contInicio]['estado']   = 'ACTIVO EN PÁGINA';
                        $Inicio[$contInicio]['label']    = 'badge badge-success';
                    } else {
                        $Inicio[$contInicio]['estado']   = 'INACTIVO EN PÁGINA';
                        $Inicio[$contInicio]['label']    = 'badge badge-danger';
                    }
                    $Inicio[$contInicio]['ubicacion']    = $value->UBICACION;
                    $Inicio[$contInicio]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Inicio[$contInicio]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Inicio[$contInicio]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $tipoGrua = Imagenes::ListarHomePageById($value->TIPO_IMAGEN);
                    if($tipoGrua){
                        foreach($tipoGrua as $row){
                            $Inicio[$contInicio]['imagen'] = $row->NOMBRE;
                        }
                    }
                    $Inicio[$contInicio]['tipo_imagen'] = $value->TIPO_IMAGEN;
                    $Inicio[$contInicio]['pie_imagen'] = $value->PIE_IMAGEN;
                    $contInicio++;
                }
                $TipoImagen = array();
                $TipoImagen[''] = 'Seleccione:';
                $listadoTipoImagen = Imagenes::ListadoTipoImagen();
                if($listadoTipoImagen){
                    foreach($listadoTipoImagen as $row){
                        $TipoImagen[$row->ID_TIPO] = $row->NOMBRE;
                    }
                }
                $OrdenImagen = Imagenes::OrdenImagenHomePage();
                if($OrdenImagen){
                    foreach($OrdenImagen as $value){
                        unset($TipoImagen[$value->TIPO_IMAGEN]);
                    }
                }
                $TipoImagenUpd = array();
                $TipoImagenUpd[''] = 'Seleccione:';
                $listadoTipoImagenUpd = Imagenes::ListadoTipoImagen();
                if($listadoTipoImagenUpd){
                    foreach($listadoTipoImagenUpd as $row){
                        $TipoImagenUpd[$row->ID_TIPO] = $row->NOMBRE;
                    }
                }
                return view('administracion.imagenes.homePage',['Estado' => $Estado,'PiePagina' => $PiePagina, 'Inicio' => $Inicio, 'TipoImagen' => $TipoImagen,
                'TipoImagenUpd' => $TipoImagenUpd]);
            }
        }
    }

    public function ImagesBanner(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser === 3) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $listadoBanner  = Imagenes::Banner();
                $Banner         = array();
                $contBanner     = 0;
                foreach ($listadoBanner as $value) {
                    $Banner[$contBanner]['id']            = $value->ID_IMAGEN;
                    $Banner[$contBanner]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $Banner[$contBanner]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Banner[$contBanner]['estado']   = 'ACTIVO EN PÁGINA';
                        $Banner[$contBanner]['label']    = 'badge badge-success';
                    } else {
                        $Banner[$contBanner]['estado']   = 'INACTIVO EN PÁGINA';
                        $Banner[$contBanner]['label']    = 'badge badge-danger';
                    }
                    $Banner[$contBanner]['ubicacion']    = $value->UBICACION;
                    $Banner[$contBanner]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Banner[$contBanner]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Banner[$contBanner]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $Banner[$contBanner]['pie_imagen'] = $value->PIE_IMAGEN;
                    $contBanner++;
                }
                
                return view('administracion.imagenes.banner',['Estado' => $Estado,'PiePagina' => $PiePagina, 'Banner' => $Banner]);
            }
        }
    }

    public function ImagesBannerM(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser === 3) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';            
                $listadoBannerMovil  = Imagenes::BannerMovil();
                $BannerMovil         = array();
                $contBannerMovil     = 0;
                foreach ($listadoBannerMovil as $value) {
                    $BannerMovil[$contBannerMovil]['id']            = $value->ID_IMAGEN;
                    $BannerMovil[$contBannerMovil]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $BannerMovil[$contBannerMovil]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $BannerMovil[$contBannerMovil]['estado']   = 'ACTIVO EN PÁGINA';
                        $BannerMovil[$contBannerMovil]['label']    = 'badge badge-success';
                    } else {
                        $BannerMovil[$contBannerMovil]['estado']   = 'INACTIVO EN PÁGINA';
                        $BannerMovil[$contBannerMovil]['label']    = 'badge badge-danger';
                    }
                    $BannerMovil[$contBannerMovil]['ubicacion']    = $value->UBICACION;
                    $BannerMovil[$contBannerMovil]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $BannerMovil[$contBannerMovil]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $BannerMovil[$contBannerMovil]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $BannerMovil[$contBannerMovil]['pie_imagen'] = $value->PIE_IMAGEN;
                    $contBannerMovil++;
                }
                return view('administracion.imagenes.bannerM',['Estado' => $Estado,'PiePagina' => $PiePagina, 'BannerMovil' => $BannerMovil]);
            }
        }
    }

    public static function ImagesCarousel(){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser === 3) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $Orden = array();
                $Orden[''] = 'Seleccione:';
                $Orden[1]  = 1;
                $Orden[2]  = 2;
                $Orden[3]  = 3;
                $Orden[4]  = 4;
                $Orden[5]  = 5;
                $OrdenCarousel = Imagenes::OrdenCarousel(2);
                if($OrdenCarousel){
                    foreach($OrdenCarousel as $value){
                        unset($Orden[$value->ORDEN]);
                    }
                }
                $OrdenUpd = array();
                $OrdenUpd[''] = 'Seleccione:';
                $OrdenUpd[1]  = 1;
                $OrdenUpd[2]  = 2;
                $OrdenUpd[3]  = 3;
                $OrdenUpd[4]  = 4;
                $OrdenUpd[5]  = 5;
                $listadoCarousel  = Imagenes::Carousel(2);
                $Carousel         = array();
                $contCarousel     = 0;
                foreach ($listadoCarousel as $value) {
                    $Carousel[$contCarousel]['id']              = $value->ID_IMAGEN;
                    $Carousel[$contCarousel]['nombre_imagen']   = $value->NOMBRE_IMAGEN;
                    $Carousel[$contCarousel]['estado_activo']   = $value->ESTADO;
                    $Carousel[$contCarousel]['orden']           = $value->ORDEN;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Carousel[$contCarousel]['estado']   = 'ACTIVO EN PÁGINA';
                        $Carousel[$contCarousel]['label']    = 'badge badge-success';
                    } else {
                        $Carousel[$contCarousel]['estado']   = 'INACTIVO EN PÁGINA';
                        $Carousel[$contCarousel]['label']    = 'badge badge-danger';
                    }
                    $Carousel[$contCarousel]['ubicacion']    = $value->UBICACION;
                    $Carousel[$contCarousel]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Carousel[$contCarousel]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Carousel[$contCarousel]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $Carousel[$contCarousel]['pie_imagen'] = $value->PIE_IMAGEN;
                    $contCarousel++;
                }
                return view('administracion.imagenes.carousel',['Estado' => $Estado,'PiePagina' => $PiePagina,'Orden' => $Orden,'OrdenUpd' => $OrdenUpd,
                'Carousel' => $Carousel]);
            }
        }
    }

    public static function ImagesCarouselM(){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser === 3) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $Orden = array();
                $Orden[''] = 'Seleccione:';
                for($i = 1; $i <= 5; $i++){
                    $Orden[$i]  = $i;
                }
                $OrdenCarousel = Imagenes::OrdenCarousel(1);
                if($OrdenCarousel){
                    foreach($OrdenCarousel as $value){
                        unset($Orden[$value->ORDEN]);
                    }
                }
                $OrdenUpd = array();
                $OrdenUpd[''] = 'Seleccione:';
                for($i = 1; $i <= 5; $i++){
                    $OrdenUpd[$i]  = $i;
                }
                $listadoCarouselM  = Imagenes::Carousel(1);
                $CarouselM         = array();
                $contCarouselM     = 0;
                foreach ($listadoCarouselM as $value) {
                    $CarouselM[$contCarouselM]['id']              = $value->ID_IMAGEN;
                    $CarouselM[$contCarouselM]['nombre_imagen']   = $value->NOMBRE_IMAGEN;
                    $CarouselM[$contCarouselM]['estado_activo']   = $value->ESTADO;
                    $CarouselM[$contCarouselM]['orden']           = $value->ORDEN;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $CarouselM[$contCarouselM]['estado']   = 'ACTIVO EN PÁGINA';
                        $CarouselM[$contCarouselM]['label']    = 'badge badge-success';
                    } else {
                        $CarouselM[$contCarouselM]['estado']   = 'INACTIVO EN PÁGINA';
                        $CarouselM[$contCarouselM]['label']    = 'badge badge-danger';
                    }
                    $CarouselM[$contCarouselM]['ubicacion']    = $value->UBICACION;
                    $CarouselM[$contCarouselM]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $CarouselM[$contCarouselM]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $CarouselM[$contCarouselM]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $CarouselM[$contCarouselM]['pie_imagen'] = $value->PIE_IMAGEN;
                    $contCarouselM++;
                }
                return view('administracion.imagenes.carouselM',['Estado' => $Estado,'PiePagina' => $PiePagina,'Orden' => $Orden,'OrdenUpd' => $OrdenUpd,
                'CarouselM' => $CarouselM]);
            }
        }
    }

    public function ImagesUs(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser === 3) {
                return Redirect::to('user/home');
            } else {
                $listadoNosotros  = Imagenes::Nosotros();
                $Nosotros         = array();
                $contNosotros     = 0;
                foreach ($listadoNosotros as $value) {
                    $Nosotros[$contNosotros]['id']            = $value->ID_IMAGEN;
                    $Nosotros[$contNosotros]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $Nosotros[$contNosotros]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Nosotros[$contNosotros]['estado']   = 'ACTIVO EN PÁGINA';
                        $Nosotros[$contNosotros]['label']    = 'badge badge-success';
                    } else {
                        $Nosotros[$contNosotros]['estado']   = 'INACTIVO EN PÁGINA';
                        $Nosotros[$contNosotros]['label']    = 'badge badge-danger';
                    }
                    $Nosotros[$contNosotros]['ubicacion']    = $value->UBICACION;
                    $Nosotros[$contNosotros]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Nosotros[$contNosotros]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Nosotros[$contNosotros]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $Nosotros[$contNosotros]['pie_imagen'] = $value->PIE_IMAGEN;
                    $contNosotros++;
                }
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                return view('administracion.imagenes.us',['Estado' => $Estado,'PiePagina' => $PiePagina, 'Nosotros' => $Nosotros]);
            }
        }
    }

    public function ImagesOrganigrama(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser === 3) {
                return Redirect::to('user/home');
            } else {
                $listadoOrganigrama  = Imagenes::Organigrama();
                $Organigrama         = array();
                $contOrganigrama     = 0;
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                foreach ($listadoOrganigrama as $value) {
                    $Organigrama[$contOrganigrama]['id']            = $value->ID_ARCHIVO;
                    $Organigrama[$contOrganigrama]['nombre_archivo'] = $value->NOMBRE_ARCHIVO;
                    $Organigrama[$contOrganigrama]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Organigrama[$contOrganigrama]['estado']   = 'ACTIVO EN PÁGINA';
                        $Organigrama[$contOrganigrama]['label']    = 'badge badge-success';
                    } else {
                        $Organigrama[$contOrganigrama]['estado']   = 'INACTIVO EN PÁGINA';
                        $Organigrama[$contOrganigrama]['label']    = 'badge badge-danger';
                    }
                    $Organigrama[$contOrganigrama]['ubicacion']    = $value->UBICACION;
                    $Organigrama[$contOrganigrama]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Organigrama[$contOrganigrama]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Organigrama[$contOrganigrama]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $contOrganigrama++;
                }
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                return view('administracion.imagenes.organigrama',['Estado' => $Estado, 'Organigrama' => $Organigrama]);
            }
        }
    }

    public function ImagesSettlementConsultation(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser === 3) {
                return Redirect::to('user/home');
            } else {
                $listadoSettlementConsultation  = Imagenes::SettlementConsultation();
                $SettlementConsultation         = array();
                $contSettlementConsultation     = 0;
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                foreach ($listadoSettlementConsultation as $value) {
                    $SettlementConsultation[$contSettlementConsultation]['id']            = $value->ID_IMAGEN;
                    $SettlementConsultation[$contSettlementConsultation]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $SettlementConsultation[$contSettlementConsultation]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $SettlementConsultation[$contSettlementConsultation]['estado']   = 'ACTIVO EN PÁGINA';
                        $SettlementConsultation[$contSettlementConsultation]['label']    = 'badge badge-success';
                    } else {
                        $SettlementConsultation[$contSettlementConsultation]['estado']   = 'INACTIVO EN PÁGINA';
                        $SettlementConsultation[$contSettlementConsultation]['label']    = 'badge badge-danger';
                    }
                    $SettlementConsultation[$contSettlementConsultation]['ubicacion']    = $value->UBICACION;
                    $SettlementConsultation[$contSettlementConsultation]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $SettlementConsultation[$contSettlementConsultation]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $SettlementConsultation[$contSettlementConsultation]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $SettlementConsultation[$contSettlementConsultation]['pie_imagen'] = $value->PIE_IMAGEN;
                    $contSettlementConsultation++;
                }
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                return view('administracion.imagenes.settlementConsultation',['PiePagina' => $PiePagina, 'SettlementConsultation' => $SettlementConsultation,
                'Estado' => $Estado]);
            }
        }
    }

    ## Servicios

    public function ImagesBenefits(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser === 3) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $Orden = array();
                $Orden[''] = 'Seleccione:';
                for($i = 1; $i <= 5; $i++){
                    $Orden[$i]  = $i;
                }
                $OrdenImagen = Imagenes::OrdenImagenServicios(1);
                if($OrdenImagen){
                    foreach($OrdenImagen as $value){
                        unset($Orden[$value->ORDEN_IMAGEN]);
                    }
                }
                $listadoBeneficios  = Imagenes::Beneficios();
                $Beneficios         = array();
                $contBeneficios     = 0;
                foreach ($listadoBeneficios as $value) {
                    $Beneficios[$contBeneficios]['id']            = $value->ID_IMAGEN;
                    $Beneficios[$contBeneficios]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $Beneficios[$contBeneficios]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Beneficios[$contBeneficios]['estado']   = 'ACTIVO EN PÁGINA';
                        $Beneficios[$contBeneficios]['label']    = 'badge badge-success';
                    } else {
                        $Beneficios[$contBeneficios]['estado']   = 'INACTIVO EN PÁGINA';
                        $Beneficios[$contBeneficios]['label']    = 'badge badge-danger';
                    }
                    $Beneficios[$contBeneficios]['ubicacion']    = $value->UBICACION;
                    $Beneficios[$contBeneficios]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Beneficios[$contBeneficios]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Beneficios[$contBeneficios]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $Beneficios[$contBeneficios]['orden'] = $value->ORDEN_IMAGEN;
                    $Beneficios[$contBeneficios]['texto_imagen'] = $value->TEXTO_IMAGEN;
                    $Beneficios[$contBeneficios]['pie_imagen'] = $value->PIE_IMAGEN;
                    $contBeneficios++;
                }
                $OrdenUpd = array();
                $OrdenUpd[''] = 'Seleccione:';
                for($i = 1; $i <= 5; $i++){
                    $OrdenUpd[$i]  = $i;
                }
                return view('administracion.imagenes.benefits',['Estado' => $Estado,'PiePagina' => $PiePagina,'Orden' => $Orden, 'Beneficios' => $Beneficios,
                'OrdenUpd' => $OrdenUpd]);
            }
        }
    }

    public function ImagesTows(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser === 3) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $TipoGrua = array();
                $TipoGrua[''] = 'Seleccione:';
                $ListadoTipoGrua = Imagenes::ListadoTipoGruas();
                if($ListadoTipoGrua){
                    foreach($ListadoTipoGrua as $value){
                        $TipoGrua[$value->ID_GRUA] = $value->NOMBRE_GRUA;
                    }
                }
                $OrdenGruas = Imagenes::OrdenGruas();
                if($OrdenGruas){
                    foreach($OrdenGruas as $value){
                        unset($TipoGrua[$value->TIPO_GRUA]);
                    }
                }
                $listadoGruas = Imagenes::Gruas();
                $Gruas      = array();
                $contGruas  = 0;
                foreach ($listadoGruas as $value) {
                    $Gruas[$contGruas]['id']            = $value->ID_IMAGEN;
                    $Gruas[$contGruas]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $Gruas[$contGruas]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Gruas[$contGruas]['estado']   = 'ACTIVO EN PÁGINA';
                        $Gruas[$contGruas]['label']    = 'badge badge-success';
                    } else {
                        $Gruas[$contGruas]['estado']   = 'INACTIVO EN PÁGINA';
                        $Gruas[$contGruas]['label']    = 'badge badge-danger';
                    }
                    $Gruas[$contGruas]['ubicacion']    = $value->UBICACION;
                    $Gruas[$contGruas]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Gruas[$contGruas]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Gruas[$contGruas]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $tipoGrua = Administracion::ListarGruaById($value->TIPO_GRUA);
                    if($tipoGrua){
                        foreach($tipoGrua as $row){
                            $Gruas[$contGruas]['grua'] = $row->NOMBRE_GRUA;
                        }
                    }
                    $Gruas[$contGruas]['orden'] = $value->ORDEN_IMAGEN;
                    $Gruas[$contGruas]['tipo_grua'] = $value->TIPO_GRUA;
                    $Gruas[$contGruas]['pie_imagen'] = $value->PIE_IMAGEN;
                    $contGruas++;
                }
                $TipoGruaUpd = array();
                $TipoGruaUpd[''] = 'Seleccione:';
                $ListadoTipoGruaUpd = Imagenes::ListadoTipoGruas();
                if($ListadoTipoGruaUpd){
                    foreach($ListadoTipoGrua as $value){
                        $TipoGruaUpd[$value->ID_GRUA] = $value->NOMBRE_GRUA;
                    }
                }
                return view('administracion.imagenes.tows',['Estado' => $Estado,'PiePagina' => $PiePagina,'TipoGrua' => $TipoGrua,'Gruas' => $Gruas,
                'TipoGruaUpd' => $TipoGruaUpd]);
            }
        }
    }

    public function ImagesMonitoringCameras(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser === 3) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $Orden = array();
                $Orden[''] = 'Seleccione:';
                for($i = 1; $i <= 5; $i++){
                    $Orden[$i]  = $i;
                }
                $OrdenImagen = Imagenes::OrdenImagenServicios(4);
                if($OrdenImagen){
                    foreach($OrdenImagen as $value){
                        unset($Orden[$value->ORDEN_IMAGEN]);
                    }
                }
                $listadoMonitoreoCamaras  = Imagenes::MonitoreoCamaras();
                $MonitoreoCamaras         = array();
                $contMonitoreoCamaras     = 0;
                foreach ($listadoMonitoreoCamaras as $value) {
                    $MonitoreoCamaras[$contMonitoreoCamaras]['id']            = $value->ID_IMAGEN;
                    $MonitoreoCamaras[$contMonitoreoCamaras]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $MonitoreoCamaras[$contMonitoreoCamaras]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $MonitoreoCamaras[$contMonitoreoCamaras]['estado']   = 'ACTIVO EN PÁGINA';
                        $MonitoreoCamaras[$contMonitoreoCamaras]['label']    = 'badge badge-success';
                    } else {
                        $MonitoreoCamaras[$contMonitoreoCamaras]['estado']   = 'INACTIVO EN PÁGINA';
                        $MonitoreoCamaras[$contMonitoreoCamaras]['label']    = 'badge badge-danger';
                    }
                    $MonitoreoCamaras[$contMonitoreoCamaras]['ubicacion']    = $value->UBICACION;
                    $MonitoreoCamaras[$contMonitoreoCamaras]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $MonitoreoCamaras[$contMonitoreoCamaras]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $MonitoreoCamaras[$contMonitoreoCamaras]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $MonitoreoCamaras[$contMonitoreoCamaras]['pie_imagen'] = $value->PIE_IMAGEN;
                    $MonitoreoCamaras[$contMonitoreoCamaras]['orden'] = $value->ORDEN_IMAGEN;
                    $contMonitoreoCamaras++;
                }
                $OrdenUpd = array();
                $OrdenUpd[''] = 'Seleccione:';
                for($i = 1; $i <= 5; $i++){
                    $OrdenUpd[$i]  = $i;
                }
                return view('administracion.imagenes.monitoringCameras',['Estado' => $Estado,'PiePagina' => $PiePagina, 'MonitoreoCamaras' => $MonitoreoCamaras,
                'Orden' => $Orden,'OrdenUpd' => $OrdenUpd]);
            }
        }
    }

    public function Preguntas(){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return Redirect::to('admin/home');
            } else if ($RolUser === 3) {
                return Redirect::to('user/home');
            } else {
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activa';
                $Estado[2]  = 'Inactiva';
                $listadoPreguntas = Administracion::PreguntasFrecuentes();
                $Preguntas = array();
                $contPreguntas = 0;
                foreach($listadoPreguntas as $value){
                    $Preguntas[$contPreguntas]['id']                = (int)$value->ID_PREGUNTA;
                    $Preguntas[$contPreguntas]['titulo_pregunta']   = $value->TITULO_PREGUNTA;
                    $Preguntas[$contPreguntas]['contenido']         = $value->CONTENIDO;
                    $Preguntas[$contPreguntas]['fecha_creacion']      = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Preguntas[$contPreguntas]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Preguntas[$contPreguntas]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $Preguntas[$contPreguntas]['estado_activo']   = (int)$value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Preguntas[$contPreguntas]['estado']   = 'ACTIVO EN PÁGINA';
                        $Preguntas[$contPreguntas]['label']    = 'badge badge-success';
                    } else {
                        $Preguntas[$contPreguntas]['estado']   = 'INACTIVO EN PÁGINA';
                        $Preguntas[$contPreguntas]['label']    = 'badge badge-danger';
                    }
                    $contPreguntas++;
                }
                return view('administracion.preguntas',['Estado' => $Estado, 'Preguntas' => $Preguntas]);
            }
        }
    }
}
