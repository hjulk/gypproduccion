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

    public static function FindUrl(){
        $RolUser = (int)Session::get('Rol');
        if($RolUser === 1){
            $url = 'admin/';
        }else if($RolUser === 0){
            return Redirect::to('login');
        }else{
            return Redirect::to('user/home');
        }
        return $url;
    }
}
