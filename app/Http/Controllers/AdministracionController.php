<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdministracionController extends Controller
{
    public function CrearDependencia(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_dependencia'    =>  'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to($url.'dependencias')->withErrors($validator)->withInput();
        }else{
            $Nombre = $request->nombre_dependencia;
            $BuscarNombre = Administracion::BuscarDependenciaByUsername($Nombre);
            if($BuscarNombre){
                $verrors = array();
                array_push($verrors, 'Nombre de Dependencia ya existe');
                return Redirect::to($url.'dependencias')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $Usuario = (int)Session::get('IdUsuario');
                $crearDependencia = Administracion::CrearDependencia($Nombre,$Usuario);
                if($crearDependencia){
                    $verrors = 'Se creo la depenencia '.$Nombre.' con éxito.';
                    return Redirect::to($url.'dependencias')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear la dependencia');
                    return Redirect::to($url.'dependencias')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarDependencia(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_dependencia_upd'    =>  'required',
            'estado_upd' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'dependencias')->withErrors($validator)->withInput();
        }else{
            $IdDependencia = (int)$request->id_d;
            $Nombre = $request->nombre_dependencia_upd;
            $BuscarNombre = Administracion::BuscarDependenciaByUsernameId($Nombre,$IdDependencia);
            if($BuscarNombre){
                $verrors = array();
                array_push($verrors, 'Nombre de Dependencia ya existe');
                return Redirect::to($url.'dependencias')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $Usuario = (int)Session::get('IdUsuario');
                $EstadoUpd  = (int)$request->estado_upd;
                if($EstadoUpd === 1){
                    $Estado = 1;
                }else{
                    $Estado = 0;
                }
                $ActualizarDependencia = Administracion::ActualizarDependencia($Nombre,$Usuario,$Estado,$IdDependencia);
                if($ActualizarDependencia){
                    $verrors = 'Se actualizo la dependencia '.$Nombre.' con éxito.';
                    return Redirect::to($url.'dependencias')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar la dependencia');
                    return Redirect::to($url.'dependencias')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearRol(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_rol'    =>  'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to($url.'roles')->withErrors($validator)->withInput();
        }else{
            $Nombre = $request->nombre_rol;
            $BuscarNombre = Administracion::BuscarRolByUsername($Nombre);
            if($BuscarNombre){
                $verrors = array();
                array_push($verrors, 'Nombre de Rol ya existe');
                return Redirect::to($url.'roles')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $Usuario = (int)Session::get('IdUsuario');
                $CrearRol = Administracion::CrearRol($Nombre,$Usuario);
                if($CrearRol){
                    $verrors = 'Se creo el rol '.$Nombre.' con éxito.';
                    return Redirect::to($url.'roles')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear el rol');
                    return Redirect::to($url.'roles')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarRol(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_rol_upd'    =>  'required',
            'estado_upd' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to($url.'roles')->withErrors($validator)->withInput();
        }else{
            $IdRol = (int)$request->id_r;
            $Nombre = $request->nombre_rol_upd;
            $BuscarNombre = Administracion::BuscarRolByUsernameiD($Nombre,$IdRol);
            if($BuscarNombre){
                $verrors = array();
                array_push($verrors, 'Nombre de Rol ya existe');
                return Redirect::to($url.'roles')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $Usuario = (int)Session::get('IdUsuario');
                $EstadoUpd  = (int)$request->estado_upd;
                if($EstadoUpd === 1){
                    $Estado = 1;
                }else{
                    $Estado = 0;
                }
                $ActualizarRol = Administracion::ActualizarRol($Nombre,$Usuario,$Estado,$IdRol);
                if($ActualizarRol){
                    $verrors = 'Se actualizo el rol '.$Nombre.' con éxito.';
                    return Redirect::to($url.'roles')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar el rol');
                    return Redirect::to($url.'roles')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearUsuario(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_usuario' => 'required',
            'correo' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_rol' => 'required',
            'id_dependencia' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to($url.'usuarios')->withErrors($validator)->withInput();
        }else{
            $Nombre         = $request->nombre_usuario;
            $Correo         = $request->correo;
            $Username       = $request->username;
            $Password       = hash('sha512', $request->password);
            $Rol            = (int)$request->id_rol;
            $Dependencia    = (int)$request->id_dependencia;
            $Administrador  = (int)$request->administrador;
            $Usuario = (int)Session::get('IdUsuario');
            $Estado = 1;
            $BuscarNombre = Administracion::BuscarUserByUsername($Username);
            if($BuscarNombre){
                $verrors = array();
                array_push($verrors, 'Usuario ya existe');
                return Redirect::to($url.'usuarios')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $CrearUsuario = Administracion::CrearUsuario($Nombre,$Correo,$Username,$Password,$Rol,$Dependencia,$Estado,$Usuario,$Administrador);
                if($CrearUsuario){
                    $verrors = 'Se creo el usuario '.$Nombre.' con éxito.';
                    return Redirect::to($url.'usuarios')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear el usuario');
                    return Redirect::to($url.'usuarios')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarUsuario(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_usuario_upd' => 'required',
            'correo_upd' => 'required',
            'username_upd' => 'required',
            'id_rol_upd' => 'required',
            'id_dependencia_upd' => 'required',
            'estado_upd' => 'required',
            'administrador_upd' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to($url.'usuarios')->withErrors($validator)->withInput();
        }else{
            $IdUsuario      = $request->id_user;
            $Nombre         = $request->nombre_usuario_upd;
            $Correo         = $request->correo_upd;
            $Username       = $request->username_upd;
            $Rol            = (int)$request->id_rol_upd;
            $Dependencia    = (int)$request->id_dependencia_upd;
            $Administrador  = (int)$request->administrador_upd;
            $Usuario        = (int)Session::get('IdUsuario');
            $Estado         = (int)$request->estado_upd;
            if($request->password_upd){
                $Password   = hash('sha512', $request->password_upd);
            }else{
                $FindPass = Administracion::BuscarUserId($IdUsuario);
                if($FindPass){
                    foreach($FindPass as $value){
                        $Password = $value->PASSWORD;
                    }
                }
            }
            $BuscarNombre = Administracion::BuscarUserByUsernameId($Username,$IdUsuario);
            if($BuscarNombre){
                $verrors = array();
                array_push($verrors, 'Usuario ya existe');
                return Redirect::to($url.'usuarios')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $ActualizarUsuario = Administracion::ActualizarUsuario($IdUsuario,$Nombre,$Correo,$Username,$Password,$Rol,$Dependencia,$Estado,$Usuario,$Administrador);
                if($ActualizarUsuario){
                    $verrors = 'Se actualizo el usuario '.$Nombre.' con éxito.';
                    return Redirect::to($url.'usuarios')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar el usuario');
                    return Redirect::to($url.'usuarios')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearPagina(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_pagina' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to($url.'paginas')->withErrors($validator)->withInput();
        }else{
            $NombrePagina = $request->nombre_pagina;
            $BuscarNombrePagina = Administracion::BuscarPageByName($NombrePagina);
            if($BuscarNombrePagina){
                $verrors = array();
                array_push($verrors, 'Nombre de Página ya existe');
                return Redirect::to($url.'paginas')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $Usuario = (int)Session::get('IdUsuario');
                $Estado = 1;
                $CrearPagina = Administracion::CrearPagina($NombrePagina,$Estado,$Usuario);
                if($CrearPagina){
                    $verrors = 'Se creo la página '.$NombrePagina.' con éxito.';
                    return Redirect::to($url.'paginas')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear la página');
                    return Redirect::to($url.'paginas')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarPagina(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_pagina_upd' => 'required',
            'estado_pupd' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to($url.'paginas')->withErrors($validator)->withInput();
        }else{
            $NombrePagina = $request->nombre_pagina_upd;
            $Usuario = (int)Session::get('IdUsuario');
            $Estado = (int)$request->estado_pupd;
            $idPagina = (int)$request->id_pagina;
            $BuscarNombrePagina = Administracion::BuscarPageByNameId($NombrePagina,$idPagina);
            if($BuscarNombrePagina){
                $verrors = array();
                array_push($verrors, 'Nombre de Página ya existe');
                return Redirect::to($url.'paginas')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $ActualizarPagina = Administracion::ActualizarPagina($NombrePagina,$Estado,$idPagina,$Usuario);
                if($ActualizarPagina){
                    $verrors = 'Se actualizó la página '.$NombrePagina.' con éxito.';
                    return Redirect::to($url.'paginas')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar la página');
                    return Redirect::to($url.'paginas')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearSubpagina(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_subpagina' => 'required',
            'id_pagina' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to($url.'paginas')->withErrors($validator)->withInput();
        }else{
            $NombreSubpagina = $request->nombre_subpagina;
            $BuscarSubPageByName = Administracion::BuscarSubPageByName($NombreSubpagina);
            if($BuscarSubPageByName){
                $verrors = array();
                array_push($verrors, 'Nombre de Página ya existe');
                return Redirect::to($url.'paginas')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $Usuario = (int)Session::get('IdUsuario');
                $IdPagina = (int)$request->id_pagina;
                $Estado = 1;
                $CrearSubpagina = Administracion::CrearSubpagina($NombreSubpagina,$IdPagina,$Estado,$Usuario);
                if($CrearSubpagina){
                    $verrors = 'Se creo la subpágina '.$NombreSubpagina.' con éxito.';
                    return Redirect::to($url.'paginas')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear la subpágina');
                    return Redirect::to($url.'paginas')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarSubpagina(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_subpagina_upd' => 'required',
            'id_pagina_upd' => 'required',
            'estado_upd' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to($url.'paginas')->withErrors($validator)->withInput();
        }else{
            $NombrePagina = $request->nombre_subpagina_upd;
            $Usuario = (int)Session::get('IdUsuario');
            $Estado = (int)$request->estado_upd;
            $idSubpagina = (int)$request->id_subpagina;
            $idPagina = (int)$request->id_pagina_upd;
            $BuscarNombrePagina = Administracion::BuscarSubPageByNameId($NombrePagina,$idSubpagina);
            if($BuscarNombrePagina){
                $verrors = array();
                array_push($verrors, 'Nombre de Subpágina ya existe');
                return Redirect::to($url.'paginas')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $ActualizarPagina = Administracion::ActualizarSubpagina($NombrePagina,$Estado,$idPagina,$Usuario,$idSubpagina);
                if($ActualizarPagina){
                    $verrors = 'Se actualizó la subpágina '.$NombrePagina.' con éxito.';
                    return Redirect::to($url.'paginas')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar la subpágina');
                    return Redirect::to($url.'paginas')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearTipoDocumento(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_documento' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'tipoDocumento')->withErrors($validator)->withInput();
        }else{
            $NombreDocumento = $request->nombre_documento;
            $Usuario = (int)Session::get('IdUsuario');
            $BuscarDocumento = Administracion::BuscarDocumentTypeName($NombreDocumento);
            if($BuscarDocumento){
                $verrors = array();
                array_push($verrors, 'Nombre de documento ya existe');
                return Redirect::to($url.'tipoDocumento')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $CrearDocumento = Administracion::CrearDocumentType($NombreDocumento,$Usuario);
                if($CrearDocumento){
                    $verrors = 'Se creo el tipo de documento '.$NombreDocumento.' con éxito.';
                    return Redirect::to($url.'tipoDocumento')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear el tipo de documento');
                    return Redirect::to($url.'tipoDocumento')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarTipoDocumento(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_documento_upd' => 'required',
            'estado_upd' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to($url.'tipoDocumento')->withErrors($validator)->withInput();
        }else{
            $NombreDocumento = $request->nombre_documento_upd;
            $Usuario = (int)Session::get('IdUsuario');
            $Estado = (int)$request->estado_upd;
            $IdDocumento = (int)$request->id_tipoDocumento;
            $BuscarDocumento = Administracion::BuscarDocumentTypeNameId($NombreDocumento,$IdDocumento);
            if($BuscarDocumento){
                $verrors = array();
                array_push($verrors, 'Nombre de documento ya existe');
                return Redirect::to($url.'tipoDocumento')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $ActualizarDocumento = Administracion::ActualizarDocumentType($NombreDocumento,$Estado,$Usuario,$IdDocumento);
                if($ActualizarDocumento){
                    $verrors = 'Se actualizo el tipo de documento '.$NombreDocumento.' con éxito.';
                    return Redirect::to($url.'tipoDocumento')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar el nombre de  documento');
                    return Redirect::to($url.'tipoDocumento')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearTipoGrua(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_grua' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'tipoGrua')->withErrors($validator)->withInput();
        }else{
            $NombreGrua = $request->nombre_grua;
            $Usuario = (int)Session::get('IdUsuario');
            $BuscarGrua = Administracion::BuscarGruaName($NombreGrua);
            if($BuscarGrua){
                $verrors = array();
                array_push($verrors, 'Nombre de grua ya existe');
                return Redirect::to($url.'tipoGrua')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $CrearGrua = Administracion::CrearGrua($NombreGrua,$Usuario);
                if($CrearGrua){
                    $verrors = 'Se creo el tipo de grua '.$NombreGrua.' con éxito.';
                    return Redirect::to($url.'tipoGrua')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear el tipo de grua');
                    return Redirect::to($url.'tipoGrua')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarTipoGrua(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_grua_upd' => 'required',
            'estado_upd' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to($url.'tipoGrua')->withErrors($validator)->withInput();
        }else{
            $NombreGrua = $request->nombre_grua_upd;
            $Usuario = (int)Session::get('IdUsuario');
            $Estado = (int)$request->estado_upd;
            $IdGrua = (int)$request->id_tipoGrua;
            $BuscarGrua = Administracion::BuscarGruaNameId($NombreGrua,$IdGrua);
            if($BuscarGrua){
                $verrors = array();
                array_push($verrors, 'Nombre de grua ya existe');
                return Redirect::to($url.'tipoGrua')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $ActualizarGrua = Administracion::ActualizarGrua($NombreGrua,$Estado,$Usuario,$IdGrua);
                if($ActualizarGrua){
                    $verrors = 'Se actualizo el tipo de grua '.$NombreGrua.' con éxito.';
                    return Redirect::to($url.'tipoGrua')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar el nombre de  grua');
                    return Redirect::to($url.'tipoGrua')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearTipoTarifa(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_tipo_tarifa' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'tipoTarifa')->withErrors($validator)->withInput();
        }else{
            $NombreTarifa = $request->nombre_tipo_tarifa;
            $Usuario = (int)Session::get('IdUsuario');
            $BuscarTarifa = Administracion::BuscarTipoTarifaName($NombreTarifa);
            if($BuscarTarifa){
                $verrors = array();
                array_push($verrors, 'Nombre de tipo de tarifa ya existe');
                return Redirect::to($url.'tipoTarifa')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $CrearTarifa = Administracion::CrearTipoTarifa($NombreTarifa,$Usuario);
                if($CrearTarifa){
                    $verrors = 'Se creo el tipo de tarifa '.$NombreTarifa.' con éxito.';
                    return Redirect::to($url.'tipoTarifa')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear el tipo de tarifa');
                    return Redirect::to($url.'tipoTarifa')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarTipoTarifa(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_tipo_tarifa_upd' => 'required',
            'estado_tipo_tarifa_upd' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to($url.'tipoTarifa')->withErrors($validator)->withInput();
        }else{
            $NombreTarifa = $request->nombre_tipo_tarifa_upd;
            $Usuario = (int)Session::get('IdUsuario');
            $Estado = (int)$request->estado_tipo_tarifa_upd;
            $IdTarifa = (int)$request->id_tipoTarifa;
            $BuscarTarifa = Administracion::BuscarTipoTarifaNameId($NombreTarifa,$IdTarifa);
            if($BuscarTarifa){
                $verrors = array();
                array_push($verrors, 'Nombre de tipo tarifa ya existe');
                return Redirect::to($url.'tipoTarifa')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $ActualizarTarifa = Administracion::ActualizarTipoTarifa($NombreTarifa,$Estado,$Usuario,$IdTarifa);
                if($ActualizarTarifa){
                    $verrors = 'Se actualizo el tipo de tarifa '.$NombreTarifa.' con éxito.';
                    return Redirect::to($url.'tipoTarifa')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar el nombre de tipo tarifa');
                    return Redirect::to($url.'tipoTarifa')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function CrearNombreTarifa(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_tarifa' => 'required',
            'tipo_tarifa' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to($url.'tipoTarifa')->withErrors($validator)->withInput();
        }else{
            $NombreTarifa = $request->nombre_tarifa;
            $TipoTarifa = $request->tipo_tarifa;
            $Usuario = (int)Session::get('IdUsuario');
            $BuscarTarifa = Administracion::BuscarNombreTarifaName($NombreTarifa,$TipoTarifa);
            if($BuscarTarifa){
                $verrors = array();
                array_push($verrors, 'Nombre de tipo de tarifa ya existe');
                return Redirect::to($url.'tipoTarifa')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $CrearTarifa = Administracion::CrearNombreTarifa($NombreTarifa,$TipoTarifa,$Usuario);
                if($CrearTarifa){
                    $verrors = 'Se creo el tipo de tarifa '.$NombreTarifa.' con éxito.';
                    return Redirect::to($url.'tipoTarifa')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear el tipo de tarifa');
                    return Redirect::to($url.'tipoTarifa')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public function ActualizarNombreTarifa(Request $request){
        $url = AdministracionController::FindUrl();
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_tarifa_upd' => 'required',
            'tipo_tarifa_upd' => 'required',
            'estado_nombre_tarifa_upd' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to($url.'tipoTarifa')->withErrors($validator)->withInput();
        }else{
            $NombreTarifa = $request->nombre_tarifa_upd;
            $TipoTarifa = $request->tipo_tarifa_upd;
            $Usuario = (int)Session::get('IdUsuario');
            $Estado = (int)$request->estado_nombre_tarifa_upd;
            $IdTarifa = (int)$request->id_nombreTarifa;
            $BuscarTarifa = Administracion::BuscarNombreTarifaNameId($NombreTarifa,$TipoTarifa,$IdTarifa);
            if($BuscarTarifa){
                $verrors = array();
                array_push($verrors, 'Nombre de tarifa ya existe');
                return Redirect::to($url.'tipoTarifa')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $ActualizarTarifa = Administracion::ActualizarNombreTarifa($NombreTarifa,$TipoTarifa,$Estado,$Usuario,$IdTarifa);
                if($ActualizarTarifa){
                    $verrors = 'Se actualizo el nombre de tarifa '.$NombreTarifa.' con éxito.';
                    return Redirect::to($url.'tipoTarifa')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar el nombre de tarifa');
                    return Redirect::to($url.'tipoTarifa')->withErrors(['errors' => $verrors])->withInput();
                }
            }
        }
    }

    public static function FindUrl(){
        $RolUser = (int)Session::get('Rol');
        if($RolUser === 1){
            $url = 'admin/';
        }else if($RolUser === 0){
             return Redirect::to('/');
        }else{
            return Redirect::to('user/home');
        }
        return $url;
    }
}
