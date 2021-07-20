<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsuariosController extends Controller
{
    public function actualizarPerfil(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 1){
            $url = 'admin/';
        }else{
            $url = 'user/';
        }
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
                $verrors = 'Se actualizo la contraseña con exito.';
                return Redirect::to($url.'profileUser')->with('mensaje', $verrors);
            }else{
                $verrors = array();
                array_push($verrors, 'Hubo un problema al actualizar la contraseña.');
                return Redirect::to($url.'profileUser')->withErrors(['errors' => $verrors])->withRequest();
            }
        }
    }
}
