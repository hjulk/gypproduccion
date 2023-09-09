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
use App\Models\Administracion;

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
            'imagen' => 'required|max:400|dimensions:max_width=350,max_height=220',
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
                    $crearImagen = Imagenes::CrearImagen($nombre, $directorio, $directorio1, 14, $IdUser, null, null, $pieImagen, null, null, null, null);
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
            'estado_upd'  =>  'required',
            'imagen_upd' => 'max:400|dimensions:max_width=350,max_height=220',
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
                    return Redirect::to($url . 'imagesSettlementConsultation')->withErrors(['errors' => $verrors])->withInput();
                }else{
                    $path = ImagenesController::CargarNuevaImagenUpdate($request, $nombreImagen, $Ubicacion, $UbicacionJpg, $UbicacionPng, 14);
                    $errorImagen = (int)$path['error'];
                    $directorio  = $path['path'];
                    $directorio1 = $path['path1'];
                    if($errorImagen == 2){
                        $actualizarImagen = Imagenes::ActualizarImagen($nombre, $directorio, $directorio1, 14, $IdUser, $Estado, $IdImagen, null, null, $pieImagen, null, null, null, null);
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

    public function CrearImagenOrganigrama(Request $request){
        $url        = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator  = Validator::make($request->all(), [
            'nombre_archivo'  =>  'required',
            'archivo' => 'required|max:1024'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesOrganigrama')->withErrors($validator)->withInput();
        } else {
            $archivo = $request->hasFile('archivo');
            $nombre = $request->nombre_archivo;
            $nombre1 = ImagenesController::eliminar_tildes($nombre);
            $file          = $request->file('archivo');
            $extension     = $file->getClientOriginalExtension();
            $nombreArchivo = $nombre1 . '_' . date("Ymd_Hi").'.'.$extension;
            $buscarArchivo = Imagenes::ListadoImagenesName($nombre, 3);
            if ($buscarArchivo) {
                $verrors = array();
                array_push($verrors, 'Nombre de archivo ya se encuentra creado');
                return Redirect::to($url . 'imagesOrganigrama')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $directorio  = ImagenesController::CarpetaImagen(5);
                $rtOriginal1 = $_FILES['archivo']['tmp_name'];
                move_uploaded_file($rtOriginal1,$directorio.$nombreArchivo);
                $directorioCreado = '../'.$directorio.$nombreArchivo;
                $crearArchivo = Imagenes::CrearImagen($nombre, $directorioCreado, null, 5, $IdUser, null, null, null, null, null, null, null);
                if ($crearArchivo) {
                    $verrors = 'Se cargo con éxito el archivo ' . strtoupper($nombre);
                    return Redirect::to($url . 'imagesOrganigrama')->with('mensaje', $verrors);
                } else {
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al cargar el archivo');
                    return Redirect::to($url . 'imagesOrganigrama')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarImagenOrganigrama(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_archivo_upd'  =>  'required',
            'estado_archivo_upd'  =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesOrganigrama')->withErrors($validator)->withInput();
        } else {
            $directorioCreado   = null;
            $nombre             = $request->nombre_archivo_upd;
            $nombre1            = ImagenesController::eliminar_tildes($nombre);
            $nombreArchivo      = $nombre1 . '_' . date("Ymd_Hi");
            $IdArchivo          = (int)$request->id_imagenOrganigrama;
            $Estado             = (int)$request->estado_archivo_upd;
            $buscarArchivo      = Imagenes::ListadoImagenesNameId($nombre, $IdArchivo, 3);
            if($buscarArchivo){
                $verrors = array();
                array_push($verrors, 'Nombre de archivo ya se encuentra creado');
                return Redirect::to($url . 'imagesOrganigrama')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $buscarInfoArchivo = Imagenes::ListadoImagenesId($IdArchivo, 3);
                foreach ($buscarInfoArchivo as $row) {
                    $Nombre_imagen = $row->NOMBRE_ARCHIVO;
                    $Ubicacion = str_replace("../", "", $row->UBICACION);
                }
                $listadoOrganigrama  = Imagenes::ListadoOrganigramaById($IdArchivo);
                if($listadoOrganigrama){
                    $verrors = array();
                    array_push($verrors, 'Para activar este archivo, debe inactivar el archivo actual');
                    return Redirect::to($url . 'imagesOrganigrama')->withErrors(['errors' => $verrors])->withInput();
                }else{
                    if ($request->hasFile('archivo_upd')){
                        $file               = $request->file('archivo_upd');
                        $extension          = $file->getClientOriginalExtension();
                        $nombreArchivo      = $nombre1 . '_' . date("Ymd_Hi").'.'.$extension;
                        $directorio         = ImagenesController::CarpetaImagen(5);
                        $rtOriginal1        = $_FILES['archivo_upd']['tmp_name'];
                        move_uploaded_file($rtOriginal1,$directorio.$nombreArchivo);
                        $directorioCreado   = '../'.$directorio.$nombreArchivo;
                    }
                    $actualizarArchivo = Imagenes::ActualizarImagen($nombre, $directorioCreado, null, 5, $IdUser, $Estado, $IdArchivo, null, null, null, null, null, null, null);
                    if ($actualizarArchivo) {
                        $verrors = 'Se actualizo con éxito el archivo ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesOrganigrama')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al actualizar el archivo');
                        return Redirect::to($url . 'imagesOrganigrama')->withErrors(['errors' => $verrors])->withInput();
                    }
                }
            }
        }
    }

    public function CrearImagenNosotros(Request $request){
        $url        = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator  = Validator::make($request->all(), [
            'nombre_imagen'  =>  'required',
            'imagen' => 'required|max:400|dimensions:max_width=350,max_height=240',
            'pie_imagen' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesUs')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $pieImagen = $request->pie_imagen;
            $imagen = $request->hasFile('imagen');
            $buscarImagen = Imagenes::ListadoImagenesName($nombre, 2);
            if ($buscarImagen) {
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesUs')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $path = ImagenesController::CargarNuevaImagen($request, $nombreImagen, 4);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $crearImagen = Imagenes::CrearImagen($nombre, $directorio, $directorio1, 4, $IdUser, null, null, $pieImagen, null, null, null, null);
                    if ($crearImagen) {
                        $verrors = 'Se cargo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesUs')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al cargar la imagen');
                        return Redirect::to($url . 'imagesUs')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesUs')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarImagenNosotros(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_imagen_upd'  =>  'required',
            'estado_upd'  =>  'required',
            'imagen_upd' => 'max:400|dimensions:max_width=350,max_height=240',
            'pie_imagen_upd' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesUs')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_upd;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $IdImagen = (int)$request->id_imagenNosotros;
            $Estado = (int)$request->estado_upd;
            $pieImagen = $request->pie_imagen_upd;
            $BuscarImagen = Imagenes::ListadoImagenesNameId($nombre, $IdImagen, 2);
            if($BuscarImagen){
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesUs')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $buscarInfoImagen = Imagenes::ListadoImagenesId($IdImagen, 2);
                foreach ($buscarInfoImagen as $row) {
                    $Nombre_imagen = $row->NOMBRE_IMAGEN;
                    $Ubicacion = str_replace("../", "", $row->UBICACION);
                    $UbicacionJpg = str_replace(array('../', '.webp'), array('', '.jpg'), $row->UBICACION);
                    $UbicacionPng = str_replace(array('../', '.webp'), array('', '.png'), $row->UBICACION);
                    $Pie  = $row->PIE_IMAGEN;
                }
                $path = ImagenesController::CargarNuevaImagenUpdate($request, $nombreImagen, $Ubicacion, $UbicacionJpg, $UbicacionPng, 4);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $actualizarImagen = Imagenes::ActualizarImagen($nombre, $directorio, $directorio1, 4, $IdUser, $Estado, $IdImagen, null, null, $pieImagen, null, null, null, null);
                    if ($actualizarImagen) {
                        $verrors = 'Se actualizo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesUs')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al actualizar la imagen');
                        return Redirect::to($url . 'imagesUs')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesUs')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearImagenBanner(Request $request){
        $url        = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator  = Validator::make($request->all(), [
            'nombre_imagen_banner'  =>  'required',
            'imagen' => 'required|max:1024|dimensions:max_width=1200,max_height=260'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesBanner')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_banner;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $imagen = $request->hasFile('imagen');
            $enlace = $request->enlace;
            $buscarImagen = Imagenes::ListadoImagenesName($nombre, 5);
            if ($buscarImagen) {
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesBanner')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $path = ImagenesController::CargarNuevaImagen($request, $nombreImagen, 17);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $crearImagen = Imagenes::CrearImagen($nombre, $directorio, $directorio1, 17, $IdUser, $enlace, null, null, null, null, 1, 2);
                    if ($crearImagen) {
                        $verrors = 'Se cargo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesBanner')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al cargar la imagen');
                        return Redirect::to($url . 'imagesBanner')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesBanner')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarImagenBanner(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_imagen_upd'  =>  'required',
            'estado_upd'  =>  'required',
            'imagen_upd' => 'max:1024|dimensions:max_width=1200,max_height=260'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesBanner')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_upd;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $IdImagen = (int)$request->id_imagenBanner;
            $Estado = (int)$request->estado_upd;
            $enlace = $request->enlace_upd;
            $BuscarImagen = Imagenes::ListadoImagenesNameId($nombre, $IdImagen, 5);
            if($BuscarImagen){
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesBanner')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $buscarInfoImagen = Imagenes::ListadoImagenesId($IdImagen, 5);
                foreach ($buscarInfoImagen as $row) {
                    $Nombre_imagen = $row->NOMBRE_IMAGEN;
                    $Ubicacion = str_replace("../", "", $row->UBICACION);
                    $UbicacionJpg = str_replace(array('../', '.webp'), array('', '.jpg'), $row->UBICACION);
                    $UbicacionPng = str_replace(array('../', '.webp'), array('', '.png'), $row->UBICACION);
                    $Pie  = $row->PIE_IMAGEN;
                }
                $path = ImagenesController::CargarNuevaImagenUpdate($request, $nombreImagen, $Ubicacion, $UbicacionJpg, $UbicacionPng, 17);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $actualizarImagen = Imagenes::ActualizarImagen($nombre, $directorio, $directorio1, 17, $IdUser, $Estado, $IdImagen, $enlace, null, null, null, null, 1, 2);
                    if ($actualizarImagen) {
                        $verrors = 'Se actualizo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesBanner')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al actualizar la imagen');
                        return Redirect::to($url . 'imagesBanner')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesBanner')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearImagenBannerMovil(Request $request){
        $url        = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator  = Validator::make($request->all(), [
            'nombre_imagen_bannerMovil'  =>  'required',
            'imagen' => 'required|max:1024|dimensions:max_width=710,max_height=150'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesBannerM')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_bannerMovil;
            $enlace = $request->enlace;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $buscarImagen = Imagenes::ListadoImagenesName($nombre, 6);
            if ($buscarImagen) {
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesBannerM')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $path = ImagenesController::CargarNuevaImagen($request, $nombreImagen, 17);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $crearImagen = Imagenes::CrearImagen($nombre, $directorio, $directorio1, 17, $IdUser, $enlace, null, null, null, null, 1, 1);
                    if ($crearImagen) {
                        $verrors = 'Se cargo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesBannerM')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al cargar la imagen');
                        return Redirect::to($url . 'imagesBannerM')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesBannerM')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarImagenBannerMovil(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_imagen_upd'  =>  'required',
            'estado_upd'  =>  'required',
            'imagen_upd' => 'max:1024|dimensions:max_width=710,max_height=150'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesBannerM')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_upd;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $IdImagen = (int)$request->id_imagenBannerMovil;
            $Estado = (int)$request->estado_upd;
            $enlace = $request->enlace_upd;
            $BuscarImagen = Imagenes::ListadoImagenesNameId($nombre, $IdImagen, 6);
            if($BuscarImagen){
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesBanner')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $buscarInfoImagen = Imagenes::ListadoImagenesId($IdImagen, 6);
                foreach ($buscarInfoImagen as $row) {
                    $Nombre_imagen = $row->NOMBRE_IMAGEN;
                    $Ubicacion = str_replace("../", "", $row->UBICACION);
                    $UbicacionJpg = str_replace(array('../', '.webp'), array('', '.jpg'), $row->UBICACION);
                    $UbicacionPng = str_replace(array('../', '.webp'), array('', '.png'), $row->UBICACION);
                    $Pie  = $row->PIE_IMAGEN;
                }
                $path = ImagenesController::CargarNuevaImagenUpdate($request, $nombreImagen, $Ubicacion, $UbicacionJpg, $UbicacionPng, 17);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $actualizarImagen = Imagenes::ActualizarImagen($nombre, $directorio, $directorio1, 17, $IdUser, $Estado, $IdImagen, $enlace, null, null, null, null, 1, 1);
                    if ($actualizarImagen) {
                        $verrors = 'Se actualizo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesBannerM')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al actualizar la imagen');
                        return Redirect::to($url . 'imagesBannerM')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesBannerM')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearImagenCarousel(Request $request){
        $url        = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator  = Validator::make($request->all(), [
            'nombre_imagen_carousel'  =>  'required',
            'orden'  =>  'required',
            'imagen' => 'required|max:1024|dimensions:max_width=1110,max_height=210'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesCarousel')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_carousel;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $imagen = $request->hasFile('imagen');
            $enlace = $request->enlace;
            $orden = (int)$request->orden;
            $buscarImagen = Imagenes::ListadoImagenesName($nombre, 7);
            if ($buscarImagen) {
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesCarousel')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $path = ImagenesController::CargarNuevaImagen($request, $nombreImagen, 19);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $crearImagen = Imagenes::CrearImagen($nombre, $directorio, $directorio1, 19, $IdUser, $enlace, $orden, null, null, null, null, 2);
                    if ($crearImagen) {
                        $verrors = 'Se cargo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesCarousel')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al cargar la imagen');
                        return Redirect::to($url . 'imagesCarousel')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesCarousel')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarImagenCarousel(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_imagen_upd'  =>  'required',
            'orden_upd'  =>  'required',
            'estado_upd'  =>  'required',
            'imagen_upd' => 'max:1024|dimensions:max_width=1110,max_height=210'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesCarousel')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_upd;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $IdImagen = (int)$request->id_imagenCarousel;
            $Orden = (int)$request->orden_upd;
            $Estado = (int)$request->estado_upd;
            $enlace = $request->enlace_upd;
            $BuscarImagen   = Imagenes::ListadoImagenesNameId($nombre, $IdImagen, 7);
            $BuscarOrden    = Imagenes::ListadoImagenesOrderId($IdImagen, 7, $Orden);
            if($BuscarOrden){
                $verrors = array();
                array_push($verrors, 'Para cambiar de orden la imágen, debe inactivar la imágen que tiene el orden No. '.$Orden);
                return Redirect::to($url . 'imagesCarousel')->withErrors(['errors' => $verrors])->withInput();
            }else{
                if($BuscarImagen){
                    $verrors = array();
                    array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                    return Redirect::to($url . 'imagesCarousel')->withErrors(['errors' => $verrors])->withInput();
                }else{
                    $buscarInfoImagen = Imagenes::ListadoImagenesId($IdImagen, 7);
                    foreach ($buscarInfoImagen as $row) {
                        $Nombre_imagen = $row->NOMBRE_IMAGEN;
                        $Ubicacion = str_replace("../", "", $row->UBICACION);
                        $UbicacionJpg = str_replace(array('../', '.webp'), array('', '.jpg'), $row->UBICACION);
                        $UbicacionPng = str_replace(array('../', '.webp'), array('', '.png'), $row->UBICACION);
                        $Pie  = $row->PIE_IMAGEN;
                    }
                    $path = ImagenesController::CargarNuevaImagenUpdate($request, $nombreImagen, $Ubicacion, $UbicacionJpg, $UbicacionPng, 19);
                    $errorImagen = (int)$path['error'];
                    $directorio  = $path['path'];
                    $directorio1 = $path['path1'];
                    if($errorImagen == 2){
                        $actualizarImagen = Imagenes::ActualizarImagen($nombre, $directorio, $directorio1, 19, $IdUser, $Estado, $IdImagen, $enlace, $Orden, null, null, null, null, 2);
                        if ($actualizarImagen) {
                            $verrors = 'Se actualizo con éxito la imagen ' . strtoupper($nombre);
                            return Redirect::to($url . 'imagesCarousel')->with('mensaje', $verrors);
                        } else {
                            $verrors = array();
                            array_push($verrors, 'Hubo un problema al actualizar la imagen');
                            return Redirect::to($url . 'imagesCarousel')->withErrors(['errors' => $verrors])->withInput();
                        }
                    }else{
                        $verrors = array();
                        array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                        return Redirect::to($url . 'imagesCarousel')->withErrors(['errors' => $verrors])->withInput();
                    }
                }
            }
        }
    }

    public function CrearImagenCarouselMovil(Request $request){
        $url        = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator  = Validator::make($request->all(), [
            'nombre_imagen_carouselMovil'  =>  'required',
            'orden'  =>  'required',
            'imagen' => 'required|max:1024|dimensions:max_width=700,max_height=210'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesCarouselM')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_carouselMovil;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $imagen = $request->hasFile('imagen');
            $enlace = $request->enlace;
            $orden = (int)$request->orden;
            $buscarImagen = Imagenes::ListadoImagenesName($nombre, 8);
            if ($buscarImagen) {
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesCarouselM')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $path = ImagenesController::CargarNuevaImagen($request, $nombreImagen, 19);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $crearImagen = Imagenes::CrearImagen($nombre, $directorio, $directorio1, 19, $IdUser, $enlace, $orden, null, null, null, null, 1);
                    if ($crearImagen) {
                        $verrors = 'Se cargo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesCarouselM')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al cargar la imagen');
                        return Redirect::to($url . 'imagesCarouselM')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesCarouselM')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarImagenCarouselMovil(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_imagen_upd'  =>  'required',
            'orden_upd'  =>  'required',
            'estado_upd'  =>  'required',
            'imagen_upd' => 'max:1024|dimensions:max_width=700,max_height=210'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesCarouselM')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_upd;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $IdImagen = (int)$request->id_imagenCarouselMovil;
            $Orden = (int)$request->orden_upd;
            $Estado = (int)$request->estado_upd;
            $enlace = $request->enlace_upd;
            $BuscarImagen   = Imagenes::ListadoImagenesNameId($nombre, $IdImagen, 8);
            $BuscarOrden    = Imagenes::ListadoImagenesOrderId($IdImagen, 8, $Orden);
            if($BuscarOrden){
                $verrors = array();
                array_push($verrors, 'Para cambiar de orden la imágen, debe inactivar la imágen que tiene el orden No. '.$Orden);
                return Redirect::to($url . 'imagesCarouselM')->withErrors(['errors' => $verrors])->withInput();
            }else{
                if($BuscarImagen){
                    $verrors = array();
                    array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                    return Redirect::to($url . 'imagesCarouselM')->withErrors(['errors' => $verrors])->withInput();
                }else{
                    $buscarInfoImagen = Imagenes::ListadoImagenesId($IdImagen, 8);
                    foreach ($buscarInfoImagen as $row) {
                        $Nombre_imagen = $row->NOMBRE_IMAGEN;
                        $Ubicacion = str_replace("../", "", $row->UBICACION);
                        $UbicacionJpg = str_replace(array('../', '.webp'), array('', '.jpg'), $row->UBICACION);
                        $UbicacionPng = str_replace(array('../', '.webp'), array('', '.png'), $row->UBICACION);
                        $Pie  = $row->PIE_IMAGEN;
                    }
                    $path = ImagenesController::CargarNuevaImagenUpdate($request, $nombreImagen, $Ubicacion, $UbicacionJpg, $UbicacionPng, 19);
                    $errorImagen = (int)$path['error'];
                    $directorio  = $path['path'];
                    $directorio1 = $path['path1'];
                    if($errorImagen == 2){
                        $actualizarImagen = Imagenes::ActualizarImagen($nombre, $directorio, $directorio1, 19, $IdUser, $Estado, $IdImagen, $enlace, $Orden, null, null, null, null, 1);
                        if ($actualizarImagen) {
                            $verrors = 'Se actualizo con éxito la imagen ' . strtoupper($nombre);
                            return Redirect::to($url . 'imagesCarouselM')->with('mensaje', $verrors);
                        } else {
                            $verrors = array();
                            array_push($verrors, 'Hubo un problema al actualizar la imagen');
                            return Redirect::to($url . 'imagesCarouselM')->withErrors(['errors' => $verrors])->withInput();
                        }
                    }else{
                        $verrors = array();
                        array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                        return Redirect::to($url . 'imagesCarouselM')->withErrors(['errors' => $verrors])->withInput();
                    }
                }
            }
        }
    }

    public function CrearImagenBenefits(Request $request){
        $url        = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator  = Validator::make($request->all(), [
            'nombre_imagen_benefits'  =>  'required',
            'texto_imagen'  =>  'required',
            'orden'  =>  'required',
            'imagen' => 'required|max:400|dimensions:max_width=950,max_height=600'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesBenefits')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_benefits;
            $textoImagen = $request->texto_imagen;
            $pieImagen = $request->pie_imagen;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $imagen = $request->hasFile('imagen');
            $orden = (int)$request->orden;
            $buscarImagen = Imagenes::ListadoImagenesName($nombre, 1);
            if ($buscarImagen) {
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesBenefits')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $path = ImagenesController::CargarNuevaImagen($request, $nombreImagen, 6);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $crearImagen = Imagenes::CrearImagen($nombre, $directorio, $directorio1, 6, $IdUser, $textoImagen, $orden, $pieImagen, null, null, null, 1);
                    if ($crearImagen) {
                        $verrors = 'Se cargo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesBenefits')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al cargar la imagen');
                        return Redirect::to($url . 'imagesBenefits')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesBenefits')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarImagenBenefits(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_imagen_upd'  =>  'required',
            'orden_upd'  =>  'required',
            'texto_imagen_upd'  =>  'required',
            'estado_upd'  =>  'required',
            'imagen_upd' => 'max:400|dimensions:max_width=950,max_height=600'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesBenefits')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_upd;
            $texto_imagen = $request->texto_imagen_upd;
            $pieImagen = $request->pie_imagen_upd;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $IdImagen = (int)$request->id_imagenBenefits;
            $Orden = (int)$request->orden_upd;
            $Estado = (int)$request->estado_upd;
            $BuscarImagen   = Imagenes::ListadoImagenesNameId($nombre, $IdImagen, 1);
            $BuscarOrden    = Imagenes::ListadoImagenesOrderId($IdImagen, 1, $Orden);
            if($BuscarOrden){
                $verrors = array();
                array_push($verrors, 'Para cambiar de orden la imágen, debe inactivar la imágen que tiene el orden No. '.$Orden);
                return Redirect::to($url . 'imagesBenefits')->withErrors(['errors' => $verrors])->withInput();
            }else{
                if($BuscarImagen){
                    $verrors = array();
                    array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                    return Redirect::to($url . 'imagesBenefits')->withErrors(['errors' => $verrors])->withInput();
                }else{
                    $buscarInfoImagen = Imagenes::ListadoImagenesId($IdImagen, 1);
                    foreach ($buscarInfoImagen as $row) {
                        $Nombre_imagen = $row->NOMBRE_IMAGEN;
                        $Ubicacion = str_replace("../", "", $row->UBICACION);
                        $UbicacionJpg = str_replace(array('../', '.webp'), array('', '.jpg'), $row->UBICACION);
                        $UbicacionPng = str_replace(array('../', '.webp'), array('', '.png'), $row->UBICACION);
                        $Pie  = $row->PIE_IMAGEN;
                    }
                    $path = ImagenesController::CargarNuevaImagenUpdate($request, $nombreImagen, $Ubicacion, $UbicacionJpg, $UbicacionPng, 6);
                    $errorImagen = (int)$path['error'];
                    $directorio  = $path['path'];
                    $directorio1 = $path['path1'];
                    if($errorImagen == 2){
                        $actualizarImagen = Imagenes::ActualizarImagen($nombre, $directorio, $directorio1, 6, $IdUser, $Estado, $IdImagen, $texto_imagen, $Orden, $pieImagen, null, null, 1, null);
                        if ($actualizarImagen) {
                            $verrors = 'Se actualizo con éxito la imagen ' . strtoupper($nombre);
                            return Redirect::to($url . 'imagesBenefits')->with('mensaje', $verrors);
                        } else {
                            $verrors = array();
                            array_push($verrors, 'Hubo un problema al actualizar la imagen');
                            return Redirect::to($url . 'imagesBenefits')->withErrors(['errors' => $verrors])->withInput();
                        }
                    }else{
                        $verrors = array();
                        array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                        return Redirect::to($url . 'imagesBenefits')->withErrors(['errors' => $verrors])->withInput();
                    }
                }
            }
        }
    }

    public function CrearImagenTows(Request $request){
        $url        = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator  = Validator::make($request->all(), [
            'nombre_imagen_tows'  =>  'required',
            'tipo_grua'  =>  'required',
            'imagen' => 'required|max:400|dimensions:max_width=790,max_height=560'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesTows')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_tows;
            $tipoGrua = (int)$request->tipo_grua;
            $pieImagen = $request->pie_imagen;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $imagen = $request->hasFile('imagen');
            if ($tipoGrua%2==0){
                $orden = 2;
            }else{
                $orden = 1;
            }
            $buscarImagen = Imagenes::ListadoImagenesGruasName($nombre, $tipoGrua);
            if ($buscarImagen) {
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesTows')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $path = ImagenesController::CargarNuevaImagen($request, $nombreImagen, 8);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $crearImagen = Imagenes::CrearImagen($nombre, $directorio, $directorio1, 8, $IdUser, null, $orden, $pieImagen, $tipoGrua, null, null, 1);
                    if ($crearImagen) {
                        $verrors = 'Se cargo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesTows')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al cargar la imagen');
                        return Redirect::to($url . 'imagesTows')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesTows')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarImagenTows(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_imagen_upd'  =>  'required',
            'tipo_grua_upd'  =>  'required',
            'estado_upd'  =>  'required',
            'imagen_upd' => 'max:400|dimensions:max_width=790,max_height=560'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesTows')->withErrors($validator)->withInput();
        } else {
            $nombre         = $request->nombre_imagen_upd;
            $tipo_grua      = $request->tipo_grua_upd;
            $pieImagen      = $request->pie_imagen_upd;
            $nombreImagen   = $nombre . '_' . date("Ymd_Hi");
            $IdImagen       = (int)$request->id_imagenTows;
            $Estado         = (int)$request->estado_upd;
            if ($tipo_grua%2==0){
                $Orden = 2;
            }else{
                $Orden = 1;
            }
            $BuscarImagen   = Imagenes::ListadoImagenesNameGruaId($nombre, $IdImagen, $tipo_grua);
            $BuscarOrden    = Imagenes::ListadoImagenesOrderGruaId($IdImagen, $Orden, $tipo_grua);
            if($BuscarOrden){
                $tipoGrua = Administracion::ListarGruaById($tipo_grua);
                if($tipoGrua){
                    foreach($tipoGrua as $row){
                        $nombreGrua = $row->NOMBRE_GRUA;
                    }
                }
                $verrors = array();
                array_push($verrors, 'Para cambiar de orden la imágen, debe inactivar la imágen que tiene el tipo de grua '.$nombreGrua);
                return Redirect::to($url . 'imagesTows')->withErrors(['errors' => $verrors])->withInput();
            }else{
                if($BuscarImagen){
                    $verrors = array();
                    array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                    return Redirect::to($url . 'imagesTows')->withErrors(['errors' => $verrors])->withInput();
                }else{
                    $buscarInfoImagen = Imagenes::ListadoImagenesId($IdImagen, 1);
                    foreach ($buscarInfoImagen as $row) {
                        $Nombre_imagen = $row->NOMBRE_IMAGEN;
                        $Ubicacion = str_replace("../", "", $row->UBICACION);
                        $UbicacionJpg = str_replace(array('../', '.webp'), array('', '.jpg'), $row->UBICACION);
                        $UbicacionPng = str_replace(array('../', '.webp'), array('', '.png'), $row->UBICACION);
                        $Pie  = $row->PIE_IMAGEN;
                    }
                    $path = ImagenesController::CargarNuevaImagenUpdate($request, $nombreImagen, $Ubicacion, $UbicacionJpg, $UbicacionPng, 8);
                    $errorImagen = (int)$path['error'];
                    $directorio  = $path['path'];
                    $directorio1 = $path['path1'];
                    if($errorImagen == 2){
                        $actualizarImagen = Imagenes::ActualizarImagen($nombre, $directorio, $directorio1, 8, $IdUser, $Estado, $IdImagen, null, $Orden, $pieImagen, $tipo_grua, null, 1, null);
                        if ($actualizarImagen) {
                            $verrors = 'Se actualizo con éxito la imagen ' . strtoupper($nombre);
                            return Redirect::to($url . 'imagesTows')->with('mensaje', $verrors);
                        } else {
                            $verrors = array();
                            array_push($verrors, 'Hubo un problema al actualizar la imagen');
                            return Redirect::to($url . 'imagesTows')->withErrors(['errors' => $verrors])->withInput();
                        }
                    }else{
                        $verrors = array();
                        array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                        return Redirect::to($url . 'imagesTows')->withErrors(['errors' => $verrors])->withInput();
                    }
                }
            }
        }
    }

    public function CrearImagenMonitoringCameras(Request $request){
        $url        = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator  = Validator::make($request->all(), [
            'nombre_imagen_monitoringCameras'  =>  'required',
            'imagen' => 'required|max:400|dimensions:max_width=950,max_height=600'
            // 'orden'  =>  'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesMonitoringCameras')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_monitoringCameras;
            $pieImagen = $request->pie_imagen;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $orden = (int)$request->orden;
            $imagen = $request->hasFile('imagen');
            $buscarImagen = Imagenes::ListadoImagenesName($nombre, 9);
            if ($buscarImagen) {
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesMonitoringCameras')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $path = ImagenesController::CargarNuevaImagen($request, $nombreImagen, 10);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $crearImagen = Imagenes::CrearImagen($nombre, $directorio, $directorio1, 10, $IdUser, null, null, $pieImagen, null, null, null, 4);
                    if ($crearImagen) {
                        $verrors = 'Se cargo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesMonitoringCameras')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al cargar la imagen');
                        return Redirect::to($url . 'imagesMonitoringCameras')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesMonitoringCameras')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarImagenMonitoringCameras(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_imagen_upd' =>  'required',
            'estado_upd'        =>  'required',
            // 'orden_upd'         => 'required',
            'imagen_upd'        => 'max:400|dimensions:max_width=950,max_height=600',
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesMonitoringCameras')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_upd;
            $pieImagen = $request->pie_imagen_upd;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $orden = (int)$request->orden_upd;
            $IdImagen = (int)$request->id_imagenMonitoringCameras;
            $Estado = (int)$request->estado_upd;
            $BuscarImagen   = Imagenes::ListadoImagenesNameId($nombre, $IdImagen, 9);
            if($BuscarImagen){
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesMonitoringCameras')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $buscarInfoImagen = Imagenes::ListadoImagenesId($IdImagen, 9);
                foreach ($buscarInfoImagen as $row) {
                    $Nombre_imagen = $row->NOMBRE_IMAGEN;
                    $Ubicacion = str_replace("../", "", $row->UBICACION);
                    $UbicacionJpg = str_replace(array('../', '.webp'), array('', '.jpg'), $row->UBICACION);
                    $UbicacionPng = str_replace(array('../', '.webp'), array('', '.png'), $row->UBICACION);
                    $Pie  = $row->PIE_IMAGEN;
                }
                $path = ImagenesController::CargarNuevaImagenUpdate($request, $nombreImagen, $Ubicacion, $UbicacionJpg, $UbicacionPng, 10);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $actualizarImagen = Imagenes::ActualizarImagen($nombre, $directorio, $directorio1, 10, $IdUser, $Estado, $IdImagen, null, null, $pieImagen, null, null, 4, null);
                    if ($actualizarImagen) {
                        $verrors = 'Se actualizo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesMonitoringCameras')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al actualizar la imagen');
                        return Redirect::to($url . 'imagesMonitoringCameras')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesMonitoringCameras')->withErrors(['errors' => $verrors])->withInput();
                }
            }            
        }
    }

    public function CrearImagenHomePage(Request $request){
        $url        = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator  = Validator::make($request->all(), [
            'nombre_imagen_homePage'  =>  'required',
            'tipo_imagen'  =>  'required',
            'imagen' => 'required|max:400'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesHomePage')->withErrors($validator)->withInput();
        } else {
            $nombre = $request->nombre_imagen_homePage;
            $tipoImagen = (int)$request->tipo_imagen;
            if($tipoImagen == 2){
                $validator  = Validator::make($request->all(), [
                    'imagen' => 'dimensions:max_width=960,max_height=320'
                ]);
                if ($validator->fails()) {
                    return Redirect::to($url . 'imagesHomePage')->withErrors($validator)->withInput();
                }
            }else{
                $validator  = Validator::make($request->all(), [
                    'imagen' => 'dimensions:max_width=360,max_height=230'
                ]);
                if ($validator->fails()) {
                    return Redirect::to($url . 'imagesHomePage')->withErrors($validator)->withInput();
                }
            }
            $pieImagen = $request->pie_imagen;
            $nombreImagen = $nombre . '_' . date("Ymd_Hi");
            $imagen = $request->hasFile('imagen');            
            $buscarImagen = Imagenes::ListadoImagenesHomePageName($nombre, $tipoImagen);            
            if ($buscarImagen) {
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesHomePage')->withErrors(['errors' => $verrors])->withInput();
            } else {
                $path = ImagenesController::CargarNuevaImagen($request, $nombreImagen, 17);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $crearImagen = Imagenes::CrearImagen($nombre, $directorio, $directorio1, 20, $IdUser, null, null, $pieImagen, null, null, $tipoImagen, 2);
                    if ($crearImagen) {
                        $verrors = 'Se cargo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesHomePage')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al cargar la imagen');
                        return Redirect::to($url . 'imagesHomePage')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesHomePage')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarImagenHomePage(Request $request){
        $url = UsuariosController::FindUrl();
        $IdUser     = (int)Session::get('IdUsuario');
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_imagen_upd'  =>  'required',
            'tipo_imagen_upd'  =>  'required',
            'estado_upd'  =>  'required',
            'imagen_upd' => 'max:400'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url . 'imagesHomePage')->withErrors($validator)->withInput();
        } else {
            $nombre         = $request->nombre_imagen_upd;
            $tipoImagen     = $request->tipo_imagen_upd;
            if($tipoImagen == 2){
                $validator  = Validator::make($request->all(), [
                    'imagen_upd' => 'dimensions:max_width=960,max_height=320'
                ]);
                if ($validator->fails()) {
                    return Redirect::to($url . 'imagesHomePage')->withErrors($validator)->withInput();
                }
            }else{
                $validator  = Validator::make($request->all(), [
                    'imagen_upd' => 'dimensions:max_width=360,max_height=230'
                ]);
                if ($validator->fails()) {
                    return Redirect::to($url . 'imagesHomePage')->withErrors($validator)->withInput();
                }
            }
            $pieImagen      = $request->pie_imagen_upd;
            $nombreImagen   = $nombre . '_' . date("Ymd_Hi");
            $IdImagen       = (int)$request->id_imagenHomePage;
            $Estado         = (int)$request->estado_upd;
            $BuscarImagen = Imagenes::ListadoImagenesNameHomePageId($nombre, $IdImagen, $tipoImagen);           
            if($BuscarImagen){
                $verrors = array();
                array_push($verrors, 'Nombre de imagen ya se encuentra creado');
                return Redirect::to($url . 'imagesHomePage')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $buscarInfoImagen = Imagenes::ListadoImagenesHomePageId($IdImagen, $tipoImagen);
                foreach ($buscarInfoImagen as $row) {
                    $Nombre_imagen = $row->NOMBRE_IMAGEN;
                    $Ubicacion = str_replace("../", "", $row->UBICACION);
                    $UbicacionJpg = str_replace(array('../', '.webp'), array('', '.jpg'), $row->UBICACION);
                    $UbicacionPng = str_replace(array('../', '.webp'), array('', '.png'), $row->UBICACION);
                    $Pie  = $row->PIE_IMAGEN;
                }
                $path = ImagenesController::CargarNuevaImagenUpdate($request, $nombreImagen, $Ubicacion, $UbicacionJpg, $UbicacionPng, 17);
                $errorImagen = (int)$path['error'];
                $directorio  = $path['path'];
                $directorio1 = $path['path1'];
                if($errorImagen == 2){
                    $actualizarImagen = Imagenes::ActualizarImagen($nombre, $directorio, $directorio1, 20, $IdUser, $Estado, $IdImagen, null, null, $pieImagen, null, null, $tipoImagen, 2);
                    if ($actualizarImagen) {
                        $verrors = 'Se actualizo con éxito la imagen ' . strtoupper($nombre);
                        return Redirect::to($url . 'imagesHomePage')->with('mensaje', $verrors);
                    } else {
                        $verrors = array();
                        array_push($verrors, 'Hubo un problema al actualizar la imagen');
                        return Redirect::to($url . 'imagesHomePage')->withErrors(['errors' => $verrors])->withInput();
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Extensión de imagen no valido, debe ser jpg o png en minúscula');
                    return Redirect::to($url . 'imagesHomePage')->withErrors(['errors' => $verrors])->withInput();
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
                            imagejpeg($lienzo1, $path1, 75);
                        } else if ($_FILES['imagen1']['type'] == 'image/jpeg') {
                            imagejpeg($lienzo1, $path1, 75);
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
                        imagejpeg($lienzo, $path, 75);
                    } else if ($_FILES['imagen1']['type'] == 'image/jpeg') {
                        imagejpeg($lienzo, $path, 75);
                    }
                    $cont = ob_get_contents();
                    ob_end_clean();
                    imagepalettetotruecolor($image);
                    imagewebp($image, $path, 80);
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
                            imagejpeg($lienzo1, $path1, 75);
                        } else if ($_FILES['imagen2']['type'] == 'image/jpeg') {
                            imagejpeg($lienzo1, $path1, 75);
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
                        imagejpeg($lienzo, $path, 75);
                    } else if ($_FILES['imagen_upd']['type'] == 'image/jpeg') {
                        imagejpeg($lienzo, $path, 75);
                    }
                    $cont = ob_get_contents();
                    ob_end_clean();
                    imagepalettetotruecolor($image);
                    imagewebp($image, $path, 80);
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
            case 17:
                $complemento = 'home/';
                break;
            case 18:
                $complemento = 'trabajo/';
                break;
            case 19:
                $complemento = 'carousel/';
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
