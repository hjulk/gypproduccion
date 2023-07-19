<?php

namespace App\Http\Controllers\Admin;

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

class AdministradorController extends Controller
{
    public function Home()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
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

    public function Dependencias()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                $ListarDepenencias = Administracion::ListarDepenencias();
                $Dependencias       = array();
                $cont           = 0;
                foreach ($ListarDepenencias as $value) {
                    $Dependencias[$cont]['id']             = (int)$value->ID_DEPENDENCIA;
                    $Dependencias[$cont]['nombre_dependencia']  = $value->NOMBRE_DEPENDENCIA;
                    $Dependencias[$cont]['estado_activo']  = (int)$value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Dependencias[$cont]['estado']   = 'ACTIVO';
                        $Dependencias[$cont]['label']    = 'badge badge-success';
                    } else {
                        $Dependencias[$cont]['estado']   = 'INACTIVO';
                        $Dependencias[$cont]['label']    = 'badge badge-danger';
                    }
                    $cont++;
                }
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo';
                $Estado[2]  = 'Inactivo';
                return view('administracion.dependencias', ['Estado' => $Estado, 'Dependencias' => $Dependencias]);
            }
        }
    }

    public function Roles()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                $ListarRoles = Administracion::ListarRoles();
                $Roles       = array();
                $cont           = 0;
                foreach ($ListarRoles as $value) {
                    $Roles[$cont]['id']             = (int)$value->ID_ROL;
                    $Roles[$cont]['nombre_rol']         = $value->NOMBRE_ROL;
                    $Roles[$cont]['estado_activo']  = (int)$value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Roles[$cont]['estado']   = 'ACTIVO';
                        $Roles[$cont]['label']    = 'badge badge-success';
                    } else {
                        $Roles[$cont]['estado']   = 'INACTIVO';
                        $Roles[$cont]['label']    = 'badge badge-danger';
                    }
                    $cont++;
                }
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo';
                $Estado[2]  = 'Inactivo';
                return view('administracion.roles', ['Estado' => $Estado, 'Roles' => $Roles]);
            }
        }
    }

    public function Usuarios()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                $ListarRolesActivos = Administracion::ListarRolesActivo();
                $Roles = array();
                $Roles[''] = 'Seleccione:';
                foreach ($ListarRolesActivos as $row) {
                    $Roles[$row->ID_ROL] = $row->NOMBRE_ROL;
                }
                $ListarDependenciaActivos = Administracion::ListarDepenenciasActivo();
                $Dependencias = array();
                $Dependencias[''] = 'Seleccione:';
                foreach ($ListarDependenciaActivos as $row) {
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
                foreach ($ListarUsuarios as $value) {
                    $Usuarios[$cont]['id']              = (int)$value->ID_USUARIO;
                    $Usuarios[$cont]['nombre_usuario']  = $value->NOMBRE_USUARIO;
                    $Usuarios[$cont]['correo']          = $value->CORREO;
                    $Usuarios[$cont]['username']        = $value->USERNAME;
                    $Usuarios[$cont]['estado_activo']   = (int)$value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Usuarios[$cont]['estado']   = 'ACTIVO';
                        $Usuarios[$cont]['label']    = 'badge badge-success';
                    } else {
                        $Usuarios[$cont]['estado']   = 'INACTIVO';
                        $Usuarios[$cont]['label']    = 'badge badge-danger';
                    }
                    $Usuarios[$cont]['id_rol']          = (int)$value->ID_ROL;
                    $RolesUser = Administracion::ListarRolesId((int)$value->ID_ROL);
                    if ($RolesUser) {
                        foreach ($RolesUser as $rowRol) {
                            $Usuarios[$cont]['rol'] = $rowRol->NOMBRE_ROL;
                        }
                    } else {
                        $Usuarios[$cont]['rol']          = 'SIN ROL';
                    }
                    $Usuarios[$cont]['id_dependencia']  = (int)$value->ID_DEPENDENCIA;
                    $DependenciasUser = Administracion::ListarDependenciasId((int)$value->ID_ROL);
                    if ($DependenciasUser) {
                        foreach ($DependenciasUser as $rowDependencia) {
                            $Usuarios[$cont]['dependencia'] = $rowDependencia->NOMBRE_DEPENDENCIA;
                        }
                    } else {
                        $Usuarios[$cont]['dependencia'] = 'SIN DEPENDENCIA';
                    }
                    $Usuarios[$cont]['id_administrador']   = (int)$value->ADMINISTRADOR;
                    $cont++;
                }
                return view('administracion.usuarios', ['Estado' => $Estado, 'Roles' => $Roles, 'Dependencias' => $Dependencias, 'Usuarios' => $Usuarios, 'Administrador' => $Administrador]);
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
            if ($RolUser != 1) {
                return Redirect::to('user/home');
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
            if ($RolUser != 1) {
                return Redirect::to('user/home');
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

    public function ConsultaDesfijaciones()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
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
            if ($RolUser != 1) {
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
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                return view('administracion.reporteContacto');
            }
        }
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
            if ($RolUser != 1) {
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
            if ($RolUser != 1) {
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

    public function Paginas()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activa';
                $Estado[2]  = 'Inactiva';
                $ListadoPaginas = Administracion::ListadoPaginas();
                $contP = 0;
                $Paginas = array();
                foreach ($ListadoPaginas as $value) {
                    $Paginas[$contP]['id'] = (int)$value->ID_PAGINA;
                    $Paginas[$contP]['nombre_pagina'] = $value->NOMBRE_PAGINA;
                    $Paginas[$contP]['estado_activo']   = (int)$value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Paginas[$contP]['estado']   = 'ACTIVO EN PÁGINA';
                        $Paginas[$contP]['label']    = 'badge badge-success';
                    } else {
                        $Paginas[$contP]['estado']   = 'INACTIVO EN PÁGINA';
                        $Paginas[$contP]['label']    = 'badge badge-danger';
                    }
                    $contP++;
                }
                $ListadoSubpaginas = Administracion::ListadoSubpaginas();
                $contS = 0;
                $Subpaginas = array();
                foreach ($ListadoSubpaginas as $values) {
                    $Subpaginas[$contS]['id'] = (int)$values->ID_SUBPAGINA;
                    $Subpaginas[$contS]['nombre_subpagina'] = $values->NOMBRE_SUBPAGINA;
                    $Subpaginas[$contS]['estado_activo']   = (int)$values->ESTADO;
                    $State  = (int)$values->ESTADO;
                    if ($State === 1) {
                        $Subpaginas[$contS]['estado']   = 'ACTIVO EN PÁGINA';
                        $Subpaginas[$contS]['label']    = 'badge badge-success';
                    } else {
                        $Subpaginas[$contS]['estado']   = 'INACTIVO EN PÁGINA';
                        $Subpaginas[$contS]['label']    = 'badge badge-danger';
                    }
                    $Subpaginas[$contS]['id_pagina'] = (int)$values->ID_PAGINA;
                    $Page  = (int)$values->ID_PAGINA;
                    $BuscarIdPagina = Administracion::BuscarIdPagina($Page);
                    if ($BuscarIdPagina) {
                        foreach ($BuscarIdPagina as $rows) {
                            $Subpaginas[$contS]['pagina'] = $rows->NOMBRE_PAGINA;
                        }
                    } else {
                        $Subpaginas[$contS]['pagina'] = 'SIN PAGINA PRINCIPAL';
                    }
                    $contS++;
                }
                $ListaPaginas = array();
                $ListaPaginas[''] = 'Seleccione:';
                $ListadoPaginasActivas = Administracion::ListadoPaginasActivas();
                if ($ListadoPaginasActivas) {
                    foreach ($ListadoPaginasActivas as $row) {
                        $ListaPaginas[$row->ID_PAGINA] = $row->NOMBRE_PAGINA;
                    }
                }
                return view('administracion.paginas', ['Estado' => $Estado, 'Paginas' => $Paginas, 'Subpaginas' => $Subpaginas, 'ListaPaginas' => $ListaPaginas]);
            }
        }
    }

    public function Imagenes()
    {
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
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
                    $Imagenes[$cont]['fin_ano'] = (int)$value->FIN_ANO;

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

    public function Preguntas(){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
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

    public function TipoDocumento(){
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 0){
            return Redirect::to('/');
        }else{
            if($RolUser != 1){
                return Redirect::to('user/home');
            }else{
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo';
                $Estado[2]  = 'Inactivo';
                $ListadoTipoDocumentos = Administracion::ListadoTipoDocumentos();
                $cont = 0;
                $TipoDocumentos = array();
                foreach($ListadoTipoDocumentos as $value){
                    $TipoDocumentos[$cont]['id'] = $value->ID_TYPE_DOCUMENT;
                    $TipoDocumentos[$cont]['nombre_documento'] = $value->NOMBRE_DOCUMENTO;
                    $TipoDocumentos[$cont]['estado_activo']   = (int)$value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $TipoDocumentos[$cont]['estado']   = 'ACTIVO EN PÁGINA';
                        $TipoDocumentos[$cont]['label']    = 'badge badge-success';
                    } else {
                        $TipoDocumentos[$cont]['estado']   = 'INACTIVO EN PÁGINA';
                        $TipoDocumentos[$cont]['label']    = 'badge badge-danger';
                    }
                    $TipoDocumentos[$cont]['fecha_cargue']  = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if($value->FECHA_MODIFICACION){
                        $TipoDocumentos[$cont]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    }else{
                        $TipoDocumentos[$cont]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $cont++;
                }
                return view('administracion.tipoDocumento',['Estado' => $Estado,'TipoDocumentos' => $TipoDocumentos]);
            }
        }
    }

    public function TipoGrua(){
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 0){
            return Redirect::to('/');
        }else{
            if($RolUser != 1){
                return Redirect::to('user/home');
            }else{
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo';
                $Estado[2]  = 'Inactivo';
                $ListadoTipoGruas = Administracion::ListadoTipoGruas();
                $cont = 0;
                $TipoGruas = array();
                foreach($ListadoTipoGruas as $value){
                    $TipoGruas[$cont]['id'] = $value->ID_GRUA;
                    $TipoGruas[$cont]['nombre_grua'] = $value->NOMBRE_GRUA;
                    $TipoGruas[$cont]['estado_activo']   = (int)$value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $TipoGruas[$cont]['estado']   = 'ACTIVO EN PÁGINA';
                        $TipoGruas[$cont]['label']    = 'badge badge-success';
                    } else {
                        $TipoGruas[$cont]['estado']   = 'INACTIVO EN PÁGINA';
                        $TipoGruas[$cont]['label']    = 'badge badge-danger';
                    }
                    $TipoGruas[$cont]['fecha_cargue']  = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if($value->FECHA_MODIFICACION){
                        $TipoGruas[$cont]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    }else{
                        $TipoGruas[$cont]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $cont++;
                }
                return view('administracion.tipoGrua',['Estado' => $Estado,'TipoGruas' => $TipoGruas]);
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
                return view('administracion.consultaNotificaciones');
            } else if ($RolUser > 3) {
                return Redirect::to('user/home');
            } else {
                return Redirect::to('user/home');
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

    public function BaseDatos(){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser == 1) {
                return view('administracion.baseDatos');
            } else if ($RolUser > 3) {
                return Redirect::to('user/home');
            } else {
                return Redirect::to('user/home');
            }
        }
    }
}
