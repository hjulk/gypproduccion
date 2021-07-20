<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function Login(){
        return view('login');
    }

    public function Acceso(Request $request){

        $validator = Validator::make($request->all(), [
            'usuario' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return Redirect::to('login')->withErrors($validator)->withInput();
        }else{
            $user               = $request->usuario;
            $password           = $request->password;
            $clave              = hash('sha512', $password);
            $consultarUsuario   = Administracion::BuscarUser($user);

            if($consultarUsuario){
                $consultarLogin = Administracion::BuscarPass($user,$clave);
                if($consultarLogin){
                    foreach($consultarLogin as $value){
                        $IdUsuario          = (int)$value->ID_USUARIO;
                        $nombreUsuario      = $value->NOMBRE_USUARIO;
                        $emailUsuario       = $value->CORREO;
                        $userName           = $value->USERNAME;
                        $estado             = (int)$value->ESTADO;
                        $idRol              = (int)$value->ID_ROL;
                        $idDependencia      = (int)$value->ID_DEPENDENCIA;
                        $Administracion     = (int)$value->ADMINISTRADOR;
                        $fechaInicio        = $value->FECHA_CREACION;
                    }
                    If($estado === 1){

                        setlocale(LC_ALL, 'es_ES');
                        $mesCreacion = date('F', strtotime($fechaInicio));
                        $anio = date('Y', strtotime($fechaInicio));
                        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                        $nombreMes = str_replace($meses_EN, $meses_ES, $mesCreacion);
                        $fechaCreacion = $nombreMes.', '.$anio;

                        $Rol    = Administracion::ListarRolesId($idRol);
                        foreach($Rol as $valor){
                            $NombreRol = $valor->NOMBRE_ROL;
                        }

                        Session::put('IdUsuario', $IdUsuario);
                        Session::put('NombreUsuario', $nombreUsuario);
                        Session::put('UserName', $userName);
                        Session::put('Rol', $idRol);
                        Session::put('Email', $emailUsuario);
                        Session::put('Activo', $estado);
                        Session::put('FechaCreacion', $fechaCreacion);
                        Session::put('Administracion', $Administracion);
                        Session::put('NombreRol', $NombreRol);
                        Session::save();
                        // return \Response::json(['valido'=>'true','rol'=>$rol]);
                        $usuario = Session::get('NombreUsuario');
                        switch($idRol){
                            Case 1: return Redirect::to('admin/home');
                                    break;
                            Case 2: return Redirect::to('user/home');
                                    break;
                            Case 3: return Redirect::to('user/home');
                                    break;
                            default: return Redirect::to('user/home');
                                    break;
                        }

                    }else{
                        $verrors = array();
                        array_push($verrors, 'Usuario inactivo');
                        return Redirect::to('login')->withErrors(['errors' => $verrors]);
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'Usuario o contraseña incorrectos');
                    return Redirect::to('login')->withErrors(['errors' => $verrors]);
                }

            }else{
                $verrors = array();
                array_push($verrors, 'Usuario incorrecto');
                return Redirect::to('login')->withErrors(['errors' => $verrors]);
            }
        }
    }
}
