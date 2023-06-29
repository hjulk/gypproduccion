<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Imagenes;

class ImagenesController extends Controller
{
    public function CrearTipoImagenInicio(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_inicio' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'tipoImagen')->withErrors($validator)->withInput();
        }else{
            $nombreImagen = $request->nombre_inicio;
            $tipoImagen = 1;
            $mensajeRespuesta = ImagenesController::CrearTipoImagen($nombreImagen, $tipoImagen);
            if($mensajeRespuesta == 1){
                $verrors = array();
                array_push($verrors, 'Nombre de Imagen ya existe');
                return Redirect::to($url.'tipoImagen')->withErrors(['errors' => $verrors])->withInput();
            }
            if($mensajeRespuesta == 2){
                $verrors = 'Se creo el tipo de Imagen '.$nombreImagen.' con éxito.';
                return Redirect::to($url.'tipoImagen')->with('mensaje', $verrors);
            }
            if($mensajeRespuesta == 3){
                $verrors = array();
                array_push($verrors, 'Hubo un problema al crear el tipo de Imagen');
                return Redirect::to($url.'tipoImagen')->withErrors(['errors' => $verrors])->withInput();
            }
        }
    }

    public function ActualizarTipoImagenInicio(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_inicio_upd' =>  'required',
            'estado_inicio_upd' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'tipoImagen')->withErrors($validator)->withInput();
        }else{
            $nombreImagen = $request->nombre_inicio_upd;
            $tipoImagen = 1;
            $idTipo = $request->id_tipoImagenInicio;
            $estadoUpd  = (int)$request->estado_inicio_upd;
            $mensajeRespuesta = ImagenesController::ActualizarTipoImagen($idTipo, $nombreImagen, $tipoImagen, $estadoUpd);
            if($mensajeRespuesta == 1){
                $verrors = array();
                array_push($verrors, 'Nombre de Imagen ya existe');
                return Redirect::to($url.'tipoImagen')->withErrors(['errors' => $verrors])->withInput();
            }
            if($mensajeRespuesta == 2){
                $verrors = 'Se actualizo el tipo de Imagen '.$nombreImagen.' con éxito.';
                return Redirect::to($url.'tipoImagen')->with('mensaje', $verrors);
            }
            if($mensajeRespuesta == 3){
                $verrors = array();
                array_push($verrors, 'Hubo un problema al actualizar el tipo de Imagen');
                return Redirect::to($url.'tipoImagen')->withErrors(['errors' => $verrors])->withInput();
            }
        }
    }

    public function CrearTipoImagenServicio(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_servicio' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'tipoImagen')->withErrors($validator)->withInput();
        }else{
            $nombreImagen = $request->nombre_servicio;
            $tipoImagen = 2;
            $mensajeRespuesta = ImagenesController::CrearTipoImagen($nombreImagen, $tipoImagen);
            if($mensajeRespuesta == 1){
                $verrors = array();
                array_push($verrors, 'Nombre de Imagen ya existe');
                return Redirect::to($url.'tipoImagen')->withErrors(['errors' => $verrors])->withInput();
            }
            if($mensajeRespuesta == 2){
                $verrors = 'Se creo el tipo de Imagen '.$nombreImagen.' con éxito.';
                return Redirect::to($url.'tipoImagen')->with('mensaje', $verrors);
            }
            if($mensajeRespuesta == 3){
                $verrors = array();
                array_push($verrors, 'Hubo un problema al crear el tipo de Imagen');
                return Redirect::to($url.'tipoImagen')->withErrors(['errors' => $verrors])->withInput();
            }
        }
    }

    public function ActualizarTipoImagenServicio(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_servicio_upd' =>  'required',
            'estado_servicio_upd' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to($url.'tipoImagen')->withErrors($validator)->withInput();
        }else{
            $nombreImagen = $request->nombre_servicio_upd;
            $tipoImagen = 2;
            $idTipo = $request->id_tipoImagenServicio;
            $estadoUpd  = (int)$request->estado_servicio_upd;
            $mensajeRespuesta = ImagenesController::ActualizarTipoImagen($idTipo, $nombreImagen, $tipoImagen, $estadoUpd);
            if($mensajeRespuesta == 1){
                $verrors = array();
                array_push($verrors, 'Nombre de Imagen ya existe');
                return Redirect::to($url.'tipoImagen')->withErrors(['errors' => $verrors])->withInput();
            }
            if($mensajeRespuesta == 2){
                $verrors = 'Se actualizo el tipo de Imagen '.$nombreImagen.' con éxito.';
                return Redirect::to($url.'tipoImagen')->with('mensaje', $verrors);
            }
            if($mensajeRespuesta == 3){
                $verrors = array();
                array_push($verrors, 'Hubo un problema al actualizar el tipo de Imagen');
                return Redirect::to($url.'tipoImagen')->withErrors(['errors' => $verrors])->withInput();
            }
        }
    }

    public static function CrearTipoImagen($nombreImagen, $tipoImagen){
        $Usuario = (int)Session::get('IdUsuario');
        switch($tipoImagen){
            case 1: $BuscarImagen = Imagenes::BuscarImagenInicioName($nombreImagen);
                    $CrearImagen = Imagenes::CrearTipoImagenInicio($nombreImagen,$Usuario);
                    break;
            case 2: $BuscarImagen = Imagenes::BuscarImagenServicioName($nombreImagen);
                    $CrearImagen = Imagenes::CrearTipoImagenServicio($nombreImagen,$Usuario);
                    break;
            default: break;
        }
        if($BuscarImagen){
            return 1;
        }else{
            if($CrearImagen){
                return 2;
            }else{
                return 3;
            }
        }
    }

    public static function ActualizarTipoImagen($idTipo, $nombreImagen, $tipoImagen, $estadoUpd){
        $Usuario = (int)Session::get('IdUsuario');
        if($estadoUpd === 1){
            $Estado = 1;
        }else{
            $Estado = 2;
        }
        switch($tipoImagen){
            case 1: $BuscarNombre = Imagenes::BuscarImagenInicioByName($nombreImagen, $idTipo);
                    $ActualizarTipoImagen = Imagenes::ActualizarTipoImagenInicio($nombreImagen, $Usuario, $Estado, $idTipo);
                    break;
            case 2: $BuscarNombre = Imagenes::BuscarImagenServicioByName($nombreImagen, $idTipo);
                    $ActualizarTipoImagen = Imagenes::ActualizarTipoImagenServicio($nombreImagen, $Usuario, $Estado, $idTipo);
                    break;
            default: break;
        }
        if($BuscarNombre){
            return 1;
        }else{
            if($ActualizarTipoImagen){
                return 2;
            }else{
                return 3;
            }
        }
    }

    public function CrearImagenSettlementConsultation(Request $request){
        $url        = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator  = Validator::make($request->all(), [
            'nombre_imagen'  =>  'required',
            'imagen' => 'required|max:2048',
            'pie_imagen' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesSettlementConsultation')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $pieImagen = $request->pie_imagen;
            $imagen = $request->hasFile('imagen');
            $buscarImagen = Imagenes::ListadoImagenesName($nombre, 4);
            if ($buscarImagen) {
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesSettlementConsultation')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $path = ImagenesController::CargarNuevaImagen($request, $nombreImagen, 14);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $crearImagen = Imagenes::CrearImagen($nombre, $directorio, $directorio1, 14, $IdUser, null, null, $pieImagen, null, null);
                    if ($crearImagen) {
                        $verrors = 'Se cargo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesSettlementConsultation')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al cargar la imagen');
                        return Redirect::to($url . 'imagesSettlementConsultation')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesSettlementConsultation')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarImagenSettlementConsultation(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_imagen_upd'  =>  'required',
            'pie_imagen_upd' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesSettlementConsultation')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_upd;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $IdImagen = (int)$request->id_imagenSettlementConsultation;
            $Estado = (int)$request->estado_upd;
            $pieImagen = $request->pie_imagen_upd;
            $BuscarImagen = Imagenes::ListadoImagenesNameId($nombre, $IdImagen, 4);
            if($BuscarImagen){
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesSettlementConsultation')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $buscarInfoImagen = Imagenes::ListadoImagenesId($IdImagen, 4);
                foreach ($buscarInfoImagen as $row) {
                    $Nombre_imagen = $row->NOMBRE_IMAGEN;
                    $Ubicacion = str_replace("../", "", $row->UBICACION);
                    $UbicacionJpg = str_replace(array('../', '.webp'), array('', '.jpg'), $row->UBICACION);
                    $UbicacionPng = str_replace(array('../', '.webp'), array('', '.png'), $row->UBICACION);
                    $Pie  = $row->PIE_IMAGEN;
                }
                $listadoSettlementConsultation  = Imagenes::ListadoSettlementConsultationById($IdImagen);
                if($listadoSettlementConsultation){
                    $verrors = array();
                    array_push($verrors, 'Para activar esta imágen, debe inactivar la imagen actual');
                    return Redirect::to($url . 'imagenes')->withErrors(['errors' => $verrors])->withInput();
                }else{
                    $path = ImagenesController::CargarNuevaImagenUpdate($request, $nombreImagen, $Ubicacion, $UbicacionJpg, $UbicacionPng, 14);
                    $errorImagen = (int)$path['error'];
                    $directorio  = $path['path'];
                    $directorio1 = $path['path1'];
                    if($errorImagen == 2){
                        $actualizarImagen = Imagenes::ActualizarImagen($nombre, $directorio, $directorio1, 14, $IdUser, $Estado, $IdImagen, null, null, $pieImagen, null, null);
                        if ($actualizarImagen) {
                            $verrors = 'Se actualizo con éxito la imagen ' . strtoupper($nombre);
                            return Redirect::to($url . 'imagesSettlementConsultation')->with('mensaje', $verrors);
                        } else {
                            $verrors = array();
                            array_push($verrors, 'Hubo un problema al actualizar la imagen');
                            return Redirect::to($url . 'imagesSettlementConsultation')->withErrors(['errors' => $verrors])->withInput();
                        }
                    }else{
                        $verrors = array();
                        array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                        return Redirect::to($url . 'imagesSettlementConsultation')->withErrors(['errors' => $verrors])->withInput();
                    }
                }
            }
        }
    }

    public static function CargarNuevaImagen($request, $NombreImagen, $IdPagina){
        $carpeta = ImagenesController::CarpetaImagen($IdPagina);
        $path   = null;
        $path1  = null;
        $error  = 2;
        if ($request->hasFile('imagen')) {
            $file          = $request->file('imagen');
            $extension     = $file->getClientOriginalExtension();
            if ($extension === 'JPG' || $extension === 'PNG') {
                $error = 1;
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
            $nom_adj1   = $tmp;
            $path       = '../' . $carpeta . $nom_adj1;
            $path1      = '../' . $path1;
        }
        return array('path' => $path, 'path1' => $path1, 'error' => $error);
    }

    public static function CargarNuevaImagenUpdate($request, $NombreImagen, $Ubicacion, $UbicacionJpg, $UbicacionPng, $IdPagina){
        $carpeta = ImagenesController::CarpetaImagen($IdPagina);
        $path   = null;
        $path1  = null;
        $error  = 2;
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
                $error  = 1;
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
                $error  = 2;
            }
        }
        return array('path' => $path, 'path1' => $path1, 'error' => $error);
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
                    $carpeta = ImagenesController::CarpetaImagen($IdPagina, $IdSubpagina);
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

    public static function CarpetaImagen($IdPagina)
    {
        $carpeta = 'images/';
        $complemento = null;

        switch ($IdPagina) {
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
            case 1:
                $complemento = 'home/';
                break;
            case 6:
                $complemento = 'trabajo/';
                break;
            case 3:
                $complemento = 'carousel/';
                break;
            case 4:
                $complemento = 'home/';
                break;
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

}
