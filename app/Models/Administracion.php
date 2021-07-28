<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Administracion extends Model
{
    use HasFactory;

    public static function getNotificacionesAviso(){
        $getNotificacionesAviso = DB::Select("SELECT * FROM notificaciones WHERE ESTADO = 1 ORDER BY 1 DESC LIMIT 10");
        return $getNotificacionesAviso;
    }

    public static function getContactenos(){
        $getContactenos = DB::Select("SELECT * FROM form_contacto ORDER BY 1 DESC LIMIT 10");
        return $getContactenos;
    }

    public static function getHojaVida(){
        $getHojaVida = DB::Select("SELECT * FROM form_trabajo ORDER BY 1 DESC LIMIT 10");
        return $getHojaVida;
    }

    public static function tipoDocumento($idDocumento){
        $getHojaVida = DB::Select("SELECT * FROM tipo_documento WHERE ID_DOCUMENTO = $idDocumento AND ESTADO = 1");
        return $getHojaVida;
    }

    public static function ListarDepenencias(){
        $ListarDepenencias = DB::Select('SELECT * FROM dependencia ORDER BY NOMBRE_DEPENDENCIA');
        return $ListarDepenencias;
    }

    public static function ListarDepenenciasActivo(){
        $ListarDepenencias = DB::Select('SELECT * FROM dependencia  WHERE ESTADO = ? ORDER BY NOMBRE_DEPENDENCIA',[1]);
        return $ListarDepenencias;
    }

    public static function ListarDependenciasId($IdDependencia){
        $ListarDepenencias = DB::Select('SELECT * FROM dependencia WHERE ID_DEPENDENCIA = ?',[$IdDependencia]);
        return $ListarDepenencias;
    }

    public static function BuscarDependenciaByUsername($NOMBRE){
        $BuscarDependenciaByUsername = DB::select("SELECT * FROM dependencia WHERE NOMBRE_DEPENDENCIA LIKE '%$NOMBRE%'");
        return $BuscarDependenciaByUsername;
    }

    public static function BuscarDependenciaByUsernameId($NOMBRE,$IdDependencia){
        $BuscarDependenciaByUsername = DB::select("SELECT * FROM dependencia WHERE NOMBRE_DEPENDENCIA LIKE '%$NOMBRE%' AND ID_DEPENDENCIA NOT IN ($IdDependencia)");
        return $BuscarDependenciaByUsername;
    }

    public static function CrearDependencia($Nombre,$Usuario){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $CrearDependencia = DB::Insert('INSERT INTO dependencia (NOMBRE_DEPENDENCIA, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                        values (?,?,?,?)',
                                        [$Nombre,1,$fechaCreacion,1]);
        return $CrearDependencia;
    }

    public static function ActualizarDependencia($Nombre,$Usuario,$Estado,$IdDependencia){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarDependencia = DB::Update('UPDATE dependencia SET
                                            NOMBRE_DEPENDENCIA = ?,
                                            ESTADO = ?,
                                            FECHA_MODIFICACION = ?,
                                            USUARIO_MODIFICACION = ?
                                            WHERE ID_DEPENDENCIA = ?',
                                            [$Nombre,$Estado,$fechaActualizacion,$Usuario,$IdDependencia]);
        return $ActualizarDependencia;
    }

    public static function ListarRoles(){
        $ListarRoles = DB::Select('SELECT * FROM roles ORDER BY NOMBRE_ROL');
        return $ListarRoles;
    }

    public static function ListarRolesActivo(){
        $ListarRoles = DB::Select('SELECT * FROM roles  WHERE ESTADO = ? ORDER BY NOMBRE_ROL',[1]);
        return $ListarRoles;
    }

    public static function ListarRolesId($IdRol){
        $ListarRoles = DB::Select('SELECT * FROM roles WHERE ID_ROL = ?',[$IdRol]);
        return $ListarRoles;
    }

    public static function BuscarRolByUsername($NOMBRE){
        $BuscarRolByUsername = DB::select("SELECT * FROM roles WHERE NOMBRE_ROL LIKE '%$NOMBRE%'");
        return $BuscarRolByUsername;
    }

    public static function BuscarRolByUsernameiD($NOMBRE,$IdRol){
        $BuscarRolByUsername = DB::select("SELECT * FROM roles WHERE NOMBRE_ROL LIKE '%$NOMBRE%' AND ID_ROL NOT IN ($IdRol)");
        return $BuscarRolByUsername;
    }

    public static function CrearRol($Nombre,$Usuario){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $CrearRol = DB::Insert('INSERT INTO roles (NOMBRE_ROL, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                        values (?,?,?,?)',
                                        [$Nombre,1,$fechaCreacion,1]);
        return $CrearRol;
    }

    public static function ActualizarRol($Nombre,$Usuario,$Estado,$IdRol){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarRol = DB::Update('UPDATE roles SET
                                            NOMBRE_ROL = ?,
                                            ESTADO = ?,
                                            FECHA_MODIFICACION = ?,
                                            USUARIO_MODIFICACION = ?
                                            WHERE ID_ROL = ?',
                                            [$Nombre,$Estado,$fechaActualizacion,$Usuario,$IdRol]);
        return $ActualizarRol;
    }

    public static function ListarUsuarios(){
        $ListarUsuarios = DB::Select('SELECT * FROM usuarios ORDER BY NOMBRE_USUARIO');
        return $ListarUsuarios;
    }

    public static function BuscarUserId($IdUsuario){
        $BuscarUserId = DB::select('SELECT * FROM usuarios WHERE ID_USUARIO = ?', [$IdUsuario]);
        return $BuscarUserId;
    }

    public static function BuscarUserByUsername($Username){
        $BuscarUserByUsername = DB::select("SELECT * FROM usuarios WHERE USERNAME LIKE '%$Username%'");
        return $BuscarUserByUsername;
    }

    public static function BuscarUserByUsernameId($Username,$IdUsuario){
        $BuscarUserByUsernameId = DB::select("SELECT * FROM usuarios WHERE USERNAME LIKE '%$Username%' AND ID_USUARIO NOT IN ($IdUsuario)");
        return $BuscarUserByUsernameId;
    }

    public static function CrearUsuario($Nombre,$Correo,$Username,$Password,$Rol,$Dependencia,$Estado,$Usuario,$Administrador){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $CrearUsuario = DB::Insert('INSERT INTO usuarios (NOMBRE_USUARIO,CORREO,USERNAME,PASSWORD,ID_ROL,ID_DEPENDENCIA,ESTADO,FECHA_CREACION,USUARIO_CREACION,ADMINISTRADOR)
                                    VALUES (?,?,?,?,?,?,?,?,?,?)',
                                    [$Nombre,$Correo,$Username,$Password,$Rol,$Dependencia,$Estado,$fechaCreacion,$Usuario,$Administrador]);
        return $CrearUsuario;
    }

    public static function ActualizarUsuario($IdUsuario,$Nombre,$Correo,$Username,$Password,$Rol,$Dependencia,$Estado,$Usuario,$Administrador){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarUsuario = DB::update('UPDATE usuarios SET
                                        NOMBRE_USUARIO = ?,
                                        CORREO = ?,
                                        USERNAME = ?,
                                        PASSWORD = ?,
                                        ID_ROL = ?,
                                        ID_DEPENDENCIA = ?,
                                        ESTADO = ?,
                                        FECHA_MODIFICACION = ?,
                                        USUARIO_MODIFICACION = ?,
                                        ADMINISTRADOR = ?
                                        WHERE ID_USUARIO = ?',
                                        [$Nombre,$Correo,$Username,$Password,$Rol,$Dependencia,$Estado,$fechaActualizacion,$Usuario,$Administrador,$IdUsuario]);
        return $ActualizarUsuario;
    }

    public static function BuscarUser($Usuario){
        $BuscarUser = DB::Select('SELECT * FROM usuarios WHERE USERNAME = ?', [$Usuario]);
        return $BuscarUser;
    }

    public static function BuscarPass($Usuario,$Password){
        $BuscarPass = DB::Select('SELECT * FROM usuarios WHERE USERNAME = ? AND PASSWORD = ?', [$Usuario,$Password]);
        return $BuscarPass;
    }

    public static function BuscarUserEmail($Correo){
        $BuscarUserEmail = DB::Select('SELECT * FROM usuarios WHERE CORREO = ?', [$Correo]);
        return $BuscarUserEmail;
    }

    public static function RestablecerPassword($UserName,$UserEmail){
        $RestablecerPassword = DB::Select('SELECT * FROM usuarios WHERE CORREO = ? AND USERNAME = ?', [$UserEmail,$UserName]);
        return $RestablecerPassword;
    }

    public static function NuevaContrasena($idUser,$nuevaContrasena){
        $NuevaContrasena = DB::Update('UPDATE usuarios SET PASSWORD = ? WHERE ID_USUARIO = ?', [$nuevaContrasena,$idUser]);
        return $NuevaContrasena;
    }

    public static function ListarNotificaciones(){
        $ListarNotificaciones = DB::Select('SELECT * FROM notificaciones ORDER BY NOMBRE_CIUDADANO');
        return $ListarNotificaciones;
    }

    public static function ListarNotificacionPlaca($Placa){
        $ListarNotificacionPlaca = DB::Select('SELECT * FROM notificaciones WHERE PLACA = ?',[$Placa]);
        return $ListarNotificacionPlaca;
    }

    public static function CargarNotificacion($NOMBRE_CIUDADANO,$PLACA,$YEAR_NOTIFICATION,$Estado,$IdUser){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));

        $CargarNotificacion = DB::Insert("INSERT INTO notificaciones (NOMBRE_CIUDADANO,PLACA,YEAR_NOTIFICATION,ESTADO,FECHA_CREACION,USUARIO_CREACION)
                                        VALUES ('$NOMBRE_CIUDADANO','$PLACA',$YEAR_NOTIFICATION,$Estado,'$fechaCreacion',$IdUser)");
        return $CargarNotificacion;
    }

    public static function InactivarNotificaciones(){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $fecha_sistema1  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema1));
        $InactivarNotificaciones = DB::Update("UPDATE notificaciones SET ESTADO = 2, FECHA_MODIFICACION = '$fechaActualizacion' WHERE FECHA_CREACION < '$fechaCreacion'");
        return $InactivarNotificaciones;
    }

    public static function ActualizarNotificacion($nombre_ciudadano,$placa,$year,$Estado,$IdUser,$IdNotificacion){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarNotificacion = DB::update('UPDATE notificaciones SET
                                            NOMBRE_CIUDADANO = ?,
                                            PLACA = ?,
                                            YEAR_NOTIFICATION = ?,
                                            ESTADO = ?,
                                            FECHA_MODIFICACION = ?,
                                            USUARIO_MODIFICACION = ?
                                            WHERE ID_NOTIFICACION = ?',
                                            [$nombre_ciudadano,$placa,$year,$Estado,$fechaActualizacion ,$IdUser,$IdNotificacion]);;
        return $ActualizarNotificacion;
    }
}
