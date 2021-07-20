<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

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

                        $Dependencia = Administracion::ListarDependenciasId($idDependencia);
                        foreach($Dependencia as $valor){
                            $NombreDependencia = $valor->NOMBRE_DEPENDENCIA;
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
                        Session::put('NombreDependencia', $NombreDependencia);
                        Session::save();
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

    public function RecuperarAcceso(Request $request){
        $cadena = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ()#.$@?';
        $limite = strlen($cadena) - 1;
        $b = '';
        for ($i=0; $i < 8; $i++){
            $b .= $cadena[rand(0, $limite)];
        }
        $UserName    = $request->username;
        $UserEmail   = $request->correo;
        $nuevaContrasena = Hash('sha512',$b);
        if(!empty($UserName) || !empty($UserEmail)){

            if(!empty($UserName) && empty($UserEmail)){

                $BuscarUsuario = Administracion::BuscarUser($UserName);
                if($BuscarUsuario){
                    foreach($BuscarUsuario as $value){
                        $idUser = $value->ID_USUARIO;
                        $Correo = $value->CORREO;
                        $Nombre = $value->NOMBRE_USUARIO;
                    }
                    $UpdatePassword = LoginController::UpdatePass($UserName,$Correo,$Nombre,$idUser,$nuevaContrasena,$b);
                    if($UpdatePassword[1] == 'exito'){
                        $verrors = $UpdatePassword[0];
                        return Redirect::to('login')->with('mensaje', $verrors);
                    }else{
                        $verrors = $UpdatePassword[0];
                        return Redirect::to('login')->withErrors('mensaje', $verrors);
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'El usuario '.$UserName.' NO se encuentra en la base de datos');
                    return Redirect::to('login')->withErrors(['errors' => $verrors]);
                }
            }else if(empty($UserName) && !empty($UserEmail)){
                $BuscarUsuario = Administracion::BuscarUserEmail($UserEmail);
                if($BuscarUsuario){

                    foreach($BuscarUsuario as $value){
                        $idUser = $value->ID_USUARIO;
                        $Nombre = $value->NOMBRE_USUARIO;
                        $Correo = $value->CORREO;
                        $UserName = $value->USERNAME;
                    }
                    $UpdatePassword = LoginController::UpdatePass($UserName,$Correo,$Nombre,$idUser,$nuevaContrasena,$b);
                    if($UpdatePassword[1] == 'exito'){
                        $verrors = $UpdatePassword[0];
                        return Redirect::to('login')->with('mensaje', $verrors);
                    }else{
                        $verrors = $UpdatePassword[0];
                        return Redirect::to('login')->withErrors('mensaje', $verrors);
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'El correo '.$UserEmail.' NO se encuentra en la base de datos');
                    return Redirect::to('login')->withErrors(['errors' => $verrors]);
                }
            }else if(!empty($UserName) && !empty($UserEmail)){
                $BuscarUsuario = Administracion::RestablecerPassword($UserName,$UserEmail);
                if($BuscarUsuario){

                    foreach($BuscarUsuario as $value){
                        $idUser = $value->ID_USUARIO;
                        $Nombre = $value->NOMBRE_USUARIO;
                        $Correo = $value->CORREO;
                        $UserName = $value->USERNAME;
                    }
                    $UpdatePassword = LoginController::UpdatePass($UserName,$Correo,$Nombre,$idUser,$nuevaContrasena,$b);
                    if($UpdatePassword[1] == 'exito'){
                        $verrors = $UpdatePassword[0];
                        return Redirect::to('login')->with('mensaje', $verrors);
                    }else{
                        $verrors = $UpdatePassword[0];
                        return Redirect::to('login')->withErrors('mensaje', $verrors);
                    }
                }else{
                    $verrors = array();
                    array_push($verrors, 'El usuario '.$UserName.' y correo '.$UserEmail.' NO se encuentra en la base de datos');
                    return Redirect::to('login')->withErrors(['errors' => $verrors]);
                }
            }
        }else{
            $verrors = array();
            array_push($verrors, 'Debe diligenciar uno de los dos campos para realizar la solicitud de recuperación de contraseña');
            return Redirect::to('login')->withErrors(['errors' => $verrors])->withInput();
        }

    }

    public static function UpdatePass($UserName,$Correo,$Nombre,$idUser,$nuevaContrasena,$b){
        $UpdatePassword = Administracion::NuevaContrasena($idUser,$nuevaContrasena);
        $respuesta = array();
        if($UpdatePassword){
            $for = "$Correo";
            $subject = "Recuperación de Contraseña";
            Mail::send('Emails.CorreoRecuperacion',
                    ['Contrasena' => $b,'NombreUser' => $UserName,'Usuario'=>$Nombre],
                    function($msj) use($subject,$for){
                        $msj->from("comunicaciones@gruasyparqueaderosbogota.com","Administración página GyP Bogotá");
                        $msj->subject($subject);
                        $msj->to($for);
            });
            if(count(Mail::failures()) === 0){
                $respuesta = ['Se envio con exito la nueva contraseña al correo del usuario '.$UserName,'exito'];

            }else{
                $respuesta = ['Hubo un error al enviar su mensaje','error'];
            }
        }else{
            $respuesta = ['Hubo un problema al recuperar la contraseña','error'];
        }
        return $respuesta;
    }
}
