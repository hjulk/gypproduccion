<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;

class AdministracionController extends Controller
{
    public function CrearDependencia(Request $request){
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_dependencia'    =>  'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('dependencias')->withErrors($validator)->withInput();
        }else{
            $Nombre = $request->nombre_dependencia;
            $BuscarNombre = Administracion::BuscarDependenciaByUsername($Nombre);
            if($BuscarNombre){
                $verrors = array();
                array_push($verrors, 'Nombre de Dependencia ya existe');
                return Redirect::to('dependencias')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $Usuario = 1;
                $crearDependencia = Administracion::CrearDependencia($Nombre,$Usuario);
                if($crearDependencia){
                    $verrors = 'Se creo la depenencia '.$Nombre.' con exito.';
                    return Redirect::to('dependencias')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear la dependencia');
                    return Redirect::to('dependencias')->withErrors(['errors' => $verrors])->withRequest();
                }
            }
        }
    }

    public function ActualizarDependencia(Request $request){
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_dependencia_upd'    =>  'required',
            'estado_upd' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to('dependencias')->withErrors($validator)->withInput();
        }else{
            $IdDependencia = (int)$request->id_d;
            $Nombre = $request->nombre_dependencia_upd;
            $BuscarNombre = Administracion::BuscarDependenciaByUsernameId($Nombre,$IdDependencia);
            if($BuscarNombre){
                $verrors = array();
                array_push($verrors, 'Nombre de Dependencia ya existe');
                return Redirect::to('dependencias')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $Usuario = 1;
                $EstadoUpd  = (int)$request->estado_upd;
                if($EstadoUpd === 1){
                    $Estado = 1;
                }else{
                    $Estado = 0;
                }
                $ActualizarDependencia = Administracion::ActualizarDependencia($Nombre,$Usuario,$Estado,$IdDependencia);
                if($ActualizarDependencia){
                    $verrors = 'Se actualizo la dependencia '.$Nombre.' con exito.';
                    return Redirect::to('dependencias')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar la dependencia');
                    return Redirect::to('dependencias')->withErrors(['errors' => $verrors])->withRequest();
                }
            }
        }
    }

    public function CrearRol(Request $request){
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_rol'    =>  'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('roles')->withErrors($validator)->withInput();
        }else{
            $Nombre = $request->nombre_rol;
            $BuscarNombre = Administracion::BuscarRolByUsername($Nombre);
            if($BuscarNombre){
                $verrors = array();
                array_push($verrors, 'Nombre de Rol ya existe');
                return Redirect::to('roles')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $Usuario = 1;
                $CrearRol = Administracion::CrearRol($Nombre,$Usuario);
                if($CrearRol){
                    $verrors = 'Se creo el rol '.$Nombre.' con exito.';
                    return Redirect::to('roles')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear el rol');
                    return Redirect::to('roles')->withErrors(['errors' => $verrors])->withRequest();
                }
            }
        }
    }

    public function ActualizarRol(Request $request){
        date_default_timezone_set('America/Bogota');
        $validator = Validator::make($request->all(), [
            'nombre_rol_upd'    =>  'required',
            'estado_upd' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('roles')->withErrors($validator)->withInput();
        }else{
            $IdRol = (int)$request->id_r;
            $Nombre = $request->nombre_rol_upd;
            $BuscarNombre = Administracion::BuscarRolByUsernameiD($Nombre,$IdRol);
            if($BuscarNombre){
                $verrors = array();
                array_push($verrors, 'Nombre de Rol ya existe');
                return Redirect::to('roles')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $Usuario = 1;
                $EstadoUpd  = (int)$request->estado_upd;
                if($EstadoUpd === 1){
                    $Estado = 1;
                }else{
                    $Estado = 0;
                }
                $ActualizarRol = Administracion::ActualizarRol($Nombre,$Usuario,$Estado,$IdRol);
                if($ActualizarRol){
                    $verrors = 'Se actualizo el rol '.$Nombre.' con exito.';
                    return Redirect::to('roles')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar el rol');
                    return Redirect::to('roles')->withErrors(['errors' => $verrors])->withRequest();
                }
            }
        }
    }

    public function CrearUsuario(Request $request){
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
            return Redirect::to('usuarios')->withErrors($validator)->withInput();
        }else{
            $Nombre         = $request->nombre_usuario;
            $Correo         = $request->correo;
            $Username       = $request->username;
            $Password       = hash('sha512', $request->password);
            $Rol            = (int)$request->id_rol;
            $Dependencia    = (int)$request->id_dependencia;
            $Administrador  = (int)$request->administrador;
            $Usuario = 1;
            $Estado = 1;
            $BuscarNombre = Administracion::BuscarUserByUsername($Username);
            if($BuscarNombre){
                $verrors = array();
                array_push($verrors, 'Usuario ya existe');
                return Redirect::to('usuarios')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $CrearUsuario = Administracion::CrearUsuario($Nombre,$Correo,$Username,$Password,$Rol,$Dependencia,$Estado,$Usuario,$Administrador);
                if($CrearUsuario){
                    $verrors = 'Se creo el usuario '.$Nombre.' con exito.';
                    return Redirect::to('usuarios')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al crear el usuario');
                    return Redirect::to('usuarios')->withErrors(['errors' => $verrors])->withRequest();
                }
            }
        }
    }

    public function ActualizarUsuario(Request $request){
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
            return Redirect::to('usuarios')->withErrors($validator)->withInput();
        }else{
            $IdUsuario      = $request->id_user;
            $Nombre         = $request->nombre_usuario_upd;
            $Correo         = $request->correo_upd;
            $Username       = $request->username_upd;
            $Rol            = (int)$request->id_rol_upd;
            $Dependencia    = (int)$request->id_dependencia_upd;
            $Administrador  = (int)$request->administrador_upd;
            $Usuario        = 1;
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
                return Redirect::to('usuarios')->withErrors(['errors' => $verrors])->withInput();
            }else{
                $ActualizarUsuario = Administracion::ActualizarUsuario($IdUsuario,$Nombre,$Correo,$Username,$Password,$Rol,$Dependencia,$Estado,$Usuario,$Administrador);
                if($ActualizarUsuario){
                    $verrors = 'Se actualizo el usuario '.$Nombre.' con exito.';
                    return Redirect::to('usuarios')->with('mensaje', $verrors);
                }else{
                    $verrors = array();
                    array_push($verrors, 'Hubo un problema al actualizar el usuario');
                    return Redirect::to('usuarios')->withErrors(['errors' => $verrors])->withRequest();
                }
            }
        }
    }
}
