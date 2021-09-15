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
                return Redirect::to($url.'profileUser')->withErrors(['errors' => $verrors])->withInput();
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
                return Redirect::to($url.'notificaciones')->withErrors(['errors' => $verrors])->withInput();
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
                    return Redirect::to($url.'notificaciones')->withErrors(['errors' => $verrors])->withInput();
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
                return Redirect::to($url.'notificaciones')->withErrors(['errors' => $verrors])->withInput();
            }
        }
    }

    public function InactivarNotificaciones(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d');
        $fechaCreacion  = date('Y-m-d', strtotime($fecha_sistema));
        $Activacion = (int)$request->activacionNotificacion;
        if($Activacion){
            if($Activacion === 2){
                return Redirect::to($url.'notificaciones');
            }else{
                $InactivarNotificacion = Administracion::InactivarNotificacionesAll($IdUser);
                if($InactivarNotificacion){
                    $verrors = 'Se inactivaron todas las notificaciones';
                    return Redirect::to($url.'notificaciones')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear la notificación');
                    return Redirect::to($url.'notificaciones')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearDesfijacion(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'contenidoDesfijacion'  =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'desfijaciones')->withErrors($validator)->withInput();
        }else{
            $Contenido          = $request->contenidoDesfijacion;
            $CrearDesfijacion = Administracion::CrearDesfijacion($Contenido,$IdUser);
            if($CrearDesfijacion){
                $verrors = 'Se creo con exito la desfijación';
                return Redirect::to($url.'desfijaciones')->with('mensaje', $verrors);
            }else{
                $verrors = array();
                array_push($verrors, 'Hubo un problema al crear la desfijación');
                return Redirect::to($url.'desfijaciones')->withErrors(['errors' => $verrors])->withInput();
            }
        }
    }

    public function ActualizarDesfijacion(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'contenidoDesfijacion_upd'  =>  'required',
            'estado_upd' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'desfijaciones')->withErrors($validator)->withInput();
        }else{
            $Contenido  = $request->contenidoDesfijacion_upd;
            $Estado     = (int)$request->estado_upd;
            $IdDesfijacion  = (int)$request->id_desfijacion;
            $ActualizarDesfijacion = Administracion::ActualizarDesfijacion($Contenido,$Estado,$IdUser,$IdDesfijacion);
            if($ActualizarDesfijacion){
                $verrors = 'Se actualizó con exito la desfijación';
                return Redirect::to($url.'desfijaciones')->with('mensaje', $verrors);
            }else{
                $verrors = array();
                array_push($verrors, 'Hubo un problema al actualizar la desfijación');
                return Redirect::to($url.'desfijaciones')->withErrors(['errors' => $verrors])->withInput();
            }
        }
    }

    public function CrearDocumento(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'nombre_documento'  =>  'required',
            'tipo_documento'  =>  'required',
            'documento' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'documentos')->withErrors($validator)->withInput();
        }else{
            date_default_timezone_set('America/Bogota');
            $fecha_sistema  = date('Y-m-d');
            $fechaCreacion  = date('Y-m-d', strtotime($fecha_sistema));
            $NombreDocumento = strtoupper($request->nombre_documento);
            $TipoDocumento = (int)$request->tipo_documento;
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
                $CargarDocumento = Administracion::CargarDocumento($NombreDocumento,$Ubicacion,$TipoDocumento,$IdUser);
                if($CargarDocumento){
                    $verrors = 'Se creo con éxito el documento '.strtoupper($request->nombre_documento);
                    return Redirect::to($url.'documentos')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear el documento');
                    return Redirect::to($url.'documentos')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarDocumento(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        $validator = Validator::make($request->all(), [
            'nombre_documento_upd'  =>  'required',
            'tipo_documento_upd'  =>  'required',
            'estado_upd' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'documentos')->withErrors($validator)->withInput();
        }else{
            date_default_timezone_set('America/Bogota');
            $fecha_sistema  = date('Y-m-d');
            $fechaCreacion  = date('Y-m-d', strtotime($fecha_sistema));
            $NombreDocumento = UsuariosController::eliminar_tildes(strtoupper($request->nombre_documento_upd));
            $TipoDocumento = (int)$request->tipo_documento_upd;
            $Estado = (int)$request->estado_upd;
            $IdDocumento = (int)$request->id_documento;
            $BuscarDocumentoNombre = Administracion::BuscarDocumentoNombreId($NombreDocumento,$IdDocumento);
            if($BuscarDocumentoNombre){
                $verrors = array();
                array_push($verrors, 'Nombre de documento ya se encuentra creado');
                return Redirect::to($url.'documentos')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $Buscarubicacion = Administracion::BuscarUbicacion($IdDocumento);
                foreach($Buscarubicacion as $value){
                    $Documento = str_replace("../documentos/",'',$value->UBICACION);
                    $Path = $value->UBICACION;
                }
                if($request->file('documento_upd')){
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
                $ActualizarDocumento = Administracion::ActualizarDocumento($IdDocumento,$NombreDocumento,$Ubicacion,$TipoDocumento,$IdUser,$Estado);
                if($ActualizarDocumento){
                    $verrors = 'Se actualizó con éxito el documento '.strtoupper($request->nombre_documento_upd);
                    return Redirect::to($url.'documentos')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar el documento');
                    return Redirect::to($url.'documentos')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearImagen(Request $request){
        $url        = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator  = Validator::make($request->all(), [
            'nombre_imagen'  =>  'required',
            'id_pagina' => 'required',
            'imagen' => 'required|max:2048'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'imagenes')->withErrors($validator)->withInput();
        }else{
            $Nombre = $request->nombre_imagen;
            $NombreImagen = $request->nombre_imagen.'_'.date("Ymd_Hi");
            $IdPagina = (int)$request->id_pagina;
            if($request->id_subpagina){
                $IdSubpagina = (int)$request->id_subpagina;
            }else{
                $IdSubpagina = 0;
            }
            $BuscarImagen = Administracion::ListadoImagenesName($Nombre);
            if($BuscarImagen){
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url.'imagenes')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $carpeta = UsuariosController::CarpetaImagen($IdPagina,$IdSubpagina);
                if ($request->hasFile('imagen')){
                    $file          = $request->file('imagen');
                    $extension     = $file->getClientOriginalExtension();
                    $max_ancho = 2287;
                    $max_alto = 810;
                    $tmp = str_replace(" ", "_", $NombreImagen.'.'.$extension);
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
                    $path1       = $carpeta.$nom_adj;
                    $rutaImagen1 = "img/" . $nom_adj;
                    if ($request->hasFile('imagen1')){
                        if ($_FILES['imagen1']['type'] == 'image/png' || $_FILES['imagen1']['type'] == 'image/jpg' || $_FILES['imagen1']['type'] == 'image/jpeg') {

                            $medidasimagen1 = getimagesize($_FILES['imagen1']['tmp_name']);
                            $nombrearchivo1 = $_FILES['imagen1']['name'];
                            $rtOriginal1 = $_FILES['imagen1']['tmp_name'];
                            if($_FILES['imagen1']['type'] == 'image/png') {
                                $original1 = imagecreatefrompng($rtOriginal1);
                            }else if($_FILES['imagen1']['type'] == 'image/jpg') {
                                $original1 = imagecreatefromjpeg($rtOriginal1);
                            }else if($_FILES['imagen1']['type'] == 'image/jpeg') {
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
                            if($_FILES['imagen1']['type'] == 'image/png') {
                                imagepng($lienzo1, $path1);
                            }else if($_FILES['imagen1']['type'] == 'image/jpg') {
                                imagejpeg($lienzo1, $path1);
                            }else if($_FILES['imagen1']['type'] == 'image/jpeg') {
                                imagejpeg($lienzo1, $path1);
                            }

                        }
                    }
                    if ($_FILES['imagen']['type'] == 'image/png' || $_FILES['imagen']['type'] == 'image/jpg' || $_FILES['imagen1']['type'] == 'image/jpeg') {
                        $medidasimagen = getimagesize($_FILES['imagen']['tmp_name']);
                        $nombrearchivo = $_FILES['imagen']['name'];
                        $rtOriginal = $_FILES['imagen']['tmp_name'];
                        if($_FILES['imagen']['type'] == 'image/png') {
                            $original = imagecreatefrompng($rtOriginal);
                        } else if($_FILES['imagen']['type'] == 'image/jpg') {
                            $original = imagecreatefromjpeg($rtOriginal);
                        }else if($_FILES['imagen']['type'] == 'image/jpeg') {
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
                        $path       = $carpeta.$nom_adj1;
                        $rutaImagen = 'img/' . $nom_adj1;
                        $image      = imagecreatefromstring(file_get_contents($_FILES['imagen']['tmp_name']));
                        ob_start();
                        $lienzo     = imagecreatetruecolor($ancho_final, $alto_final);
                        imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);
                        $cal = 8;
                        if($_FILES['imagen']['type'] == 'image/png') {
                            imagepng($lienzo, $path);
                        } else if($_FILES['imagen']['type'] == 'image/jpg') {
                            imagejpeg($lienzo, $path);
                        }else if($_FILES['imagen1']['type'] == 'image/jpeg') {
                            imagejpeg($lienzo, $path);
                        }
                        $cont = ob_get_contents();
                        ob_end_clean();
                        imagepalettetotruecolor($image);
                        imagewebp($image,$path,65);
                        imagedestroy($image);
                    }
                }
                $nom_adj1   = $tmp;
                $path       = '../'.$carpeta.$nom_adj1;
                $CrearImagen = Administracion::CrearImagen($Nombre,$path,$IdPagina,$IdSubpagina,$IdUser);
                if($CrearImagen){
                    $verrors = 'Se cargo con éxito la imagen '.strtoupper($Nombre);
                    return Redirect::to($url.'imagenes')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al cargar la imagen');
                    return Redirect::to($url.'imagenes')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarImagen(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_imagen_upd'  =>  'required',
            'id_pagina_upd' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'imagenes')->withErrors($validator)->withInput();
        }else{
            $Nombre = $request->nombre_imagen_upd;
            $NombreImagen = $request->nombre_imagen_upd.'_'.date("Ymd_Hi");
            $IdPagina = (int)$request->id_pagina_upd;
            $IdImagen = (int)$request->id_imagen;
            $Estado = (int)$request->estado_upd;
            $BuscarImagen = Administracion::ListadoImagenesNameId($Nombre,$IdImagen);
            if($BuscarImagen){
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url.'imagenes')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $buscarInfoImagen = Administracion::ListadoImagenesId($IdImagen);
                foreach($buscarInfoImagen as $row){
                    $Nombre_imagen = $row->NOMBRE_IMAGEN;
                    $Ubicacion = str_replace("../", "",$row->UBICACION);
                    $UbicacionJpg = str_replace(array('../','.webp'),array('','.jpg'),$row->UBICACION);
                    $UbicacionPng = str_replace(array('../','.webp'),array('','.png'),$row->UBICACION);
                    $Subpagina = $row->ID_SUBPAGINA;
                }
                if($request->id_subpagina_upd){
                    $IdSubpagina = (int)$request->id_subpagina_upd;
                }else{
                    $IdSubpagina = $Subpagina;
                }
                $carpeta = UsuariosController::CarpetaImagen($IdPagina,$IdSubpagina);
                if($request->hasFile('imagen_upd')){
                    if(file_exists($Ubicacion)){
                        unlink($Ubicacion);
                    }
                    if(file_exists($UbicacionJpg)){
                        unlink($UbicacionJpg);
                    }
                    if(file_exists($UbicacionPng)){
                        unlink($UbicacionPng);
                    }
                    $file          = $request->file('imagen_upd');
                    $extension     = $file->getClientOriginalExtension();
                    $max_ancho = 2287;
                    $max_alto = 810;
                    $tmp = str_replace(" ", "_", $NombreImagen.'.'.$extension);
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
                    $path1       = $carpeta.$nom_adj;
                    $rutaImagen1 = "img/" . $nom_adj;
                    if ($request->hasFile('imagen2')){
                        if ($_FILES['imagen2']['type'] == 'image/png' || $_FILES['imagen2']['type'] == 'image/jpg' || $_FILES['imagen2']['type'] == 'image/jpeg') {
                            $medidasimagen2 = getimagesize($_FILES['imagen2']['tmp_name']);
                            $nombrearchivo1 = $_FILES['imagen2']['name'];
                            $rtOriginal1 = $_FILES['imagen2']['tmp_name'];
                            if($_FILES['imagen2']['type'] == 'image/png') {
                                $original1 = imagecreatefrompng($rtOriginal1);
                            }else if($_FILES['imagen2']['type'] == 'image/jpg') {
                                $original1 = imagecreatefromjpeg($rtOriginal1);
                            }else if($_FILES['imagen2']['type'] == 'image/jpeg') {
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
                            if($_FILES['imagen2']['type'] == 'image/png') {
                                imagepng($lienzo1, $path1);
                            }else if($_FILES['imagen2']['type'] == 'image/jpg') {
                                imagejpeg($lienzo1, $path1);
                            }else if($_FILES['imagen2']['type'] == 'image/jpeg') {
                                imagejpeg($lienzo1, $path1);
                            }

                        }
                    }
                    if ($_FILES['imagen_upd']['type'] == 'image/png' || $_FILES['imagen_upd']['type'] == 'image/jpg' || $_FILES['imagen_upd']['type'] == 'image/jpeg') {
                        $medidasimagen_upd = getimagesize($_FILES['imagen_upd']['tmp_name']);
                        $nombrearchivo = $_FILES['imagen_upd']['name'];
                        $rtOriginal = $_FILES['imagen_upd']['tmp_name'];
                        if($_FILES['imagen_upd']['type'] == 'image/png') {
                            $original = imagecreatefrompng($rtOriginal);
                        } else if($_FILES['imagen_upd']['type'] == 'image/jpg') {
                            $original = imagecreatefromjpeg($rtOriginal);
                        }else if($_FILES['imagen_upd']['type'] == 'image/jpeg') {
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
                        $path       = $carpeta.$nom_adj1;
                        $rutaImagen = 'img/' . $nom_adj1;
                        $image      = imagecreatefromstring(file_get_contents($_FILES['imagen_upd']['tmp_name']));
                        ob_start();
                        $lienzo     = imagecreatetruecolor($ancho_final, $alto_final);
                        imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $ancho_final, $alto_final, $ancho, $alto);
                        $cal = 8;
                        if($_FILES['imagen_upd']['type'] == 'image/png') {
                            imagepng($lienzo, $path);
                        } else if($_FILES['imagen_upd']['type'] == 'image/jpg') {
                            imagejpeg($lienzo, $path);
                        }else if($_FILES['imagen_upd']['type'] == 'image/jpeg') {
                            imagejpeg($lienzo, $path);
                        }
                        $cont = ob_get_contents();
                        ob_end_clean();
                        imagepalettetotruecolor($image);
                        imagewebp($image,$path,65);
                        imagedestroy($image);
                    }
                    $nom_adj1   = $tmp;
                    $path       = '../'.$carpeta.$nom_adj1;
                }else{
                    $path       = null;
                }

                $ActualizarImagen = Administracion::ActualizarImagen($Nombre,$path,$IdPagina,$IdSubpagina,$IdUser,$Estado,$IdImagen);
                if($ActualizarImagen){
                    $verrors = 'Se actualizó con éxito la imagen '.strtoupper($Nombre);
                    return Redirect::to($url.'imagenes')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar la imagen');
                    return Redirect::to($url.'imagenes')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public static function CarpetaImagen($IdPagina,$IdSubpagina){
        $carpeta = 'images/';
        $complemento = null;
        if($IdSubpagina != 0){
            switch($IdSubpagina){
                Case 1: $complemento = 'servicios/gruas/';
                        break;
                Case 2: $complemento = 'servicios/beneficios/';
                        break;
                Case 3: $complemento = 'atencion_ciudadano/contactenos/';
                        break;
                Case 4: $complemento = 'atencion_ciudadano/notificaciones/';
                        break;
                Case 5: $complemento = 'gyp/normatividad/';
                        break;
                Case 6: $complemento = 'gyp/nosotros/';
                        break;
                Case 7: $complemento = 'gyp/organigrama/';
                        break;
                Case 8: $complemento = 'servicios/custodia_segura/';
                        break;
                Case 9: $complemento = 'servicios/nuestros_servicios/';
                        break;
                Case 10: $complemento = 'servicios/proceso_inmovilizacion/';
                        break;
                Case 11: $complemento = 'servicios/proceso_retiro/';
                        break;
                Case 12: $complemento = 'servicios/tarifas/';
                        break;
                Case 13: $complemento = 'servicios/mensajes/';
                        break;
                Case 14: $complemento = 'servicios/monitoreo_camaras/';
                        break;
                Case 15: $complemento = 'tramites/consulta_liquidacion/';
                        break;
                Case 16: $complemento = 'tramites/pago_linea/';
                        break;
                Case 17: $complemento = 'tramites/puntos_atencion/';
                        break;
            }
        }else{
            switch($IdPagina){
                Case 1: $complemento = 'home/';
                        break;
                Case 6: $complemento = 'trabajo/';
                        break;
            }
        }
        $carpetaCargue = $carpeta.$complemento;
        return $carpetaCargue;
    }

    public static function eliminar_tildes($nombrearchivo){

        $cadena = $nombrearchivo;
        $cadena = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $cadena
        );

        $cadena = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $cadena );

        $cadena = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $cadena );

        $cadena = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $cadena );

        $cadena = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $cadena );

        $cadena = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $cadena
        );

        $cadena = str_replace(
            array(' ', '_','?','¿','#'),
            array('_', '_','','',''),
            $cadena
        );

        return $cadena;
    }

    public static function FindUrl(){
        $RolUser = (int)Session::get('Rol');
        if($RolUser === 1){
            $url = 'admin/';
        }else if($RolUser === 0){
            return Redirect::to('/');
        }else{
            $url = 'user/';
        }
        return $url;
    }

}
