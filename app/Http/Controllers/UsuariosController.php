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
use Illuminate\Support\Facades\Response;

class UsuariosController extends Controller
{
    public function actualizarPerfil(Request $request)
    {
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'password'    =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'profileUser')->withErrors($validator)->withInput();
        } else {
            $IdUser        = (int)Session::get('IdUsuario');
            $password = $Password   = hash('sha512', $request->password);
            $NuevaContrasena = Administracion::NuevaContrasena($IdUser, $password);
            if ($NuevaContrasena) {
                $verrors = 'Se actualizo la contraseña con éxito.';
                return Redirect::to($url . 'profileUser')->with('mensaje', $verrors);
            } else {
                $verrors = array();
                array_push($verrors, 'Hubo un problema al actualizar la contraseña.');
                return Redirect::to($url . 'profileUser')->withErrors(['errors' => $verrors])->withInput();
            }
        }
    }

    public function CargarNotificacion(Request $request)
    {
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'notificationfile'    =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'notificaciones')->withErrors($validator)->withInput();
        } else {
            if ($request->file('notificationfile')) {
                $file           = $request->file('notificationfile');
                $archivo        = fopen($file, "rb");
                $arrayArchivo   = file($file);
                $cont           = 0;
                // Administracion::InactivarNotificaciones();
                foreach ($arrayArchivo as $linea_num => $linea) {
                    $datos = explode(";", $linea);
                    $nombre_ciudadano   = utf8_encode(trim($datos[0]));
                    $placa              = utf8_encode(trim($datos[1], ' '));
                    $year               = (int)trim($datos[2]);
                    $Estado             = 1;
                    $CargarNotificacion = Administracion::CargarNotificacion($nombre_ciudadano, $placa, $year, $Estado, $IdUser);
                    if ($CargarNotificacion) {
                        $cont++;
                    } else {
                        $cont--;
                    }
                }
                Administracion::InactivarNotificaciones();
                $verrors = 'Se cargaron ' . $cont . ' notificaciones con éxito.';
                return Redirect::to($url . 'notificaciones')->with('mensaje', $verrors);
            } else {
                $verrors = array();
                array_push($verrors, 'No se reconoce el archivo.');
                return Redirect::to($url . 'notificaciones')->withErrors(['errors' => $verrors])->withInput();
            }
        }
    }

    public function CargarNotificacionManual(Request $request)
    {
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'nombre_ciudadano'  =>  'required',
            'placa'             =>  'required',
            'year_notification' =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'notificaciones')->withErrors($validator)->withInput();
        } else {
            $nombre_ciudadano   = strtoupper($request->nombre_ciudadano);
            $placa              = strtoupper(str_replace('-','',$request->placa));
            $year               = (int)$request->year_notification;
            $Estado             = 1;
            $buscarPlaca = Administracion::ListarNotificacionPlaca($placa);
            if ($buscarPlaca) {
                foreach ($buscarPlaca as $row) {
                    $NombreCiudadano = $row->NOMBRE_CIUDADANO;
                }
                $verrors = array();
                array_push($verrors, 'La placa ' . $placa . ' ya se encuentra registrada y activa para el ciudadano ' . $NombreCiudadano);
                return Redirect::to($url . 'notificaciones')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $CargarNotificacion = Administracion::CargarNotificacion($nombre_ciudadano, $placa, $year, $Estado, $IdUser);
                if ($CargarNotificacion) {
                    $verrors = 'Se cargo con éxito la notificación para ' . $nombre_ciudadano;
                    return Redirect::to($url . 'notificaciones')->with('mensaje', $verrors);
                } else {
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear la notificación');
                    return Redirect::to($url . 'notificaciones')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarNotificacion(Request $request)
    {
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'nombre_ciudadano_upd'  =>  'required',
            'placa_upd'             =>  'required',
            'year_notification_upd' =>  'required',
            'estado_upd' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'notificaciones')->withErrors($validator)->withInput();
        } else {
            $nombre_ciudadano   = strtoupper($request->nombre_ciudadano_upd);
            $placa              = strtoupper($request->placa_upd);
            $year               = (int)$request->year_notification_upd;
            $Estado             = (int)$request->estado_upd;
            $IdNotificacion     = (int)$request->id_notificacion;
            $ActualizarNotificacion = Administracion::ActualizarNotificacion($nombre_ciudadano, $placa, $year, $Estado, $IdUser, $IdNotificacion);
            if ($ActualizarNotificacion) {
                $verrors = 'Se actualizó con éxito la notificación para ' . $nombre_ciudadano;
                return Redirect::to($url . 'notificaciones')->with('mensaje', $verrors);
            } else {
                $verrors = array();
                array_push($verrors, 'Hubo un problema al crear la notificación');
                return Redirect::to($url . 'notificaciones')->withErrors(['errors' => $verrors])->withInput();
            }
        }
    }

    public function InactivarNotificaciones(Request $request)
    {
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d');
        $fechaCreacion  = date('Y-m-d', strtotime($fecha_sistema));
        $Activacion = (int)$request->activacionNotificacion;
        if ($Activacion) {
            if ($Activacion === 2) {
                return Redirect::to($url . 'notificaciones');
            } else {
                $InactivarNotificacion = Administracion::InactivarNotificacionesAll($IdUser);
                if ($InactivarNotificacion) {
                    $verrors = 'Se inactivaron todas las notificaciones';
                    return Redirect::to($url . 'notificaciones')->with('mensaje', $verrors);
                } else {
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear la notificación');
                    return Redirect::to($url . 'notificaciones')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearDesfijacion(Request $request)
    {
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'contenidoDesfijacion'  =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'desfijaciones')->withErrors($validator)->withInput();
        } else {
            $Contenido          = $request->contenidoDesfijacion;
            $CrearDesfijacion = Administracion::CrearDesfijacion($Contenido, $IdUser);
            if ($CrearDesfijacion) {
                $verrors = 'Se creo con exito la desfijación';
                return Redirect::to($url . 'desfijaciones')->with('mensaje', $verrors);
            } else {
                $verrors = array();
                array_push($verrors, 'Hubo un problema al crear la desfijación');
                return Redirect::to($url . 'desfijaciones')->withErrors(['errors' => $verrors])->withInput();
            }
        }
    }

    public function ActualizarDesfijacion(Request $request)
    {
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'contenidoDesfijacion_upd'  =>  'required',
            'estado_upd' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'desfijaciones')->withErrors($validator)->withInput();
        } else {
            $Contenido  = $request->contenidoDesfijacion_upd;
            $Estado     = (int)$request->estado_upd;
            $IdDesfijacion  = (int)$request->id_desfijacion;
            if($Estado === 1){
                $BuscarDesfijacionActiva = Administracion::BuscarDesfijacionActiva($IdDesfijacion);
            }else{
                $BuscarDesfijacionActiva = null;
            }

            if($BuscarDesfijacionActiva){
                $verrors = array();
                array_push($verrors, 'Para activar esta desfijación, debe inactivar la desfijación existente.');
                return Redirect::to($url . 'desfijaciones')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $ActualizarDesfijacion = Administracion::ActualizarDesfijacion($Contenido, $Estado, $IdUser, $IdDesfijacion);
                if ($ActualizarDesfijacion) {
                    $verrors = 'Se actualizó con exito la desfijación';
                    return Redirect::to($url . 'desfijaciones')->with('mensaje', $verrors);
                } else {
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar la desfijación');
                    return Redirect::to($url . 'desfijaciones')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearDocumento(Request $request)
    {
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'nombre_documento'  =>  'required',
            'tipo_documento'  =>  'required',
            'documento' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'documentos')->withErrors($validator)->withInput();
        } else {
            date_default_timezone_set('America/Bogota');
            $fecha_sistema  = date('Y-m-d');
            $fechaCreacion  = date('Y-m-d', strtotime($fecha_sistema));
            $NombreDocumento = strtoupper($request->nombre_documento);
            $TipoDocumento = (int)$request->tipo_documento;
            $BuscarDocumentoNombre = Administracion::BuscarDocumentoNombre($NombreDocumento);
            if ($BuscarDocumentoNombre) {
                $verrors = array();
                array_push($verrors, 'Nombre de documento ya se encuentra creado');
                return Redirect::to($url . 'documentos')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $file = $request->file('documento');
                $extension          = $file->getClientOriginalExtension();
                $name               = $file->getClientOriginalName();
                $nombrearchivo      = pathinfo($name, PATHINFO_FILENAME);
                $nombrearchivo      = UsuariosController::eliminar_tildes($nombrearchivo);
                $filename           = UsuariosController::eliminar_tildes(strtoupper($request->nombre_documento)) . '_' . $fechaCreacion . '.' . $extension;
                $uploadSuccess      = $file->move('documentos', $filename);
                $archivofoto        = file_get_contents($uploadSuccess);
                $NombreFoto         = $filename;
                $Ubicacion          = '../documentos/' . $NombreFoto;
                $CargarDocumento = Administracion::CargarDocumento($NombreDocumento, $Ubicacion, $TipoDocumento, $IdUser);
                if ($CargarDocumento) {
                    $verrors = 'Se creo con éxito el documento ' . strtoupper($request->nombre_documento);
                    return Redirect::to($url . 'documentos')->with('mensaje', $verrors);
                } else {
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear el documento');
                    return Redirect::to($url . 'documentos')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarDocumento(Request $request)
    {
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'nombre_documento_upd'  =>  'required',
            'tipo_documento_upd'  =>  'required',
            'estado_upd' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'documentos')->withErrors($validator)->withInput();
        } else {
            date_default_timezone_set('America/Bogota');
            $fecha_sistema  = date('Y-m-d');
            $fechaCreacion  = date('Y-m-d', strtotime($fecha_sistema));
            $NombreDocumento = strtoupper($request->nombre_documento_upd);
            $TipoDocumento = (int)$request->tipo_documento_upd;
            $Estado = (int)$request->estado_upd;
            $IdDocumento = (int)$request->id_documento;
            $BuscarDocumentoNombre = Administracion::BuscarDocumentoNombreId($NombreDocumento, $IdDocumento);
            $BuscarDocumentoEstado = Administracion::BuscarDocumentoNombreById($IdDocumento, $TipoDocumento);
            if (($Estado === 1) && ($TipoDocumento != 2)) {
                if ($BuscarDocumentoEstado) {
                    $verrors = array();
                    array_push($verrors, 'Solo debe haber un documento activo por el tipo de documento seleccionado');
                    return Redirect::to($url . 'documentos')->withErrors(['errors' => $verrors])->withInput();
                }
            }
            if ($BuscarDocumentoNombre) {
                $verrors = array();
                array_push($verrors, 'Nombre de documento ya se encuentra creado');
                return Redirect::to($url . 'documentos')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $Buscarubicacion = Administracion::BuscarUbicacion($IdDocumento);
                foreach ($Buscarubicacion as $value) {
                    $Documento = str_replace("../documentos/", '', $value->UBICACION);
                    $Path = $value->UBICACION;
                }
                if ($request->file('documento_upd')) {
                    unlink('documentos' . '/' . $Documento);
                    $file          = $request->file('documento_upd');
                    $extension     = $file->getClientOriginalExtension();
                    $name          = $file->getClientOriginalName();
                    $nombrearchivo = pathinfo($name, PATHINFO_FILENAME);
                    $nombrearchivo = UsuariosController::eliminar_tildes($nombrearchivo);
                    $filename      = $NombreDocumento . '_' . $fechaCreacion . '.' . $extension;
                    $uploadSuccess = $file->move('documentos', $filename);
                    $archivofoto   = file_get_contents($uploadSuccess);
                    $NombreFoto    = $filename;
                    $Ubicacion     = '../documentos/' . $NombreFoto;
                } else {
                    $Ubicacion = null;
                }
                $ActualizarDocumento = Administracion::ActualizarDocumento($IdDocumento, $NombreDocumento, $Ubicacion, $TipoDocumento, $IdUser, $Estado);
                if ($ActualizarDocumento) {
                    $verrors = 'Se actualizó con éxito el documento ' . strtoupper($request->nombre_documento_upd);
                    return Redirect::to($url . 'documentos')->with('mensaje', $verrors);
                } else {
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar el documento');
                    return Redirect::to($url . 'documentos')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearImagen(Request $request)
    {
        $url        = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator  = Validator::make($request->all(), [
            'nombre_imagen'  =>  'required',
            'id_pagina' => 'required',
            'imagen' => 'required|max:2048',
            'pie_imagen' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagenes')->withErrors($validator)->withInput();
        } else {
            $Nombre = $request->nombre_imagen;
            $NombreImagen = $request->nombre_imagen . '_' . date("Ymd_Hi");
            $IdPagina = (int)$request->id_pagina;
            $pieImagen = $request->pie_imagen;
            $ActivarTexto = $request->activarTexto;
            $ActivarFinAno = $request->activarFinAno;
            if ($ActivarTexto === 'on') {
                $TextoImagen = str_replace('<p>', '<p id="subTitleImage">', $request->textoImagenForm);
            } else {
                $TextoImagen = null;
            }
            if ($ActivarFinAno === 'on') {
                $FinAno = 1;
            } else {
                $FinAno = 0;
            }
            $OrdenImagen = (int)$request->id_ordenPagina;
            if ($request->id_subpagina) {
                $IdSubpagina = (int)$request->id_subpagina;
                $buscarOrden = Administracion::ListarOrdenSubpagina($OrdenImagen, $IdSubpagina);
            } else {
                $IdSubpagina = 0;
                $buscarOrden = Administracion::ListarOrdenPagina($OrdenImagen, $IdPagina, $FinAno);
            }
            if ($request->id_tipo_grua) {
                $IdGrua = (int)$request->id_tipo_grua;
                $buscarOrdenGrua = Administracion::ListarImagenGrua($IdGrua);
                if(count($buscarOrdenGrua) === 1){
                    $verrors = array();
                    array_push($verrors, 'Solo se permiten una imagen por tipo de grúa');
                    return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                }
                if (($IdGrua % 2) == 0) {
                    $OrdenImagen = 2;
                } else {
                    $OrdenImagen = 1;
                }
            } else {
                $IdGrua = 0;
                $buscarOrdenGrua = null;
            }
            $BuscarImagen = Administracion::ListadoImagenesName($Nombre);
            $BuscarImagenRetiro = null;
            $BuscarImagenTarifas = null;
            $BuscarImagenPago = null;
            $BuscarImagenMonitoreo = null;
            $BuscarImagenMensajes = null;
            $BuscarImagenOrganigrama = null;
            $BuscarImagenNServicios = null;
            $BuscarImagenInicio = null;
            $BuscarImagenFinAno = null;
            if($IdPagina === 1){
                $BuscarImagenInicio = Administracion::ListadoImagenesInicio();
                $BuscarImagenFinAno = Administracion::ListadoImagenesFinAno();
            }
            switch ($IdSubpagina) {
                Case 5:
                    $BuscarImagenOrganigrama = Administracion::ListadoImagenesOrganigrama();
                    break;
                Case 9:
                    $BuscarImagenMensajes = Administracion::ListadoImagenesMensaje();
                    if(count($BuscarImagenMensajes) === 2){
                        $verrors = array();
                        array_push($verrors, 'Solo se permiten dos imagenes para mensaje de texto');
                        return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                    }else if(count($BuscarImagenMensajes) === 0){
                        $OrdenImagen = 1;
                    }else{
                        $OrdenImagen = 2;
                    }
                    break;
                Case 10:
                    $BuscarImagenMonitoreo = Administracion::ListadoImagenesMonitoreo();
                    break;
                Case 12:
                    $BuscarImagenRetiro = Administracion::ListadoImagenesRetiro();
                    break;
                Case 13:
                    $BuscarImagenTarifas = Administracion::ListadoImagenesTarifa();
                    break;
                Case 15:
                    $BuscarImagenPago = Administracion::ListadoImagenesPago();
                    break;
                Case 16:
                    $BuscarImagenNServicios = Administracion::ListadoImagenesNServicios();
                    break;
                default:
                    break;
            }
            if ($BuscarImagenInicio) {
                $verrors = array();
                array_push($verrors, 'Para cargar una nueva imagen de pagina de inicio, debe inactivar la imagen actual');
                return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
            }
            if ($BuscarImagenFinAno) {
                $verrors = array();
                array_push($verrors, 'Para cargar una nueva imagen de pagina de información de horario de fin de año, debe inactivar la imagen actual');
                return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
            }
            if ($BuscarImagenRetiro) {
                $verrors = array();
                array_push($verrors, 'Para cargar una nueva imagen de proceso retiro, debe inactivar la imagen actual');
                return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
            }
            if ($BuscarImagenTarifas) {
                $verrors = array();
                array_push($verrors, 'Para cargar una nueva imagen de tarifas, debe inactivar la imagen actual');
                return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
            }
            if ($BuscarImagenNServicios) {
                $verrors = array();
                array_push($verrors, 'Para cargar una nueva imagen de nuestros servicios, debe inactivar la imagen actual');
                return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
            }
            if ($BuscarImagenPago) {
                $verrors = array();
                array_push($verrors, 'Para cargar una nueva imagen de pago en línea, debe inactivar la imagen actual');
                return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
            }
            if ($BuscarImagenMonitoreo) {
                $verrors = array();
                array_push($verrors, 'Para cargar una nueva imagen de monitoreo de cámaras, debe inactivar la imagen actual');
                return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
            }
            if ($BuscarImagenOrganigrama) {
                $verrors = array();
                array_push($verrors, 'Para cargar una nueva imagen de organigrama, debe inactivar la imagen actual');
                return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
            }
            if ($BuscarImagen) {
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
            } else {
                if ($buscarOrden) {
                    $verrors = array();
                    array_push($verrors, 'Orden de imagen ya se encuentra configurado');
                    return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                } else if ($buscarOrdenGrua) {
                    $verrors = array();
                    array_push($verrors, 'Imagen de grúa ya se encuentra registrada');
                    return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                } else {
                    $carpeta = UsuariosController::CarpetaImagen($IdPagina, $IdSubpagina);
                    if ($request->hasFile('imagen')) {
                        $file          = $request->file('imagen');
                        $extension     = $file->getClientOriginalExtension();
                        if ($extension === 'JPG' || $extension === 'PNG') {
                            $verrors = array();
                            array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                            return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                        } else {
                            $max_ancho = 2287;
                            $max_alto = 810;
                            $tmp = str_replace(" ", "_", $NombreImagen . '.' . $extension);
                            $tmp = str_replace("'", "", $tmp);
                            $tmp = str_replace("-", "_", $tmp);
                            $tmp = str_replace("/", "_", $tmp);
                            $tmp = str_replace("#", "", $tmp);
                            $tmp = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $tmp);
                            $tmp = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $tmp);
                            $tmp = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $tmp);
                            $tmp = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $tmp);
                            $tmp = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $tmp);
                            $tmp = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C'), $tmp);
                            $tmp = str_replace(array(' ', '-', '?', '¿', '#'), array('_', '_', '', '', ''), $tmp);
                            $nom_adj = $tmp;
                            $path1       = $carpeta . $nom_adj;
                            $rutaImagen1 = "img/" . $nom_adj;
                            if ($request->hasFile('imagen1')) {
                                if ($_FILES['imagen1']['type'] == 'image/png' || $_FILES['imagen1']['type'] == 'image/jpg' || $_FILES['imagen1']['type'] == 'image/jpeg') {

                                    $medidasimagen1 = getimagesize($_FILES['imagen1']['tmp_name']);
                                    $nombrearchivo1 = $_FILES['imagen1']['name'];
                                    $rtOriginal1 = $_FILES['imagen1']['tmp_name'];
                                    if ($_FILES['imagen1']['type'] == 'image/png') {
                                        $original1 = imagecreatefrompng($rtOriginal1);
                                    } else if ($_FILES['imagen1']['type'] == 'image/jpg') {
                                        $original1 = imagecreatefromjpeg($rtOriginal1);
                                    } else if ($_FILES['imagen1']['type'] == 'image/jpeg') {
                                        $original1 = imagecreatefromjpeg($rtOriginal1);
                                    }
                                    list($ancho1, $alto1) = getimagesize($rtOriginal1);

                                    $x_ratio1 = $max_ancho / $ancho1;

                                    $y_ratio1 = $max_alto / $alto1;

                                    if (($ancho1 <= $max_ancho) && ($alto1 <= $max_alto)) {
                                        $ancho_final1 = $ancho1;
                                        $alto_final1 = $alto1;
                                    } elseif (($x_ratio1 * $alto1) < $max_alto) {
                                        $alto_final1 = ceil($x_ratio1 * $alto1);
                                        $ancho_final1 = $max_ancho;
                                    } else {
                                        $ancho_final1 = ceil($y_ratio1 * $ancho1);
                                        $alto_final1 = $max_alto;
                                    }
                                    $lienzo1 = imagecreatetruecolor($ancho_final1, $alto_final1);
                                    imagecopyresampled($lienzo1, $original1, 0, 0, 0, 0, $ancho_final1, $alto_final1, $ancho1, $alto1);
                                    if ($_FILES['imagen1']['type'] == 'image/png') {
                                        imagepng($lienzo1, $path1);
                                    } else if ($_FILES['imagen1']['type'] == 'image/jpg') {
                                        imagejpeg($lienzo1, $path1);
                                    } else if ($_FILES['imagen1']['type'] == 'image/jpeg') {
                                        imagejpeg($lienzo1, $path1);
                                    }
                                }
                            }
                            if ($_FILES['imagen']['type'] == 'image/png' || $_FILES['imagen']['type'] == 'image/jpg' || $_FILES['imagen']['type'] == 'image/jpeg') {
                                $medidasimagen = getimagesize($_FILES['imagen']['tmp_name']);
                                $nombrearchivo = $_FILES['imagen']['name'];
                                $rtOriginal = $_FILES['imagen']['tmp_name'];
                                if ($_FILES['imagen']['type'] == 'image/png') {
                                    $original = imagecreatefrompng($rtOriginal);
                                } else if ($_FILES['imagen']['type'] == 'image/jpg') {
                                    $original = imagecreatefromjpeg($rtOriginal);
                                } else if ($_FILES['imagen']['type'] == 'image/jpeg') {
                                    $original = imagecreatefromjpeg($rtOriginal);
                                }
                                list($ancho, $alto) = getimagesize($rtOriginal);
                                $x_ratio = $max_ancho / $ancho;
                                $y_ratio = $max_alto / $alto;
                                if (($ancho <= $max_ancho) && ($alto <= $max_alto)) {
                                    $ancho_final = $ancho;
                                    $alto_final = $alto;
                                } elseif (($x_ratio * $alto) < $max_alto) {
                                    $alto_final = ceil($x_ratio * $alto);
                                    $ancho_final = $max_ancho;
                                } else {
                                    $ancho_final = ceil($y_ratio * $ancho);
                                    $alto_final = $max_alto;
                                }
                                $tmp        = str_replace(array('.jpeg', '.png', '.gif', '.jpg'), array('.webp', '.webp', '.webp', '.webp', '.webp'), $tmp);
                                $nom_adj1   = $tmp;
                                $path       = $carpeta . $nom_adj1;
                                $rutaImagen = 'img/' . $nom_adj1;
                                $image      = imagecreatefromstring(file_get_contents($_FILES['imagen']['tmp_name']));
                                ob_start();
                                $lienzo     = imagecreatetruecolor($ancho_final, $alto_final);
                                imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);
                                $cal = 8;
                                if ($_FILES['imagen']['type'] == 'image/png') {
                                    imagepng($lienzo, $path);
                                } else if ($_FILES['imagen']['type'] == 'image/jpg') {
                                    imagejpeg($lienzo, $path);
                                } else if ($_FILES['imagen1']['type'] == 'image/jpeg') {
                                    imagejpeg($lienzo, $path);
                                }
                                $cont = ob_get_contents();
                                ob_end_clean();
                                imagepalettetotruecolor($image);
                                imagewebp($image, $path, 65);
                                imagedestroy($image);
                            }
                        }
                    }
                    $nom_adj1   = $tmp;
                    $path       = '../' . $carpeta . $nom_adj1;
                    $path1  = '../' . $path1;
                    $CrearImagen = Administracion::CrearImagen($Nombre, $path, $path1, $IdPagina, $IdSubpagina, $IdUser, $TextoImagen, $OrdenImagen, $pieImagen, $IdGrua, $FinAno);
                    if ($CrearImagen) {
                        $verrors = 'Se cargo con éxito la imagen ' . strtoupper($Nombre);
                        return Redirect::to($url . 'imagenes')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al cargar la imagen');
                        return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                    }
                }
            }
        }
    }

    public function ActualizarImagen(Request $request)
    {
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_imagen_upd'  =>  'required',
            'id_pagina_upd' => 'required',
            'pie_imagen_upd' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagenes')->withErrors($validator)->withInput();
        } else {
            $Nombre = $request->nombre_imagen_upd;
            $NombreImagen = $request->nombre_imagen_upd . '_' . date("Ymd_Hi");
            $IdPagina = (int)$request->id_pagina_upd;
            $IdImagen = (int)$request->id_imagen;
            $Estado = (int)$request->estado_upd;
            $pieImagen = $request->pie_imagen_upd;
            $ActivarTexto = $request->activarTextoUpd;
            $OrdenImagen = (int)$request->id_ordenPagina_upd;
            $FinAno = (int)$request->id_fin_ano;
            $BuscarImagen = Administracion::ListadoImagenesNameId($Nombre, $IdImagen);
            if ($BuscarImagen) {
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $buscarInfoImagen = Administracion::ListadoImagenesId($IdImagen);
                foreach ($buscarInfoImagen as $row) {
                    $Nombre_imagen = $row->NOMBRE_IMAGEN;
                    $Ubicacion = str_replace("../", "", $row->UBICACION);
                    $UbicacionJpg = str_replace(array('../', '.webp'), array('', '.jpg'), $row->UBICACION);
                    $UbicacionPng = str_replace(array('../', '.webp'), array('', '.png'), $row->UBICACION);
                    $Subpagina = $row->ID_SUBPAGINA;
                    $Grua  = $row->ID_GRUA;
                    $Pie  = $row->PIE_IMAGEN;
                    $Texto = $row->TEXTO_IMAGEN;
                }
                if ($ActivarTexto === 'on') {
                    $TextoImagen = str_replace('<p>', '<p id="subTitleImage">', $request->textoImagenForm_upd);
                } else {
                    $TextoImagen = $Texto;
                }
                if ($request->id_subpagina_upd) {
                    $IdSubpagina = (int)$request->id_subpagina_upd;
                } else {
                    $IdSubpagina = $Subpagina;
                }
                if ($request->id_tipo_grua_upd) {
                    $IdGrua = (int)$request->id_tipo_grua_upd;
                } else {
                    $IdGrua = $Grua;
                }
                $BuscarImagenRetiro = null;
                $BuscarImagenTarifas = null;
                $BuscarImagenPago = null;
                $BuscarImagenGrua = null;
                $BuscarImagenMonitoreo = null;
                $BuscarImagenOrganigrama = null;
                $BuscarImagenNServicios = null;
                $BuscarImagenInicio = null;
                $BuscarImagenFinAno = null;
                if($IdPagina === 1){
                    $BuscarImagenInicio = Administracion::ListadoImagenesInicioId($IdImagen);
                    $BuscarImagenFinAno = Administracion::ListadoImagenesInicioFinAnoId($IdImagen);
                }
                $buscarOrden = Administracion::ListarOrdenSubpaginaId($OrdenImagen, $IdPagina, $IdSubpagina, $IdImagen, $FinAno);
                switch ($IdSubpagina) {
                    Case 5:
                        $BuscarImagenOrganigrama = Administracion::ListadoImagenesOrganigramaId($IdImagen);
                        break;
                    Case 8:
                        $BuscarImagenGrua = Administracion::ListadoImagenesGruaId($OrdenImagen, $IdGrua, $IdImagen);
                        $buscarOrden = null;
                        break;
                    Case 10:
                        $BuscarImagenMonitoreo = Administracion::ListadoImagenesMonitoreoId($IdImagen);
                        break;
                    Case 12:
                        $BuscarImagenRetiro = Administracion::ListadoImagenesRetiroId($IdImagen);
                        break;
                    Case 13:
                        $BuscarImagenTarifas = Administracion::ListadoImagenesTarifaId($IdImagen);
                        break;
                    Case 15:
                        $BuscarImagenPago = Administracion::ListadoImagenesPagoId($IdImagen);
                        break;
                    Case 16:
                        $BuscarImagenNServicios = Administracion::ListadoImagenesNServiciosId($IdImagen);
                        break;
                    default:
                        break;
                }
                if ($BuscarImagenFinAno) {
                    $verrors = array();
                    array_push($verrors, 'Para activar esta imagen de pagina de incio, debe inactivar la imagen actual');
                    return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                }
                if ($BuscarImagenInicio) {
                    $verrors = array();
                    array_push($verrors, 'Para activar esta imagen de pagina de incio, debe inactivar la imagen actual');
                    return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                }
                if ($BuscarImagenRetiro) {
                    $verrors = array();
                    array_push($verrors, 'Para activar esta imagen de proceso retiro, debe inactivar la imagen actual');
                    return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                }
                if ($BuscarImagenTarifas) {
                    $verrors = array();
                    array_push($verrors, 'Para activar esta imagen de tarifas, debe inactivar la imagen actual');
                    return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                }
                if ($BuscarImagenNServicios) {
                    $verrors = array();
                    array_push($verrors, 'Para activar esta imagen de nuestros servicios, debe inactivar la imagen actual');
                    return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                }
                if ($BuscarImagenPago) {
                    $verrors = array();
                    array_push($verrors, 'Para activar esta imagen de pago en línea, debe inactivar la imagen actual');
                    return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                }
                if ($BuscarImagenMonitoreo) {
                    $verrors = array();
                    array_push($verrors, 'Para activar esta imagen de monitoreo con cámaras, debe inactivar la imagen actual');
                    return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                }
                if ($BuscarImagenOrganigrama) {
                    $verrors = array();
                    array_push($verrors, 'Para activar esta imagen de organigrama, debe inactivar la imagen actual');
                    return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                }
                if ($BuscarImagenGrua) {
                    $verrors = array();
                    array_push($verrors, 'Para activar esta imagen de grúa, debe inactivar la imagen actual');
                    return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                }
                if ($buscarOrden) {
                    $verrors = array();
                    array_push($verrors, 'Orden de imagen ya se encuentra configurado, inactive primero la imagen que esta asignada al orden ' . $OrdenImagen);
                    return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                } else {
                    $carpeta = UsuariosController::CarpetaImagen($IdPagina, $IdSubpagina);
                    if ($request->hasFile('imagen_upd')) {
                        if (file_exists($Ubicacion)) {
                            unlink($Ubicacion);
                        }
                        if (file_exists($UbicacionJpg)) {
                            unlink($UbicacionJpg);
                        }
                        if (file_exists($UbicacionPng)) {
                            unlink($UbicacionPng);
                        }
                        $file          = $request->file('imagen_upd');
                        $extension     = $file->getClientOriginalExtension();
                        if ($extension === 'JPG' || $extension === 'PNG') {
                            $verrors = array();
                            array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                            return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                        } else {
                            $max_ancho = 2287;
                            $max_alto = 810;
                            $tmp = str_replace(" ", "_", $NombreImagen . '.' . $extension);
                            $tmp = str_replace("'", "", $tmp);
                            $tmp = str_replace("-", "_", $tmp);
                            $tmp = str_replace("/", "_", $tmp);
                            $tmp = str_replace("#", "", $tmp);
                            $tmp = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $tmp);
                            $tmp = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $tmp);
                            $tmp = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $tmp);
                            $tmp = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $tmp);
                            $tmp = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $tmp);
                            $tmp = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C'), $tmp);
                            $tmp = str_replace(array(' ', '-', '?', '¿', '#'), array('_', '_', '', '', ''), $tmp);
                            $nom_adj = $tmp;
                            $path1       = $carpeta . $nom_adj;
                            $rutaImagen1 = "img/" . $nom_adj;
                            if ($request->hasFile('imagen2')) {
                                if ($_FILES['imagen2']['type'] == 'image/png' || $_FILES['imagen2']['type'] == 'image/jpg' || $_FILES['imagen2']['type'] == 'image/jpeg') {
                                    $medidasimagen2 = getimagesize($_FILES['imagen2']['tmp_name']);
                                    $nombrearchivo1 = $_FILES['imagen2']['name'];
                                    $rtOriginal1 = $_FILES['imagen2']['tmp_name'];
                                    if ($_FILES['imagen2']['type'] == 'image/png') {
                                        $original1 = imagecreatefrompng($rtOriginal1);
                                    } else if ($_FILES['imagen2']['type'] == 'image/jpg') {
                                        $original1 = imagecreatefromjpeg($rtOriginal1);
                                    } else if ($_FILES['imagen2']['type'] == 'image/jpeg') {
                                        $original1 = imagecreatefromjpeg($rtOriginal1);
                                    }
                                    list($ancho1, $alto1) = getimagesize($rtOriginal1);

                                    $x_ratio1 = $max_ancho / $ancho1;

                                    $y_ratio1 = $max_alto / $alto1;

                                    if (($ancho1 <= $max_ancho) && ($alto1 <= $max_alto)) {
                                        $ancho_final1 = $ancho1;
                                        $alto_final1 = $alto1;
                                    } elseif (($x_ratio1 * $alto1) < $max_alto) {
                                        $alto_final1 = ceil($x_ratio1 * $alto1);
                                        $ancho_final1 = $max_ancho;
                                    } else {
                                        $ancho_final1 = ceil($y_ratio1 * $ancho1);
                                        $alto_final1 = $max_alto;
                                    }
                                    $lienzo1 = imagecreatetruecolor($ancho_final1, $alto_final1);
                                    imagecopyresampled($lienzo1, $original1, 0, 0, 0, 0, $ancho_final1, $alto_final1, $ancho1, $alto1);
                                    if ($_FILES['imagen2']['type'] == 'image/png') {
                                        imagepng($lienzo1, $path1);
                                    } else if ($_FILES['imagen2']['type'] == 'image/jpg') {
                                        imagejpeg($lienzo1, $path1);
                                    } else if ($_FILES['imagen2']['type'] == 'image/jpeg') {
                                        imagejpeg($lienzo1, $path1);
                                    }
                                }
                            }
                            if ($_FILES['imagen_upd']['type'] == 'image/png' || $_FILES['imagen_upd']['type'] == 'image/jpg' || $_FILES['imagen_upd']['type'] == 'image/jpeg') {
                                $medidasimagen_upd = getimagesize($_FILES['imagen_upd']['tmp_name']);
                                $nombrearchivo = $_FILES['imagen_upd']['name'];
                                $rtOriginal = $_FILES['imagen_upd']['tmp_name'];
                                if ($_FILES['imagen_upd']['type'] == 'image/png') {
                                    $original = imagecreatefrompng($rtOriginal);
                                } else if ($_FILES['imagen_upd']['type'] == 'image/jpg') {
                                    $original = imagecreatefromjpeg($rtOriginal);
                                } else if ($_FILES['imagen_upd']['type'] == 'image/jpeg') {
                                    $original = imagecreatefromjpeg($rtOriginal);
                                }
                                list($ancho, $alto) = getimagesize($rtOriginal);
                                $x_ratio = $max_ancho / $ancho;
                                $y_ratio = $max_alto / $alto;
                                if (($ancho <= $max_ancho) && ($alto <= $max_alto)) {
                                    $ancho_final = $ancho;
                                    $alto_final = $alto;
                                } elseif (($x_ratio * $alto) < $max_alto) {
                                    $alto_final = ceil($x_ratio * $alto);
                                    $ancho_final = $max_ancho;
                                } else {
                                    $ancho_final = ceil($y_ratio * $ancho);
                                    $alto_final = $max_alto;
                                }
                                $tmp        = str_replace(array('.jpeg', '.png', '.gif', '.jpg'), array('.webp', '.webp', '.webp', '.webp', '.webp'), $tmp);
                                $nom_adj1   = $tmp;
                                $path       = $carpeta . $nom_adj1;
                                $rutaImagen = 'img/' . $nom_adj1;
                                $image      = imagecreatefromstring(file_get_contents($_FILES['imagen_upd']['tmp_name']));
                                ob_start();
                                $lienzo     = imagecreatetruecolor($ancho_final, $alto_final);
                                imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);
                                $cal = 8;
                                if ($_FILES['imagen_upd']['type'] == 'image/png') {
                                    imagepng($lienzo, $path);
                                } else if ($_FILES['imagen_upd']['type'] == 'image/jpg') {
                                    imagejpeg($lienzo, $path);
                                } else if ($_FILES['imagen_upd']['type'] == 'image/jpeg') {
                                    imagejpeg($lienzo, $path);
                                }
                                $cont = ob_get_contents();
                                ob_end_clean();
                                imagepalettetotruecolor($image);
                                imagewebp($image, $path, 65);
                                imagedestroy($image);
                            }
                            $nom_adj1   = $tmp;
                            $path       = '../' . $carpeta . $nom_adj1;
                            $path1       = '../' . $path1;
                        }
                    } else {
                        $path   = null;
                        $path1  = null;
                    }

                    $ActualizarImagen = Administracion::ActualizarImagen($Nombre, $path, $path1, $IdPagina, $IdSubpagina, $IdUser, $Estado, $IdImagen, $TextoImagen, $OrdenImagen, $pieImagen, $IdGrua, $FinAno);
                    if ($ActualizarImagen) {
                        $verrors = 'Se actualizó con éxito la imagen ' . strtoupper($Nombre);
                        return Redirect::to($url . 'imagenes')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al actualizar la imagen');
                        return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                    }
                }
            }
        }
    }

    public static function CarpetaImagen($IdPagina, $IdSubpagina)
    {
        $carpeta = 'images/';
        $complemento = null;
        if ($IdSubpagina != 0) {
            switch ($IdSubpagina) {
                case 1:
                    $complemento = 'atencion_ciudadano/contactenos/';
                    break;
                case 2:
                    $complemento = 'atencion_ciudadano/notificaciones/';
                    break;
                case 3:
                    $complemento = 'gyp/normatividad/';
                    break;
                case 4:
                    $complemento = 'gyp/nosotros/';
                    break;
                case 5:
                    $complemento = 'gyp/organigrama/';
                    break;
                case 6:
                    $complemento = 'servicios/beneficios/';
                    break;
                case 7:
                    $complemento = 'servicios/custodia_segura/';
                    break;
                case 8:
                    $complemento = 'servicios/gruas/';
                    break;
                case 9:
                    $complemento = 'servicios/mensajes/';
                    break;
                case 10:
                    $complemento = 'servicios/monitoreo_camaras/';
                    break;
                case 11:
                    $complemento = 'servicios/proceso_inmovilizacion/';
                    break;
                case 12:
                    $complemento = 'servicios/proceso_retiro/';
                    break;
                case 13:
                    $complemento = 'servicios/tarifas/';
                    break;
                case 14:
                    $complemento = 'tramites/consulta_liquidacion/';
                    break;
                case 15:
                    $complemento = 'tramites/pago_linea/';
                    break;
                case 16:
                    $complemento = 'servicios/nuestros_servicios/';
                    break;
            }
        } else {
            switch ($IdPagina) {
                case 1:
                    $complemento = 'home/';
                    break;
                case 6:
                    $complemento = 'trabajo/';
                    break;
            }
        }
        $carpetaCargue = $carpeta . $complemento;
        return $carpetaCargue;
    }

    public static function eliminar_tildes($nombrearchivo)
    {

        $cadena = $nombrearchivo;
        $cadena = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $cadena
        );

        $cadena = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $cadena
        );

        $cadena = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $cadena
        );

        $cadena = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $cadena
        );

        $cadena = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $cadena
        );

        $cadena = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $cadena
        );

        $cadena = str_replace(
            array(' ', '_', '?', '¿', '#'),
            array('_', '_', '', '', ''),
            $cadena
        );

        return $cadena;
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

    public function CrearPregunta(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'titulo_pregunta'  =>  'required',
            'contenidoPregunta'  =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'preguntas')->withErrors($validator)->withInput();
        } else {
            $tituloPregunta = $request->titulo_pregunta;
            $contenido      = $request->contenidoPregunta;
            $consultaPregunta = Administracion::ConsultaTituloPregunta($tituloPregunta);
            if($consultaPregunta){
                $verrors = array();
                array_push($verrors, 'Título de pregunta ya se encuentra creado');
                return Redirect::to($url.'preguntas')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $crearPregunta = Administracion::CrearPregunta($tituloPregunta, $contenido, $IdUser);
                if($crearPregunta){
                    $verrors = 'Se cargo con éxito la pregunta ' . $tituloPregunta;
                    return Redirect::to($url . 'preguntas')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear la pregunta');
                    return Redirect::to($url . 'preguntas')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarPregunta(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'titulo_pregunta_upd'  =>  'required',
            'contenidoPregunta_upd'  =>  'required',
            'estado_upd' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'preguntas')->withErrors($validator)->withInput();
        } else {
            $tituloPregunta = $request->titulo_pregunta_upd;
            $contenido      = $request->contenidoPregunta_upd;
            $estado         = $request->estado_upd;
            $idPregunta     = $request->id_pregunta;
            $consultaPregunta = Administracion::ConsultaTituloPreguntaId($tituloPregunta, $idPregunta);
            if($consultaPregunta){
                $verrors = array();
                array_push($verrors, 'Título de pregunta ya se encuentra creado');
                return Redirect::to($url.'preguntas')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $actualizarPregunta = Administracion::ActualizarPregunta($idPregunta, $tituloPregunta, $contenido, $estado, $IdUser);
                if($actualizarPregunta){
                    $verrors = 'Se actualizó con éxito la pregunta ' . $tituloPregunta;
                    return Redirect::to($url . 'preguntas')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar la pregunta');
                    return Redirect::to($url . 'preguntas')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearTarifaP(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'tipo_vehiculo'  =>  'required',
            'valor_tarifa_1'  =>  'required',
            'valor_tarifa_2'  =>  'required',
            'valor_tarifa_3'  =>  'required',
            'valor_tarifa_4'  =>  'required',
            'valor_tarifa_5'  =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'tarifasP')->withErrors($validator)->withInput();
        } else {
            $tipoVehiculo   = $request->tipo_vehiculo;
            $valorTarifa1   = $request->valor_tarifa_1;
            $valorTarifa2   = $request->valor_tarifa_2;
            $valorTarifa3   = $request->valor_tarifa_3;
            $valorTarifa4   = $request->valor_tarifa_4;
            $valorTarifa5   = $request->valor_tarifa_5;
            $BuscarNombreTarifa = Administracion::BuscarNombreTarifa($tipoVehiculo);
            if($BuscarNombreTarifa){
                foreach($BuscarNombreTarifa as $row){
                    $NombreTarifa = $row->NOMBRE_TARIFA;
                }
            }
            $year = $request->year_tarifa;
            $consultaTarifaP = Administracion::ConsultaTarifa($tipoVehiculo, 1, $year);
            if($consultaTarifaP){
                $verrors = array();
                array_push($verrors, 'Tarifas para '.$NombreTarifa.' ya se encuentran creadas para el año '.$year);
                return Redirect::to($url.'tarifasP')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $crearTarifa = Administracion::CrearTarifa($tipoVehiculo, 1, $valorTarifa1, $valorTarifa2, $valorTarifa3, $valorTarifa4, $valorTarifa5, null, $IdUser, $year);
                if($crearTarifa){
                    $verrors = 'Se cargo con éxito las tarifas para ' . $NombreTarifa.' del año '.$year;
                    return Redirect::to($url . 'tarifasP')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear las tarifas para '.$NombreTarifa);
                    return Redirect::to($url . 'tarifasP')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarTarifaP(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'tarifaP_upd'  =>  'required',
            'valor_tarifa_1_upd'  =>  'required',
            'valor_tarifa_2_upd'  =>  'required',
            'valor_tarifa_3_upd'  =>  'required',
            'valor_tarifa_4_upd'  =>  'required',
            'valor_tarifa_5_upd'  =>  'required',
            'estado_tarifaP_upd'  =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'tarifasP')->withErrors($validator)->withInput();
        } else {
            $tipoVehiculo   = $request->tarifaP_upd;
            $valorTarifa1   = $request->valor_tarifa_1_upd;
            $valorTarifa2   = $request->valor_tarifa_2_upd;
            $valorTarifa3   = $request->valor_tarifa_3_upd;
            $valorTarifa4   = $request->valor_tarifa_4_upd;
            $valorTarifa5   = $request->valor_tarifa_5_upd;
            $Estado         = $request->estado_tarifaP_upd;
            $idTarifa       = $request->id_tarifaP;
            $yearTarifa     = $request->year_tarifa_upd;
            $BuscarNombreTarifa = Administracion::BuscarNombreTarifa($tipoVehiculo);
            if($BuscarNombreTarifa){
                foreach($BuscarNombreTarifa as $row){
                    $NombreTarifa = $row->NOMBRE_TARIFA;
                }
            }
            $year = $yearTarifa;
            $consultaTarifaP = Administracion::ConsultaTarifaUpd($tipoVehiculo, 1, $year, $idTarifa);
            $consultaTarifaP1 = Administracion::ConsultaTarifaUpd1($tipoVehiculo, 2, $year, $idTarifa);
            if($consultaTarifaP){
                $verrors = array();
                array_push($verrors, 'Tarifas para '.$NombreTarifa.' ya se encuentran creadas para el año '.$year);
                return Redirect::to($url.'tarifasP')->withErrors(['errors' => $verrors])->withInput();
            }else if($consultaTarifaP1){
                foreach($consultaTarifaP1 as $row){
                    $yearTarifa = $row->YEAR;
                }
                $verrors = array();
                array_push($verrors, 'Tarifa para '.$NombreTarifa.' ya se encuentra creada para el año '.$yearTarifa.', para activar esta tarifa, por favor inactive la tarifa del año '.$yearTarifa);
                return Redirect::to($url.'tarifasP')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $actualizarTarifa = Administracion::ActualizarTarifa($idTarifa, $tipoVehiculo, 1, $valorTarifa1, $valorTarifa2, $valorTarifa3, $valorTarifa4, $valorTarifa5, null, $IdUser, $Estado, $yearTarifa);
                if($actualizarTarifa){
                    $verrors = 'Se actualizo con éxito las tarifas para ' . $NombreTarifa.' del año '.$year;
                    return Redirect::to($url . 'tarifasP')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar las tarifas para '.$NombreTarifa);
                    return Redirect::to($url . 'tarifasP')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearTarifaG(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'tipo_vehiculo'  =>  'required',
            'valor_tarifa_unica'  =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'tarifasG')->withErrors($validator)->withInput();
        } else {
            $tipoVehiculo   = $request->tipo_vehiculo;
            $valorTarifa    = $request->valor_tarifa_unica;
            $BuscarNombreTarifa = Administracion::BuscarNombreTarifa($tipoVehiculo);
            if($BuscarNombreTarifa){
                foreach($BuscarNombreTarifa as $row){
                    $NombreTarifa = $row->NOMBRE_TARIFA;
                }
            }
            $year = $request->year_tarifa;
            $consultaTarifaG = Administracion::ConsultaTarifa($tipoVehiculo, 2, $year);
            if($consultaTarifaG){
                $verrors = array();
                array_push($verrors, 'Tarifas para '.$NombreTarifa.' ya se encuentran creadas para el año '.$year);
                return Redirect::to($url.'tarifasG')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $crearTarifa = Administracion::CrearTarifa($tipoVehiculo, 2, null, null, null, null, null, $valorTarifa, $IdUser, $year);
                if($crearTarifa){
                    $verrors = 'Se cargo con éxito la tarifa para ' . $NombreTarifa.' del año '.$year;
                    return Redirect::to($url . 'tarifasG')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear la tarifa para '.$NombreTarifa);
                    return Redirect::to($url . 'tarifasG')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarTarifaG(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'tarifaG_upd'  =>  'required',
            'valor_tarifa_unica_upd'  =>  'required',
            'estado_tarifaG_upd'  =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'tarifasG')->withErrors($validator)->withInput();
        } else {
            $tipoVehiculo   = $request->tarifaG_upd;
            $valorTarifa    = $request->valor_tarifa_unica_upd;
            $Estado         = $request->estado_tarifaG_upd;
            $idTarifa       = $request->id_tarifaG;
            $yearTarifa     = $request->year_tarifa_upd;
            $BuscarNombreTarifa = Administracion::BuscarNombreTarifa($tipoVehiculo);
            if($BuscarNombreTarifa){
                foreach($BuscarNombreTarifa as $row){
                    $NombreTarifa = $row->NOMBRE_TARIFA;
                }
            }
            $year = $yearTarifa;
            $consultaTarifaG = Administracion::ConsultaTarifaUpd($tipoVehiculo, 2, $year, $idTarifa);
            $consultaTarifaG1 = Administracion::ConsultaTarifaUpd1($tipoVehiculo, 2, $year, $idTarifa);
            if($consultaTarifaG){
                $verrors = array();
                array_push($verrors, 'Tarifa para '.$NombreTarifa.' ya se encuentra creada para el año '.$year);
                return Redirect::to($url.'tarifasG')->withErrors(['errors' => $verrors])->withInput();
            }else if($consultaTarifaG1){
                foreach($consultaTarifaG1 as $row){
                    $yearTarifa = $row->YEAR;
                }
                $verrors = array();
                array_push($verrors, 'Tarifa para '.$NombreTarifa.' ya se encuentra creada para el año '.$yearTarifa.', para activar esta tarifa, por favor inactive la tarifa del año '.$yearTarifa);
                return Redirect::to($url.'tarifasG')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $actualizarTarifa = Administracion::ActualizarTarifa($idTarifa, $tipoVehiculo, 2, null, null, null, null, null, $valorTarifa, $IdUser, $Estado, $yearTarifa);
                if($actualizarTarifa){
                    $verrors = 'Se actualizo con éxito la tarifa para ' . $NombreTarifa.' del año '.$year;
                    return Redirect::to($url . 'tarifasG')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar la tarifa para '.$NombreTarifa);
                    return Redirect::to($url . 'tarifasG')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }
}